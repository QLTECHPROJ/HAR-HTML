<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<section class="inner_page allremediespage">
	<div class="container">
		<div class="allremedies_titletxt">
			<h2><?php woocommerce_page_title(); ?></h2>
		</div>
<!-- <header class="woocommerce-products-header">

	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header> -->
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
}

	?>
	<div class="remediestwocolsec">
        	<div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">
                   <div class="row">
                   	<?php
 $args = array( 'post_type' => 'product', 'posts_per_page' => 99, 'orderby' => 'ASC' );

    $loop = new WP_Query( $args );

if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
/*echo "<pre>";
print_r($product);*/

	?>
	
                   		<div class="col-lg-4 col-md-4 col-sm-6">
                        	<div class="remediesboxcol">
                                <div class="remediesimg"><img src='<?php echo wp_get_attachment_url($product->image_id);?>' alt=""></div>
                                <div class="remediescntbx">
                                    <span class="star_reviewtxt">
                                    	 <?php $starNumber =  $product->get_average_rating();?> 
                                    	 <!-- <?php
									    for($x=1;$x<=$starNumber;$x++) {
									        echo '<img src="" />';
									    }
									    if (strpos($starNumber,'.')) {
									        echo '<img src="path/to/half/star.png" />';
									        $x++;
									    }
									    while ($x<=5) {
									        echo '<img src="path/to/blank/star.png" />';
									        $x++;
									    }
									?> -->
                                    	<i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <p><a href="<?php the_permalink() ?>"><?php echo the_title();?></a></p>
                                    <span class="pricetxt">$<?php echo $product->get_price();?> AUD</span>
                                    <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a> 
                                     <!-- <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
     <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>">
     <button type="submit" class="btn-main"><?php echo $product->single_add_to_cart_text(); ?></button>
</form>  -->
                                </div>
                           </div>
                   		</div>


<?php
endwhile;
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>
</div>
</div>
</div>
</div>
</div>
</section>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
