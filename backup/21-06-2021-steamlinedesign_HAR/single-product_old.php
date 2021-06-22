<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

get_header( 'shop' ); ?>

<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action( 'woocommerce_before_main_content' );
	?>

		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

<?php
/*
echo "<pre>";
print_r($product->product_type);*/



if($product->product_type == 'bundle')
{
  //echo "if";
  /*echo "<pre>";
  print_r($product);*/

  $parent_id = get_the_id();
 // echo $parent_id;
  wc_get_template( 'single-bundle.php', array('parent_id' => $parent_id ));
  
  exit();
}
 
?>
	<section class="inner_page allremedies_detailspage">
	<div class="container">
    <div class="remediestwocolsec">
    	<div class="row">
        	<div class="col-lg-8 col-md-8 col-sm-12">
           <div class="row">
           	<div class="col-lg-6 col-md-6 col-sm-6">
              <div class="remediest_prosliderbxmain">
                <div class="slider slider-largeimg">
                  <div>
                   <div class="remedilargeimg"><img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt=""></div>
                  </div>
                </div>
               <!--  <div class="slider slider-thumbeimg">
                	<?php

$attachment_ids = $product->get_gallery_image_ids();

foreach( $attachment_ids as $attachment_id ) 
    {
      // Display the image URL
     // echo $Original_image_url = wp_get_attachment_url( $attachment_id );

      // Display Image instead of URL
      ?>
      <div>
      	<div class="remedithumbimg">
      		<?php echo wp_get_attachment_image($attachment_id);?>
      		</div>
              </div>
                  <?php
      //echo wp_get_attachment_image($attachment_id, 'full');

    }?>
                	
                 
                </div> -->
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
            	<div class="product_detailscnt">
                	<h4><?php echo the_title();?><span>Code: <div id="sku_variable"><?php if($product->product_type === 'simple')
                  {
                    
                    ?>
                    <?php echo $product->get_sku();?>
                    <?php

                  }
                  else
                  {
                      
                    ?>
                     <?php echo $product->get_sku();?>
                    <?php
                  }
                  ?>
                 </div></span></h4>
                  <a href="#reviewbxtab"data-id="reviewbxtab"  class="proreviewbx" >
				 
                    <p>
                      <span href="javascript:void(0)" class="star_reviewtxt gotorating">
                          <?php $average  =  $product->get_average_rating();
                      
                      if($average!=0)
                      {
                        echo wc_get_rating_html( $product->get_average_rating() );
                      }
                      else
                      {
                        ?>
                        <div class="star-rating" data-toggle="tab">
                        </div>
                        <?php 
                      }
                   ?> 
                        <!-- <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>  -->
                      </span>
                      <?php
                     
$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );


