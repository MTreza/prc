<?php
require_once "creatclass.php";
$conn = require_once "db.php";

session_start();
if (isset($_POST['submit']))
{
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $sql = "SELECT * FROM users WHERE username='$username' and password= '$password' and phone= '$phone';";
    $result = $conn->query($sql);
    
if($result->num_rows == 1)
{ $_SESSION['username']= $username; header('location:index3.php');
}
else { $message = "خوش امدید....";
}
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
    <h2>login page</h2>
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