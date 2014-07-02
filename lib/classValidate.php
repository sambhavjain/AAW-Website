<?php

class Validate{
	
	public function check_email($email){
        
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
         	return 1;
        }else{
         	return 0;
        }
	}
    
    public function check_phone($phone){
    	
    	if(is_numeric($phone)&&(strlen($phone)==10)){
    		return 1;
    	}else{
    		return 0;
    	}

    }

    public function check_dob($dob){
    	$date=explode("/",$dob);
    	if(checkdate($date[1],$date[0],$date[2])){
    		return 1;
    	}else{
    		return 0;
    	}

    }

    public function check_novalue($params){
    	for ($i=0; $i < count($params); $i++) {
    	         		    
    		    if(empty($params[$i]))
    			return 0;
    	    }
    	return 1;
    }

}

?>