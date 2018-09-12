<?php 
	
	$name = $_POST['name'];
	$visitors_email = $_POST['email'];
	$message_subject = $_POST['subject'];
	$message = $_POST['message'];

	echo "Name: ".$name. "Email ".$visitors_email. "Message ".$message;

	$email_from 	= $visitors_email;
	// $email_subject  = "New Form Submission";
	$email_body 	= "User name: $name.\n".
					   "User email: $visitors_email.\n".
					   "User Message: $message.\n";


	
	// $to = "toart3@yahoo.com";
					   $to = $visitors_email;
	// $header = "From: $email_from \r\n";
	// $header .= "Reply-To $visitors_email \r\n";
	// mail ($to,$email_subject,$email_body,$header);
	// header("Location:index.html");


	// <?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 * This uses traditional id & password authentication - look at the gmail_xoauth.phps
 * example to see how to use XOAUTH2.
 * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
 */
//Import PHPMailer classes into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
// require '../vendor/autoload.php';
//Create a new PHPMailer instance

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';
// require 'class.phpmailer.php';

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "rubeltoahmed@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "itsmylife86";
//Set who the message is to be sent from
$mail->setFrom($visitors_email, $name);
//Set an alternative reply-to address
// $mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($to);
//Set the subject line
$mail->Subject = $message_subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
// $mail->msgHTML(file_get_contents($email_body), __DIR__);
//Replace the plain text body with one created manually
// $mail->AltBody = 'This is a plain-text message body';
$mail->Body = $email_body;
//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    // echo "Message sent!";
    header("Location:contact.html");
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}


 ?>
