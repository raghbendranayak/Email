<?php
require_once('class/class.phpmailer.php');
require_once('class/class.smtp.php');

 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $comment=$_POST['comment'];



		$from = "From: 'ABCG' american board of certified Gemologists\n";
		$headers .= "MIME-Version: 1.0\n";
		$headers .= "Content-Type: multipart/alternative; boundary=\"$mime_boundary\"\n";
		$headers .= "Content-Type: ; boundary=\"$mime_boundary\"\n";
		$subject = "hi";
		
		$message = "";

	     //mail("raghbendra.nayak@systematixindia.com",$subject,$message,$from);
	     mail("raghbendra.nayak@systematixindia.com",$subject,$message,$from);
		//mail("".$showname['email_id'].",cnsales@stntsol.com",$subject,$message,$from);
		//mail("".$getbusi_details['primary_email']."",$subject,$message,$from);
		$headers = '';
		$subject = '';
		$message = '';
		$from = ''; 
	
//    $msg="Mail has been succesfully send";  
//    header("location:abcgforgemologists.html?msg='.$msg;");

//$mail = new PHPMailer();
//	   
//		$mail->From = "From: 'ABCG' american board of certified Gemologists";
//		$mail->FromName = "admin";
//		$mail->Subject = "test mail";
//		$mail->Mailer = "mail";
//		$mail->SMTPAuth = false;
//		$mail->SMTPDebug = false;
//		//$mail->Host = "http://rrps.ca/";
//		//$mail->Port = "25";
//		//$mail->Username = "";
//		//$mail->Password = "";
//		$mail->IsHTML(TRUE);
//		
//		$mail->AddAddress("raghbendra.nayak@systematixindia.com","raghbendra");
//		
//		$message .= "Dear ".$fname.",<br><br>
//		
//		YES THIS IS DONE ";
//	    
//		//mail("nayak.raghu01@gmail.com",$subject,$message,$from);
//		//mail("".$showname['email_id'].",admin@rrps.ca",$subject,$message,$from);
//		$mail->Body = $message;
//		$mail->Send();
//echo "hiiiii";
 ?>



<?php
//require_once('class/class.phpmailer.php');
//require_once('class/class.smtp.php');
//
//
//$mail = new PHPMailer();
//	   
//		$mail->From = "cppatidar@gmail.com";
//		$mail->FromName = "admin";
//		$mail->Subject = "test mail";
//		$mail->Mailer = "mail";
//		$mail->SMTPAuth = false;
//		$mail->SMTPDebug = false;
//		//$mail->Host = "http://rrps.ca/";
//		//$mail->Port = "25";
//		//$mail->Username = "";
//		//$mail->Password = "";
//		$mail->IsHTML(TRUE);
//		
//		$mail->AddAddress("raghbendra.nayak@systematixindia.com","raghbendra");
//		
//		$message .= "Dear ".$fname.",<br><br>
//		
//		YES THIS IS DONE ";
//	    
//		//mail("nayak.raghu01@gmail.com",$subject,$message,$from);
//		//mail("".$showname['email_id'].",admin@rrps.ca",$subject,$message,$from);
//		$mail->Body = $message;
//		if($mail->Send()){
//		echo "success";}
?>



<?php

require_once('class/class.phpmailer.php');
require_once('class/class.smtp.php');

 $fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $email=$_POST['email'];
 $phone=$_POST['phone'];
 $comment=$_POST['comment'];
 
