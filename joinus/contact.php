<?php
$to = "contact@aawproductions.com";
$email = trim($_POST['email']);
$name=trim($_POST['name']);
$message=trim($_POST['message']);
if(empty($email)||empty($name)||empty($message))
print "0";
else
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
 print "-1";
else
{
$body = "NAME: $name \n EMAIL: $email \n MESSAGE: \n $message" ;
$headers = "From: contact@aawproductions.com";
mail($to,"Contact Feed" , $body, $headers);
print "1";
}
?>