<?php

include_once ("../models/applicationContact.php");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

if($_SERVER['REQUEST_METHOD']=="POST"){

	$contact=new contact();

	$contact->name=trim($_POST['name']);
	$contact->email=trim($_POST['email']);
	$contact->message=trim($_POST['message']);

	$contact->inspect(); //Validate form

	if(!$contact->is_novalue())
      echo "Please fill all details.";
    else if(!$contact->is_email())
      echo "Please enter a valid E-mail address.";
    else{
      	 if(!$contact->save())
          echo 'Message could not be sent due to technical error.';
        else
          echo '1';
      }

}else
    echo "Not Authorized";
    }else
       echo "Not Authorized";
    
    
?>