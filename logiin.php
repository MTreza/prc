 <?php
require_once "creatclass.php";
session_start();
if (isset($_POST['submit']))
{require 'db.php';
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
