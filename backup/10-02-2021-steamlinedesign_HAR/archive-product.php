<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<section class="inner_page allremediespage">
	<div class="container">
		<div class="allremedies_titletxt">
			<h2><?php woocommerce_page_title(); ?></h2>
		</div>
<!-- <header class="woocommerce-products-header">

	<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>

	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header> -->
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
}

	?>
	<div class="remediestwocolsec">
        	<div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">
                   <div class="row">
                   	<?php
 $args = array( 'post_type' => 'product', 'posts_per_page' => 99, 'orderby' => 'ASC' );

    $loop = new WP_Query( $args );

if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
/*echo "<pre>";
print_r($product);*/

	?>
		<div class="col-lg-4 col-md-4 col-sm-6">
	        <div class="remediesboxcol">
	           <div class="remediesimg">
	           	<img src='<?php echo wp_get_attachment_url($product->image_id);?>' alt="">
	           	 <a href="#." class="btn-main whitebtn border-whiter remedipopbtn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i>Quick View</a>
	           </div>
	           <div class="remediescntbx">
                <span class="star_reviewtxt">
                	 <?php $starNumber =  $product->get_average_rating();?> 
                	 <!-- <?php
				    for($x=1;$x<=$starNumber;$x++) {
				        echo '<img src="" />';
				    }
				    if (strpos($starNumber,'.')) {
				        echo '<img src="path/to/half/star.png" />';
				        $x++;
				    }
				    while ($x<=5) {
				        echo '<img src="path/to/blank/star.png" />';
				        $x++;
				    }
				?> -->
                	<i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </span>
                <p><a href="<?php the_permalink() ?>"><?php echo the_title();?></a></p>
                <span class="pricetxt">$<?php echo $product->get_price();?> AUD</span>
                <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a> 
	                                     <!-- <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
	     <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>">
	     <button type="submit" class="btn-main"><?php echo $product->single_add_to_cart_text(); ?></button>
	</form>  -->
	        </div>
	        <div class="modal fade remediesmodel" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <button type="button" class="btn btn-close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-lg-4 col-md-4 col-sm-6">
                            <div id="custCarousel" class="quickmodelsliderbx carousel slide" data-ride="carousel" align="center">
                              <div class="carousel-inner">
                                <div class="carousel-item active"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/product_img1.jpg" alt=""></div>
                                <div class="carousel-item"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product_img2.jpg" alt=""> </div>
                                <div class="carousel-item"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product_img3.jpg" alt=""> </div>
                    
                              </div> <!-- Left right --> 
                              <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> 
                                <span class="carousel-control-prev-icon"></span> 
                              </a> 
                              <a class="carousel-control-next" href="#custCarousel" data-slide="next"> 
                                <span class="carousel-control-next-icon"></span> 
                              </a> <!-- Thumbnails -->
                              <ol class="carousel-indicators list-inline">
                                  <li class="list-inline-item active"><a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product_img_thumb1.jpg" class="img-fluid"> </a> </li>
                                  <li class="list-inline-item"><a id="carousel-selector-1" data-slide-to="1" data-target="#custCarousel"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product_img_thumb1.jpg" class="img-fluid"> </a> </li>
                                  <li class="list-inline-item"> <a id="carousel-selector-2" data-slide-to="2" data-target="#custCarousel"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product_img_thumb1.jpg" class="img-fluid"> </a> </li>
                                  
                              </ol>
                              
                            </div><!--quickmodelsliderbx-->
                          </div>
                          <div class="col-lg-8 col-md-8 col-sm-6">
                              <div class="quickmodelcnt">
                                <h3 class="mb-15">AN001 Behaviour - Urine spraying inside from stressful environment.</h3>
                                <div>Code: AN001
                                    <div class="starquickbx"><span class="star_reviewtxt">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i> 
                                  </span>3 reviews</div>
                                </div>
                                <span class="remediespripopup ptb-20">
                                    Price: <span>$30.00 AUD</span>
                                </span>
                                <p>Cat do stress from any type of new changes. Cats can react to a new cat in their territory. Sensitive and timid cats most often...</p>
                                <div class="remiepopanimalinfobx">
                                  <h5>Animal Information</h5>
                                  <p>If you select “yes” to answer the below questionnaire, our practitioners will check with your selected remedies to your pet's ailments / diagnosis.</p>
                                  <div class="radio_bxmain">
                                    <label class="radiobx yesradiobtn">yes
                                      <input type="radio" id="chkYes" name="chkPinNo">
                                      <span class="checkmark"></span>
                                    </label>
                                    <label class="radiobx">no
                                      <input type="radio" id="chkNo" name="chkPinNo">
                                      <span class="checkmark"></span>
                                    </label>
                                  </div>
                                  <div class="radioclickopenformbx remediespopyes" id="dvPinNo">
                                    <form class="contact-form">
                                      <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Your Pet or Animals Name</label>
                                            <input type="text" value="" class="form-control">
                                            <span class="radioyesformsubtitle">Ex: "Felix"</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Species</label>
                                            <input type="text" value="" class="form-control">
                                            <span class="radioyesformsubtitle">Ex: Dog, Cat, Horse, Rabbit, Etc.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group addressbx">
                                            <label>Breed</label>
                                            <input type="text" value="" class="form-control">
                                            <span class="radioyesformsubtitle">Ex: Husky, Sheppard, Poodle, Etc.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Age (if known)</label>
                                            <input type="text" value="" class="form-control">
                                            <span class="radioyesformsubtitle">Ex: Put Your Pet's Age Or When They Were Born.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Diet currently being fed.</label>
                                            <textarea rows="3"></textarea>
                                            <span class="radioyesformsubtitle">What Does Your Pet Typically Eat? Include As Much Detail As Possible.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>What Vet Drugs are currently being used?</label>
                                            <textarea rows="3"></textarea>
                                            <span class="radioyesformsubtitle">List Any Drugs/Medication That Your Pet Is Currently Using.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Vet Diagnosis (if known)</label>
                                            <textarea rows="3"></textarea>
                                            <span class="radioyesformsubtitle">If A Vet Has Told You What's Wrong With Your Pet, Please Include Those Details Here.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Do you use "chemical insecticide drugs" (heart worm, flea, worming etc), if so what ones?</label>
                                            <textarea rows="3"></textarea>
                                            <span class="radioyesformsubtitle">If Yes, Please Let Us Know Which Ones.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Which of our HAMPL remedies have you been using recently?</label>
                                            <textarea rows="3"></textarea>
                                            <span class="radioyesformsubtitle">List The Other HAMPL Remedies You've Used With This Animal.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>If still vaccinating, how often does your pet get a injection?</label>
                                            <input type="text" value="" class="form-control">
                                            <span class="radioyesformsubtitle">If Still Doing This, Otherwise Leave Blank.</span>
                                          </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                          <div class="form-group">
                                            <label>Describe ALL SYMPTOMS currently showing with your pet (IMPORTANT).</label>
                                            <textarea rows="3"></textarea>
                                            <span class="radioyesformsubtitle">Please Be As Detailed As Possible.</span>
                                          </div>
                                        </div>
                                      </div><!--row-->
                                    </form>
                                  </div><!--radioclickopenformbx-->
                                </div><!--remiepopanimalinfobx-->
                                <div class="quntysize_bx">
                                  <div class="row">
                                    <div class="col-lg-5 col-md-6">
                                      <div class="quantitiebox">
                                        <span>Quantity</span>
                                          <div class="qtnbx">
                                            <input type="text" id="txtAcrescimo" class="form-control">
                                              <button type="button" class="altera acrescimo">+</button>
                                              <button type="button" class="altera decrescimo">-</button>
                                          </div>
                                      </div><!--quantitiebox-->
                                    </div>
                                    <div class="col-lg-7 col-md-6">
                                      <div class="qualitysizebx">
                                        <span>Size:</span>
                                          <div class="qulisizeselectbx select_box">
                                            <span class="select_arrow"></span>
                                              <select class="form-control">
                                                <option value="Select size">Select size</option>
                                                  <option value="0-9">0-9</option>
                                                  <option value="10-20">10-20</option>
                                                  <option value="30-40">20-40</option>
                                                  <option value="41-50">41-50</option>
                                              </select>
                                          </div>
                                      </div><!--qualitysizebx-->
                                    </div>
                                  </div>
                                </div><!--quntysize_bx-->
                                <div class="quickbtnbx">
                                  <a href="#." class="btn-main">ADD TO CART</a>
                                  <a href="#." class="btn-main whitebtn">View Full Details</a>
                                </div><!--quickbtnbx-->
                            </div><!--quickmodelcnt-->
                          </div>
                        </div><!--row-->
                      </div><!--modal-body-->
                    </div><!--modal-content-->
                  </div>
                </div>
	   </div>
	</div>


<?php
endwhile;
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}
?>
</div>
</div>
</div>
</div>
</div>
</section>
<?php

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
