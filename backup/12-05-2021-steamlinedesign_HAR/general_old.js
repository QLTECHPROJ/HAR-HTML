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
var $input = $("#txtAcrescimo");

// Colocar a 0 ao início
$input.val(1);

// Aumenta ou diminui o valor sendo 0 o mais baixo possível
$(".altera").click(function(){
    if ($(this).hasClass('acrescimo'))
        $input.val(parseInt($input.val())+1),
   		$(this).addClass('disable');
    else if ($input.val()>=1)
        $input.val(parseInt($input.val())-1),
    	 $(this).removeClass('disable');
    
     	
});


/********************* mobile-accordion ************************/
    

	$(".mobile-accordion .title span").click(function() {
        if ($(this).parent(".title").parent(".mobile-accordion").hasClass("in")) {
            $(this).parent(".title").parent(".mobile-accordion").children("ul").slideUp();
            $(this).parent(".title").parent(".mobile-accordion").children(".mobile-accordion-toggle").slideUp();
            $(".mobile-accordion").removeClass("in");
        } else {
            $(".mobile-accordion").children("ul").slideUp();
            $(".mobile-accordion").children(".mobile-accordion-toggle").slideUp();
            $(".mobile-accordion").removeClass("in");
            $(this).parent(".title").parent(".mobile-accordion").children("ul").slideDown();
            $(this).parent(".title").parent(".mobile-accordion").toggleClass("in");
            if ($(this).parent(".title").parent(".mobile-accordion").hasClass('mobile-toggle')) {
                $(this).parent(".title").parent(".mobile-accordion").children(".mobile-accordion-toggle").slideToggle();
            } else {
                $(".mobile-accordion-toggle").slideUp();
            }
        }
    });
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