<?php
   /*
   VALIDATION LIBRARY
   lilcasoft.info @2018
   */

class Validation {
  private static $regx_arr = array('date' => '/^\w{4}-\w{2}-\w{2}$/',
                                   'email' => '/^[\w\.]+@\w+\.\w{3}$/',
                                   'postcode' => '/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/',
                                   'name' => '/^[a-zA-Z ]+$/',
                                   'phone' => '/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/',
                                   'currency' => '/^[1-9]\d{0,7}(?:\.\d{1,4})?|\.\d{1,4}$/',
                                   'url' => '/^(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9]\.[^\s]{2,})$/',
                                   'username' => '/^(?=[a-z]{2})(?=.{4,26})(?=[^.]*\.?[^.]*$)(?=[^_]*_?[^_]*$)[\w.]+$/iD',
                                   'password' => '/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/');

  /* Password requirement
  At least one upper case English letter
  At least one lower case English letter
  At least one digit
  At least one special character
  Minimum eight in length
  */

  /* Username requirement
  The ^(?=[a-z]{2}) ensure the string "Start with atleast 2 letters".
  The (?=.{4,26}) ensure it "Must be between 4-26 characters long".
  The (?=[^.]*\.?[^.]*$) ensures the following characters contains at most one . until the end.
  Similarly (?=[^_]*_?[^_]*$) ensures at most one _.
  The [\w.]+$ commits the match. It also ensures only alphanumerics, _ and . will be involved.
  */

  private static $obj;

  public static function getObj(){
    return self::$obj;
  }

  public static function setObj($val) {
    if(!empty($val)){
      self::$obj = $val;
    }
  }

  public static function testFormat($test_value, $name_of_format) { //$name_of_format refers to $regx_arr index above
    self::setObj($test_value);
    return preg_match(self::$regx_arr[$name_of_format], self::getObj()) ? true : false;
  }

  public function isDropDownContainVal($val){ //validate drop down list
          self::setObj($val);
          if(self::getObj() == null || strlen(self::getObj()) <= 0) {
            return false;
          }else { return true; }
  }
}
 ?>
