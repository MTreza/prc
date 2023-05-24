<?php
require_once "class.php";
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $phone = mb_strlen($_POST['phone'], "UTF-8") === 11 ? $_POST['phone'] : "";

    $password = $_POST['password'];

    $conn = new PDO("mysql:host=localhost;dbname=login", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user = new user();
    $user->setdb($conn);
    $user->setusername($username);
    $user->setphone($phone);
    $user->setpassword($password);

    $result = $user->insertdata();
    echo $result;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>rigester page</h2>
    <form method="POST" action="">
        <label for="username">نام کاربری</label>
        <input type="text" name="username" required><br>
        <label for="phone">شماره همراه</label>
        <input type="number" name="phone"><br>
        <label for="password"> رمز عبور</label>
        <input type="password" name="password" id="password" required><br>
        <input style="background-color:#F63" type="submit" class="btn btn-succsess" value="ثبت" name="submit">
    </form>


</body>

</html>