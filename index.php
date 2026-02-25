<?php
require_once 'config/init.php';


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>XPremo | Online Store</title>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="swiperJs/swiper-bundle.min.css" />

    <!-- Link Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Link File CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="menu-side-in-bag">
<?php
include "layout/header.php";
?>
    <section class="slide-sec contanier">
        <!-- <div id="side-bar" class="side-bar">
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
 -->

        <div class="slide">
            <div class="slide-swp swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide swiper-slide1">
                        <img src="img/slide1.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide2">
                        <img src="img/slide2.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide3">
                        <img src="img/slide3.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide3">
                        <img src="img/slide4.jpg" alt="">
                    </div>
                    <div class="swiper-slide swiper-slide3">
                        <img src="img/slide5.png" alt="">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <div class="features contanier">
        <div class="boxs">
            <div class="box">

                <div class="content">
                    <h6>الشحن مجانا</h6>
                    <p>التوصيل من يوم الي ثلاث ايام</p>
                </div>
                <img src="img/features1.png" alt="">
            </div>

            <div class="box">

                <div class="content">
                    <h6>ضمان المال</h6>
                    <p>ضمان استرداد الأموال لمدة 14 يومًا</p>
                </div>
                <img src="img/features2.png" alt="">
            </div>

            <div class="box">


                <div class="content">
                    <h6>دعم عبر الإنترنت 24/7</h6>
                    <p>الدعم الفني على أهبة الاستعداد</p>
                </div>
                <img src="img/features3.png" alt="">
            </div>

            <div class="box">

                <div class="content">
                    <h6>دفع امن</h6>
                    <p>يتم قبول جميع طرق الدفع</p>
                </div>
                <img src="img/features4.png" alt="">
            </div>

            <div class="box">

                <div class="content">
                    <h6>عروض يوميا</h6>
                    <p>خصومات تصل الي 50%</p>
                </div>
                <img src="img/features5.png" alt="">
            </div>
        </div>
    </div>

    <div class="banner contanier">
        <div class="boxs">
            <div class="box">
                <a href="buy product.html"><img src="img/banner-1.jpg" alt="">
                    <span class="glass-hover"></span></a>

            </div>
            <div class="box">
                <a href="buy product.html"><img src="img/banner-2.jpg" alt="">
                    <span class="glass-hover"></span>
                </a>
            </div>
            <div class="box">
                <a href="buy product.html"><img src="img/banner-3.jpg" alt="">
                    <span class="glass-hover"></span>
                </a>
            </div>
        </div>
    </div>

    <section class="deals contanier swiper mySwiper">

        <div class="section-head">
            <h4>عروض <span>المميزة</span> </h4>
        </div>
        <div class="boxs swiper-wrapper">
            <?php foreach (getProduct() as $product): ?>
                <div class="box product-item swiper-slide">
                    <a href="#">
                        <div class="product-btn">
                            <ul class="product-action">
                                <li><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa-solid fa-cart-arrow-down"></i></a></li>
                                <li><a href="#"><i class="fa-solid fa-print"></i></a></li>
                            </ul>
                        </div>
                        <div class="div-img">
                            <span class="discount">34%</span>
                            <img src="img/product-14.jpg" class="img-product">
                            <img src="img/product-2.jpg" class="hover-img">
                        </div>
                        <div class="content">
                            <a href="buy product.html" class="product-item-link"><?php echo $product['name']; ?></a>
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
                            <p class="product-parg"><?php echo $product['description']; ?></p>
                            <button onclick="addToCart(<?php echo $product['id']; ?>)" class="btn btn-primary">add to cart</button>

                            <ul class="countdown">
                            </ul>

                        </div>
                    </a>
                </div>

            <?php endforeach; ?>

        </div>

        <div class="swiper-button-next swiper-btn"></div>
        <div class="swiper-button-prev swiper-btn"></div>
    </section>

    <section class="sale-sec contanier swiper mySwiper">

        <div class="section-head">
            <h4>خصومات <span>علي المنتجات</span> </h4>
        </div>

        <div class="boxs swiper-wrapper">
