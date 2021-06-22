<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>
<?php
// echo "<pre>";
// print_r($current_user);

$uemail = $current_user->data->user_email;
$uname = $current_user->data->display_name;
$user_id = $current_user->data->ID;
$order_statuses = array('wc-on-hold', 'wc-processing', 'wc-completed');
$customer_user_id = get_current_user_id(); // current user ID here for example

// Getting current customer orders
$customer_orders = wc_get_orders( array(
    'meta_key' => '_customer_user',
    'meta_value' => $customer_user_id,
    'post_status' => $order_statuses,
    'numberposts' => 2
) ); 

$get_addresses = apply_filters(
	'woocommerce_my_account_get_addresses',
	array(
		'billing' => __( 'Billing address', 'woocommerce' ),
	),
	$customer_user_id
);
// echo   "<pre>";
// print_r($customer_orders[0]->data['billing']);
?>
<div>

  <div class="tab-content">

    <div id="dashboard" class="dastabbx tab-pane active">

      <div class="dashboard_tabcnt">

        <div class="row">
<p>
	<?php
	// printf(
	// 	/* translators: 1: user display name 2: logout url */
	// 	wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
	// 	'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
	// 	esc_url( wc_logout_url() )
	// );
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	//$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		//$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}
	printf(
		wp_kses( $dashboard_desc, $allowed_html ),
		esc_url( wc_get_endpoint_url( 'orders' ) ),
		esc_url( wc_get_endpoint_url( 'edit-address' ) ),
		esc_url( wc_get_endpoint_url( 'edit-account' ) )
	);

	$fname = $customer_orders[0]->data['billing']['first_name'];
	$lname = $customer_orders[0]->data['billing']['last_name'];
	$phnnumber = $customer_orders[0]->data['billing']['phone']
	?>
</p>
	<div class="col-lg-6 col-md-6 col-sm-12">
       <div class="dashboardtabbx">
          <!-- <span class="dbtabimg"><img src="images/clientimg1.jpg" alt=""></span> -->
          <div class="dashboardtabtxt">
            <h5><?php echo $fname.' '.$lname; ?></h5>
            <a href="mailto:<?php echo $uemail; ?>" title="<?php echo $uemail; ?>"><?php echo $uemail; ?></a>
            <a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-account', $uemail ) ); ?>" class="editemailadd"><?php echo $uemail ? esc_html__( 'Edit Account', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>

          </div>
        </div>
    </div>
	
	<div class="col-lg-6 col-md-6 col-sm-12">

        <div class="dashboardtabbx dbcnttxtalign">

           <div class="defaultbtn"><span class="default_title">Default</span></div>

         	<?php foreach ( $get_addresses as $name => $address_title ) : 
				$address = wc_get_account_formatted_address( $name );
				
			?>
			<address>
				<?php
					echo $address ? wp_kses_post( $address ) : esc_html_e( 'You have not set up this type of address yet.', 'woocommerce' );
				?>
				
			</address>

			<a href="<?php echo esc_url( wc_get_endpoint_url( 'edit-address', $name ) ); ?>" class="editemailadd"><?php echo $address ? esc_html__( 'Edit Address', 'woocommerce' ) : esc_html__( 'Add', 'woocommerce' ); ?></a>
		
		<?php endforeach; ?>
        </div><!--dashboardtabbx-->

      </div>


<!-- <div class="dashboardtable_cnt addtab_cntbx">
	<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table table-bordered"> -->
<div>&nbsp;</div>
<div class="col-lg-12 col-md-12 col-sm-12">

    <div class="dashboardtable">

      <h5>Recent Orders</h5>

      <div class="dashboardtable_cnt">

      	<?php
      	if(!empty($customer_orders))
      	{

      	?>

        <div class="table-responsive">

          <table class="table table-bordered">
		
			<thead>
				<tr>
					<th>NUMBER</th>
					<th>Date</th>
					<th>STATUS</th>
					<th>TOTAL</th>
					<th>Action</th>
				</tr>
			</thead>

			<tbody>
			
			<?php

			// Loop through each customer WC_Order objects

			foreach($customer_orders as $order ){

				// echo   "<pre>";
				// print_r($order);

				$order      = wc_get_order( $order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				$item_count = $order->get_item_count();
				$orderdate = $order->get_date_created()->date('F d, Y');

			    // Order ID (added WooCommerce 3+ compatibility)
			    $order_id = method_exists( $order, 'get_id' ) ? $order->get_id() : $order->id;
			  	$total = $order->get_formatted_order_total();
				$status = $order->data['status'];
				$merge_qty  = " for ".$item_count." items"

				
				?>
				<tr>
					<td><a href="https://steamlinedesign.com/HAR/my-account/view-order/<?php echo $order_id;?>"><span><?php echo '#'.$order_id;?></span></a></td>
					<td><?php echo $orderdate; ?></td>
					<td><?php echo $status;?></td>
					<td><?php echo $total.$merge_qty;?></td>
					<td><a href="https://steamlinedesign.com/HAR/my-account/view-order/<?php echo $order_id;?>">View</a></td>
				</tr>
			<?php
				

			}
			?>

			</tbody>
		  </table>
		</div>
		<?php
	}
	else
	{
		?>
	
	<p class="noorderdash">No Recent Order</p>
	<?php
	}
	?>
	  </div>
	</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
