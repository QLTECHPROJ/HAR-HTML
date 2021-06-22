<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
?>
<div class="top_incoverdivspace">
<?php 
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<?php
	$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	if(!in_array($customer_role,$whole_array))
	{
		?>
	<p class="return-to-shop">
		<a class="btn-main wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
			?>
		</a>
	</p>
	<?php
	}
	else
	{
		?>
		<p class="return-to-shop">
		<a class="btn-main wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', 'https://steamlinedesign.com/HAR/wholesale-ordering/' ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to quick order', 'woocommerce' ) ) );
			?>
		</a>
	</p>
	<?php
	}
	?>
<?php endif; ?>
</div>
