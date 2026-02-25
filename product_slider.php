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

   <div class="box column product-item swiper-slide">

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

           