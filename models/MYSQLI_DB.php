<?php
/*
  CORE MODEL DB. DO NOT TOUCH THIS FILE
*/
class MYSQLI_DB {
  private static $host = "localhost";
  private static $user = "root";
  private static $pass = "";
  private static $db = "";
  private static $user_tbl = ""; //Use for authentication function
  public static $conn;

  public static function connectDB() { //open DB connection
    self::$conn = mysqli_connect(self::$host, self::$user, self::$pass, self::$db) or die("Connection cannot established. Please check your configuration file!");
  }

  public static function closeDB() { //close DB connection
    mysqli_close(self::$conn);
  }

  public static function protectVal($val) { //anti SQL Injection to $_POST value
    self::connectDB();
    $_val = mysqli_real_escape_string(self::$conn, trim($val));
    self::closeDB();
    return $_val;
  }

  public static function authentication($username, $password) { //check login function. return true if success otherwise false.
    $status = false;
    self::connectDB();
    $query = "SELECT * FROM ".self::$user_tbl." WHERE email = '".$username."' AND password = '".$password."'";
    $cmd = mysqli_query(self::$conn, $query);
    $status = mysqli_num_rows($cmd) != 0 ? true : false;
    self::closeDB();
    return $status;
  }

  public static function getDataTypeOfCol($column_name, $table_name) { //return data type of column
    self::connectDB();
    $query = "SELECT DATA_TYPE FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '".$table_name."' AND COLUMN_NAME = '".$column_name."'";
    $cmd = mysqli_query(self::$conn, $query);
    if(!$cmd) {
      echo "No column and table found!<br/>".mysqli_error();
      exit;
    }
    $data_type = mysqli_fetch_array($cmd, MYSQLI_BOTH);
    self::closeDB();
    return $data_type;
  }

  public static function getTablesFromDB() { //return list of all table from DB
    self::connectDB();
    $query = "SHOW TABLES FROM ".self::$db;
    $cmd = mysqli_query(self::$conn, $query);
    if(!$cmd) {
      echo "No table found!<br/>".mysqli_error();
      exit;
    }
    $tables = array();
    while($table = mysqli_fetch_array($cmd, MYSQLI_BOTH)) {
      $tables[] = $table[0];
    }
    self::closeDB();
    return $tables;
  }


}
 ?>
