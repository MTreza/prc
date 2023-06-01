<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "login";


// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }
// return $conn;
?>
<?php
require_once "class.php";
$conn = db();
function db()
{
 try {
  $conn = new PDO("mysql:host=localhost;dbname=login", "root", "");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
 } catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
 }
}
?>