$mail = new PHPMailer();
	   
		$mail->From = "administrator@abcglab.org";
		$mail->FromName = "abcg";
		$mail->Subject = "test mail";
		$mail->Mailer = "mail";
		$mail->SMTPAuth = false;
		$mail->SMTPDebug = false;
		//$mail->Host = "http://rrps.ca/";
		//$mail->Port = "25";
		//$mail->Username = "";
		//$mail->Password = "";
		$mail->IsHTML(TRUE);
		
		$mail->AddAddress("pradeep.jaiswal@systematixindia.com","sipl");
		
		$message .= "Dear ".$fname.",<br><br>
		                  ".$lname.",<br><br>
						  ".$email.",<br><br>
						  ".$phone.",<br><br>  
						  ".$comment.",<br><br>";
		//mail("nayak.raghu01@gmail.com",$subject,$message,$from);
		//mail("".$showname['email_id'].",admin@rrps.ca",$subject,$message,$from);
		$mail->Body = $message;
		
		if($mail->Send())
		{
		//echo "success";
		header("location:abcgforgemologists.html");
		}
  
    
?>

<?php
//**********************************Simple PHP mail Function************************************************************
//*****************Changes by Vasim*****************

$connect= mysql_connect($db_server,$db_username,$db_password)or die(' Host not Connected ');
$link= mysql_select_db($db_name,$connect)or die('Could not open database');

$user_id = $_REQUEST['assigned_user_id'];

if(isset($user_id) && !empty($user_id)){

$squery= "select user_name,email1 from vtiger_users WHERE id =".$user_id;
$result=mysql_query($squery);
$result_array=mysql_fetch_array($result);
$email = $result_array['email1'];
$username = $result_array['user_name'];
//print_r($result_array);

$from = "techstaff@nexusitc.net";
$subject = "Project created";
$project_name = $_REQUEST['projectname'];
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Nexus-IT<techstaff@nexusitc.net>' . "\r\n";
$message = "Hello ".$username."\n "."<br />"."<br />".$project_name." task  assigned to you.\n\n <br /> <br /> Thanks";
mail($email,$subject,$message,$headers);

}
 //exit();
//*****************End Changes by Vasim*****************
?>

<?php
require_once('class/class.phpmailer.php');
require_once('class/class.smtp.php');

  $name = $_POST['name'];
  $telephone = $_POST['telephone'];
  $email = $_POST['email'];
  $mesg = $_POST['mesg'];
 
 $mail = new PHPMailer();
	   
		$mail->From = "administrator@HotelOmodaka.org";
		$mail->FromName = "Hotel Omodaka";
		$mail->Subject = "Hotel Omodaka Contact Us mail";
		$mail->Mailer = "mail";
		$mail->SMTPAuth = false;
		$mail->SMTPDebug = false;

		$mail->IsHTML(TRUE);
		
		$mail->AddAddress("raghbendra.nayak@systematixindia.com","sipl");
		
		$message .= "Dear Admin Here is contact person ".$name." Deatils,<br><br>
		                  <b>Name:</b>&nbsp;&nbsp;".$name.",<br><br>
						  <b>Telephone:</b>&nbsp;&nbsp;".$telephone."<br><br>
						  <b>Email:</b>&nbsp;&nbsp;".$email.",<br><br>
						  <b>Message:</b>&nbsp;&nbsp;".$mesg.",<br><br>";
		$mail->Body = $message;
		
		if($mail->Send())
		{
		$home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/contact_us.php?msg=success#ss';
		header('Location: ' . $home_url);
		}
?>

<?php

//************************Code for sending image in email using mailer class***********************************

ob_start();
session_start();
include("include/config.php");
include("include/database_tables.php");
include("include/function.php");

$x_amount = str_replace(",", "", $_POST['x_amount']);

/**** Function call to fetch user details ****/
$showname = displayUserDetails($_SESSION['u_id']);

/**** Function call to update user personal details ****/
$RunQueryUpdate = updateBusinessCheckoutDetails($_SESSION['u_id'],$_POST['x_ship_to_address'],$_POST['x_ship_to_city'],$_POST['x_ship_to_state'],$_POST['x_ship_to_country'],$_POST['x_ship_to_zip'],$_POST['x_phone'],$_POST['x_fax'],$_POST['x_email']);

