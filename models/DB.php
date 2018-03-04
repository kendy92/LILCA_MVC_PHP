<?php
/*
  CORE MODEL DB. DO NOT TOUCH THIS FILE
*/
class DB {
  private static $host = "localhost";
  private static $user = "root";
  private static $pass = "";
  private static $db = "";
  public static $conn;

  public static function connectDB() {
    self::$conn = mysqli_connect(self::$host, self::$user, self::$pass, self::$db) or die("Connection cannot established. Please check your configuration file!");
  }

  public static function closeDB() {
    mysqli_close(self::$conn);
  }

  public static function protectVal($val) { //function anti SQL Injection to $_POST value
    self::connectDB();
    $_val = mysqli_real_escape_string(self::$conn, trim($val));
    self::closeDB();
    return $_val;
  }

}
 ?>
