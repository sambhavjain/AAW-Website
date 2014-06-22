$(document).ready(function(){
        $('#fullpage').fullpage({
                                verticalCentered: true,
                                slidesColor: ['#000000', '#000000', '#7BAABE', '#ccddff', 'whitesmoke'],
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
        Placeholdem( document.querySelectorAll( '[placeholder]' ) );//placeholder animation 
});

function playVideo(){
                $('#section1 .layer').css({'opacity':'0'});
                $('video').on("ended",function(){
                        $('#section1 .layer').css({'opacity':'1'});
                });
                $('video').get(0).play();
        }

function contact(){
                var formdata=$('#asd').serialize();
                $.post('contact.php',formdata,function(data){
                if(data=="0"){
                $('#contact-error').html('<p style="font-size:15px;color:red;">Enter all details.');
            }
            if(data=="-1"){
                $('#contact-error').html('<p style="font-size:15px;color:red;">Invalid Email-ID');
            }
            if(data=="1"){
                $('#contact-error').html('');
                $('#asd').html('<p style="font-size:25px;font-family:Aliquam UltraLight;">Thank you for writing to us.');
            }
        });
        }