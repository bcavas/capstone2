<?php

//include phpmailer autoload.php
require 'phpmailer/vendor/autoload.php'
//create an instance of phpmailer
$mail = new PHPMailer();
//set a host
$mail->Host = "smtp.gmail.com";
//enable SMTP
$mail->isSMTP();
//set authentication to true
$mail->SMTPauth = true;
//set login details for gmail account
$mail->Username = "cap2proj@gmail.com";
$mail->Password = "Ben021485";
//set type of protection
$mail->SMTPSecure = "ssl"; //can also use TLS 
//set a port
$mail->Port = 465; //587 for TLS
//set subject
$mail->Subject = "test email";
//set body
$mail->Body = "this is the body";
//set who's sending email
$mail->setFrom('cap2proj@gmail.com','admin');
//set recipients
$mail->addAddress('bcavasiii@gmail.com');
//send an email
if ($mail->send()) {
	echo "mail sent";
} else {
	echo "something wrong happened";
}