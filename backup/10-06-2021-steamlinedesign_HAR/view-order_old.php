<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>
<div class="ordercnt">
<div class="order_cntbxfirst">
<a href="https://steamlinedesign.com/HAR/my-account/orders/" class="orderbacklistbtn" id="change_url_unique">Back to list</a>
<?php
printf(
	/* translators: 1: order number 2: order date 3: order status */
	esc_html__( '%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
	'<h3><mark class="order-number">#' . $order->get_order_number() . '</mark></h3>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	'<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
);
?>
<?php if ( $notes ) : ?>
	<div class="orderfirstrowbx">
		<h2><?php esc_html_e( 'Order updates', 'woocommerce' ); ?></h2>
	</div>
	<div class="ordershtablebx"> 
		<ol class="woocommerce-OrderUpdates commentlist notes">
			<?php foreach ( $notes as $note ) : ?>
			<li class="woocommerce-OrderUpdate comment note">
				<div class="woocommerce-OrderUpdate-inner comment_container">
					<div class="woocommerce-OrderUpdate-text comment-text">
						<p class="woocommerce-OrderUpdate-meta meta"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
						<div class="woocommerce-OrderUpdate-description description">
							<?php echo wpautop( wptexturize( $note->comment_content ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</div>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
			</li>
			<?php endforeach; ?>
		</ol>
	</div><!--ordershtablebx-->
<?php endif; ?> 
</div><!--order_cntbxfirst-->
<div class="orderdetials_tablebx">
<?php do_action( 'woocommerce_view_order', $order_id );

 	$pet_animal_name = get_post_meta( $order_id, 'your_pet_or_animal_name', true );

   	$species =  get_post_meta( $order_id, 'Species', true );

   	$breed =  get_post_meta( $order_id, 'Breed', true );

   	$age =  get_post_meta( $order_id, 'age', true );

   	$diet_currently_being_fed =  get_post_meta( $order_id, 'diet_currently_being_fed', true );

   	$what_veg_drugs_are_currently_being_used =  get_post_meta( $order_id, 'what_veg_drugs_are_currently_being_used', true );

   	$vet_diagnosis =  get_post_meta( $order_id, 'vet_diagnosis', true );

   	$do_use_chemical_drugs =  get_post_meta( $order_id, 'do_use_chemical_drugs', true );

   	$which_of_our_hampl_remedies =  get_post_meta( $order_id, 'which_of_our_hampl_remedies', true );

   	$if_still_vaccinating =  get_post_meta( $order_id, 'if_still_vaccinating', true );

   	$describe_all_symptonms =  get_post_meta( $order_id, 'describe_all_symptonms', true );

   	?>

   	<div class="dashacc_listcnt_bx">

   	<?php

   	if($pet_animal_name)
   	{

		echo '<p><strong>'.__('Your Pet Or Animals Name').':</strong> <br/>' . $pet_animal_name . '</p>';
	}

	if($species)
	{
	
	  	echo '<p><strong>'.__('Species').':</strong> <br/>' . $species . '</p>';
	}
	if($breed)
	{

	  	echo '<p><strong>'.__('Breed').':</strong> <br/>' . $breed . '</p>';
	}
	if($age)
	{

	  	echo '<p><strong>'.__('Age (if known)').':</strong> <br/>' .$age . '</p>';
	}
	if($diet_currently_being_fed)
	{

	    echo '<p><strong>'.__('Diet currently being fed').':</strong> <br/>' . $diet_currently_being_fed . '</p>';
	}

	if($what_veg_drugs_are_currently_being_used)
	{

	    echo '<p><strong>'.__('What Vet Drugs are currently being used?').':</strong> <br/>' . $what_veg_drugs_are_currently_being_used . '</p>';
	}

	if($vet_diagnosis)
	{

	    echo '<p><strong>'.__('Vet Diagnosis (if known)').':</strong> <br/>' .$vet_diagnosis . '</p>';
	}

	if($do_use_chemical_drugs)
	{

	    echo '<p><strong>'.__('Do you use "chemical insecticide drugs" (heart worm, flea, worming etc), if so what ones?').':</strong> <br/>' . $do_use_chemical_drugs . '</p>';
	}

	if($which_of_our_hampl_remedies)
	{

	    echo '<p><strong>'.__('Which of our HAMPL remedies have you been using recently?').':</strong> <br/>' . $which_of_our_hampl_remedies . '</p>';
	}

	if($if_still_vaccinating)
	{

	    echo '<p><strong>'.__('If still vaccinating, how often does your pet get a injection?').':</strong> <br/>' . $if_still_vaccinating . '</p>';
	}

	if($describe_all_symptonms)
	{

	    echo '<p><strong>'.__('Describe ALL SYMPTOMS currently showing with your pet (IMPORTANT).').':</strong> <br/>' . $describe_all_symptonms . '</p>';
	}

 ?>
</div>
</div><!--orderdetials_tablebx-->
</div><!--ordercnt-->

<?php


?>

