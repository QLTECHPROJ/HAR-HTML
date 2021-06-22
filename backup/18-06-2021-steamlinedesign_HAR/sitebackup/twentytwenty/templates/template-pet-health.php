<?php

/**

 * Template Name: Pet Health Template

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */

get_header();

?>
<div class="inner_page">
	<section class="pethealth_cntsec">
		<div class="container">
	    	<h1 class="font_bold mb-lg-5 mb-md-4 mb-3"><?php echo get_the_title(); ?></h1>
	        <div class="common">

	            <?php the_content(); ?>

	        </div>
		</div>

	</section>
</div>
<?php

get_footer();

?>