/**** Function call to update user business details ****/
$RunUpdateBusinessInfo = updateBusinessCheckoutDetails(userId,$_POST['x_address'],$_POST['x_city'],$_POST['x_zip'],$_POST['x_fax'],$_POST['x_country'],$_POST['x_state']);

if(isset($_REQUEST['prd_id']) && !empty($_REQUEST['prd_id'])){
	
	$query = "SELECT categories_name FROM tbl_categories WHERE categories_id=".$_REQUEST['prd_id'];
	$run_query = mysql_query($query);
	while($row_cate = mysql_fetch_array($run_query)){
		$product_type = $row_cate['categories_name'];
		}
	
	}

/// Code for triggering mail starts from here
$total_credit=$showname['remaining_credit'];
$limit='30';
$now_random = time_to_sec(time());

	$date = date("Y-m-d");
	list($y,$m,$d)=explode('-',$date);
	$nextDate = Date("Y-m-d", mktime(0,0,0,$m,$d+2,$y));
   
    $order_number= mt_rand();
	
	//$in = $_POST["x_phone"];
	//$phone_output = substr($in,0,3)."-".substr($in,3,3)."-".substr($in,6,4);
	
	
	
	$tmp123 = explode("-",$_POST['x_phone']);
	if(@$tmp123[1]){
		$phone_output = $_POST["x_phone"];
	}else{
		$in = $_POST["x_phone"];
		$phone_output = substr($in,0,3)."-".substr($in,3,3)."-".substr($in,6,4);
	}
	
	$my_qry = mysql_query("SELECT count(o_id) as count FROM tbl_order WHERE u_id = '".$_SESSION['u_id']."'");
	$my_count = mysql_fetch_array($my_qry);
	$my_tot_order = $my_count['count'] + 1;
	
	$phone_output = "<span style='font-size:13px;font-weight: bold;'>".$phone_output."</span>";
	
	$mail = new PHPMailer();
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Strategic Network Solutions<support@stntsol.com>' . "\r\n";
	//$mail->CreateHeader = $headers;

	//$mail->Sender=$mailid.",sales@stntsol.com";
	$mail->FromName = 'Strategic Network Solutions';
	$mail->From = 'support@stntsol.com';
	$mail->Sender = $_POST['x_email'];
	$mail->AddAddress($_POST['x_email']);
	
	$mail->AddCC('sales@stntsol.com');
	$mail->AddCC('joseph@stntsol.com');
		
	$mail->AddReplyTo('support@stntsol.com', 'Strategic Network Solutions' );
	$mail->Subject = "Strategic Network Solutions Confirmation - Order#:$order_number";
	$mail->IsHTML(true);
	
	$message ="<div style='width:800px;  margin:0 auto; font:12px Arial, Helvetica, sans-serif;'><div style='width:100%;'><div style='width:350px; height:74px; float:left;'><img src='http://www.stntsol.com/img/Sns_ID.jpg' /></div><div style='float:right; text-align:right;'><P style='margin:0px; padding:0px;'>INVOICE NO: ".$now_random."</P><P style='margin:0px; padding:10px 0px 0px 0px; text-align:right; font-size:11px;'>STRATEGIC NETWORK SOLUTIONS<br>FED ID: 38-3803777</P><p style='font-size:15px;font-weight: bold;'>Order no. #".$my_tot_order."</p>
    </div>
    </div>
    
    	<div style='width:100%; margin:30px 0px 0px 0; float:left;'>	
    	<div style='float:left; width:450px;'>Thank you for your order.<p style='line-height:18px;'>
		<strong>SOLD TO:</strong><br>
		       Company Name : ".$showname['comp_name']."<br>
               Name : ".$_POST['x_first_name'].' '.$_POST['x_last_name']."<br>
               Address : ".$_POST['x_address']."<br>
			   ".$_POST['x_city'].", ".$_POST["x_state"].", ".$_POST["x_zip"]."<br>Phone : ".$phone_output."
            </p>
        </div>
        
        <div style='float:left; width:350px;'>
        	Your Order#:".$order_number."  	
            <p style='line-height:18px;'>
            	<strong>SHIP TO:</strong><br>
				Company Name : ".$showname['comp_name']."<br>
                Name : ".$_POST['x_first_name'].' '.$_POST['x_last_name']."<br>
                Address : ".$_POST["x_ship_to_address"]."<br>
				".$_POST["x_ship_to_city"].", ".$_POST["x_ship_to_state"].", ".$_POST["x_ship_to_zip"]."<br>Phone : ".$phone_output."
            </p>
        </div>
        
        </div>
        
	<div style='width:100%; margin:30px 0px 0px 0; float:left;'>	
    	<table cellspacing='1' cellpadding='5' bordercolor='#333333' border='0' bgcolor='#000' width='100%'>
  <tr>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>CUSTOMER NO</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>SHIP VIA</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>ORDER DATE</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>TERMS</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>INVOICE DATE</td>
  </tr>
  <tr>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$_SESSION['u_id']."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$product_type."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$date."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>NET 30 DAYS</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$date."</td>
  </tr>
