<?php

/**

 * Template Name: Footer All Page Template

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */

get_header();

?>
<!--<section class="inner_page">

    <div class="container">

        <h1 class="font_bold mb-3"><?php echo get_the_title(); ?></h1>

    </div>

</section>-->
<?php 

$url =  $_SERVER['REQUEST_URI'];

$sepearte = explode('/', $url);
//echo "<pre>";
//print_r($sepearte);

$value = ucfirst($sepearte['2']);
$replace = str_replace('-', ' ', $value);
//echo "<pre>";
//print_r($replace);

?>
<section class="breadcrumb_sec">
    <div class="container">
        <ol class="breadcrumb" id="crumbs">
          <li><a href="https://steamlinedesign.com/HAR/"><i class="fas fa-home"></i>Home</a> </li>
          <li class="active"><?php echo $replace;?></li>
          
        </ol>
    </div>
</section>

<section class="inner_page">

    <div class="container">
    	<div class="commontitlepagebox mb-lg-5 mb-md-4 mb-2">
    		 <h1 class="font_bold m-0"><?php echo get_the_title(); ?></h1>
    	</div>
        <div class="common">

            <?php the_content(); ?>

        </div>

    </div>

</section>

<?php

get_footer();

?>