<?php foreach (getProduct() as $product): ?>
<?php include 'product_slider.php'; ?>
<?php endforeach; ?>


        </div>


        <div class="swiper-button-next swiper-btn"></div>
        <div class="swiper-button-prev swiper-btn"></div>

    </section>

    <div class="banner2 contanier">
        <div class="boxs">
            <div class="box">
                <a href="#"><img src="img/banner-4.jpg" alt="">
                    <span class="glass-hover"></span></a>
            </div>
            <div class="box">
                <a href="#"><img src="img/banner-5.jpg" alt="">
                    <span class="glass-hover"></span></a>
            </div>
        </div>
    </div>

    <section class="slide-with-img contanier">

        <div class="section-head">
            <h4>اجهزة الكترونية<span></span> </h4>
        </div>

        <div class="cont">
            <div class="img-with-slide">
                <a href="#"><img src="img/banner-sm-1.jpg" alt=""></a>
            </div>
            <div class="swip-with-img swiper mySwiper">
                <div class="boxs swiper-wrapper">

<?php foreach (getProduct() as $product): ?>
<?php include 'product_slider.php'; ?>
<?php endforeach; ?>




                </div>

                <div class="swiper-button-next swiper-btn"></div>
                <div class="swiper-button-prev swiper-btn"></div>
            </div>

        </div>

    </section>

    <section class="slide-with-img contanier">

        <div class="section-head">
            <h4> الموبايلات و اكسسواراتها <span> </span></h4>
        </div>

        <div class="cont">
            <div class="swip-with-img swiper mySwiper">
                <div class="boxs swiper-wrapper">
<?php foreach (getProduct() as $product): ?>
<?php include 'product_slider.php'; ?>
<?php endforeach; ?>


                </div>

                <div class="swiper-button-next swiper-btn"></div>
                <div class="swiper-button-prev swiper-btn"></div>
            </div>

            <div class="img-with-slide">
                <a href="#"><img src="img/banner-sm-2.jpg" alt=""></a>
            </div>

        </div>

    </section>

    <section class="slide-with-img contanier">

        <div class="section-head">
            <h4>الأجهزة الكهربائية <span></span> </h4>
        </div>

        <div class="cont">
            <div class="img-with-slide">
                <a href="#"><img src="img/banner-sm-3.jpg" alt=""></a>
            </div>
            <div class="swip-with-img swiper mySwiper">
                <div class="boxs swiper-wrapper">

<?php foreach (getProduct() as $product): ?>
<?php include 'product_slider.php'; ?>
<?php endforeach; ?>


                </div>

                <div class="swiper-button-next swiper-btn"></div>
                <div class="swiper-button-prev swiper-btn"></div>
            </div>

        </div>

    </section>

    <div class="banner contanier">
        <div class="boxs">
            <div class="box">
                <a href="#"><img src="img/banner-6.jpg" alt="">
                    <span class="glass-hover"></span></a>
            </div>
            <div class="box">
                <a href="#"><img src="img/banner-7.jpg" alt="">
                    <span class="glass-hover"></span></a>
            </div>
            <div class="box">
                <a href="#"><img src="img/banner-8.jpg" alt="">
                    <span class="glass-hover"></span></a>
            </div>
        </div>
    </div>

    <section class="sale-sec contanier swiper mySwiper">

        <div class="section-head">
            <h4> المنتجات التي تمت مشاهدتها<span></span> </h4>
        </div>

        <div class="boxs swiper-wrapper">
<?php foreach (getProduct() as $product): ?>
<?php include 'product_slider.php'; ?>
<?php endforeach; ?>


        </div>


        <div class="swiper-button-next swiper-btn"></div>
        <div class="swiper-button-prev swiper-btn"></div>

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

    <div class="back-top">
        <a href="#">الرجوع للأعلي</a>
    </div>

<?php include 'layout/footer.php'; ?>

    <!-- Swiper JS -->
    <script src="swiperJs/swiper-bundle.min.js"></script>

    <!-- Linke File JS -->
    <script src="main.js"></script>
    
</body>

</html>