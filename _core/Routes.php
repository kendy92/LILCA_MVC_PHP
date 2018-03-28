<?php
/*
  CORE ROUTES. DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
*/
class Routes extends RewriteEngine {
  private static $base_url;


  public static function setBaseUrl($url){
    self::$base_url = $url;
  }
  public static function getBaseUrl() {
    return self::$base_url;
  }
  function __construct($input_url) {
    self::setBaseUrl($input_url);
  }
  public static function addPage($route, $func) {
    try {
      $re = new RewriteEngine(); //intialize rewrite engine
      if(isset($_SERVER['PATH_INFO'])){
        $page = $re->url_segment(1);
        $routeArr = array();
        if(!empty($page)){
          if($page == $route) {
            $routeArr[] = $route;
            $func->__invoke();
          }
        }else{
          header("Location: home"); //default route action will be home
        }
      }else{
          header("Location: home");
      }
    } catch(Exception $e) {
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
  }

}

 ?>