if ( $rating && wc_review_ratings_enabled() ) {
	echo wc_get_rating_html( $rating ); // WPCS: XSS ok.
}
?>
                    
                    <?php
                    echo $product->get_review_count();?> reviews
                </p>
                  </a><!--proreviewbx-->
                   
                        
                         <?php echo the_content();?>
                        
                  <div class="waringmessageinerpage">
                    <p>Warnings  Always read the label. Use only as directed.If symptoms persist consult your healthcare professional.</p>
                  </div>
                     
                    
                </div>
            </div>
           </div>
       	</div>
        	<div class="col-lg-4 col-md-4 col-sm-12">
        	<div class="qualitybx">
        	
          <div class="quantitiebox">
                	<span>Quantity</span>
                    <div class="qtnbx">
                    	 <!-- <input type="text" id="txtAcrescimo" class="form-control">
                        <button type="button" class="altera acrescimo onchangequ">+</button>
                        <button type="button" class="altera decrescimo onchangequ1">-</button> -->
                         <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
 <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

 <?php
 do_action( 'woocommerce_before_add_to_cart_quantity' );

 woocommerce_quantity_input( array(
 'min_value' => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
 'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
 ) );

 do_action( 'woocommerce_after_add_to_cart_quantity' );





 ?> 

 <button type="button" class="altera acrescimo">+</button>
                        <button type="button" class="altera decrescimo" style="display: none">-</button>
                    

                    </div>
	         </div>

		
            	  <?php

              /*  echo "<pre>";
                print_r($product);*/
                 
                  if($product->product_type === 'simple')
                  {
                    
                    
                  }
                  else
                  {
                    
                    

                            global $product;
                            $default_attributes = $product->get_default_attributes();
                            foreach($product->get_available_variations() as $variation_values ){
                                foreach($variation_values['attributes'] as $key => $attribute_value ){
                                    $attribute_name = str_replace( 'attribute_', '', $key );
                                    $default_value = $product->get_variation_default_attribute($attribute_name);
                                    if( $default_value == $attribute_value ){
                                        $is_default_variation = true;
                                    } else {
                                        $is_default_variation = false;
                                        break; // Stop this loop to start next main lopp
                                    }
                                }
                                if( $is_default_variation ){
                                    $variation_id = $variation_values['variation_id'];
                                    break; // Stop the main loop
                                }
                            }

        
                    ?>
                    <input type="hidden" name="" id="check_default_varation" value="<?php echo $variation_id;?>">

            	<div class="qualitysizebx">
                	<span>Size:</span>
                    <div class="qulisizeselectbx select_box">
                    	<span class="select_arrow"></span>
                      	<select class="form-control" id="selectoption">
                        	<option value="" >Select size</option>
                          <?php
                           

/*echo "<pre>";
print_r($product);*/
 global $product, $post;
$variations = $product->get_available_variations();

//print_r($variations);
foreach ($variations as $key => $value) {

  ?>
  <option value="<?php echo $value['variation_id'];?>" data-id="<?php echo implode('/', $value['attributes']);?>"><?php echo implode('/', $value['attributes']);?></option>
  <?php
  }

?>
                        </select>
                    </div>
                </div>
                <?php
              }
              ?>

                <div class="qulipricbx">
                	<span>Price:</span>
                  <?php
                 
                  if($product->product_type === 'simple')
                  {
                    
                    ?>
                    <h4><?php echo $product->get_price_html(); ?></h4>
                    <?php

                  }
                  else
                  {
                      
                    ?>
                    <h4 id="price_sa"></h4>
                  <?php
                }
                ?>
                </div>
                <div class="quality_cartbtn">
                  <?php
                 
                  if($product->product_type === 'simple')
                  {
                    
                    ?>
                   <!-- <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a> -->
                   <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="btn-main triggerbutton"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                  <!--  <input type="button" name="add-to-cart" class="btn-main triggerbutton" value="Add To Cart"> -->

                    <?php

                  }
                  else
                  {
                    
                    ?>

                    <!-- <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main" id="variation_url">Add To Cart</a>  -->
                      <button type="submit" name="add-to-cart" value="" class="btn-main triggerbutton" id="variation_url"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
                   <!--  <input type="button" name="add-to-cart" class="btn-main triggerbutton" value="Add To Cart"> -->
                    <?php

                  }
                 
                  ?>
                	 
                </div>

         </form>
		
          </div>
          <div class="qulityshipping">
            <p><i class="fas fa-truck"></i>FREE SHIPPING on orders $80+</p>
          </div>
          <div class="qulitysatisfied">
            <p><i class="fas fa-shield-alt"></i>SATISFACTION GUARANTEED*</p>
          </div>
          <?php
            $pdf_check = get_field('help_sheet_pdf');
           // echo $pdf_check;
            if($pdf_check)
            {
               
              //echo "if"; 
            ?> 
            <div class="helpsheet_bx">
              <h3>Help sheets</h3>
              <div class="pdf_bx">
                  <a href="<?php echo $pdf_check;?>" target="_blank"><i class="fas fa-file-pdf"></i></a>
              </div>
             <!--  <span class="hpsheetprice">$20.00 AUD</span> -->
            </div>
              <?php
            }
            ?>
        </div>
      </div>
    </div><!--remediestwocolsec-->
    <div class="alremedistabing_sec">
        <div class="container">
          <ul class="nav nav-tabs" role="tablist">
            <!-- <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#animalinformation">Animal Information</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#healthinfo">Health info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#ingredient">Ingredients</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#dosinginfo">Dosing info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#shipping">Shipping</a>
            </li>
            <li class="nav-item" id="reviewbxtab" data-id="reviewbxtab">
              <a class="nav-link" data-toggle="tab" href="#review">Review</a>
            </li>
          </ul>
          <div class="tab-content">
            <!-- <div id="animalinformation" class="tab-pane active">
              <p>If you select “yes” to answer the below questionnaire, our practitioners will check with your selected remedies to your pet's ailments / diagnosis.</p>
              <h5>Would you like to include your pet's details?*</h5>
              <div class="radio_bxmain">
                <label class="radiobx yesradiobtn">yes
                  <input type="radio"  id="chkYes"  name="chkPinNo">
                  <span class="checkmark"></span>
                </label>
                <label class="radiobx">no
                  <input type="radio"  id="chkNo" name="chkPinNo">
                  <span class="checkmark"></span>
                </label>
              </div>
              
              <div class="radioclickopenformbx" id="dvPinNo" style="display: none">
                 

                 <?php

                 $user_id =  get_current_user_id();

               // echo $user_id;
              $form_id = 1;
              $paging = array( 'offset' => 0, 'page_size' => 150 );
              $search_criteria = array(
    'status'        => 'active',
    'field_filters' => array(
       
        array(
            'key'   => 'created_by',
            'value' => $user_id
        )
    )
);
              $entries = GFAPI::get_entries( $form_id, $search_criteria, null, $paging );
              //echo "<pre>";
              //print_r($entries);
              if(!empty($entries))
              {

              ?>
             <div class="select_box">
              <span class="select_arrow"></span>
                        <select class="form-control" id="selectpets">
                          <option value="">Select Pets</option>

                <?php
                $result = array();
                $record = array();
                foreach ($entries as $k => $va){
  
  if(!in_array($va['3'], $result))
  {
    $result[$k]=$va['3'];
    $record[]=$va;

  }

}
                  foreach($record as $res){

                    if($res['3']!="")
                    {
                  
  ?>
  <option value="<?php echo $res['id'];?>"><?php echo $res['3'];?></option>
  <?php
}
  }
  ?>
</select>
</div>
            <?php
          }
