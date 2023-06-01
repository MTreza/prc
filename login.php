<?php

// // نام کاربری را از ورودی کاربر دریافت می‌کنیم
// $username = $_POST['username'];

// // پرس و جوی SQL برای بازیابی رمز عبور هش شده
// $sql = 'SELECT password FROM users WHERE username = :username';
// $stmt = $dbh->prepare($sql);
// $stmt->bindParam(':username', $username);
// $stmt->execute();

// // بازیابی رمز عبور هش شده
// $row = $stmt->fetch(PDO::FETCH_ASSOC);
// $hashed_password = $row['password'];

// // نمایش رمز عبور هش شده
// echo "Hashed password: " . $hashed_password;
// ?>


<?php



session_start();
require_once "db.php";
$conn = db();
if (isset($_POST["submit"])) {
$username = $_POST['username'];
$password = $_POST["password"];
$sql = 'SELECT password FROM users WHERE username = :username';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

$row = $stmt->fetch(PDO::FETCH_ASSOC);
$hashed_password = $row['password'];
// هش ذخیره شده در دیتابیس
$hash = $row['password'];
// بررسی مطابقت رمز عبور و هش {
if (password_verify($password, $hash)) {
header("location:profile.php");
// اجازه ورود به صفحه لاگین
} else {
echo "رمز عبور اشتباه است";
// نمایش پیام خطا
}
echo "Hashed password: " . $hashed_password;
    
 echo  ($password);
// var_dump($password);
// die;
// error_log($password, $hash
// );
// die ;
}

?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>صفحه ورود</h1>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="username">نام کاربری</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">رمز عبور</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="register.php">ثبت نام</a>
            <hr>
            <div class="form-group">
                <button type="submit" name="submit">ورود</button>
                <input type="hidden" name="submit" value="1">
            </div>
        </form>
    </div>
</body>

</html>