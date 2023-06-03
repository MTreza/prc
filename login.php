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
    $hash = $row['password'];

    if ($hash == password_hash($_POST["password"], PASSWORD_BCRYPT)) {
        return 1;
    } else {
        var_dump(0);
    }
    if (password_verify($_POST['password'], $hash)) {
        header("location:profile.php");
    } else {
        echo "رمز عبور اشتباه است";
    }
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
            <div class="form-element">
                <label for="username">نام کاربری</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-element">
                <label for="phone">شماره تلفن</label>
                <input type="number" name="phone">
            </div>
            <div class="form-element">
                <label for="password">رمز عبور</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="rigester.php">ثبت نام</a>
            <hr>
            <div class="form-element">
                <button type="submit" name="submit">ورود</button>
                <input type="hidden" name="submit" value="1">
            </div>
        </form>
    </div>
</body>

</html>