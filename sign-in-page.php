<?php
require_once __DIR__ . './config/init.php';


if (isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "يرجى ملء جميع الحقول";
    } else {

        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['role'] = $user['role'];

            header("Location: index.php");
            exit();

        } else {
            $_SESSION['error'] = "البريد الإلكتروني أو كلمة المرور غير صحيحة";
        }
    }
}
?>
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
    <link rel="stylesheet" href="stylelogin.css">
</head>

<body class="menu-side-in-bag">

    <?php include 'layout/header.php'; ?>
    <div class="contanier">


        <div class="box-sign-up">
            <div class="signup">

                <form  method="post">

                    <label for="email">الايميل</label>
                    <div class="inp">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="ادخل الايميل">
                    </div>

                    <label for="password">كلمة السر</label>
                    <div class="inp">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="ادخل الرقم السري">
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="error-message">
                            <?php echo $_SESSION['error'];
                            unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>
                    <div class="check-box">
                        <div class="check">
                            <input type="checkbox">
                            <span>حفظ الحساب</span>
                        </div>
                        <a href="#" class="forg">هل نسيت كلمة السر؟</a>
                    </div>

                    <button type="submit" name="submit">تسجيل الدخول</button>
                </form>

                <span class="line-sign">or</span>

                <div class="sign-soc">
                    <div class="box">
                        <a class="btn" href="#"><img src="img/google.png" alt=""> تسجيل الدخول بحساب جوجل</a>
                    </div>
                </div>
                <p class="creat-ac">ليس لدي حساب <a href="./sign-up-page.php">انشاء حساب
                    </a></p>
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