?>
                 <div class="summary entry-summary">
    <?php
    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
    do_action( 'woocommerce_single_product_summary' );

   
    ?>
  </div>



                </div>//radioclickopenformbx

            </div> -->
          
            <div id="healthinfo" class="tab-pane active">
              <h3>Lorem ipsum dolor sit amet</h3>
              <p><?php echo get_field('health_info');?></p>
              
            </div>
            <div id="ingredient" class="tab-pane fade">
              <h3>Lorem ipsum dolor sit amet</h3>
              <p><?php echo get_field('ingredients');?></p>
            </div>
            <div id="dosinginfo" class="tab-pane fade">
              <h3>Lorem ipsum dolor sit amet</h3>
              <p><?php echo get_field('dosing_info');?></p>
            </div>
            <div id="shipping" class="tab-pane fade">
              <h3>Lorem ipsum dolor sit amet</h3>
              <p><?php echo get_field('_shipping');?></p>
            </div>
            <div id="review" class="tab-pane fade">
              <div class="review_boxtab">
                <h3>Lorem ipsum dolor sit amet</h3>
                <ul class="custom_reviewlist">
                  <?php
                    global $product;
                    $id = $product->id;
                    $args = array ('post_type' => 'product', 'post_id' => $id,'status'=>'approve');
                    $comments = get_comments( $args );
                    wp_list_comments( array( 'callback' => 'woocommerce_comments' ), $comments);

                    ?>

                <div id="reviews">
                    <div id="comments">
                        <h2><?php
                            if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' && ( $count = $product->get_rating_count() ) )
                                printf( _n( '%s review for %s', '%s reviews for %s', $count, 'woocommerce' ), $count, get_the_title() );
                            else
                                _e( 'Reviews', 'woocommerce' );
                        ?></h2>

                     
                      <?php if ( get_option( 'woocommerce_review_rating_verification_required' ) === 'no' || wc_customer_bought_product( '', get_current_user_id(), $product->id ) ) : ?>

                    <div id="review_form_wrapper">
                        <div id="review_form" class="write_review_bxform writereviewform contact-form">
                            <?php
                                


                                if ( get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) {
                                    $comment_form['comment_field'] = '<p class="comment-form-rating"><label for="rating">' . __( 'Your Rating', 'woocommerce' ) .'</label><select name="rating" id="rating">
                                        <option value="">' . __( 'Rate&hellip;', 'woocommerce' ) . '</option>
                                        <option value="5">' . __( 'Perfect', 'woocommerce' ) . '</option>
                                        <option value="4">' . __( 'Good', 'woocommerce' ) . '</option>
                                        <option value="3">' . __( 'Average', 'woocommerce' ) . '</option>
                                        <option value="2">' . __( 'Not that bad', 'woocommerce' ) . '</option>
                                        <option value="1">' . __( 'Very Poor', 'woocommerce' ) . '</option>
                                    </select></p>';
                                }

                                $comment_form['comment_field'] .= '<p class="comment-form-comment"><label for="comment">' . __( 'Your Review', 'woocommerce' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';

                                comment_form( apply_filters( 'woocommerce_product_review_comment_form_args', $comment_form ) );
                            ?>
                        </div>
                    </div>

                    <?php else : ?>

                        <p class="woocommerce-verification-required"><?php _e( 'Only logged in customers who have purchased this product may leave a review.', 'woocommerce' ); ?></p>

                    <?php endif; ?>

                    <div class="clear"></div>
                </div>
              </div>
            </ul>
          </div><!--review_boxtab-->
        </div><!--review-->
    </div><!--alremedistabing_sec-->
<?php $recently = do_shortcode('[woocommerce_recently_viewed_products]');  ?>
  <?php
    if($recently!="You have not viewed any product yet!")
    {
  ?>
    <div class="recentyview_sec">
      <div class="container">
        <h2>Recently Viewed Items</h2>
        <div class="recentlyrowbx">
          <div class="row">
            <?php echo do_shortcode('[woocommerce_recently_viewed_products]');?>

            <?php
          }
        ?>

          </div><!--row-->
        </div>
      </div>
    </div><!--recentyview_sec-->
    <div class="recentyview_sec youmayalsolikesec">
      <div class="container">
        <h2>You may also like</h2>
        <div class="recentlyrowbx">
          <div class="row">
             <?php

                global $product; // If not set…

                if( ! is_a( $product, 'WC_Product' ) ){
                    $product = wc_get_product(get_the_id());
                }

                $args = array(
                    'posts_per_page' => 4,
                    'columns'        => 4,
                    'orderby'        => 'rand',
                    'order'          => 'desc',
                );

                $args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );
                $args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

                // Set global loop values.
                wc_set_loop_prop( 'name', 'related' );
                wc_set_loop_prop( 'columns', $args['columns'] );

                wc_get_template( 'single-product/related.php', $args );
            ?>
           
            
            
          </div><!--row-->
        </div>
      </div>
    </div><!--recentyview_sec-->
  </div>
