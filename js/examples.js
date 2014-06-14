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
});