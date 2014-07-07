<?php

require_once("../lib/classValidate.php");

class Application extends Validate{

	public $firstName;
	public $lastName;
	public $email;
	public $phone;
	public $org;
	public $country;
	public $city;
	public $gender;
	public $post;
	public $answers;
    
    protected $is_novalue;
    protected $is_email;
    protected $is_phone;
    protected $is_answered;

    function __construct(){
    	$this->firstName=$this->lastName=$this->email=$this->phone=$this->org=$this->country=$this->city=$this->gender=null;
    	$this->post=array();
        $this->answers=array();
        $this->is_email=$this->is_phone=$this->is_novalue=0;
        $this->is_answered=array();
    }
     
    public function inspect(){
         
         $this->is_email=$this->check_email($this->email);
         $this->is_phone=$this->check_phone($this->phone);
         $this->is_novalue=$this->check_novalue(array(
         	                         0=>$this->firstName,
         	                         1=>$this->lastName,
         	                         2=>$this->email,
         	                         3=>$this->phone,
         	                         4=>$this->org,
         	                         5=>$this->country,
         	                         6=>$this->city,
         	                         7=>$this->gender,
         	                         8=>$this->post,
                                     9=>$this->answers['q1']
         	                         ));
    if(is_array($this->post)){ 
        if(in_array("Artist", $this->post)){
            if(array_key_exists("q4", $this->answers))
                $this->is_answered[]=1;
            else
                $this->is_answered[]=0;
            
        }
        if(in_array("M&M", $this->post)){
            if(array_key_exists("q2", $this->answers))
                $this->is_answered[]=1;
            else
                $this->is_answered[]=0;
            if(array_key_exists("q3", $this->answers))
                $this->is_answered[]=1;
            else
                $this->is_answered[]=0;
            
        }
     }   
    } 
    
    public function save(){

        require_once "../lib/classDbconnect.php";
        try {

            $PDO=new Dbconnect();
            $objPDO=$PDO->connect();
            
            $query="INSERT INTO AAW_applications(name,sex,organization,country,city,phone,email,post,Q1,Q2,Q3,Q4,Q5) VALUES (:name,:gender,:org,:country,:city,:phone,:email,:post,:ans1,:ans2,:ans3,:ans4,:ans5);";
            $statement=$objPDO->prepare($query);            

            $name=$this->firstName.' '.$this->lastName;

            $statement->bindParam(':name',$name,PDO::PARAM_STR);
            $statement->bindParam(':gender',$this->gender,PDO::PARAM_STR);
            $statement->bindParam(':org',$this->org,PDO::PARAM_STR);
            $statement->bindParam(':country',$this->country,PDO::PARAM_STR);
            $statement->bindParam(':city',$this->city,PDO::PARAM_STR);
            $statement->bindParam(':phone',$this->phone,PDO::PARAM_STR);
            $statement->bindParam(':email',$this->email,PDO::PARAM_STR);
            
            $allPost=implode(',',$this->post);//for error on strict standards:only variables should be passed by reference
            $statement->bindParam(':post',$allPost,PDO::PARAM_STR);
         
            $noAnswers = array('q1','q2','q3','q4','q5');
            for ($i=0; $i < 5; $i++) { 
                if(!array_key_exists($noAnswers[$i], $this->answers))
                   $this->answers[$noAnswers[$i]]="Not Applicable"; 
             } 

            $statement->bindParam(':ans1',$this->answers['q1'],PDO::PARAM_STR);
            $statement->bindParam(':ans2',$this->answers['q2'],PDO::PARAM_STR);
            $statement->bindParam(':ans3',$this->answers['q3'],PDO::PARAM_STR);
            $statement->bindParam(':ans4',$this->answers['q4'],PDO::PARAM_STR);
            $statement->bindParam(':ans5',$this->answers['q5'],PDO::PARAM_STR);
    
    
            $statement->execute();
            return 1;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
    }

    public function is_novalue(){return $this->is_novalue;}
    public function is_email(){return $this->is_email;}
    public function is_phone(){return $this->is_phone;} 
    public function is_answered(){
        if(in_array(0, $this->is_answered))
            return 0;
        else
            return 1;
    }
    
}

?>