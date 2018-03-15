<?php
  /*
  DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
  */

  require_once "route.php";

  function __autoload($file_name) {
    if(file_exists("_core/".$file_name.".php")) { //LOAD _CORE
      require_once "_core/".$file_name.".php";
    } else if(file_exists("controllers/".$file_name.".php")) { //LOAD CONTROLLERS
      require_once "controllers/".$file_name.".php";
    }
  }

 ?>
