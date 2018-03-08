# LILCA_MVC_FRAMEWORK
This is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications. Please Credit to Lilcasoft.info

**HOW TO USE???**

Unzip the **LILCA_MVC_FRAMEWORK** folder and you will see there are 3 criticals folders named **models**, **views** and **controllers** and the file named **route.php**

- In controllers folder, we have **HomeController** which is default one so whenever you open the app, it will direct you to the HomeController.

- In models folder, we have **DB.php** where stores your own database configuration and some built in functions including connectDB, closeDB and protectVal... to use these function, just simple type:


```sh
- DB::connectDB(); //make connection to DB
- DB::closeDB(); //close conntection to DB
- DB::protectVal($_POST['name_from_form']); //Anti SQL Injection through $_POST value to DB
```

- In views folder, we have **Shared folder** where contains partial views and it has static layout like header, footer and navigation running through the entire page.

Now, just have a look at file **route.php**. This file is crucial component to connect your MVC together.

**RECONFIGURE .htaccess file**
In order to run the project in MVC way, you have to make change in this file. In RewriteBase just re define your app folder base. In default it will be /lilca_mvc_dev/

```sh
<IfModule mod_rewrite.c>
	  RewriteEngine On
	  RewriteBase /lilca_mvc_dev/
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteCond %{REQUEST_FILENAME} !-l
	  RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
	</IfModule>


<IfModule !mod_rewrite.c>
	  # If we don't have mod_rewrite installed, all 404's
	  # can be sent to index.php, and everything works as normal.
	  ErrorDocument 404 /index.php
</IfModule>
```

**1 - CREATE A NEW CONTROLLER**

Create a new file in controllers folder and name your controller with Controller as suffix.
Open your controller and do the following opening code:

```sh
class YourController extends CoreController {

	public static function index() {

    	return "This is index page";
    }
}
```

**2 - CREATE A NEW VIEW**

Create a new file in the views folder (ie.: test.php) and start your HTML and CSS syntax here.

**3 - CREATE A NEW MODEL**

Create a new file in the models folder and do the following opening code:

```sh
class YourModel extends DB {

	public static function addRow(){

    		//Code your logic here

    }
    public static function updateRow(){

    		//Code your logic here

    }
    public static function deleteRow(){

    		//Code your logic here

    }
    public static function displayRow(){

    		//Code your logic here

    }
}
```

**4 - PASSING DATA FROM CONTROLLER TO VIEW**

In your controller file, add paratemeter to index() function so it can return value to view. Just bear in mind, this will echo out the value without puting it in actual created view.

```sh
class YourController extends CoreController {
	public static function index($val) {
    	return "You enter: ".$val;
    }
}
```

**5 - CREATE A NEW ROUTE**

Open file route.php and do the following code:

```sh
Routes::addPage("your_page_name", function() { //add in your desire page name in first parameter
    echo YourController::index("Hello world");
});
```

**6 - ATTACH PARTIAL VIEWS TO A NEW PAGE**

Route treats all files in stack order which means whatever you put first will be execute first.
Have a look at this example:
```sh
Routes::addPage("home", function() {
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content");
    HomeController::addView("Shared/_footer");
});
```

The page will be run the header file, navigation, content, footer in order respectively. If you don't want to attach navigation to home view, then just remove it from route.

**7 - PASSING DATA FROM ROUTE TO VIEW IN ROUTE**

```sh
Routes::addPage("test_page", function() {
	$fooArr = [1,2,3,4,5];
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content",$fooArr);
    HomeController::addView("Shared/_footer");
});
```

**8 - RETRIEVE RESULT FROM MODEL TO CONTROLLER AND PASS TO VIEW**

```sh
class YourController extends CoreController {

	public static function index($val) {
    	return "You enter: ".$val;
    }

    public static showData() {
    	$data = YourModel::displayRow(); //return result from model and assigned to variable called $data
        HomeController::addView("content",$data); //Passing $data to content view
    }
}
```

Opening the content.php file in views folder and do the following code to get the value.

```sh
$get_data = YourController::$viewBag;
foreach($get_data as $data) {
	echo $data."<br>";
}
```

**YourController::$viewBag** is the public property belongs to Controller that contains data you pass directly from route to the view. Passing data can be anything (array, integer, string...)



So now you know how to turn your project into MVC. To sum up, There are 4 main steps of creating MVC structure for your app.

```sh
1. Create model in Models folder
2. Create controller in Controllers folder
3. Create view for controller in Views folder
4. Create your page in route.php file to connect your MVC structure
```

**Cheers!!!**

LILCA DINH
