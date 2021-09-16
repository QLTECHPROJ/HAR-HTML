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
?>
<div class="top_incoverdivspace">
	<?php

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
?>
	<a href="<?php echo get_permalink(984); ?>?checkout=true" class="btn-main registerbtn">Register Now</a>
	<?php
	return;
}

?>

<section class="inner_page checkout_page">
	
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
			<?php

			$user_id =  get_current_user_id();
	//echo "<pre>";
	//print_r($user_id);

	$whole_array = array('wholesale_customer','tag_20','tag_30','tag_40','STUDENT30','RESCUE50','RESCUE60','RESCUE70');

	$customer = new WC_Customer( $user_id );

	
	$customer_role = $customer->role;
	//echo $customer_role;

	if(!in_array($customer_role,$whole_array))
	{
		?>
		
			<h3 id="order_review_heading"><span class="billtitlenumber">3</span><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	<?php
	}
	else
	{
		?>

		<h3 id="order_review_heading"><span class="billtitlenumber">2</span><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	<?php
	}
	?>
			
			<?php do_action( 'woocommerce_checkout_order_review' ); ?>
			 
		</div>

		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>
		
		</div><!--row-->
	</div><!--checkout_maintwocol-->
</form>
</div>
</section><!--checoutpage-->

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<script type="text/javascript">
	$(document).ready(function(){

	var select_country	= $("#billing_country").val();



		 if(select_country=='KR')
		    {
		    	$('#koreashow').show();
		    }
		    else
		    {
		    	$('#koreashow').hide();
		    }
	});
</script>
<script type="text/javascript">
 
 
   $("#billing_country").on("change",function(){
   
    
    
    var select_country =  $(this).val();

    if(select_country=='KR')
    {
    	$('#koreashow').show();
    }
    else
    {
    	$('#koreashow').hide();
    }


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
</script>
<script type="text/javascript">
	$(document).ajaxComplete(function() {
$( document.body ).on( 'checkout_error', function() {
$("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
});
</script>