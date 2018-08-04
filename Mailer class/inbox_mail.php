<?php 
require_once('class.phpmailer.php');
require_once('class.smtp.php');
//require_once("/opt/lampp/htdocs/guestbook_yrahul/admin/include/PHPMailer5.2.0/class.pop3.php");
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $to = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['msg'];  
 
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->IsHTML(TRUE);
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port
$mail->Username = "rahul.gyadav@systematixindia.com"; // GMAIL username
$mail->Password = "rahul1234"; // GMAIL password
$mail->From = "admin.admin@gmail.com";
$mail-> From="Rahul";
$mail-> Subject = "Register successfully";

     move_uploaded_file($_FILES["file"]["tmp_name"],
	 "mailupload/".$_FILES["file"]["name"]);
      $path = "mailupload/" . $_FILES["file"]["name"];
	  $name =  $_FILES["file"]["name"];
	  $mail->AddAttachment("'".$_FILES["file"]["name"]."'");
      $mail->AddAddress("$to");
		
		$mail->Body = "Hi, <br>  Here is contact person :'".$name."' Deatils, <br><br>
		                  <b>Name:</b>&nbsp;&nbsp;'".$name."',<br><br>
						  <b>Telephone:</b>&nbsp;&nbsp;'".$phone."'<br><br>
						  <b>Email:</b>&nbsp;&nbsp;'".$to."',<br><br>
						  <b>Message:</b>&nbsp;&nbsp;'".$message."',<br><br>";
$mail->set('X-priority','1');
if(!$mail->Send()) 
{
   echo 'Message was not sent.';
   echo 'Mailer error: ' . $mail->ErrorInfo;
} 
else
{
   echo 'Message has been sent.';
}

}
?>


<html>
<form name="user" id="user" method="post" enctype="multipart/form-data">
<table>
<tr>
<td> Name </td><td><input type="text" name="name" id="name"  value="" /></td>
</tr>
<tr>
<td> Emailid </td><td> <input type="text" name="email" id="email"  value="" /></td>
</tr>
<tr>
<td> Telephone </td><td> <input type="text" name="phone" id="phone"  value="" /></td>
</tr>

<tr>
<td> Message </td><td> <textarea name="msg"  cols="15" rows="5"  id="msg"/></textarea></td>
</tr>

<tr>
<td> Attachment </td><td> 
<input name="file" type="file" id="file"> </td>
</tr>
<tr>
<td> <td> <input type="submit" name="submit" id="submit"  /></td></td>
</tr>
</table>
</form>
</html>


 
