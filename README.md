# LILCA_MVC_FRAMEWORK 3.0

This is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications. Please Credit to Lilcasoft.info

QUICK CRASH COURSE TO GET USE THE FRAMEWORK: https://youtu.be/X6LnqHxG-3Y

**HOW TO USE???**

Unzip the **LILCA_MVC_FRAMEWORK** folder and you will see there are 4 criticals folders named **models**, **views** and **controllers** and **routes**

- In controllers folder, we have **HomeController** which is default one so whenever you open the app, it will direct you to the HomeController.

- In models folder, we have 2 class files called **MYSQLI_DB.php** and **PDO_DB.php** which are built in model classes for PDO and MYSQLI. Depend on the purpose of your project, you will extends to one of them to use its own properties and methods. (By default, it will use PDO_DB in Controllers/CoreController.php, please make change in this file if you use **MYSQLI_DB** class)


- In views folder, we have **Shared folder** where contains partial views and it has static layout like header, footer and navigation running through the entire page. The _header.php file also included jquery and boostrap library for you.

Now, just have a look at file in **routes/default_route.php**. This file is crucial component to map your MVC together.

**RECONFIGURE base url in index file**

Go to index.php file and define the base url of your project. It is crucial to proper reference for any link and images later on. The syntax to get base_url is: Routes::getBaseUrl();


**RECONFIGURE .htaccess file**

In order to run the project in MVC way, you have to make change in this file. In RewriteBase just re define your app folder base. In default it will be /lilca_mvc_dev/

```sh
<IfModule mod_rewrite.c>
	  RewriteEngine On
	  RewriteBase /lilca_mvc_dev/
      
      RewriteCond %{REQUEST_FILENAME} !-d
      RewriteCond %{REQUEST_FILENAME} !-f
      RewriteCond %{REQUEST_FILENAME} !-l

	  RewriteRule ^(.*)$ index.php/$1 [QSA,L]
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
class YourController extends CoreController { //Extend CoreController to use built in function

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
				return "This is display row function";

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

**5 - CREATE A NEW PAGE**

Go to routes folder and open file default_route.php or create a new one and add the following code:

```sh
Routes::addPage("your_page_name", function() { //put in your desire page name in first parameter
    echo YourController::index("Hello world");
});
```

**6 - ATTACH PARTIAL VIEWS TO A NEW PAGE**

Route treats all files in stack order which means whatever you put first will be execute first.
Have a look at this example:
```sh
Routes::addPage("your_page_name", function() {
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content");
    HomeController::addView("Shared/_footer");
});
```

The page will be run the header file, navigation, content, footer in order respectively. If you don't want to attach navigation to home view, then just remove it from route.

**7 - PASSING DATA FROM ROUTE TO VIEW IN Route.php**

```sh
Routes::addPage("test_page", function() {

	$fooArr = [1,2,3,4,5];
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content",$fooArr);
    HomeController::addView("Shared/_footer");
});
```

**8 - GET RESULT FROM MODEL TO CONTROLLER AND PASS TO VIEW**

Adding function called showData() to YourController file and load model file that you want to use by using self::loadModel("YourModel")

```sh
class YourController extends CoreController {

	public static function index($val) {
    	return "You enter: ".$val;
    }

    public static showData() {
			self::loadModel("YourModel"); //you need to load your model class name before you can use function in that particular model.
    	$data = YourModel::displayRow(); // assign result from model  to variable called $data
			return $data;
    }
}
```

Open route.php file in routes folder and do like so:

```sh
Routes::addPage("test", function() {

    $result = YourController::showData();
    
    HomeController::addView("Shared/_header");
    HomeController::addView("Shared/_navigation");
    HomeController::addView("content", $result); //pass data to view content.php
    HomeController::addView("Shared/_footer");
});
```

Open the content.php file in views folder and do the following code to get the value.

```sh
$get_data = YourController::$viewBag;
echo $get_data; //output the result to screen
```

**YourController::$viewBag** is the public property belongs to YourController that contains data you pass directly from route to the view. Passing data can be anything (array, integer, string...)




**9 - GET DATA FROM FORMATED URL**

To get data from an url like: **product/category/item** you will use **Routes::url_segment(index_of_segment_in_url)** to get that value in the formatted url.

Basically, the url will exclude the project folder name and only count from the page name to the end. For instance, product will be the page name and index segment is 1, category will have index segment of 2 and item will have index segment of 3 and so on. Otherwise, you can use query string instead of using formated url.



**10 - HOW TO USE VALIDATION LIBRARY TO VALIDATE FORM FIELD**

Include the validation library to your file by using:

```sh
require_once "validation.php";
```

To test format of the input using this function:

```sh
Validation::testFormat($test_value, $name_of_format);
```

This function will return true if match, otherwise false

List of test format:
date, email, postcode, name, phone, currency, url,username ,password

So now you know how to turn your project into MVC. To sum up, There are 4 main steps of creating MVC structure for your app.

```sh
1. Create a model in Models folder
2. Create a controller in Controllers folder
3. Create a view for controller in Views folder
4. Create a route to connect your MVC in Routes folder
```

**Cheers!!!**

LILCA DINH
