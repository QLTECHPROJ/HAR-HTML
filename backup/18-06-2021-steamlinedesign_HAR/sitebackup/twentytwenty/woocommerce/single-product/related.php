<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<!-- <section class="related products"> -->

		<?php
		//$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		
		<?php woocommerce_product_loop_start(); ?>

			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					//wc_get_template_part( 'content', 'product' );

					/*echo "<pre>";
					print_r($post_object);*/
					/*$product_id = $post_object->ID;
					print_r($product_id);*/
					$product_id =  get_the_ID();
					$product = wc_get_product($product_id);
					

					$check_product = get_post_meta( $product_id, '_custom_product_text_field_yes_no', true );

					

					if($check_product!='no')
					{


					$url= wp_get_attachment_url( get_post_thumbnail_id($product_id) );
					//echo "<pre>";
					//print_r($product);
					?>
					<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="remediesboxcol">
				<a class="remediesimg" href="<?php echo get_post_permalink(); ?>" title="Show details for Watches">
					<img alt="Picture of Watches" src="<?php echo $url;?>" title="Show details for Watches" />
				</a>
				<div class="remediescntbx">

					<span class="star_reviewtxt">
						 <?php $average  =  $product->get_average_rating();
                      
                      if($average!=0)
                      {
                        echo wc_get_rating_html( $product->get_average_rating() );
                      }
                      else
                      {
                        ?>
                        <div class="star-rating">
                        </div>
                        <?php 
                      }
                   ?> 
				   <!--  <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i>
				    <i class="fas fa-star"></i> -->
				</span>
				<?php
				$contenttitle = mb_strimwidth(get_the_title(), 0, 60, '...');
				?>
				<a class="product-name" href="<?php echo get_post_permalink(); ?>"><?php echo $contenttitle;?></a>
				<span class="pricetxt"><!-- $ --><?php echo $product->get_price_html();?> <!-- AUD --></span>

				<?php
				if( $product->is_type('variable'))
				{
					?>
					<a href="<?php the_permalink() ?>" class="btn-main">View Product</a> 
					<?php
				}
				else
				{
					?>
					<!-- <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a> --> 
					<!-- <a href="<?php the_permalink() ?>" class="btn-main">View Product</a> --> 
					<a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a>
					<?php
				}
				?>
			</div>        
		</div>
	</div>  

			<?php } endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	<!-- </section> -->
	<?php
endif;

wp_reset_postdata();
