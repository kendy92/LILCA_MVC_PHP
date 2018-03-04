# LILCA_MVC_FRAMEWORK
This is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications. Please Credit to Lilcasoft.info

**HOW TO USE???**

Before start using it, you need to understand the basic structure of the **MVC**.

Model - where all SQL connection and query will be coded here.

Views - where all your HTML and CSS styling will be coded here.

Controllers - where you create functions and get data from Model and pass to the view.

So now you know the basic knowledge about MVC. Let's get started!

Unzip the **LILCA_MVC_FRAMEWORK** folder and you will see there are 3 criticals folders named models, views and controllers. 

In controllers folder, we have HomeController which is default one so whenever you open the app, it will direct you to the HomeController.

In models folder, we have DB.php where stores your own database configuration and some built in functions including connectDB, closeDB and protectVal. to use these function, just simple type:

- DB::connectDB (Open connection to DB)
- DB::closeDB (Close connection to DB)
- DB::protectVal($_POST['name_from_form']) (Anti SQL Injection through $_POST value to DB)

In views folder, we have **Shared folder** where contains partial views and it has static layout like header, footer and navigation running through the entire page.

Now, just have a look at file **route.php**. This file is crucial component to connect your MVC together. 

To create a new page, please start the block syntax like so:

Routes::addPage("name_of_the_page", function() {
	Inside here, you just attach all the views to be display in this page by typing the following code
    
    YourController::addView("view_name_without_php_extension");
    
    If you want to attach partial views in the page, just simply typing:
    
    YourController::addView("Shared/_header");
    
    If you want to pass data to the views just typing the following code 
    
    $data_to_pass_in = "Put something here";
    YourController::addView("view_name_without_php_extension",$data_to_pass_in);
    
    And then to obtain data passed by Controller, just get it from $_GET["data_view"]; 
};


After you done, open browser and typing: **yourdomain/page_name** then it will direct you to the page that you just created.

To create a new controller, add a new file to controllers folder and naming it with Controller as the suffix. Don't forget to inherit from CoreController. The following example show you how to create basic controller:

class YourController extends CoreController {

  public static function index($val) { //function return a string
      return $val;
  }

}




So now you know how to turn your project into MVC. To sum up, There are 4 main steps of creating MVC structure for your app.

1. Create model in Models folder
2. Create controller in Controllers folder
3. Create view for controller in Views folder
4. Create your page in route.php file to connect your MVC structure


**DONE!!!**







