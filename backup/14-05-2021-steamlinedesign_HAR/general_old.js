$(document).ready(function() {
/*banner slider*/
$('.hl-banner-slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay:false,
});
	
/*************** Sticky Header *****************/
   $(window).scroll(function()
{
	if ($(window).scrollTop() > 100)
	{
		$('header').addClass('sticky');
	}
	else
	{
		$('header').removeClass('sticky');
	}
});
/************ header search ******************/
	$(".search-btn").click(function(){
	    $(".search-box-main").fadeIn();
		$("body").addClass("popup");
	});
	  $(".search-close").click(function(){
	    $(".search-box-main").fadeOut();
		$("body").removeClass("popup");
	});  
$(document).ready(function ()
	{
		if ($(window).scrollTop() > 100)
			{
				$('.scroll-top').addClass('visible');
				$('header').addClass('sticky');
			}
		$(".scroll-top").click(function () {
			$('html, body').animate({
				scrollTop: 0
			}, 2000);
	});
}); 

$('.client_slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  dots: true,
  arrows:true,
  autoplay:true,
});

$('.latestnews_slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3,
  dots: true,
  autoplay:true,
  arrows:false,
  margin:15,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

/*********** inner page ********************/

$('.propopslider-for').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	autoplay:true,
	fade: true,
	asNavFor: '.propopslider-nav'
});
$('.propopslider-nav').slick({
	slidesToShow: 2,
	slidesToScroll: 1,
	autoplay:true,
	asNavFor: '.propopslider-for',
	dots: true,
	centerMode: false,
	focusOnSelect: true
});
/************ home page end *******************/
/*increment decrement js*/
/*var $input = $("#txtAcrescimo");


$input.val(1);

$(".altera").click(function(){
    if ($(this).hasClass('acrescimo')){
        $input.val(parseInt($input.val())+1);

    }
    else {
    	console.log($input.val());
    	var upval= parseInt($input.val())+1;
    	if (upval > 1){
    		$input.val(parseInt($input.val())-1);
    		$(this).prop('disabled', false);
    	}
    	else {
    		$(this).addClass('dec');
    		$(this).prop('disabled', true);

    	}
    }
});*/


$(".acrescimo").click(function(e){
	 e.preventDefault();
	var $this = $(this);
  var $input = $this.siblings('input');
  var value = parseInt($input.val());
  if (value < 1000) {
    value = value + 1;
  } else {
    value = 1;
  }
  $input.val(value);
  checkAndDisable();
});


$(".decrescimo").click(function(e) {
  e.preventDefault();
  var $this = $(this);
  var $input = $this.siblings('input');
  var value = parseInt($input.val());
  if (value > 1) {
    value = value - 1;
    $(this).removeAttr('disabled');
  } else {
    value = 0;
    $(this).attr('disabled', true);
  }
  $input.val(value);
  checkAndDisable();
});

$(document).ready(function() {
  checkAndDisable();
});

$("#inputField").on('change', function(){
  if($(this).val() <= 0)
    $(this).val(0);
  checkAndDisable();
});

function checkAndDisable() {
  $(".decrescimo").removeAttr('disabled');
  if ($("#txtAcrescimo").val() == 0) {
    $(".decrescimo").attr('disabled', true);
  }
}



	/************* Scroll Top *************/
	$(window).scroll(function ()
	{
		if ($(window).scrollTop() > 100)
		{
			$('.scroll-top').addClass('visible');
			$('header').addClass('sticky');
		} else {
			$('.scroll-top').removeClass('visible');
			$('header').removeClass('sticky');
		}
	});
	
});
/*product quantity*/
$(function(){
  
  $('<span class="add" uk-icon="plus">+</span>').insertAfter('.product-quantity input');
  $('<span class="sub" uk-icon="minus">-</span>').insertBefore('.product-quantity input'); 
  
  
  $('.add').click(function () {		
		var selectedInput = $(this).prev('input');		
			if (selectedInput.val() < 10) {		
        selectedInput[0].stepUp(1);
			 }	
	});
  
  $('.sub').click(function () {		
		var selectedInput = $(this).next('input');		
			if (selectedInput.val() > 0) {
        selectedInput[0].stepDown(1);
			 }	
	});
  
  
});