    <footer>
        <div class="contanier">
            <div class="top-footer">
                <div class="row">
                    <img src="img/logo.png" alt="">
                    <div class="hotline">

                        <div class="hotline-text">
                            <h6>خدمة عملاء 24/7</h6>
                            <span>(+100) 123 456 7890</span>
                        </div>
                        <i class="fa-solid fa-headset"></i>
                    </div>

                </div>
                <div class="small-row">
                    <h6> اعرف المزيد عنا</h6>
                    <div class="links-row">
                        <a href="#"> <i class="fa-solid fa-angle-left"></i>معلومات عن اكسبريمو </a>
                        <a href="#"><i class="fa-solid fa-angle-left"></i>الشحن و التوصيل </a>

                    </div>
                </div>

                <div class="small-row">
                    <h6> تسوق معنا</h6>
                    <div class="links-row">
                        <a href="#"><i class="fa-solid fa-angle-left"></i>حسابك</a>
                        <a href="#"> <i class="fa-solid fa-angle-left"></i>مشترياتك</a>
                        <a href="#"> <i class="fa-solid fa-angle-left"></i>عناوينك</a>
                        <a href="#"> <i class="fa-solid fa-angle-left"></i>قوائمك</a>
                    </div>
                </div>

                <div class="small-row">
                    <h6> دعنا نساعدك</h6>
                    <div class="links-row">
                        <a href="#"><i class="fa-solid fa-angle-left"></i>المساعدة و الدعم</a>
                        <a href="#"><i class="fa-solid fa-angle-left"></i>تتبع الطلب</a>
                        <a href="#"><i class="fa-solid fa-angle-left"></i>سياسة الاسترجاع</a>
                        <a href="#"><i class="fa-solid fa-angle-left"></i>الشروط و الأحكام </a>
                    </div>
                </div>



            </div>

        </div>

        <div class="bottom-footer">
            <div class="contanier">
                <p>Copyright &copy; <span>Topico. </span>Powered by <span>Mahmoud Reda</span></p>
                <div class="payment">
                    <img src="img/payment-1.png" alt="">
                    <img src="img/payment-2.png" alt="">
                    <img src="img/payment-3.png" alt="">
                    <img src="img/payment-4.png" alt="">
                </div>
            </div>
        </div>
    </footer>
    <script>
        function addToCart(productId) {
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('تم إضافة المنتج إلى السلة!');
                    // تحديث عدد المنتجات في السلة
                    document.querySelector('.count-in-card').textContent = data.cart_count;
                    // تحديث إجمالي السعر في السلة
                    document.querySelector('.price span').textContent = data.cart_total + ' جنيه';
                } else {
                    alert('حدث خطأ أثناء إضافة المنتج إلى السلة.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('حدث خطأ أثناء الاتصال بالخادم.');
            });
        }
    </script>