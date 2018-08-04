<?php

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Quick Sale Network<info@quicksalenetwork.com>' . "\r\n";
$message = "<div style=' margin:0 auto; font:13px Arial, Helvetica, sans-serif; width:650px;'>
	<div style='border:1px solid #AFAFAF; margin-bottom:30px;'>
	<div style='background:#FFF7D5 url('".BASE_URL."images/sidetitle.png) repeat-x bottom; padding:5px 10px;'>
    	<div style='float:left;'><img src='".BASE_URL."images/login_logo.png' width='200' height='52' border='0' alt='' /></div>
       <div style='float:right;'><a href='".BASE_URL."index.php' style=' text-decoration:none; color:#000;'>Login</a> | <a href='".BASE_URL."index.php'style=' text-decoration:none; color:#000;'>Privacy Policy</a> | <a href='".BASE_URL."contact.php' style=' text-decoration:none; color:#000;'>Contact Us</a></div>
        <p style='clear:both;'></p>
    </div>
    <div style='padding:0 10px;'>
        <div style='padding:13px 0 32px 0;'>Thank you for creating an account at Quick Sale Network!</div>
        <div style='background:#ffff00; height:50px; line-height:50px; font-weight:bold; margin-bottom:20px;'>Go here now: <a href='".BASE_URL."activate.php?email=".$_REQUEST['email']."&id=".base64_encode($lastID)."' target='_blank' style='color:#5C4520;'>Activate My Free Account</a></div>
        <div class='login_info'>
        	<p style='padding-bottom:20px;'>Your new account information:</p>
            <p style='padding-bottom:20px;'>
            	Username/Email: ".$_REQUEST['email']."<br />
Password: ".$_REQUEST['p']."
            </p>
            <p  style='padding-bottom:20px;'>Until next time, happy and profitable investing!</p>
            <p  style='padding-bottom:20px;'>The QuickSaleNetwork.com Team </p>
        </div>
    </div>
    <div style='clear:both;'></div>

</div>
<div style='text-align:center;'>
<p style='padding-bottom:10px;'><a href='#' style='color:#000;'>Privacy Policy</a> |<a href='#' style='color:#000;'> Contact Us</a> |<a href='#' style='color:#000;'> Member's Area Login</a></p>
<p  style='padding-bottom:10px;'>Quick Sale Network, inc., P.0. Box 122, Glen Burnie, MD 21061</p>
</div>
</div>";

  @mail($_REQUEST['email'],'Member Registration',$message,$headers);
  ?>