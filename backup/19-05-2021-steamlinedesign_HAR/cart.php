<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<section class="inner_page cart_page">
	

<form class="woocommerce-cart-form__contents" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<!-- <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0"> -->
		<!-- include woocommerce-cart-form for the our html desgin -->
		<div class="shoppingcart_table ">
     <div class="container">
        <div class="table-responsive">
		 <table class="table table-bordered">
		<thead>
			<tr>
				<th></th>
				<th>Product</th>
                <th>Price</th>
                <th colspan="5">Quantity</th>
                <th>Total</th>
                <th>Remove</th>
				<!-- <th class="product-thumbnail">&nbsp;</th>
				<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
				<th class="product-remove">&nbsp;</th> -->
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr>

						

						<td><span class="shopingthumbimg">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
					</span>
						</td>

						<td class="shopcartcnttabbx">
							<span class="shopingtablecnt">
						<?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name',"<p>".$_product->get_name(), $cart_item, $cart_item_key."</p>") );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
					</span>
						</td>

						<td>
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>

						<td colspan="5" class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
						<?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
						} else {
							$product_quantity = woocommerce_quantity_input(
								array(
									'input_name'   => "cart[{$cart_item_key}][qty]",
									'input_value'  => $cart_item['quantity'],
									'max_value'    => $_product->get_max_purchase_quantity(),
									'min_value'    => '0',
									'product_name' => $_product->get_name(),
								),
								$_product,
								false
							);
						}

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
						</td>

						<td>
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
							?>
						</td>

						<td class="product-remove">
							<?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-trash"></i></a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
						</td>
					</tr>
					<?php
				}
			}
			?>
</tbody>
</table>
</div>
</div>
</div>
			<?php do_action( 'woocommerce_cart_contents' ); ?>

			

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="shopping_twocolbx">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-7 col-sm-12">
          <h5>Enter your coupon code if you have one.</h5>
          <div class="coupancodebx">
          	<div class="form-group coupantextbx">
							<input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> 
						</div>
						<div class="coupanbtn">
							<button type="submit" class="btn-main whitebtn" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>"><?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?></button>
						</div>
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div><!--coupancodebx-->
					<?php } ?>

					<div class="coupancodecnt">
            <ul class="coupancodelistcnt">
              <li>
                <span class="coupancodeicon"><i class="far fa-credit-card"></i></span>
                <h5>SAFE PAYMENT</h5>
                <p>We use Stripe to process payments. Stripe is certified as having me the most stringent level of certification available in the payments industry.</p>
              </li>
              <li>
                <span class="coupancodeicon"><i class="fa fa-truck"></i></span>
                <h5>DELIVERY</h5>
                <p>Our products are delivered online, this means that if your purchase a document you’ll have access to it almost instantly.</p>
              </li>
              <li>
                <span class="coupancodeicon"><i class="far fa-thumbs-up"></i></span>
                <h5>SATISFACTION GUARANTEED</h5>
                <p>If you’re not satisfied with your product then let us know and we’ll do our best to rectify it or refund you.</p>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12">
          <!-- <div class="shopping_subtotalbx">
              <div class="shoppingtotalbx">

              	<div class="shoppingcontinueshoppingbx"> -->
              		
              	 <!--  <button type="submit" class="button enable_btn" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>  -->

             <!--  </div>
              </div>
          </div> -->
          <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

		<div class="cart-collaterals">
			<?php
				/**
				 * Cart collaterals hook.
				 *
				 * @hooked woocommerce_cross_sell_display
				 * @hooked woocommerce_cart_totals - 10
				 */
				do_action( 'woocommerce_cart_collaterals' );

			?>

		</div>
		
			<!-- <button type="submit" class="btn-main update_cart_btn button" name="update_cart" id="enable_btn" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button> -->
		
      	</div>
					

					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
</section>


<?php do_action( 'woocommerce_after_cart' ); ?>

<script type="text/javascript">
  $(document).ready(function($) {

  	
  	$('.screen-reader-text').hide();
 
})
</script>

<!-- <script type="text/javascript">
  $(document).ready(function($) {
  $('.remove').on( "click", function() {

    	location.reload();
      
});
})
</script> -->
<script type="text/javascript">
  $(document).ready(function($) {

  	
  	$('#coupon_code').val('');
 
})
</script>
<!-- <script type="text/javascript">
	jQuery(document).ajaxComplete(function(event, xhr, settings) {
    if (settings.url === '/?wc-ajax=apply_coupon' || settings.url === '/?wc-ajax=remove_coupon') {
        location.reload();
    }
});
</script> -->