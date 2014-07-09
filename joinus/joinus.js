$(document).ready(function(){
$('#input-box').hide();
});

function otherCity(value){
	   
	if(value=="Others")
	$('#input-box').show();
    else
    	$('#input-box').hide();
}


function check_field(value,id){
	
	var err='#'+id;
	if(!value){
		$(err).html('*Kindly fill this field');
	}else{
		$(err).html('*');
	}
}

function check_number(value){
	
	if(isNaN(value))
		{       
				$('#wrong-number').html('Enter digits only');
			}else{
				$('#wrong-number').html('');
			}
}

function check_email(){
	var formdata=$('#form').serialize();
	$.get('check_email.php',formdata,function(data){
if(data!="1")
$('#email').html('*'+data);
});
}

function questions(){
 
	var art=0,man=0,oth=0;
	if($("#art").is(':checked'))
     art=1;

    if($("#mang").is(':checked'))
     man=1;  
    
    if($('#oth').is(':checked'))
     oth=1;

    var dataString={art:art,man:man,oth:oth};
    if(!($("#art").is(':checked'))&&!($("#mang").is(':checked'))&&!($('#oth').is(':checked')))
    	$('#ques').html('');
    else
    	$.post('questions.php',dataString,function(data){
    		$('#ques').html('<form id="answers" method="post">'+data+'</form>');

    	});
}
