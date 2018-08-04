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
		$mail->FromName = "ABCG";
		$mail->Subject = "Contact: ABCG FOR GEMOLOGISTS";
		$mail->Mailer = "mail";
		$mail->SMTPAuth = false;
		$mail->SMTPDebug = false;

		$mail->IsHTML(TRUE);
		
		$mail->AddAddress("it@juliasdiamonds.com","sipl");
		
		$message .= "<b>First Name</b>: ".$fname.",<br><br>
		             <b>Last Name</b>: ".$lname.",<br><br>
					<b>Email</b>: ".$email.",<br><br>
					<b>Phone</b>: ".$phone.",<br><br>  
					<b>Comment</b>: ".$comment.",<br><br>";

		$mail->Body = $message;
		
		if($mail->Send())
		{
		//echo "success";
		header("location:abcgforgemologists.html");
		}
  
//Second way of mailer class

//************Mail fuction for Booking Transfer*********************************	   
	function mailToclient_transfer($id)
	{
	
	   $selectBookingInfo="select *from tbl_transfer_booking where transfer_booking_id=".$id;
	   if(!$dataSetBooking=mysql_query($selectBookingInfo))
	   {
	      die('Error:'.mysql_error());
	   }
	   
	   $resultBookingInfo=mysql_fetch_array($dataSetBooking);
	  // mail('arun.aghi@yahoo.com','test','hello');

	   
	 	$mail = new PHPMailer();
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Egypt-Club<egyptclub@yahoo.com>' . "\r\n";
		
		//$mail->From="raghbendra.nayak@systematixindia.com";//raghbendra.nayak@systematixindia.com  egyptclub@yahoo.com  arun.aghi@yahoo.com
		//$mail->FromName="ADMIN";
		$mail->Sender="egyptclub@yahoo.com";
		$mail->AddAddress("egyptclub@yahoo.com");
		$mail->AddReplyTo( 'hemant.jaiswal@systematixindia.com', 'test' );
		$mail->Subject = "Tour Confirmation mail";
		$mail->IsHTML(true);
		
		$body="Hello ".$resultBookingInfo['booking_name'].",<br /><br />";
		$body.="<table style='border-style:dotted; background-color:#FF9933'>";
    	$body.="<tr><td><b>Tour Name:</b></td><td>".$resultBookingInfo['tour_name']."</td></tr>";
		$body.="<tr><td><b>Booking name:</b></td><td>".$resultBookingInfo['booking_name']."</td></tr>";
		$body.="<tr><td><b>Names of adults:</b></td><td>".$resultBookingInfo['name_adults']."</td></tr>";
		$body.="<tr><td><b>Number of adults:</b></td><td>".$resultBookingInfo['number_adults']."</td></tr>";
		$body.="<tr><td><b>Names of Children under 12 years old:</b></td><td>".$resultBookingInfo['name_children']."</td></tr>";
		$body.="<tr><td><b>Number of Children under 12 years old:</b></td><td>".$resultBookingInfo['number_children']."</td></tr>";
		$body.="<tr><td><b>Your country:</b></td><td>".$resultBookingInfo['country']."</td></tr>";
		$body.="<tr><td><b>Name of your hotel:</b></td><td>".$resultBookingInfo['hotel_name']."</td></tr>";
		$body.="<tr><td><b>Your e-mail address:</b></td><td>".$resultBookingInfo['email_address']."</td></tr>";
		$body.="<tr><td><b>Operator of your Holiday:</b></td><td>".$resultBookingInfo['holiday_operator']."</td></tr>";
		$body.="<tr><td><b>Contact phone number:</b></td><td>".$resultBookingInfo['contact_number']."</td></tr>";
		$body.="<tr><td><b>Arrival date:</b></td><td>".$resultBookingInfo['arrival_date']."</td></tr>";
		$body.="<tr><td><b>Departure Date:</b></td><td>".$resultBookingInfo['departure_date']."</td></tr>";
		$body.="<tr><td><b>Additional informaton:</b></td><td>".$resultBookingInfo['aditional_info']."</td></tr>";
		$body.="<tr><td colspan=2>your tour information has accepted successfully</td></tr>";
		$body.="</table>";
		$mail->Body = $body;
		if(!$mail->Send())
		{
		   echo "Error sending: ".$mail->ErrorInfo;
		}
	} 
  
    
?>

