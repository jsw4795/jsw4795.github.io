<?php
// Check for empty fields
if(empty($_POST['이름'])  		||
   empty($_POST['이메일']) 		||
   empty($_POST['휴대폰 번호']) 		||
   empty($_POST['메세지'])	||
   !filter_var($_POST['이메일'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['이름']));
$email_address = strip_tags(htmlspecialchars($_POST['이메일 주소']));
$phone = strip_tags(htmlspecialchars($_POST['휴대폰 번호']));
$message = strip_tags(htmlspecialchars($_POST['메세지']));
	
// Create the email and send the message
$to = 'jsw4795@naver.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: jsw4795@naver.com"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
