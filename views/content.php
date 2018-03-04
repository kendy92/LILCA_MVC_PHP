<?php

if(isset($_GET['data_view'])){ //check if any data passes to view by controller
  $result =  "Data received from Home controller: ".$_GET['data_view'];
}

 ?>

<div class="container">
  <h1>WELCOME TO LILCA MVC PHP FRAMEWORK</h1>
  <p>
   This is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.
  </p>
  <p>
    This framework is open-source and free of use to everyone. Please credit to <a href="http://lilcasoft.info">Lilcasoft.info</a>
  </p>
  <p>
    You can always come back and get the latest update via : <a href="https://github.com/kendy92/lilca_mvc_php_framwork">GitHub</a>
  </p>

  <div class="jumbotron">
      <?php echo $result; ?>
  </div>

</div>
