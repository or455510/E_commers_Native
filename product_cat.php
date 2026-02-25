<?php
require_once __DIR__ . '/config/init.php';

?>
<style>
    /* ===== Product Card Professional Style ===== */

    .product-item {
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        position: relative;
        transition: all 0.35s ease;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.05);
    }

    .product-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    /* ===== Image Section ===== */

    .div-img {
        position: relative;
        overflow: hidden;
        height: 250px;
    }

    .div-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s ease;
    }

    .hover-img {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
    }

    .product-item:hover .hover-img {
        opacity: 1;
    }

    .product-item:hover .img-product {
        opacity: 0;
    }

    /* ===== Discount Badge ===== */

    .discount {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(45deg, #ff4d4d, #ff0000);
        color: #fff;
        padding: 5px 10px;
        font-size: 13px;
        border-radius: 30px;
        font-weight: bold;
        z-index: 2;
    }

    /* ===== Content Section ===== */

    .content {
        padding: 18px;
        text-align: center;
    }

    .product-item-link {
        font-size: 18px;
        font-weight: 600;
        color: #111;
        display: block;
        margin-bottom: 8px;
        transition: 0.3s;
    }

    .product-item-link:hover {
        color: #ff4d4d;
    }

    /* ===== Stars ===== */

    .stars {
        color: #ffc107;
        font-size: 14px;
        margin-bottom: 10px;
    }

    /* ===== Price ===== */

    .price {
        margin-bottom: 10px;
    }

    .price span {
        font-size: 20px;
        font-weight: bold;
        color: #000;
    }

    .price del {
        font-size: 14px;
        color: #888;
        margin-left: 8px;
    }

    /* ===== Description ===== */

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .product-parg {
        font-size: 14px;
        color: #666;
        display: block;
        margin-bottom: 15px;
        min-height: 40px;
        align-items: center;
    }

    /* ===== Button ===== */

    .product-item .btn {
        width: 100%;
        border-radius: 30px;
        padding: 10px;
        font-weight: 600;
        transition: 0.3s;
        background: #000;
        color: #fff;
        
    }

    .product-item .btn:hover {
        background: #ff4d4d;
    }
</style>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TOPICO</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiperJs/swiper-bundle.min.css" />

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Link File CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="menu-side-in-bag feature-bag">
    <?php include 'layout/header.php'; ?>

    <section class="fuature-sec">
        <div class="contanier">
            <div class="top-fuature">
                <h1>تصفح و اشتري افضل المنتجات من متجرك المفضل اكسبريمو</h1>
                <p>اعثر على كل ما تحتاجه لتحويل منزلك إلى مساحة ذكية ومتصلة. يقدم متجر اكسبريمو لدينا مجموعة واسعة من الأجهزة لتناسب احتياجاتك</p>

            </div>
            <div class="boxs">
                <?php foreach (product_cat($_GET['category']) as $product) : ?>
                    <div class="box column product-item">
                        <!--  -->

                        <div class="div-img">
                            <span class="discount">34%</span>
                            <?php
                            $images = getProductImages($product['id']);
                            $firstImage = !empty($images) ? $images[0]['image'] : 'default.png';
                            ?> <img src="uploads/products/<?php echo $firstImage; ?>" class="img-product">
                            <img src="uploads/products/<?php echo $firstImage; ?>" class="hover-img">
                        </div>
                        <div class="content">
                            <a class="product-item-link"><?php echo $product['name']; ?></a>
                            <div class="stars">
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star"></i>
                                <i class="fa-solid fa-star-half-stroke"></i>
                            </div>
                            <div class="price">
                                <span>$<?php echo $product['price']; ?></span>
                                <del>$<?php echo $product['old_price']; ?></del>
                            </div>
                            <div class="container ">
                                <a class="product-parg "><?php echo substr($product['description'], 0, 100); ?></a>
                                <button onclick="addToCart(<?php echo $product['id']; ?>)" class="btn">add to cart</button>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>


    <section class="slide-sec contanier">
        <div id="side-bar" class="side-bar">
            <h5><i class="fa-solid fa-bars"></i> SHOP BY DEPARTMENT</h5>
            <img class="logo-slide" src="img/logo.png" alt="">
            <i id="btn-close" class="fa-solid fa-bars fa-times"></i>
            <ul class="side-links">
                <a href="#">
                    <li>الاجهزة المنزلية</li>
                </a>
                <a href="#">
                    <li>العاب الأطفال</li>
                </a>
                <a href="#">
                    <li>الشواحن</li>
                </a>
                <a href="#">
                    <li>المفروشات</li>
                </a>
                <a href="#">
                    <li>الهواتف</li>
                </a>
                <a href="#">
                    <li>الملابس</li>
                </a>
                <a href="#">
                    <li>الأحذية</li>
                </a>
                <a href="#">
                    <li>اكسسوارات</li>
                </a>
                <a href="#">
                    <li>مستحضرات التجميل</li>
                </a>
                <a href="#">
                    <li>التلفزيونات</li>
                </a>

            </ul>


        </div>
    </section>

    <div class="newsletter">
        <div class="contanier">
            <div class="subscribe-content">
                <img src="img/icon_email.png" alt="">
                <div class="text">
                    <h4>سجل للحصول علي اخر الأخبار</h4>
                    <p>سجل بالايميل للحصول علي اخر الأخبار والمنتجات الجديدة </p>
                    <span></span>
                </div>
            </div>
            <div class="subscribe-form">
                <form action="">
                    <input type="search" placeholder="ادخل الايميل هنا للتسجيل">
                    <button class="btn-srch">سجل</button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'layout/footer.php'; ?>
    <!-- Swiper JS -->
    <script src="swiperJs/swiper-bundle.min.js"></script>

    <!-- Linke File JS -->
    <script src="main.js"></script>
</body>

</html>