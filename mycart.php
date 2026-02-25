<?php
session_start();

if (!isset($_SESSION['cart_items'])) {
    $_SESSION['cart_items'] = [];
}

function calculateCartTotal()
{
    $total = 0;
    foreach ($_SESSION['cart_items'] as $item) {
        $total += $item['price'] * $item['quantity'];
    }
    return $total;
}

$cart_total = calculateCartTotal();
$cart_count = count($_SESSION['cart_items']);
$delivery_cost = 29;
$final_total = $cart_total + $delivery_cost;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOPICO</title>

    <link rel="stylesheet" href="swiperJs/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="menu-side-in-bag">

<?php include 'layout/header.php'; ?>

<section class="cart">

<form method="post" action="confirm_order.php">

    <div class="opc-sidebar">
        <h4>ملخص الطلب</h4>

        <p class="totl">الاجمالي : <?php echo $cart_total; ?> جنيه</p>

        <div class="opc-box">
            <div class="count-itmes">
                <p class="cont-p">
                    <span class="count-item-nmbr"><?php echo $cart_count; ?></span>
                    منتجات في سلة التسويق
                </p>
            </div>

            <?php if ($cart_count > 0): ?>
                <?php foreach ($_SESSION['cart_items'] as $item) : ?>
                    <div class="item">
                        <img src="../img/prproduct-1.jpg" alt="">
                        <div class="info-item">
                            <p class="name-item"><?php echo $item['name']; ?></p>
                            <p class="price-item">
                                السعر : <span><?php echo $item['price']; ?> جنيه</span>
                            </p>
                            <p class="count">
                                الكمية : <span><?php echo $item['quantity']; ?></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>السلة فارغة</p>
            <?php endif; ?>
        </div>

        <div class="btn-div">
            <a href="#info-user" class="btn">اكمال الطلب</a>
        </div>
    </div>


    <div id="info-user" class="cont-box-info">

        <div class="info-order box brd-box">
            <h4><i class="fa-solid fa-list"></i> ادخل بياناتك وعنوانك</h4>

            <div class="info pad-box">
                <div class="new-info">
                    <div class="show-inp-new-info">

                        <div class="div-inp">
                            <i class="fa-solid fa-user-pen"></i>
                            <input name="name" type="text" placeholder="الاسم" required>
                        </div>

                        <div class="div-inp">
                            <i class="fa-solid fa-location-dot"></i>
                            <input name="address" type="text" placeholder="العنوان" required>
                        </div>

                        <div class="div-inp">
                            <i class="fa-solid fa-map-location-dot"></i>
                            <input name="city" type="text" placeholder="المدينة" required>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="box">

            <div class="delvr-box brd-box">
                <h4><i class="fa-solid fa-truck-fast"></i> معلومات الدلفري</h4>

                <div class="info-delv pad-box">
                    <input type="radio" checked>
                    <span>تكلفة التوصيل : <span><?php echo $delivery_cost; ?> جنيه</span></span>
                </div>
            </div>

            <div class="info-buyment brd-box">
                <h4><i class="fa-solid fa-money-check-dollar"></i> معلومات الدفع</h4>

                <div class="info-buy pad-box">
                    <input type="checkbox" name="cash_on_delivery" value="1" checked>
                    <span>الدفع عند الاستلام</span>
                </div>
            </div>

        </div>

    </div>


    <div class="row contanier">
        <div class="cart-page-total">
            <h2>اجمالي السعر</h2>
            <ul>
                <li>السعر : <span><?php echo $cart_total; ?> جنيه</span></li>
                <li>تكلفة التوصيل : <span><?php echo $delivery_cost; ?> جنيه</span></li>
                <li>الاجمالي : <span><?php echo $final_total; ?> جنيه</span></li>
            </ul>

            <?php if ($cart_count > 0): ?>
                <button type="submit" class="button">تأكيد الطلب</button>
            <?php endif; ?>
        </div>
    </div>

</form>

</section>

<?php include 'layout/footer.php'; ?>

<script src="swiperJs/swiper-bundle.min.js"></script>
<script src="main.js"></script>

</body>
</html>