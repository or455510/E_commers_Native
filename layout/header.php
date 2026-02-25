<?php
require_once 'config/init.php';
?>
<header>

    <div class="header-top">
        <div class="contanier">
            <p> مرحبا <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'زائر'; ?></p>
            <div class="link-top-heder">

                
                <?php if (isset($_SESSION['name'])): ?>
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
                    <a href="../../task2/Dashbord/index.php"> dashboard</a>
                  <?php endif; ?>
                        <a href="logout.php" class=""> تسجيل خروج </a>
                    <?php else: ?>
                        <a href="sign-up-page.php" class="">  register </a>
                        <a href="sign-in-page.php" class="">  login </a>
        
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="header-info">
        <div class="contanier">
            <img src="img/logo.png" alt="">

            <div class="search-bar">
                <form action="">
                    <input type="search" placeholder="ابحث عن طلبك...">
                    <button class="btn-srch">بحث</button>
                </form>
            </div>
            <div class="card">
                <div class="price">
                    <p>السلة :</p>
                    <span><?php echo isset($_SESSION['cart_total']) ? $_SESSION['cart_total'] : 0; ?> جنيه</span>
                </div>
                <a href="mycart.php"><i class="fa-solid fa-bag-shopping"></i> <span class="count-in-card"><?php echo isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0; ?></span></a>


            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="contanier">
            <i id="open-side" class="fa-solid fa-bars"></i>
            <ul class="nav-links">

                <li><a href="index.html"> الرئيسة</a>

                </li>

                <li>
                    <a href="../../task2/features.php"> all products</a>

                    <!-- <div class="drobdwon">
                            <ul>
                                <li><a href="betuflpage.html">غسالات</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">نلاجات</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">مكانس</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">شبابيك</a></li>
                            </ul>
                        </div> -->
                </li>
                <?php foreach (getCategories() as $category) : ?>
                    <li>
                        <a href="product_cat.php?category=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                    </li>
                <?php endforeach; ?>




            </ul>


        </div>
    </div>


</header>