</section>
<?php endwhile; // end of the loop. ?>

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>
<script type="text/javascript">
  $(document).ready(function($) {
  $('#chkYes').on( "click", function() {

    $('#dvPinNo').show();
      
});
})
</script>

<script type="text/javascript">
  $(document).ready(function($) {
  $('#chkNo').on( "click", function() {

    $('#dvPinNo').hide();
      
});
})
</script>
<script type="text/javascript">
   $(document).ready(function(){
  
  var default_select = $('#check_default_varation').val();

   if(default_select!="")
    {
        
        $.ajax({
                type: "POST",
                url: "/HAR/wp-admin/admin-ajax.php",
                dataType:"json",
                data: { 
                    action: 'mark_message_as_read',
                    text: default_select,
                },
                cache: false,
                success: function(data){                    
                    if(data.price==''){
                       //jQuery('#ajax_result').hide();  
                       //alert('blank');                      
                    }
                    else{
                      //alert(data.price);
                       $('#selectoption').val(default_select);
                       $('#price_sa').html(data.price);
                       $('#sku_variable').html(data.sku);  
                       $('#variation_url').attr("href", "<?php echo wc_get_cart_url();?>?add-to-cart="+default_select);
                       $('#variation_url').val(default_select);
                       //$('.formattedBasePrice').text(data.price);    
                       $('.formattedBasePrice').html(data.price);
                       //$('.formattedTotalPrice').text(data.price);    
                       $('.formattedTotalPrice').html(data.price);    
                       $('#gform_submit_button_1').removeClass("disabled");                   
                    }
                }
        });
      }
  
});
</script>
<script type="text/javascript">


  $("#selectoption").change(function(){

    var text_select = $("#selectoption" ).val();
    $('#price_sa').html('');
    $('#sku_variable').html('');
    $('#variation_url').attr("href","");

    if(text_select!="")
    {
        
        $.ajax({
                type: "POST",
                url: "/HAR/wp-admin/admin-ajax.php",
                dataType:"json",
                data: { 
                    action: 'mark_message_as_read',
                    text: text_select,
                },
                cache: false,
                success: function(data){                    
                    if(data.price==''){
                       //jQuery('#ajax_result').hide();  
                       //alert('blank');                      
                    }
                    else{
                      //alert(data.price);
                       $('#price_sa').html(data.price);
                       $('#sku_variable').html(data.sku);  
                       $('#variation_url').attr("href", "<?php echo wc_get_cart_url();?>?add-to-cart="+text_select);
                       $('#variation_url').val(text_select);
                       //$('.formattedBasePrice').text(data.price);    
                       $('.formattedBasePrice').html(data.price);
                       //$('.formattedTotalPrice').text(data.price);    
                       $('.formattedTotalPrice').html(data.price);    
                       $('#gform_submit_button_1').removeClass("disabled");                   
                    }
                }
        });
      }
});

  </script>

  <script type="text/javascript">
 $(document).ready(function(){

  $("#selectpets").change(function(){

    var select_change = $("#selectpets" ).val();
    //alert(select_change);

    if(select_change!="")
    {
        
        $.ajax({
                type: "POST",
                url: "/HAR/wp-admin/admin-ajax.php",
                dataType:"json",
                data: { 
                    action: 'pets_autopopulate',
                    select_text: select_change,
                },
                cache: false,
                success: function(data){                    
                    if(data.price==''){
                       //jQuery('#ajax_result').hide();  
                       //alert('blank');                      
                    }
                    else{
                      //alert(data.price);
                       $('#input_1_3').val(data.pet_animal);
                       $('#input_1_2').val(data.speices);  
                       $('#input_1_4').val(data.breed);
                       $('#input_1_15').val(data.age);
                       $('#input_1_6').val(data.diet_currently);  
                       $('#input_1_7').val(data.vet_drugs);
                       $('#input_1_8').val(data.vet_diag);
                       $('#input_1_9').val(data.chemiacl_drugs);  
                       $('#input_1_10').val(data.hampl_remedies);                           
                       $('#input_1_11').val(data.still_vcc_injection);
                       $('#input_1_12').val(data.symtons);  
                       
                    }
                }
        });
      }
      else
      {
                       $('#input_1_3').val('');
                       $('#input_1_2').val('');  
                       $('#input_1_4').val('');
                       $('#input_1_15').val('');
                       $('#input_1_6').val('');  
                       $('#input_1_7').val('');
                       $('#input_1_8').val('');
                       $('#input_1_9').val('');  
                       $('#input_1_10').val('');                           
                       $('#input_1_11').val('');
                       $('#input_1_12').val('');
      }
});
 });



  </script>



