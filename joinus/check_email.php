<?php
$email=trim($_GET['email']);
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
 print "Please enter a valid Email ID";
 }
 else
 	echo "1";
 ?>