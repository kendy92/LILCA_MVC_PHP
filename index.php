<?php
  /*
  DO NOT TOUCH THIS FILE
  CODED BY LILCASOFT.INFO
  REQUIRE PHP VERSION > 5.2 OR 7.0
  */

  /* SET THE BASE PATH OF THE PROJECT */
  $base_url = 'http://localhost/lilca_mvc_dev/';
  /* USE Routes::getBaseUrl() to refer to this path */

  function lilca_mvc($file_name) {
    if(file_exists("_core/".$file_name.".php")) { //LOAD _CORE
      require_once "_core/".$file_name.".php";
    } else if(file_exists("controllers/".$file_name.".php")) { //LOAD CONTROLLERS
      require_once "controllers/".$file_name.".php";
    }
  }

  spl_autoload_register('lilca_mvc');


  function include_all_php($folder){
      foreach (glob("{$folder}/*.php") as $filename)
      {
          require_once $filename;
      }
  }

$re = new Routes($base_url);
//load all routes
include_all_php("routes");

 ?>
