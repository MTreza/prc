
<?php
require_once "class.php";
require_once "db.php";
if (isset($_POST['submit'])) {
 $username = $_POST['username'];
 $phone = mb_strlen($_POST['phone'], "UTF-8") === 11 ? $_POST['phone'] : "";

 $password = $_POST['password'];
 $user = new USER();
 $user->setdb($conn);
 $user->setusername($username);
 $user->setphone($phone);
 $user->setpassword($password);

 $result = $user->insertdata();
 echo $result;
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
 <label for="phone
 ">شماره همراه</label>
 <input type="number" name="phone" required>
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