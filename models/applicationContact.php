<?php

require_once "../lib/classValidate.php";

class Contact extends Validate{

	public $name;
	public $email;
	public $message;

	protected $is_novalue;
    protected $is_email;

    function __construct(){
    	$name=$email=$message=null;
    	$is_novalue=$is_email=0;
    }

    public function inspect(){
    	$this->is_email=$this->check_email($this->email);
        $this->is_novalue=$this->check_novalue(array(
                                0 => $this->name,
                                1 => $this->message
                             )); 
    }

    public function save(){
        require_once "../lib/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.aawproductions.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = false;
        $mail->From = 'contact@aawproductions.com';
        $mail->FromName = 'Admin';
        $mail->addAddress('shubhanksrivastava94@gmail.com', 'Shubhank');
        $mail->WordWrap = 50;
        $mail->Subject = 'Contact Us Query';
        $mail->Body    =  $this->name.' says on '.date("F j, Y, g:i a").' '.$this->message;
        
        if(!$mail->send()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function is_novalue(){return $this->is_novalue;}
    public function is_email(){return $this->is_email;}
   
}

?>