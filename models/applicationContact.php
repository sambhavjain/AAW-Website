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
        require_once('../lib/class.phpmailer.php');
        $mail = new PHPMailer();
        $body = $this->name.'('.$this->email.')'.' says '.$this->message;
        $mail->SetFrom('contact@aawproductions.com', $this->name);
        $address = "contact@aawproductions.com";
        $mail->AddAddress($address, "Management Team");
        $mail->Subject = "Contact Us Query";
        $mail->MsgHTML($body);
        
        if(!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }

    public function is_novalue(){return $this->is_novalue;}
    public function is_email(){return $this->is_email;}
   
}

?>