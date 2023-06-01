
  <?php

  class USER
  {
  public $db;
  private $id;
  private $username;
  private $password;
  private $phone;

  public function setdb($db)
  {
    $this->db = $db;
  }
  public function setusername($username)
  {
    $this->username = $username;
  }

  public function setphone($phone)
  {
    $this->phone = $phone;
  }
  public function setpassword($password)
  {
    $this->password = $password;

  }
  public function getdata()
  {
   try {
    // get user data by username
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":username", $this->username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
    throw $e;
   }
  }
 
  public function insertdata()
  {
    try {
    
    $sql = "SELECT * FROM users WHERE username = :username";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam("username", $this->username);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
      throw new PDOException("نام کاربری تکراری است.");
    }
    
    $sql = "INSERT INTO `users` (`username`,`phone`,`password`) VALUES (:username, :phone, :password)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":phone", $this->phone);
    $stmt->bindParam(":password", $this->password);

    $stmt->execute();
    return $stmt->rowCount();
    } catch (PDOException $e) {
    throw $e;
    }
  }

  }
