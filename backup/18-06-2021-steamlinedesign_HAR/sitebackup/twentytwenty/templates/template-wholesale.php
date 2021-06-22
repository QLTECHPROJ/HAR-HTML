<?php

/**

 * Template Name: Wholesale Template

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */

get_header();

?>

<!-- <?php

//echo do_shortcode('[ajax_posts]');

?> -->
<!-- For register -->

<!-- echo do_shortcode('[wwlc_registration_form]'); -->

<!-- For Login -->

<!-- echo do_shortcode('[wwlc_login_form]'); -->
<section class="inner_page wholsaleformpage">
	<div class="container">
		 <div class="loginregister_form wholsale_form">
	         <ul class="nav nav-tabs" role="tablist">
	          <li class="nav-item">
	            <a class="nav-link active" data-toggle="tab" href="#wholsale1">Login</a>
	          </li>
	          <!-- <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#wholsale2">Register</a>
	          </li> -->
	         </ul>
	         <div class="tab-content">
	          <div id="wholsale1" class="tab-pane active">
	           	<?php echo do_shortcode('[wwlc_login_form]'); ?>
	          </div>
	          <div id="wholsale2" class="tab-pane fade">
	          	<div class="row justify-content-center">
		          	<div class="col-lg-8 col-md-8 col-sm-12">
			          	<div class="regiseter_tabcntbx mt-3 mt-md-4 mt-lg-5">
			          		<h2>Apply for a Wholesale Account</h2>
			          		<p>HAMPL offers Wholesale Membership and the direct purchasing power of our HAMPL natural pet formulas to - <strong>pet shop stores, holistic practitioners, shelters, rescue groups, veterinarians and other animal organizations worldwide.</strong></p>
			          		<ol>
			          			<li>1. HAMPL Pet formulas wholesale discount are variable according to profession.</li>
			          			<li>2. The MINIMUM order is $200 AUD (ex GST) .</li>
			          			<li>3. International orders receive 50% shipping discount. Australia is free courier shipping.</li>
			          			<li>4. We can <strong>drop ship directly to the customer or shop</strong> at standard shipping fee (if that particular customer or shop has more than $200 AUD purchase, we then apply the discounted half cost for shipping to that one destination)</li>
			          		</ol>
			          		<h4>Requirements for Wholesale Membership</h4>
			          		<p>- Retailers MUST be in the pet/animal industry. <br> - Shelters, Rescue Organisations and Affiliated Animal Groups. <br> - No Marketplace Re-sellers (ie. Amazon, Walmart, Ebay, Etsy)</p>
			          		<p>→  <a href="https://steamlinedesign.com/HAR/wp-content/uploads/2021/05/HAMPL_Wholesale_Terms_Agreement.pdf" download><strong>Download the Wholesale Membership Terms & Agreement</strong></a><br>By applying for a wholesale membership, you agree to the terms and conditions (linked above).</p>
			          		<p>If you qualify, complete and submit the Wholesale Membership Application below. Our HAMPL Experience Team will contact you to confirm eligibility. Upon approval (1-2 business days), you will receive a welcome email and have immediate access to start placing orders.</p>
			          		<h4>Wholesale Membership Application</h4>
			           	</div><!--regiseter_tabcntbx-->
			        </div>
		        </div><!--row-->
	            <?php echo do_shortcode('[wwlc_registration_form]'); ?>
	          </div>
	         </div><!--tab-content-->
    	</div><!--wholsaleformpage-->
	</div><!--container-->
</section><!--wholsaleformpage--->

<?php

get_footer();

?>