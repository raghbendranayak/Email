<?php  
/**
 * Travel
 * @package		Dashboard index 
 * @author		SIPL Dev Team (Devendra Jain)
 * @Modify by 	
 */
?>
<?php
$con = mysql_connect("localhost","root","sipl@1234");
if (!$con)
  {
 	 die('Could not connect to database: ' . mysql_error());
  }
mysql_select_db("travel",$con);


define("BASE_URL","http://183.182.84.84/travelsite/");
define("ADMIN_URL","http://183.182.84.84/travelsite/admin/");
define("ADMIN_JS_PATH","http://183.182.84.84/travelsite/admin/js/");
define("ADMIN_CSS_PATH","http://183.182.84.84/travelsite/admin/css/");
?>