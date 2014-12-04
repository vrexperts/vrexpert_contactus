<?php

if( ! isset($_POST['action'])  ) {
	return;
}else {
	$contact_name = $_POST['contact_name'];
	$contact_email = $_POST['contact_email'];
	$contact_no = $_POST['contact_no'];
	$message = $_POST['message'];
}

require('../apis/PHPMailer/class.phpmailer.php');
require('../includes/config.php');


$mail             = new PHPMailer(); // defaults to using php "mail()"

//$body             = file_get_contents('contents.html');
//$body             = eregi_replace("[\]",'',$body);

//$body = $__CONFIG['VRE_CONTACTUS']['EMAIL']['message'];

$body = "<b><font  size='+2' color='red'>Enquiry Details</font></b><br><br>";

foreach($_POST as $key => $val) {
	$key = ucwords(str_replace("_"," ", $key));
	$body .= "<b><font color='blue'>{$key} :</font></b> {$val}<br><br>";
}

//$body .= "<b><font color='blue'>Refer Url:</font></b>"." ".$_SERVER["HTTP_REFERER"]."<br><br>";

$mail->AddReplyTo($_POST['contact_email'],$_POST['contact_name']);

$mail->SetFrom($_POST['contact_email'], $_POST['contact_name']);

$to_arr = explode(',', $__CONFIG['VRE_CONTACTUS']['EMAIL']['to']);

foreach($to_arr as $to) {
	$mail->AddAddress($to);
}

$mail->Subject    = $__CONFIG['VRE_CONTACTUS']['EMAIL']['subject'];

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->IsHTML(true);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message Sent";
}