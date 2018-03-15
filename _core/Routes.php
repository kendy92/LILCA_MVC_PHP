<?php
/*
  CORE ROUTES. DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
*/
class Routes {

  public static function addPage($route, $func) {
    try {
      $routeArr = array();
      if(isset($_GET['url'])){
        if($_GET['url'] == $route) {
          $routeArr[] = $route;
          $func->__invoke();
        }
      }else{
        header("Location: home"); //default route action will be home
      }
    } catch(Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }

}

 ?>
