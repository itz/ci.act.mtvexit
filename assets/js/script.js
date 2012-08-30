$(document).ready(function() {



$('.pic-list li').hover(function(){
	$(this).find('.see-more').stop(true,false).animate({opacity: 1},100)}, function(){
		$(this).find('.see-more').stop(true,false).animate({opacity: 0},66)
	});
	
$('.pic-list li').hover(function(){
	$(this).find('.see-more').stop(true,false).animate({opacity: 1},100)}, function(){
		$(this).find('.see-more').stop(true,false).animate({opacity: 0},66)
	});
	$('#nav li a').hover(function(){
		$(this).stop(true,false).animate({height:50},200)}, function(){
		$(this).stop(true,false).animate({height:44},200)
		})
		
	$('#join a').hover(function(){
		$(this).stop(true,false).animate({height:76},200)}, function(){
		$(this).stop(true,false).animate({height:68},200)
		})
	
});

/*$('#click-here a').mouseover(function(){

	$('#bubble, #logo, #click-direction').hide();
	//$('#click-direction').css('left', "180px");
	$('#frame').show();
	$('#ask').stop().show().delay(110).animate({opacity:0.75},300);	

	});
	
	$('#click-here a').mouseout(function(){
	$('#bubble, #logo, #click-direction').show(80);
	$('#frame').hide();
	$('#ask').animate({opacity:0},10);
//	$('#click-direction').animate({'left' : "-=10px"}, 500);
	});
$("#click-here a").colorbox({inline:true, href:"#modal-pic"});
*/