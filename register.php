<?php
session_start();
require_once "db.php";

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $phone = mb_strlen($_POST['phone'], "UTF-8") === 11 ? $_POST['phone'] : "";
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($phone === "") {
        echo "شماره همراه نامعتبر است.";
        exit;
    }
    $user = new USER();
    $user->setdb($conn);
    $user->setusername($username);
    $user->setphone($phone);
    $user->setpassword($password);
    try {
        $result = $user->insertdata();
        echo "ثبت نام با موفقیت انجام شد.";
        header("login.php");
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
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <h2>صفحه ثبت نام</h2>
    <form method="POST" action="">
        <div class="form-element">
            <label for="username">نام کاربری</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required><br>
        </div>
        <div class="form-element">
            <label for="phone">شماره همراه</label>
            <input type="number" name="phone"><br>
        </div>
        <div class="form-element">
            <label for="password">رمز عبور</label>
            <input type="password" name="password" id="password" required><br>
        </div>
        <input style="background-color:#F63" value="register" type="submit" class="btn btn-succsess" value="ثبت" name="submit">
        <a href="login.php">حساب دارید؟</a>
    </form>
</body>

</html>