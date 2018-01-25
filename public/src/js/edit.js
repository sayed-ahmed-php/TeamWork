/*global $, matchMedia */

$(document).ready(function () {
	"use strict";

	
//	index >> nav
	$(window).scroll(function () {
		if (matchMedia("(min-width: 768px)").matches) {
  // the viewport is at least 900 pixels wide

    //After scrolling 100px from the top...
    
		   
			if ($(window).scrollTop() >= 100) {
				$("#nav-index").css({'transition' : 'all .3s ease-in-out', "background" : "#FFF", "border-bottom" : "2px solid #ececec"});
				$(' #nav-index a , #nav-index .fa').css("color", "#000");

			//Otherwise remove inline styles and thereby revert to original stying
			
			} else {
				$(" #nav-index").css({"background" : "transparent", "borderColor" : "transparent"});
				$(' #nav-index a , #nav-index .fa').css("color", "#FFF");

			}
	
		}
	
	});
	
//	index carsouel
	$('.carousel').carousel({
       
		interval: 5000
	});
    

	
//	index >> field categories 
	$('.field-container').eq(0).hover(function () {
		$('.field-back').eq(0).fadeIn("fast", function () { $('.field-front').eq(0).fadeOut("fast"); });
	}, function () { $('.field-back').eq(0).hide("fast", function () { $('.field-front').eq(0).fadeIn("fast"); }); });
	
	$('.field-container').eq(1).hover(function () {
		$('.field-back').eq(1).fadeIn("fast", function () { $('.field-front').eq(1).fadeOut("fast"); });
	}, function () { $('.field-back').eq(1).hide("fast", function () { $('.field-front').eq(1).fadeIn("fast"); }); });
	
	$('.field-container').eq(2).hover(function () {
		$('.field-back').eq(2).fadeIn("fast", function () { $('.field-front').eq(2).fadeOut("fast"); });
	}, function () { $('.field-back').eq(2).hide("fast", function () { $('.field-front').eq(2).fadeIn("fast"); }); });
	
	$('.field-container').eq(3).hover(function () {
		$('.field-back').eq(3).fadeIn("fast", function () { $('.field-front').eq(3).fadeOut("fast"); });
	}, function () { $('.field-back').eq(3).hide("fast", function () { $('.field-front').eq(3).fadeIn("fast"); }); });
	
	$('.field-container').eq(3).hover(function () {
		$('.field-back').eq(3).fadeIn("fast", function () { $('.field-front').eq(3).fadeOut("fast"); });
	}, function () { $('.field-back').eq(3).hide("fast", function () { $('.field-front').eq(3).fadeIn("fast"); }); });
	
	$('.field-container').eq(4).hover(function () {
		$('.field-back').eq(4).fadeIn("fast", function () { $('.field-front').eq(4).fadeOut("fast"); });
	}, function () { $('.field-back').eq(4).hide("fast", function () { $('.field-front').eq(4).fadeIn("fast"); }); });
	
	$('.field-container').eq(5).hover(function () {
		$('.field-back').eq(5).fadeIn("fast", function () { $('.field-front').eq(5).fadeOut("fast"); });
	}, function () { $('.field-back').eq(5).hide("fast", function () { $('.field-front').eq(5).fadeIn("fast"); }); });
	
	$('.field-container').eq(6).hover(function () {
		$('.field-back').eq(6).fadeIn("fast", function () { $('.field-front').eq(6).fadeOut("fast"); });
	}, function () { $('.field-back').eq(6).hide("fast", function () { $('.field-front').eq(6).fadeIn("fast"); }); });
	
	$('.field-container').eq(7).hover(function () {
		$('.field-back').eq(7).fadeIn("fast", function () { $('.field-front').eq(7).fadeOut("fast"); });
	}, function () { $('.field-back').eq(7).hide("fast", function () { $('.field-front').eq(7).fadeIn("fast"); }); });
	
	$('.field-container').eq(8).hover(function () {
		$('.field-back').eq(8).fadeIn("fast", function () { $('.field-front').eq(8).fadeOut("fast"); });
	}, function () { $('.field-back').eq(8).hide("fast", function () { $('.field-front').eq(8).fadeIn("fast"); }); });
	
	
	
	
	//profile >> info
	
	if ($(".img-profile").find('img').length > 0) {
		$('.img-profile').hover(function () { $('.btn-edit-img').show(); }, function () { $('.btn-edit-img').hide(); });

		
	} else {
		$('.btn-edit-img').css({"top" : "0", "right" : "-56px"});
		
	}
		


	$('.info > ul > li > h4').hover(function () { $(this).css({"textDecoration" : "underline", "cursor" : "pointer" }); }, function () {$(this).css("textDecoration", "none"); });
	
	$('.jop , .info > ul > li > p  ').hover(function () {$(this).css({"textDecoration" : "underline", "cursor" : "pointer" }); }, function () {$(this).css("textDecoration", "none"); });
	
	$('.img-profile').hover(function () { $('.btn-edit-img').show(); }, function () { $('.btn-edit-img').hide(); });
	$(".Name").css("height", "30px");
	$('.Name').hover(function () { $('.btn-editName ').show(); }, function () {$('.btn-editName ').hide(); });
	
	
	
//	profile  >> portfolio
//	$('.portfolio').hover(function() { $('.btn-port-add').show(); } , function () {$('.btn-port-add').hide(); });
	
	$('.works').eq(0).hover(function () { $('.work-edit').eq(0).show(); }, function () { $('.work-edit').eq(0).hide(); });
	$('.works').eq(1).hover(function () { $('.work-edit').eq(1).show(); }, function () { $('.work-edit').eq(1).hide(); });
	$('.works').eq(2).hover(function () { $('.work-edit').eq(2).show(); }, function () { $('.work-edit').eq(2).hide(); });
	$('.works').eq(3).hover(function () { $('.work-edit').eq(3).show(); }, function () { $('.work-edit').eq(3).hide(); });
	
	
	
	// skills 
	
	$('.skills > li > span').hover(function () { $(this).css({"textDecoration" : "underline", "cursor" : "pointer", "background" : "gray", "color" : "#FFF"}); }, function () { $(this).css("textDecoration", "none"); });
	
	
	
	//page setting >aside 
	
	$('.links > li').click(function () {
		
		$(this).addClass('active').siblings().removeClass('active');
		
	});
	
	
	// page group
	
	$('.write-post > textarea').focus(function () {
		$(this).css('min-height', '120px');
	});
	
	$('.write-post > textarea').focusout(function () {
		$(this).css('min-height', '54px');
	});
	
	
});