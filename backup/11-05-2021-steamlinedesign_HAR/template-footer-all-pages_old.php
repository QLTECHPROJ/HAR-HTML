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
<section class="inner_page">

    <div class="container">

        <h1 class="font_bold mb-3"><?php echo get_the_title(); ?></h1>

    </div>

</section>

<section class="inner_page">

    <div class="container">

        <div class="common">

            <?php the_content(); ?>

        </div>

    </div>

</section>

<?php

get_footer();

?>