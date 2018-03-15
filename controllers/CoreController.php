<?php
/*
  CORE CONTROLLER. DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
*/

require_once "./models/PDO_DB.php"; /* ENABLE THIS LINE IF YOU WANT TO USE PDO */
//require_once "./models/MYSQLI_DB.php"; /* ENABLE THIS LINE IF YOU WANT TO USE MYSQLI */

class CoreController extends PDO_DB { //extends PDO_DB to use PDO OR MYSQLI_DB for MYSQLI

  public static $viewBag; //DYNAMIC PROPERTY TO HOLD VALUE PASS FROM CONTROLLER TO VIEW. SYNTAX: YourController::$viewBag

  public static function addView($viewname,$data = "") { //INCLUDE VIEW TO YOUR PAGE.

    if($data != "") {
      self::$viewBag = $data; //Data passing from controller to view will be accessing via YourController::$viewBag
    }
    if(file_exists("views/".$viewname.".php")){
      require_once "views/".$viewname.".php";
    }else{
      echo "<div class='alert alert-danger' role='alert'>View <strong>'".$viewname."'</strong> does not exist!</div>";
    }
  }

  protected static function loadModel($model_name) { //use this function to load specific model in your controler. Syntax: YourController::loadModel("Model_name")
    if(file_exists("models/".$model_name.".php")) {
      require_once "models/".$model_name.".php";
    }else {
      echo "<div class='alert alert-danger' role='alert'>Model <strong>'".$model_name."'</strong> does not exist!</div>";
    }
  }
}
?>
