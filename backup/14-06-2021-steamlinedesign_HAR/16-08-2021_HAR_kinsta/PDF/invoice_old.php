<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<?php do_action( 'wpo_wcpdf_before_document', $this->type, $this->order ); ?>

<?php

//echo "<pre>";
//print_r($order['billing']['first_name']);

//exit();
?>
<section class="invoiceprinter_sec inner_page">
<h2 class="maintitle">Invoice/Packing Slip For INV: <?php $this->order_number();?></h2>

<div class="invoice_topaddsec">
	<div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th >Customer Order</th>
          <th >Shipping Address</th> 
          <th>order details</th>              
				 </tr>

      </thead>
			<tbody>
      	<tr>
        	<td>
        		<p><?php $this->billing_address(); ?></p>
          </td>
          <td>
           <p><?php $this->shipping_address(); ?></p>
          </td>
          <td class="order-data">
					
						<?php do_action( 'wpo_wcpdf_before_order_data', $this->type, $this->order ); ?>
						<?php if ( isset($this->settings['display_number']) ) { ?>
						
							<p><span><?php _e( 'Invoice Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></span>
							<?php $this->invoice_number(); ?></p>
						
						<?php } ?>
						<?php if ( isset($this->settings['display_date']) ) { ?>
						
							<p><span><?php _e( 'Invoice Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></span>
							<?php $this->invoice_date(); ?></p>
						
						<?php } ?>
						<p>
							<span><?php _e( 'Order Number:', 'woocommerce-pdf-invoices-packing-slips' ); ?></span>
							<?php $this->order_number(); ?>
						</p>
						
						<p>
							<span><?php _e( 'Order Date:', 'woocommerce-pdf-invoices-packing-slips' ); ?></span>
							<?php $this->order_date(); ?>
						</p>
						
						<p>
							<span><?php _e( 'Payment Method:', 'woocommerce-pdf-invoices-packing-slips' ); ?></span>
							<?php $this->payment_method(); ?>
							</p>
						
						<?php do_action( 'wpo_wcpdf_after_order_data', $this->type, $this->order ); ?>
					
				</td>
        </tr>
      </tbody>
    </table>
  </div><!--table-responsive-->
</div><!--invoice_topaddsec-->


<?php do_action( 'wpo_wcpdf_after_document_label', $this->type, $this->order ); ?>
<li>made by<span></span></li>
	<li>checked by<span></span></li>

<?php do_action( 'wpo_wcpdf_before_customer_notes', $this->type, $this->order ); ?>
<div class="customer-notes">
	<?php if ( $this->get_shipping_notes() ) : ?>
		<h3><?php _e( 'Order Notes', 'woocommerce-pdf-invoices-packing-slips' ); ?></h3>
		<?php $this->shipping_notes(); ?>
	<?php endif; ?>
</div>
<?php do_action( 'wpo_wcpdf_after_customer_notes', $this->type, $this->order ); ?>


<?php do_action( 'wpo_wcpdf_before_order_details', $this->type, $this->order ); ?>
<div class="produc_invo_qty_sec">
	<div class="table-responsive">
		<table class="order-details">
			<thead>
				<tr>
					<th class="quantity"><?php _e('Qty', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
					<th class="product_sku">SKU</th>
					<th class="product"><?php _e('Product', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>					
					<th class="price"><?php _e('Price', 'woocommerce-pdf-invoices-packing-slips' ); ?></th>
				</tr>
			</thead>	
			<tbody>
				<?php $items = $this->get_order_items(); if( sizeof( $items ) > 0 ) : foreach( $items as $item_id => $item ) : ?>
				<tr class="<?php echo apply_filters( 'wpo_wcpdf_item_row_class', $item_id, $this->type, $this->order, $item_id ); ?>">
					<td class="quantity"><?php echo $item['quantity']; ?></td>
					<td class="product_sku"><?php if( !empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="sku"><?php echo $item['sku']; ?></dd><?php endif; ?></td>	
					<td class="product ">
						<?php $description_label = __( 'Description', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
						<span class="item-name"><?php echo $item['name']; ?></span>
						<?php do_action( 'wpo_wcpdf_before_item_meta', $this->type, $item, $this->order  ); ?>
						<span class="item-meta"><?php echo $item['meta']; ?></span>
						 <dl class="meta">
							<!-- <?php $description_label = __( 'SKU', 'woocommerce-pdf-invoices-packing-slips' ); // registering alternate label translation ?>
							<?php if( !empty( $item['sku'] ) ) : ?><dt class="sku"><?php _e( 'SKU:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="sku"><?php echo $item['sku']; ?></dd><?php endif; ?> -->
							<!-- <?php if( !empty( $item['weight'] ) ) : ?><dt class="weight"><?php _e( 'Weight:', 'woocommerce-pdf-invoices-packing-slips' ); ?></dt><dd class="weight"><?php echo $item['weight']; ?><?php echo get_option('woocommerce_weight_unit'); ?></dd><?php endif; ?> -->
						</dl> 
						<?php do_action( 'wpo_wcpdf_after_item_meta', $this->type, $item, $this->order  ); ?>
					</td>				
					<td class="price"><?php echo $item['order_price']; ?></td>
				</tr>
				<?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
</div>
<div class="paymentshippingdeails_invo_sec">
	<h2>Payment & shipping Details</h2>
	<div class="table-responsive">
	    <table class="table table-bordered">
	      
	      <tfoot>
	         <?php foreach( $this->get_woocommerce_totals() as $key => $total ) : ?>
				<tr class="<?php echo $key; ?>">
					<th class="description"><?php echo $total['label']; ?></th>
					<td class="price"><span class="totals-price"><?php echo $total['value']; ?></span></td>
				</tr>
				<?php endforeach; ?>
	      </tfoot>
	    </table>
</div><!--paymentshippingdeails_invo_sec-->
<div class="bottom-spacer"></div>

<?php do_action( 'wpo_wcpdf_after_order_details', $this->type, $this->order ); ?>


<div id="footer">
	<?php do_action( 'wpo_wcpdf_after_document', $this->type, $this->order ); ?>
<?php echo "if you have any questions, please send an email to: "?><a href="mailto:support@hampl.com.au">support@hampl.com.au</a>
<ul class="mad_checkby_box">
	<li>made by<span></span></li>
	<li>checked by<span></span></li>
</ul><!--mad_checkby_box-->
</div><!-- #letter-footer -->

</section>