</table>

		<table cellspacing='1' cellpadding='5' bordercolor='#333333' border='0' width='100%' style='margin-top:5px; background:#000000;'>
  <tr>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>ORDERED</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>ITEM NUMBER</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;' width='35%'>DESCRIPTION</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>UNIT PRICE</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>EXTENDED PRICE</td>
  </tr>";
  
    $count= $_POST['count'];
	for($i=1;$i<=$count;$i++)
	{
	$message.="
	<tr>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>Delivered</td>
	<td style='font-size:12px; text-align:center; background:#ffffff;'>".$_POST['quantity_'.$i]."</td><td style='font-size:12px; text-align:center;' bgcolor='#ffffff'>".$_POST['description_'.$i]."</td><td style='font-size:12px; text-align:center; background:#ffffff;'>$".$_POST['prod_price_'.$i]."</td><td style='font-size:12px; text-align:center;' bgcolor='#ffffff'>$ ".$_POST['quantity_'.$i]*$_POST['prod_price_'.$i]."</td></tr>";
	}
  
$message.="</table>

  </tr>
</table>

		<table cellspacing='5' cellpadding='5'  border='0'  width='100%' style='margin-top:12px;'>
  <tr>
    <td style='font-size:12px; color:#000; font-weight:bold; border:1px solid #000; text-align:center;'>ORDER PLACED BY :".$_POST['x_first_name'].' '.$_POST['x_last_name']."</td>
    <td style='font-size:12px; color:#000; font-weight:bold; text-align:center; border:1px solid #000;'>SUB-TOTAL : $".$_POST['sub_total']."</td>
	<td style='font-size:12px; color:#000; font-weight:bold; text-align:center; border:1px solid #000;'>SALES TAX : ".$_POST['x_tax']."%</td>
    <td style='font-size:12px; color:#000; font-weight:bold; text-align:center; border:1px solid #000;'>SHIPPING : $".$_POST['shipping']."</td>
    <td style='font-size:12px; color:#000; font-weight:bold; text-align:center; border:1px solid #000;'>AMOUNT DUE : $".$x_amount."</td>
  </tr></table>
	<hr>
    
    
    
    </div>
    
    <div style='width:100%; margin:10px 0px 0px 0; float:left;'>	
    	
        <div style='width:100%; font-size:12px; line-height:18px; margin:0 0 10px 0;'>
        	<strong>PLEASE PAY FROM THIS INVOICE</strong>
