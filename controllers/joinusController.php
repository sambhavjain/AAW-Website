<?php

include_once ("../models/applicationJoinus.php");
if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

if($_SERVER['REQUEST_METHOD']=="POST"){

    $joinus=new application();

	  $joinus->firstName=trim($_POST['first_name']);
	  $joinus->lastName=trim($_POST['last_name']);
    $joinus->email=trim($_POST['email']);
    $joinus->phone=trim($_POST['phone']);
    $joinus->city=$_POST['city'];
    $joinus->country=$_POST['country'];
    if(isset($_POST['gender']))
    $joinus->gender=$_POST['gender'];
    $joinus->org=trim($_POST['org']);
    if(isset($_POST['post']))
    $joinus->post=$_POST['post'];
    if(!empty($_POST['q2']))
      $joinus->answers['q2']=trim(strip_tags($_POST['q2'])); //M&M Question
    if(!empty($_POST['q3']))
      $joinus->answers['q3']=trim(strip_tags($_POST['q3'])); //M&M Question
    if(!empty($_POST['q4']))
      $joinus->answers['q4']=trim(strip_tags($_POST['q4'])); //Artist Question
    if(!empty($_POST['q5']))
      $joinus->answers['q5']=trim(strip_tags($_POST['q5']));
    $joinus->answers['q1']=trim($_POST['q1']); //Compulsory Question
    
    $joinus->inspect();  //Validate

    if(!$joinus->is_novalue())
      echo "You missed out on some info.";
    else if(!$joinus->is_email())
      echo "Please enter a valid E-mail address.";
    else if(!$joinus->is_phone())
      echo "Please enter a valid Mobile No.";
    else if(!$joinus->is_answered())
      echo "You missed out on some answer(s).";
    else if(!$joinus->save())
      echo "There was some problem. Sorry for inconvenience.";
    else
      echo "1";

}else
  echo "Not Authorized.";
}else
  echo "Not Authorized";

?>