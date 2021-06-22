<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<?php
$icons = [
    'dashboard' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/dashboard.svg" class="dblisticon">',
    'orders' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/orders.svg" class="dblisticon">',
    'edit-address' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/addresses.svg" class="dblisticon">',
    'edit-account' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/accountdetails.svg" class="dblisticon">',
    'pets' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/pets.svg" class="dblisticon">',
    'customer-logout' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/logout.svg" class="dblisticon">',
    '../wholesale-ordering/' => '<img src="https://steamlinedesign.com/HAR/wp-content/themes/twentytwenty/assets/images/logout.svg" class="dblisticon">'
];
?>
<nav class="woocommerce-MyAccount-navigation">
	<div class="dashboard_list">
	<ul class="nav nav-tabs">
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
				<a class="nav-link" href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"> <?php echo $icons[$endpoint]; ?><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
	</div>

</nav>
<?php do_action( 'woocommerce_after_account_navigation' ); ?>
