<?php
require_once __DIR__ . '/config/init.php';


if (isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['error'] = " please fill in all fields";
    } else {

        $check = $db->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount() > 0) {
            $_SESSION['error'] = "   account already exists with this email";
        } else {

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $db->prepare("
                INSERT INTO users (name, email, password, role) 
                VALUES (?, ?, ?, 'user')
            ");

            if ($stmt->execute([$name, $email, $hashed_password])) {

                $_SESSION['success'] = " account created successfully, you can now log in";
                header("Location: sign-in-page.php");
                exit();

            } else {
                $_SESSION['error'] = "Failed to create account. Please try again.";
            }
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

                <form action="./sign-up-page.php" method="post">

                    <label for="email">الاسم</label>
                    <div class="inp">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="name" placeholder="ادخل الاسم">
                    </div>

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
                            <?php echo $_SESSION['error']; ?>
                        </div>
                    <?php unset($_SESSION['error']);
                    endif; ?>

                    <div class="check-box">
                        <div class="check">
                            <input type="checkbox">
                            <span>حفظ الحساب</span>
                        </div>

                    </div>

                    <button type="submit" name="submit">انشاء حساب</button>
                </form>

                <span class="line-sign">or</span>

                <div class="sign-soc">


                    <div class="box">
                        <a class="btn" href="#"><img src="img/google.png" alt=""> تسجيل الدخول بحساب جوجل</a>
                    </div>
                </div>

                <p class="creat-ac">هل لديك حساب ؟ <a href="./sign-in-page.php">تسجيل الدخول</a></p>
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