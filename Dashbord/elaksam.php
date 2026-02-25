<?php
require_once __DIR__ . '/../config/init.php';

// إضافة قسم
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_category'])) {
    $name = $_POST['name'];

    addCategory($name);
    header("Location: elaksam.php");
    exit;
}

// حذف قسم
if (isset($_GET['delete'])) {
    deleteCategory($_GET['delete']);
    header("Location: elaksam.php");
    exit;
}

$categories = getCategories();
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
            <h4>الأقسام</h4>
            <button onclick="document.querySelector('.add-kesm').style.display='block'" class="btn">
                اضافة قسم <i class="fa-solid fa-plus"></i>
            </button>
        </div>

        <table>
            <thead>
                <tr>
                    <td>#</td>
                    <td>اسم القسم</td>
                    <td>تحرير</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($categories as $cat): ?>
                    <tr>
                        <td><?php echo $cat['id']; ?></td>

                        <td>
                            <?php

                            echo $cat['name'];
                            ?>
                        </td>

                        <td>
                            <a href="?delete=<?php echo $cat['id']; ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>


    <div class="add-kesm">

        <i onclick="closeSec('.add-kesm')" class="fa-solid fa-circle-xmark"></i>

        <div class="top-sec">
            <h4>اضافة قسم</h4>
        </div>

        <div class="cont-add">
            <form method="POST">


                <div class="inp-add">
                    <div class="all-input">
                        <div class="inp">
                            <label for="">اسم القسم</label>

                            <input type="text" name="name" id="" placeholder="اسم القسم">
                        </div>


                        <button name="add_category" class="btn">اضافة القسم</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="js/main.js"></script>
</body>

</html>