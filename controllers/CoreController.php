<?php
/*
  CORE CONTROLLER. DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
*/
class CoreController extends DB {
  public static function addView($viewname,$data = "") {

    if($data != "") {
      $_GET['data_view'] = $data; //Data passing from controller to view will be accessing via $_GET['data_view']
    }
    if(file_exists("views/".$viewname.".php")){
      require_once "views/".$viewname.".php";
    }else{
      echo "<div style='background-color:black; font-weight:bold; padding:1em; color:red;'>View ".$viewname." does not exist!</div>";
    }
  }
}
?>
