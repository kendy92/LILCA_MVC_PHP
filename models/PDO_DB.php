<?php
class PDO_DB {
  private static $host = "mysql:host=localhost; dbname=your_db_name";
  private static $user = "root";
  private static $pass = "";

  public function __construct() {
    /* nothing to initilize */
  }

  public static function connectDB() { //USE: self::connectDB() to initialize connection
    try {
      $conn = new PDO(self::$host, self::$user, self::$pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      return $e->getMessage();
    }
    return $conn;
  }


  /* THE FOLLOWING IS BUILT IN PDO CRUD FUNCTION. COPY THE FUNCTION AND PASTE TO YOUR OWN MODEL TO USE */


  /* DISPLAY ROW FUNCTION in PDO
  public static function show() {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM table_name ORDER BY id DESC");
      $cmd->setFetchMode(PDO::FETCH_OBJ);
      $cmd->execute();
      return $cmd->fetchAll();
    } catch (PDOException $e) {
      return $e->getMessage();
    }
  }
  */

  /* FIND ROW BY ID FUNCTION in PDO
  public static function findById($id) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("SELECT * FROM table_name WHERE id = :id");
      $cmd->setFetchMode(PDO::FETCH_ASSOC);
      $cmd->bindParam(':id', $id);
      $cmd->execute();
      return $cmd->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }
  */

    /* CREATE ROW FUNCTION in PDO
  public static function create($val){
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("INSERT INTO table_name(column_name) VALUES(:val)");
      $cmd->bindParam(':val', $val);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  */

  /* UPDATE ROW FUNCTION in PDO

  public static function update($val) {
    try {
      $conn = self::connectDB();
      $conn->query("SET NAMES utf8");
      $cmd = $conn->prepare("UPDATE table_Name SET column_name = :val WHERE id= :id");
      $cmd->bindParam(':val', $val);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }

  */

  /* DELETE ROW FUNCTION in PDO

  public static function delete($id) {
    try {
      $conn = self::connectDB();
      $cmd = $conn->prepare("DELETE FROM table_name WHERE id = :id");
      $cmd->bindParam(':id', $id);
      $count = $cmd->execute();
      return $count;
    } catch (PDOException $e) {
      return $e->getMessage();
    }

  }
  */
}
 ?>
