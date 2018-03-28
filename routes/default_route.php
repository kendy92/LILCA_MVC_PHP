<?php

/*
THIS IS THE PLACE TO MAKE YOUR MVC CONNECT TOGETHER
PAGE CAN BE ACCESS VIA: domainname.com/project_folder/page_name
*/

Routes::addPage("home", function() { //DEFAULT HOME PAGE. DONT REMOVE. If you change default page name "home" to different name. Please make change in _core folder/Routes.php as well.
    $data_pass_in = "Hello world";
    $get_data_from_controller = HomeController::index($data_pass_in);
    HomeController::addView("Shared/_header"); //File belongs to Shared folders are considered as partial view.
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content", $get_data_from_controller); //Pass data to view content
    HomeController::addView("Shared/_footer"); //File belongs to Shared folders are considered as partial view.
});

/* BEGIN YOUR ROUTING HERE */
 ?>
