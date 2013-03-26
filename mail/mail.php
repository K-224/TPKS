<?php
//date_default_timezone_set(‘Asia/Calcutta’); // to set default timezone
require_once("class.phpmailer.php");
// optional, gets called from within class.phpmailer.php if not already loaded
//include(“class.smtp.php”);

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
//$mail->Host = "ssl://smtp.gmail.com:465"; // SMTP server
// enables SMTP debug information (for testing) // 1 = errors and messages // 2 = messages only
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
//$mail->Host = "ssl://smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Host = "94.100.177.1";
$mail->Port = 465; // set the SMTP port for the GMAIL server
//$mail->Username = "tpks.paris@gmail.com"; // GMAIL username
//$mail->Password = "cybergroup224"; // GMAIL password
//$mail->SetFrom("tpks.paris@gmail.com", "First Last");
$mail->Username = "parizmail@mail.ru";
$mail->Password = "cybergroup224";
$mail->SetFrom("parizmail@mail.ru");
$mail->AddReplyTo("qwex-x@rambler.ru","First Last");
$mail->Subject = "PHPMailer Test Subject via smtp (Gmail), basic";
// optional, comment out and test
$mail->IsHTML(true); // send as HTML
$mail->Subject = "This is the subject";
$mail->Body = "Hi,This is the HTML BODY "; //HTML Body
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
$address = "qwex-x@rambler.ru";
$mail->AddAddress($address, "First Last");
//$mail->AddAttachment("images/phpmailer.gif"); // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
}else {
echo "Message sent!";
}
?> 