$(document).ready(function(){      
              var flag=0;
              $('.side-menu').click(function(){
        	if(flag==0){
        		$('#header .side-menu').css({'right':'26%'});
        		$('#menu').css({'right':'0'});
        		flag=1;
        	}else
        	{
        		$('#header .side-menu').css({'right':'20px'});
        		$('#menu').css({'right':'-25%'});
        		flag=0;
        	}
        
        });
              $('.aawist').css({"-webkit-transform":"translateY(-20%)"}).delay(1000).fadeIn().css({"-webkit-transform":"translateY(0%)"});
              $('.cbp-mc-column').css({'opacity':0}).delay(1000).css({'opacity':1});

        $('#submit').click(function(){
          var formdata=$('form').serialize();
          var ques=$('#ques').serialize();
          var dataString=formdata+'&'+ques;
          $.post('../controllers/joinusController.php',dataString,function(data){
            if(data!='1')
                $('#message').html('<div id="error-disp">'+data+'</div>');
              else
                $('#message').html('<div id="success-disp">Thank You! We will contact you soon.</div>')
          });
          $('html,body').animate({scrollTop: $(".aawist").offset().top},'slow');
        });      
        
        
});


function check_empty(name){
     
  if(!document.getElementsByName(name)[0].value){
       $('#'+name).html('*Required');
  }else
       $('#'+name).html('*');
}

function check_phone(){
  
  if(!document.getElementsByName("phone")[0].value){
     $('#phone').html('*Required 10 digit no.');   
   }else
     $('#phone').html('*');   
  
}

function getCountry(){
  
  if(document.getElementsByName("country")[0].value=="Others"){
     $('#otherCountry').html('<input type="text" name="country" placeholder="Type your country"/>');   
   }else{
    $('#otherCountry').html('');
   }   
  
}

function getCity(){
  
  if(document.getElementsByName("city")[0].value=="Others"){
     $('#otherCity').html('<input type="text" name="city" placeholder="Type your city"/>');   
   }else{
    $('#otherCity').html('');
   }   
  
}


function questions(){
 
  var art=0,man=0,ca=0;
  if($("#art").is(':checked'))
     art=1;

    if($("#mang").is(':checked'))
     man=1;  
    
    if($('#ca').is(':checked'))
     ca=1;

    var dataString={art:art,man:man,ca:ca};
    if(!($("#art").is(':checked'))&&!($("#mang").is(':checked'))&&!($('#ca').is(':checked'))){
      
      $('#ques').fadeOut();
    }
    else{
        $.post('../controllers/questionController.php',dataString,function(data){
        
        $('#ques').css({'display':'none'}).html('<form id="answers" method="post">'+data+'</form>');
        $('#ques').delay(200).fadeIn();
      });
        
    }
}

