<?php

class user{
  public $db;
  private $id;
  private $username;
  private $password;
  private $phone;

  public function setdb($db){
    $this->db = $db;
  }
  public function setusername($username){
    $this->username = $username;
  }

  public function setphone ($phone){
    $this->phone = $phone;
  }
  public function setpassword ($password){
    $this->password = $password;

  }
  public function insertdata (){
    $sql = "INSERT INTO `users` (`username`,`phone`,`password`) VALUES (:username, :phone, :password)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":password", $this->password);

    return $stmt->execute();

  }
}