<?php
require_once "class.php";
require_once "db.php";

session_start();
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];

    $stmt = $conn->prepare("SELECT password FROM users WHERE username || phone = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hash = $row["password"];
        if (password_verify($password, $hash)) {
            $_SESSION["username"] = $username;
            echo " sucsessfuly ";
            exit;
        } else {
        
            echo "<p>نام کاربری یا رمز عبور اشتباه است.</p>";
            echo "<p><a href='index.php'>بازگشت به صفحه ورود</a></p>";
        }
    } else {
        echo "<p>نام کاربری وجود ندارد.</p>";
        echo "<p><a href='index.php'>بازگشت به صفحه ورود</a></p>";
    }
    $stmt->close();
    $conn->close();
}
?>
