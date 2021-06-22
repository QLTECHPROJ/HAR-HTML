<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
?>
	<a href="https://steamlinedesign.com/HAR/my-account/" class="btn-main registerbtn">Register Now</a>
	<?php
	return;
}

?>


<div class="container">
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
	<div class="checkout_maintwocol">
	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
		<div class="row">
			<div class="col-lg-8 col-md-7 col-sm-12">
				<div class="col2-set" id="customer_details">
					<div class="row">
						<div class="col-12">
							<div class="billdetails_firstbx">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
							</div>
						</div>

						<div class="col-12">
							<div class="billdetails_thirdbx">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

		<?php endif; ?>
		<div class="col-lg-4 col-md-5 col-sm-12">
		<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
		
			<h3 id="order_review_heading"><span class="billtitlenumber">2</span><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
			
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			 
		</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>
		
		</div><!--row-->
	</div><!--checkout_maintwocol-->
</form>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>


<script type="text/javascript">
 $(document).ready(function(){
 
   $("#billing_country").on("change",function(){
   
    
    


    /*var selct_count =  $(this).val();
    setTimeout(function () {
    location.reload();
    }, 8000);*/


   


    /*if(selct_count!='')
    {

     $.ajax({
                type: "POST",
                url: "/HAR/wp-admin/admin-ajax.php",
                dataType:"json",
                data: { 
                    action: 'QuadLayers_apply_coupon_cart_values',
                    selct_count: selct_count,
                },
                cache: false,
                success: function(data){   
                alert(data);                 
                    if(data==''){
                       //jQuery('#ajax_result').hide();  
                       //alert('blank');                      
                    }
                    else{
                      //alert(data.price);

                                          
                    }
                }
        });
    }*/
});
    });
</script>
