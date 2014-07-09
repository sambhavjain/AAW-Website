<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

$art=$_POST['art'];
$man=$_POST['man'];
$oth=$_POST['oth'];

$commonQues='<div class="row"><div class="col-md-8 exp "><p><b> Mention your experience in Event Management.
</b><br><b> (Be it any formal or informal event)</b> <span class="required"> * </span> </p>
<textarea rows="10" cols="80" name="q4" ></textarea> <br> <br></div></div>
<div class="row"><div class="col-md-8 exp"><p><b> What possible social outreach mechanisms would you suggest for
 AAW Productions?<br> (Other than the conventional publicity on social media)</b> <span class="required"> * </span> </p>
 <textarea rows="10" cols="80" name="q5" ></textarea></div></div><br>
 <div class="row">	<div class="col-md-8 exp"><p> <b>How do you think will/shall AAW shape your social life? </b>
 <span class="required"> * </span> </p><textarea rows="10" cols="80" name="q6"></textarea> <br> <br> </div></div>';

$manQues='<div class="row"><div class="col-md-8"><p><b> If applying for Management & Marketing team, 
 <span class="required"> * </span> <br>1. Describe your outreach in the Public. <br>2. 
 What all social media channels do you use? (e.g. Facebook, Twitter, etc) <br>3. 
 Mark yourself subjectively on your confidence level of Public Speaking. <br>Please email your CV.<br> 
 (If you have one at contact@aawproductions.com)</b> </p><textarea rows="10" cols="80" name="q3"></textarea> 
 <br> <br></div></div>';

$artQues='<div class="row"><div class="col-md-8"><p><b> If applying as an Artist, specify your art form and experience.
  Did you go for any<br> formal training? Please email your links or your work along with a CV.<br>
  (If you have one to contact@aawproductions.com)</b> <span class="required"> * </span> </p>
  <textarea rows="10" cols="80" name="q1"></textarea> <br> <br></div></div>';

$others='<div class="row"><div class="col-md-8"><p><b> If you are interested in any other field, 
  mention it, we can also provide<br> requisite training for the same.</b> <span class="required"> * </span> </p>
  <textarea rows="10" cols="80" name="q2"></textarea> <br> <br></div></div>';

$ques="";
if($art==1)
  $ques=$ques.$artQues;
if($man==1)
  $ques=$ques.$manQues;
if($oth==1)
  $ques=$ques.$others;

  	print "<form id=\"answers\" method=\"post\">$ques.$commonQues</form>";
 
 } 
?>