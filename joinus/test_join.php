<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
include "connect.php";
$as="";
$name="";
$email="";
$sc="";
$city="";
$contact="";
$other="";
$ans1=$ans2=$ans3=$ans4=$ans5=$ans6="Not Applicable";
$i=0;

$name=trim($_POST['name']);
if(isset($_POST['gender']))
$sex=$_POST['gender'];
$sc=trim($_POST['sc']);
$country=trim($_POST['country']);
$city=trim($_POST['city']);
$other_city=trim($_POST['other_city']);
$contact=trim($_POST['contact']);
$email=trim($_POST['email']);

if ($city=="Others")
  $city=$other_city;

if(isset($_POST['q1']))
  $ans1=mysql_real_escape_string(strip_tags($_POST['q1']));
if(isset($_POST['q2']))
  $ans2=mysql_real_escape_string(strip_tags($_POST['q2']));
if(isset($_POST['q3']))
  $ans3=mysql_real_escape_string(strip_tags($_POST['q3']));
if(isset($_POST['q4']))
  $ans4=mysql_real_escape_string(strip_tags($_POST['q4']));
if(isset($_POST['q5']))
  $ans5=mysql_real_escape_string(strip_tags($_POST['q5']));
if(isset($_POST['q6']))
  $ans6=mysql_real_escape_string(strip_tags($_POST['q6']));

if(isset($_POST['post'])) 
 {
  $post=$_POST['post'];
  $i=count($post);
  }
$other=$_POST['other'];
if(empty($name)||!isset($sex,$post)||empty($sc)||empty($city)||empty($contact)||empty($email))
{
print "Please enter the required fields.";
$err=1;
}
else
if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
 print "Please enter a valid email ID";
 $err=1;
 }
 
if(1)
{
 for($k=0;$k<$i;$k++)
 {
    $as=$as." ".$post[$k];
  if($post[$k]=="other")
  {
    $as=$as.":".$other;
   if(empty($other))
   {
    $err=1;
    print "Specify Other field of applying";
    }  
  }
 }
} 
if(!isset($err))
{
	 
	 mysql_query("INSERT INTO `applications`(`name`, `sex`, `institute`,`country`, `city`, `contact`, `email`, `post`, `Q1`, `Q2`, `Q3`, `Q4`, `Q5`, `Q6`) VALUES (\"$name\",\"$sex\",\"$sc\",\"$country\",\"$city\",$contact,\"$email\",\"$as\",\"$ans1\",\"$ans2\",\"$ans3\",\"$ans4\",\"$ans5\",\"$ans6\");");
	 print "Thank You $name. We have received your application.";
 
 } 
}
else
{
print "Some problem with the server. Try some time later.";
}
?>
