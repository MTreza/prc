<?php
require_once "db.php";

session_start();
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $phone = $_POST["phone"];

 
  $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? OR phone = ?");
  $stmt->bind_param("ss", $username, $phone);

  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (password_verify($password, $hash)) {
      echo 'به درستی وارد شد';
    } else {
      echo '<h1>.رمز عبور معتبر نیست<h1>';
    }
    exit;

  } else {
    echo "<p>نام کاربری وجود ندارد.</p>";
    echo "<p><a href='index.php'>بازگشت به صفحه ورود</a></p>";
  }
}
$stmt->close();
$conn->close();
?><?php
require_once "db.php";

session_start();
if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $phone = $_POST["phone"];

 
  $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? OR phone = ?");
  $stmt->bind_param("ss", $username, $phone);

  $stmt->execute();
  $result = $stmt->get_result();
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    if (password_verify($password, $hash)) {
      echo 'به درستی وارد شد';
    } else {
      echo '<h1>.رمز عبور معتبر نیست<h1>';
    }
    exit;

  } else {
    echo "<p>نام کاربری وجود ندارد.</p>";
    echo "<p><a href='index.php'>بازگشت به صفحه ورود</a></p>";
  }
}
$stmt->close();
$conn->close();
?>