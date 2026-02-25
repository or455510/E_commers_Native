<?php
require_once __DIR__ . '/../config/init.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_product'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $old_price = $_POST['old_price'];
    $category_id = $_POST['category_id'];

    // 1️⃣ إضافة المنتج
    $stmt = $db->prepare("INSERT INTO products (name,description,price,old_price,category_id) VALUES (?,?,?,?,?)");
    $stmt->execute([$name,$description,$price,$old_price,$category_id]);

    $product_id = $db->lastInsertId();

    // 2️⃣ رفع الصورة
    if(isset($_FILES['image'])){
        upload_image($product_id);
    }

    header("Location: add_product.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahmoud Reda</title>

    <!-- link file fontAwesome -->

    <link rel="stylesheet" href="fontAwesome/css/all.css" />

    <!-- link File Swiper css -->
    <link rel="stylesheet" href="swiperJs/swiper-bundle.min.css">

    <!-- Link File CSS -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="notfcation">
        <span><i onclick="showSecTogle('.drobdwon')" id="bell-btn" class="fa-solid fa-bell"></i></span>
        <ul class="drobdwon">
            <li>تم الالغاء <span>3</span></li>
            <li>تم الارجاع <span>2</span></li>
        </ul>
    </div>

<?php require_once __DIR__ . '/layout/sid_bar.php';
 ?>
    <!-- لوحة التحكم -->
    <div class="contanier">
        <div class="top-sec">
            <h4> الشركات</h4>
            <div class="btn-add">
                <span onclick="showSec('.add-kesm')" class="btn">اضافة شركة <i class="fa-solid fa-plus"></i></span>
            </div>
        </div>






    </div>

<div class="add-kesm">

    <i onclick="closeSec('.add-kesm')" class="fa-solid fa-circle-xmark"></i>

    <div class="top-sec">
        <h4> اضافة منتج </h4>
    </div>

    <div class="cont-add">
        <form action="add_product.php" method="POST" enctype="multipart/form-data">

            <div class="container2">
                <input type="file" name="image" id="file" accept="image/*" required hidden>

                <div class="img-area" data-img="">
                    <i class='bx bxs-cloud-upload icon'></i>
                    <p>اقصي حجم 2MB</p>
                </div>

                <button type="button" class="select-image">اختر الصورة</button>
            </div>

            <div class="inp-add">
                <div class="all-input">

                    <div class="inp">
                        <label>اسم المنتج</label>
                        <input type="text" name="name" required>
                    </div>

                    <div class="inp">
                        <label>وصف المنتج</label>
                        <input type="text" name="description" required>
                    </div>

                    <div class="inp">
                        <label>السعر</label>
                        <input type="number" step="0.01" name="price" required>
                    </div>

                    <div class="inp">
                        <label>السعر قبل الخصم</label>
                        <input type="number" step="0.01" name="old_price">
                    </div>

                    <div class="inp">
                        <label>القسم</label>
                        <select name="category_id" required>
                            <option value="">اختر القسم</option>
                            <?php foreach(getCategories() as $cat): ?>
                                <option value="<?= $cat['id']; ?>">
                                    <?= $cat['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" name="add_product" class="btn">
                        اضافة المنتج
                    </button>

                </div>
            </div>

        </form>
    </div>
</div>

    <script src="js/main.js"></script>
</body>

</html>