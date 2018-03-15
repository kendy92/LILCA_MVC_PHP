<?php
/*
  CORE CONTROLLER. DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
*/
require_once "./models/DB.php";

class CoreController extends DB {

  public static $viewBag;

  public static function addView($viewname,$data = "") {

    if($data != "") {
      self::$viewBag = $data; //Data passing from controller to view will be accessing via YourController::$viewBag
    }
    if(file_exists("views/".$viewname.".php")){
      require_once "views/".$viewname.".php";
    }else{
      echo "<div class='alert alert-danger' role='alert'>View <strong>'".$viewname."'</strong> does not exist!</div>";
    }
  }

  protected static function loadModel($model_name) {
    if(file_exists("models/".$model_name.".php")) {
      require_once "models/".$model_name.".php";
    }else {
      echo "<div class='alert alert-danger' role='alert'>Model <strong>'".$model_name."'</strong> does not exist!</div>";
    }
  }
}
?>
