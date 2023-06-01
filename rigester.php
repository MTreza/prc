<?php
session_start();
require_once "db.php";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $phone = mb_strlen($_POST['phone'], "UTF-8") === 11 ? $_POST['phone'] : "";
    if ($phone === "") {
        echo "شماره همراه نامعتبر است.";
        exit;
    }
    $password = md5($_POST['password'], PASSWORD_DEFAULT);
    $user = new USER();
    $user->setdb($conn);
    $user->setusername($username);
    $user->setphone($phone);
    $user->setpassword($password);
    try {
        $result = $user->insertdata();
        echo "ثبت نام با موفقیت انجام شد.";
    } catch (PDOException $e) {
        echo "خطا در ثبت نام: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ثبت نام</title>
</head>
<body>
    <h2>صفحه ثبت نام</h2>
    <form method="POST" action="">
        <label for="username">نام کاربری</label>
        <input type="text" name="username" required><br>
        <label for="phone">شماره همراه</label>
        <input type="number" name="phone"><br>
        <label for="password">رمز عبور</label>
        <input type="password" name="password" id="password" required><br>
        <input style="background-color:#F63" type="submit" class="btn btn-succsess" value="ثبت" name="submit">
    </form>
</body>
</html>
