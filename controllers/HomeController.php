<?php

class HomeController extends CoreController { //THIS IS DEFAULT CONTROLLER

  public static function index($val) { //function return a passed in value
      return $val;
  }

  public static function getTbls() {
    return DB::getDataTypeOfCol("title","portfolio");
  }

  public static function isAdmin() {
    return DB::authentication("dinhconganh@gmail.com",md5("macbookpro123"));
  }

}
 ?>
