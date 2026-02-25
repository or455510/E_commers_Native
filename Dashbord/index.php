<?php
require_once __DIR__ . '/../config/init.php';
$orders = getOrders();
$order_id = $_GET['id'] ?? null;

if ($order_id) {
    $orderItems = getOrderItems($order_id);
} // اذا تم ارسال طلب تعديل (POST)
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_order'])) {
//     $order_id = $_POST['order_id'];
//     $customer_name = $_POST['customer_name'];
//     $address = $_POST['address'];
//     $coupon_code = $_POST['coupon_code'] ?? '';
//     $quantities = $_POST['quantities'] ?? []; // مصفوفة كمية المنتجات

//     // استدعاء فانكشن تحديث الطلب في قاعدة البيانات
//     updateOrderDetails($order_id, $customer_name, $address, $coupon_code, $quantities);

//     header("Location: dashboard.php");
//     exit;
// }

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
            <h4>لوحة التحكم</h4>
        </div>

        <div class="cont-fulid">
            <div class="boxs">


                <div class="box active">

                    <div class="row">
                        <span><span><?php echo getOrdersCountByStatus(); ?></span></span>
                        <i class="fa-solid fa-cart-shopping"></i>

                    </div>
                    <h4>كل الطلبات</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('تم الطلب'); ?></span>
                        <i class="fa-regular fa-calendar-check"></i>

                    </div>
                    <h4> تم الطلب</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('يتم التجهيز'); ?></span>
                        <i class="fa-solid fa-list-check"></i>

                    </div>
                    <h4> يتم التجهيز</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('في انتظار االشحن'); ?></span>
                        <i class="fa-solid fa-truck-ramp-box"></i>

                    </div>
                    <h4>في انتظار االشحن </h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('تم الشحن'); ?></span>
                        <i class="fa-solid fa-truck-arrow-right"></i>

                    </div>
                    <h4>تم الشحن</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('في الطريق اليك'); ?></span>
                        <i class="fa-solid fa-truck-fast"></i>

                    </div>
                    <h4> في الطريق اليك</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('تم الاستلام'); ?></span>
                        <i class="fa-solid fa-user-check"></i>

                    </div>
                    <h4>تم الاستلام</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('لا يرد'); ?></span>
                        <i class="fa-solid fa-phone-slash"></i>

                    </div>
                    <h4>لا يرد</h4>

                </div>

                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('تم التأجيل'); ?></span>
                        <i class="fa-solid fa-file-circle-exclamation"></i>

                    </div>
                    <h4>تم التأجيل</h4>

                </div>
                <div class="box">

                    <div class="row">
                        <span><?php echo getOrdersCountByStatus('عنوان خاطيء'); ?></span>
                        <i class="fa-solid fa-map-location-dot"></i>

                    </div>
                    <h4>عنوان خاطيء</h4>

                </div>
            </div>
        </div>



        <div class="show-desc-order">

            <h4 class="title-order">تفاصيل الطلب</h4>

            <i onclick="closeSec('.show-desc-order')" class="fa-solid fa-circle-xmark"></i>
        </div>






        <table>
            <thead>
                <tr>

                    <td class="checkboxtable"><input type="checkbox"></td>
                    <td>رقم الطلب</td>
                    <td>العميل</td>
                    <td>الحالة</td>
                    <td>الاجمالي</td>
                    <td>تاريخ الاضافة</td>
                    <td>تحرير</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) : ?>
                    <tr>
                        <td class="checkboxtable"><input type="checkbox"></td>
                        <td><?php echo $order['id']; ?></td>
                        <td><?php echo $order['customer_name']; ?></td>
                        <td>
                            <form method="POST" action="update_status.php">
                                <input type="hidden" name="order_id" value="<?php echo $order['id']; ?>">

                                <select name="status" onchange="this.form.submit()">
                                    <option disabled selected value="الولاية"> اختر الحالة</option>
                                    <?php
                                    $statuses = [
                                        "تم الطلب",
                                        "يتم التجهيز",
                                        "في انتظار الشحن",
                                        "تم الشحن",
                                        "في الطريق اليك",
                                        "تم الاستلام",
                                        "لا يرد",
                                        "تم التأجيل",
                                        "عنوان خاطيء",
                                        "تم الالغاء",
                                        "تم الارجاع"
                                    ];

                                    foreach ($statuses as $status) {
                                        $selected = ($order['status'] == $status) ? "selected" : "";
                                        echo "<option value='$status' $selected>$status</option>";
                                    }
                                    ?>
                                </select>
                            </form>
                        </td>
                        <td><?php echo $order['total']; ?>جنيه</td>
                        <td><?php echo $order['created_at']; ?></td>
                        <td><i onclick="showSec('.show-edit-order');scrltop() ;" class="fa-solid fa-pen"></i>
                            <i onclick="showSecTogle('.show-more-info');" class="fa-solid fa-eye"></i>
                        </td>


                    </tr>

                    <tr class="show-more-info" style="display:none;">
                        <td colspan="7">

                            <div class="div-moreinf">
                                <div class="more-info-order">
                                    <p>العنوان : <span><?php echo $order['address']; ?></span></p>
                                    <p>الايميل : <span><?php echo $order['email']; ?></span></p>
                                </div>

                                <table>

                                    <thead>
                                        <tr>

                                            <td colspan="2"> الطلبات</td>
                                            <td>الكمية</td>
                                            <td>سعر الوحدة</td>
                                            <td>الاجمالي</td>

                                        </tr>

                                    </thead>

                                    <tbody class="tbdoy-desc">

                                        <tr>
                                            <td><img src="images/4.jpg" alt=""></td>
                                            <td><?php echo $order['product_name']; ?></td>
                                            <td><?php echo $order['quantity']; ?></td>
                                            <td><?php echo $order['price']; ?> جنيه</td>
                                            <td><?php echo $order['total']; ?>جنيه</td>




                                        </tr>

                                        <tr>
                                            <td><img src="images/3.jpg" alt=""></td>

                                            <td><?php echo $order['product_name']; ?></td>
                                            <td><?php echo $order['quantity']; ?></td>
                                            <td><?php echo $order['price']; ?> جنيه</td>
                                            <td><?php echo $order['total']; ?>جنيه</td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </td>


                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>



    </div>


    <script src="js/main.js"></script>
</body>

</html>