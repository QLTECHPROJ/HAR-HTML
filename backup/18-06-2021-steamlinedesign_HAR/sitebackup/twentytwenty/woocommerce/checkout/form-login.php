<?php
/**
 * Checkout login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	return;
}

?>
<div class="returfrommainbx">
<div class="woocommerce-form-login-toggle returningcustomer_bx">
	<i class="fa fa-sign-in-alt"></i><?php wc_print_notice( apply_filters( 'woocommerce_checkout_login_message', esc_html__( 'Returning customer?', 'woocommerce' ) ) . ' <a href="#" class="showlogin">' . esc_html__( 'Click here to login', 'woocommerce' ) . '</a>', 'notice' ); ?>
</div>
<div class="checkout_loginformbx">

<!-- <div class="checkout_loginformbxicon">
<span class="show-password-password"><i class="fa fa-eye check-eye" id="clickpassword"></i></span>
</div> -->
<?php

woocommerce_login_form(
	array(
		'message'  => esc_html__( 'If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.', 'woocommerce' ),
		'redirect' => wc_get_checkout_url(),
		'hidden'   => true,
	)
);
?>

</div>
</div>
<script type="text/javascript">
	

		$("#clickpassword").click(function(){

			//$("input[type=password]").addClass("check-eye-eye");
			if ( jQuery( this ).hasClass( "check-eye" ) ) {
			$("input[type=password]").attr("type","text");
			jQuery( this ).removeClass( "check-eye" );

		}
		else
		{
			//alert('hi');
			$("input[name=password]").attr("type","password");
			jQuery( this ).addClass( "check-eye" );
		}


});


</script>