$(document).ready(function(){
        $('#fullpage').fullpage({
                                verticalCentered: true,
                                'scrollOverflow': true,
                                continuousVertical: true,
                                slidesColor: ['#000000', '#000000', '#ccddff', 'whitesmoke','whitesmoke'],
                                anchors: ['Home', 'About', 'WhatWeDo', 'Initiatives', 'Contact'],
                                menu: '#menu',
                                afterRender: function(){
                                
                                        //setting the size
                                        $('video').height($(window).height());
                                        $('video').width($(window).width());
                                        
                        }});
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
        var mobflag=0;
        $('.side-menu-mob').click(function(){
            if(mobflag==0){
                $('#menu').css({'top':'0'});
                mobflag=1;
            }else
            {
                $('#menu').css({'top':'-200%'});
                mobflag=0;
            }
        
        });
        
    $('.flip').mouseover(function(){
        $(this).find('.card').addClass('flipped').mouseleave(function(){
            $(this).removeClass('flipped');
        });
        return false;
    });
        Placeholdem( document.querySelectorAll( '[placeholder]' ) );//placeholder animation 
                
});

function playVideo(){
                var myVideo=document.getElementById("video1"); 
                $('#section1 .layer').css({'opacity':'0'});
                myVideo.controls=true;
                myVideo.play();
                $('#video1').on("ended",function(){
                    $('#section1 .layer').css({'opacity':'1'});
                    myVideo.controls=false;
                });
        }


function contact(){
                var formdata=$('#contact-us').serialize();
                $.post('../controllers/contactController.php',formdata,function(data){
                if(data!='1')
                    $('#contact-error').fadeIn().html('<span style="font-size:15px;color:red;">'+data+'</span>');
                else
                    $('#contact-error').fadeIn().html('<span style="font-size:15px;color:green;">Message has been sent.</span>');
                });
        }