// JavaScript Document
$(function(){		
    //===================================================
    // 設定圖示被點擊
    //===================================================
    $('.li').mouseenter(function(){
		$(this).stop().animate({marginTop:-10},{duration:400,easing:'easeOutBack'})
	});
	
	$('.li').mouseleave(function(){
		$(this).stop().animate({marginTop:0},{duration:300,easing:'easeOutBack'})
	});
    //---------------------------------------------------
});	