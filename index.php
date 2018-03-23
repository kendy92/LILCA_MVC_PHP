<?php
  /*
  DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
  REQUIRE PHP VERSION > 5.2
  */

  function lilca_mvc($file_name) {
    if(file_exists("_core/".$file_name.".php")) { //LOAD _CORE
      require_once "_core/".$file_name.".php";
    } else if(file_exists("controllers/".$file_name.".php")) { //LOAD CONTROLLERS
      require_once "controllers/".$file_name.".php";
    }
  }

  spl_autoload_register('lilca_mvc');
  require_once "route.php";

 ?>
