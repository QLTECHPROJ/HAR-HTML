<?php

/**

 * Template Name: Home Therapy Instructions

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */

get_header();

?>
<section class="breadcrumb_sec">
    <div class="container">
        <ol class="breadcrumb" id="crumbs">
            <li><a href="https://steamlinedesign.com/HAR/"><i class="fas fa-home"></i>Home</a> </li>
            <li class="active">Home Therapy Instructions</li>
        </ol>
    </div>
</section>
<div class="inner_page hometherapy_instruction_page">
<section class="therapy_section_1">
  <div class="container">

        <h1 class="font_bold mb-3"><?php echo get_the_title(); ?></h1>

        <div class="tab_links thearapytab">
          <ul>
            <?php 
              $toptab = get_field('top_section_tab');
              $toptab1 = explode(',', $toptab);
              $i = 1;
              foreach ($toptab1 as $key => $value) {
              
             ?>
              
              <li><a href="javascript:;" class="nav-link" data-id="tab_<?php echo $i; ?>" ><?php echo $value; ?></a></li>
              
            <?php $i++; } ?>
          </ul>
        </div>

    </div>

</section>

<section class="therapy_section_2 tab-content">

    <div class="container">

        <div class="common">

            <?php echo get_field('top_content'); ?>

        </div>

        <div class="tab1 tab-pane" id="tab_1">

          <?php echo get_field('vitaminc_text'); ?>

        </div>
        <div class="tab2 tab-pane" id="tab_2">

          <?php echo get_field('slipery_elm'); ?>

        </div>
        <div class="tab3 tab-pane" id="tab_3">

          <?php echo get_field('herbal_mouth_rinse'); ?>

        </div>
        <div class="tab4 tab-pane" id="tab_4">

          <?php echo get_field('instructions_on_home_enema'); ?>

        </div>
        <div class="tab5 tab-pane" id="tab_5" > 

          <?php echo get_field('sub_q_instructions'); ?>

        </div>

    </div>

</section>
</div><!--hometherapy_instruction_page-->
<script type="text/javascript">

   
    /*$('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $(document).off("scroll");
        
         var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+1
        }, 1000, 'swing', function () { 
            window.location.hash = target;
           
        });*/
    
/*$('a[href^="#"').click(function() {
    $('html,body').animate({
        scrollTop: $('a[href^="#"').offset().top},
        '2000');
});*/
/*$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});*/
$('.thearapytab li a').on('click', function(e) {
	
 var href = $(this).attr('data-id'); 
  $('html, body').animate({
    scrollTop: $("#"+href).offset().top - $(".main-header").height() - $(".header_bottom").height() - 175
  }, 'slow');
});
  $('.thearapytab li a').click(function(){
    $('.thearapytab li a').removeClass("active");
    $(this).addClass("active");
});


</script>
<?php

get_footer();

?>