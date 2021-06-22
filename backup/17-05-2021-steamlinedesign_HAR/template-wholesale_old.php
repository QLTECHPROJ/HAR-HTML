<?php

/**

 * Template Name: Wholesale Template

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */

get_header();

?>

<!-- <?php

//echo do_shortcode('[ajax_posts]');

?> -->
<!-- For register -->

<!-- echo do_shortcode('[wwlc_registration_form]'); -->

<!-- For Login -->

<!-- echo do_shortcode('[wwlc_login_form]'); -->
<section class="inner_page wholsaleformpage">
	<div class="container">
		 <div class="loginregister_form wholsale_form">
	         <ul class="nav nav-tabs" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" data-toggle="tab" href="#wholsale1">Login</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#wholsale2">Register</a>
	          </li>
	         </ul>
	         <div class="tab-content">
	          <div id="wholsale1" class="container tab-pane active">
	           	<?php echo do_shortcode('[wwlc_login_form]'); ?>
	          </div>
	          <div id="wholsale2" class="container tab-pane fade">
	            <?php echo do_shortcode('[wwlc_registration_form]'); ?>
	          </div>
	         </div><!--tab-content-->
    	</div><!--wholsaleformpage-->
	</div><!--container-->
</section><!--wholsaleformpage--->

<?php

get_footer();

?>