<!-- <script type="text/javascript">
 $(document).ready(function(){

 

 $(".triggerbutton").on("click",function(){
  $("#gform_submit_button_1").trigger("click");
});

 });
</script> -->


<script type="text/javascript">
 $(document).ready(function(){
 
   $(".onchangequ").on("click",function(){
    var now_value = $('#txtAcrescimo').val();
    $('.input-text').val(now_value);
});
    });
</script>

<script type="text/javascript">
 $(document).ready(function(){
 
   $(".onchangequ1").on("click",function(){
    var now_value = $('#txtAcrescimo').val();
    $('.input-text').val(now_value);
});
    });




</script>


<script type="text/javascript">
  $( document ).ready(function() {
    $('.input-text').val(1);
    $('#product-variations').val('');
    $('.formattedBasePrice').html('');    
    $('.formattedTotalPrice').html('');

});
</script>

<!-- <script type="text/javascript">

  $(document).ready(function(){

    $("#selectoption").on("change",function(){

      var new_value = $(this).find(':selected').data('id');

      var new_value_2 =  $(this).find(':selected').val();



      
      //$('#product-variations').val(new_value);

      $("#product-variations option:selected").each(function () {
               $(this).removeAttr('selected'); 
               });

      $('#product-variations').val(new_value).find("option[value=" + new_value +"]").attr('selected', true);

      $('.variation_id').val(new_value_2);


});
    });
</script> -->
<script type="text/javascript">
  $( document ).ready(function() {
/* function getUrlParameter(sParam) {
var sPageURL = decodeURIComponent(window.location.search.substring(1)),
sURLVariables = sPageURL.split('&'),
sParameterName,
i;
for (i = 0; i < sURLVariables.length; i++) {
sParameterName = sURLVariables[i].split('=');

if (sParameterName[0] === sParam) {
return sParameterName[1] === undefined ? true : sParameterName[1];
}
}
};
var ac_add_to_cart = getUrlParameter( 'add_to_cart' );
if( ac_add_to_cart == 'true' && $( '.triggerbutton' ).length ){
var ac_url = $( '.gform_wrapper input[name="_wp_http_referer"]' ).val();
var ac_split = ac_url.split( '?add_to_cart=true' );
$( '.gform_wrapper input[name="_wp_http_referer"]' ).val( ac_split[0] );
var check_trigger = $( '.triggerbutton' ).trigger( 'click' );
}*/

/*rating scroll js*/

/*$(".star_reviewtxt").click(function() {
    $('html,body').animate({
        scrollTop: $(".alremedistabing_sec").offsetTop, 300},
        'slow');
});
*/


});

  /*star rating*/
$('.proreviewbx').on('click', function() {
    $('.nav-tabs a[href="#review"]').tab('show');
    
});
 $(".proreviewbx").click(function() {
    $('html, body').animate({
        scrollTop: $("#"+$(this).attr('data-id')).offset().top - ($('.header').height()+400)
    }, 1000);
});


   
</script>