REFER TO THIS INVOICE NUMBER WHEN CONTACTING US REGARDING THIS TRANSACTION

        </div>
        
        <div style='float:left; width:100%;'>
        	<table cellspacing='1' cellpadding='5' bordercolor='#333333' border='0' bgcolor='#000' width='100%' style='margin-top:5px;'>
  <tr>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>CUSTOMER NAME</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>CUSTOMER NUMBER</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>INVOICE NUMBER</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>INVOICE DATE</td>
    <td style='font-size:12px; color:#FFFFFF; font-weight:bold; text-align:center; background:#185897;'>AMOUNT DUE</td>
  </tr>
  <tr>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$_POST['x_first_name'].' '.$_POST['x_last_name']."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$_SESSION['u_id']."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$now_random."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>".$date."</td>
    <td style='font-size:12px; text-align:center; background:#ffffff;'>$".$x_amount."</td>
  </tr>
</table>

		<table width='100%' border='0' cellspacing='0' cellpadding='5' style='margin-top:20px;'>
  <tr>
    <td style='font-size:12px;'>MAKE CHECK <br>PAYABLE TO:</td>
    <td style='font-size:12px; border:1px solid #000; text-align:center; padding:10px;' align='right' width='130'>AMOUNT DUE IN FULL</td>
  </tr>

  
</table>
			<p style='width:203px; line-height:18px; margin:0px; padding:0px; margin-left:5px;'>STRATEGIC NETWORK SOLUTIONS<br>
		ATTN: ACCOUNTS RECEIVABLE<br>
		2337 ROSCOMARE ROAD 2-230<br>
		LOS ANGELES, CA 90077</p>
        
        <p style='width:200px; padding:8px 10px; margin:0px; padding:0px; border:1px solid #000; text-align:center; line-height:18px; float:right;' align='right'>
        	IMPORTANT - PLEASE DETACH AND RETURN THIS PORTION TO INSURE PROPER CREDIT
        </p>


        </div>
    
    </div>
 
 
 </div>";
	$message .= "<br>";
	$mail->Body = $message;

		//mail($mailid,$message,$headers);
		//mail($mailid.",sales@stntsol.com",$subject,$message,$headers);
		//mail("ripple.jaini@systematixindia.com",$subject,$message,$headers);
		
	if(!$mail->Send())
	{
	   echo "Error sending: ".$mail->ErrorInfo;
	}
	
	
	
	
	$FullName = $_POST['x_first_name'].' '.$_POST['x_last_name'];
	$DeliveryAdd = $_POST['x_ship_to_address'].' '.$_POST['x_ship_to_city'].' '.$_POST['x_ship_to_state'].' '.$_POST["x_ship_to_zip"];
	$BillingAdd = $_POST['x_address'].' '.$_POST['x_city'].' '.$_POST['x_state'].' '.$_POST['x_zip'];
	
	for($i=1;$i<=$count;$i++){
	$prod_multiplied_price = ($_POST['quantity_'.$i]*$_POST['prod_price_'.$i]);
	$credit_used = 1;
	
	insertOrderDetails_dw($_SESSION['u_id'],$_POST['id_'.$i],$FullName,$order_number,$_POST['description_'.$i],$_POST['quantity_'.$i],$_POST['prod_price_'.$i],$prod_multiplied_price,$_POST['sub_total'],$_POST['shipping'],$_POST['x_tax'],$_POST['x_email'],$x_amount,$DeliveryAdd,$BillingAdd,$_SESSION['couponcode'],$credit_used,$now_random);
	$orderID = mysql_insert_id();
	}
	$remaining_credit = $total_credit - $x_amount;
	$date=explode('-',date('y-m-d'));
	$y=$date[0];
	$m=$date[1];
	$d=$date[2];
	$credit_end_date = date("Y-m-d", mktime(0, 0, 0, $m, $d+$limit,$y));
	
	//insertCreditValues($orderID,$_SESSION['u_id'],$total_credit,$remaining_credit,$credit_end_date);
	
	updateUserData($_SESSION['u_id'],$remaining_credit);
	
	insertCouponData($_SESSION['couponID'],$orderID);
	
	unset($_SESSION['coupon_currently_used']);
	unset($_SESSION['couponcode']);
	unset($_SESSION['cart']);
	header("Location:order.php?order_processing=1");	
	
// The results are output to the screen in the form of an html numbered list.