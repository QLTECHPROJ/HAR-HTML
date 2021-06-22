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
<div class="inner_page hometherapy_instruction_page">
<section class="therapy_section_1">
  <div class="container">

        <h1 class="font_bold mb-3"><?php echo get_the_title(); ?></h1>

        <div class="tab_links">
          <ul>
            <?php 
              $toptab = get_field('top_section_tab');
              $toptab1 = explode(',', $toptab);
              $i = 1;
              foreach ($toptab1 as $key => $value) {
              
             ?>
              
              <li><a href="#tab_<?php echo $i; ?>" id="tablink<?php echo $i; ?>" data-id="tablink1" data-toggle="tab" ><?php echo $value; ?></a></li>
              
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
        <div class="tab5 tab-pane" id="tab_5">

          <?php echo get_field('sub_q_instructions'); ?>

        </div>

    </div>

</section>
</div><!--hometherapy_instruction_page-->
<script type="text/javascript">
$('.thearapytab ul li a').click(function(){
  $('.thearapytab ul li a.active').removeClass('active');
  $('.thearapytabul li a').addClass('active');
});
</script>
<?php

get_footer();

?>