<?php
//error_reporting(0);
include('include/config.php');
function runSQL($rsql) {
	$hostname = "localhost";
	$username = "root";
	$password = "sipl@1234";
	$dbname   = "travel";
	$connect = mysql_connect($hostname,$username,$password) or die ("Error: could not connect to database");
	$db = mysql_select_db($dbname);
	$result = mysql_query($rsql) or die ('error in fetching records'); 
	return $result;
	mysql_close($connect);
}
$items = rtrim($_POST['items'],",");
$sql = "DELETE FROM `tbl_gallery` WHERE `gallery_id` IN ($items)";

$total = count(explode(",",$items)); 
//$result = runSQL($sql);
$result = mysql_query($sql);
$total = mysql_affected_rows(); 
/// Line 18/19 commented for demo purposes. The MySQL query is not executed in this case. When line 18 and 19 are uncommented, the MySQL query will be executed. 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
header("Pragma: no-cache" );
//header("Content-type: text/x-json");
$json = "";
$json .= "{\n";
$json .= "query: '".$sql."',\n";
$json .= "total: $total,\n";
$json .= "}\n";
echo $json;
 ?>