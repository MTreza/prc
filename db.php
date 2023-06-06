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
