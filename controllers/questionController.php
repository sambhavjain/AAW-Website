<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

$art=$_POST['art'];
$man=$_POST['man'];
$ca=$_POST['ca'];


//$commonQues='<label for="Ques1">How do you think will/shall AAW shape your social life?<span class="required">*</span></label><textarea id="q1" name="q1"></textarea>';

$manQues='<label for="Ques2">Mention your experience in Event Management.<span class="required" id="q2">*</span></label><textarea onblur="check_empty(\'q2\');" name="q2"></textarea><label for="Ques3">What possible social outreach mechanisms would you suggest for AAW Productions?<span class="required" id="q3">*</span></label><textarea onblur="check_empty(\'q3\');" name="q3"></textarea>';

$artQues='<label for="Ques4">Specify your art form and experience. (Great! If you can give links)<span class="required" id="q4">*</span></label><textarea onblur="check_empty(\'q4\');" name="q4"></textarea>';

$caQues='<label for="Ques5">Campus Ambassodor<span class="required" id="q5">*</span></label><textarea name="q5"></textarea>';

$ques="";
if($art==1)
  $ques=$ques.$artQues;
if($man==1)
  $ques=$ques.$manQues;
if($ca==1)
  $ques=$ques.$caQues;

  	print "$ques";
 
 }else print"Not Authorized";
?>