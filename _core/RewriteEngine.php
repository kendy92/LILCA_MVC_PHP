<?php
/*
  REWRITE URL ENGINE
  CODE BY LILCASOFT
*/

class RewriteEngine {
  private static $url;
  public static function url_segment($key) {
    $request_url = str_replace(self::$url, '', $_SERVER['PATH_INFO']);
    $request_url = explode('/', $request_url);
    if(isset($request_url[$key])){
      return $request_url[$key];
    }
    else{
      return false;
    }
  }


}

 ?>
