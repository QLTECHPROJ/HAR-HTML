<?php
//echo "if";
//print_r($parent_id);


$product = wc_get_product($parent_id);
/*echo "<pre>";
print_r($product);*/

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
                	<h3><?php echo the_title();?><span>Code: <div id="sku_variable">
                    <?php echo $product->get_sku();?>
                 </div></span></h3>
                  <div class="proreviewbx">
                    <p>
                      <span class="star_reviewtxt">
                        <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i> 
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
                  </div>
                    <ul>
                    	
                        <li>
                          <?php echo the_content();?>

                          
                        </li>
                    </ul>
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
           </div>
       	</div>
       	<div class="col-lg-4 col-md-4 col-sm-12">
        	<div class="qualitybx">
        	
          <div class="quantitiebox">
                	<span>Quantity</span>
                    <div class="qtnbx">
                    	

                        <input type="text" id="txtAcrescimo" class="form-control">
                        <button type="button" class="altera acrescimo onchangequ">+</button>
                        <button type="button" class="altera decrescimo onchangequ1">-</button>

 
	</div>
	</div>

	<div class="qulipricbx">
                	<span>Price:</span>
                  
                    <h4><?php echo $product->get_price_html(); ?></h4>
                    
                     
                </div>

                <div class="quality_cartbtn">
                 
                   <input type="button" name="add-to-cart" class="btn-main triggerbutton" value="Add To Cart">
                	 
                </div>

         </form>
         </div>
          <div class="qulityshipping">
            <p><i class="fas fa-truck"></i>FREE SHIPPING on orders $80+</p>
          </div>
          <div class="qulitysatisfied">
            <p><i class="fas fa-shield-alt"></i>SATISFACTION GUARANTEED*</p>
          </div>
        </div>
      </div>
    </div><!--remediestwocolsec-->
    <div class="alremedistabing_sec">
        <div class="container">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#animalinformation">Animal Information</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#healthinfo">Health info</a>
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
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#review">Review</a>
            </li>
            <?php

            $check_order =  has_bought_items($parent_id);
            //print_r($check_order);
              
              if($check_order==1)
              {
                ?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#bundleproduct">Bundle Product</a>
            </li>
            <?php
            }
            ?>
          </ul>
          <div class="tab-content">
            <div id="animalinformation" class="tab-pane active">
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

                //gravity form for the pet form number 1
                //$asd =   gravity_form(1, false, false, false, '', true, 12); 
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



                </div><!--radioclickopenformbx-->

            </div>
          
            <div id="healthinfo" class="tab-pane fade">
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
              <h3>Lorem ipsum dolor sit amet</h3>
              <p><?php //echo get_field('health_info');?></p>
             <?php
                  global $product;
                  $id = $product->id;
                  $args = array ('post_type' => 'product', 'post_id' => $id);
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
                  <div id="review_form">
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

            </div>
            
          </div>
        </div><!--review-->
        <?php

$check_order =  has_bought_items($parent_id);
//print_r($check_order);
  
  if($check_order==1)
  {
            ?>

        <div id="bundleproduct" class="tab-pane fade">
          <div class="bundlepodouct_mainbx">
            <?php
            $bundle_retun =  get_parent_grouped_id($parent_id);

foreach ($bundle_retun as $key => $value) {
  //print_r($value);
  $p_id = $value->product_id;
  //echo $p_id;

  $product = wc_get_product($p_id);
  /*echo "<pre>";
  print_r($product);*/
  $image = wp_get_attachment_url($product->get_image_id() );
  //echo $image;
  $title = $product->get_name();
  

  $price_html = $product->get_price_html();

  $type = $product->get_type();
?>
           
            
            <div class="bundlerow_box">
              <div class="row align-items-center">
                <div class="col-lg-2 col-md-3 col-sm-4">
                  <div class="thumbimg"><img src="<?php echo $image;?>" alt=""></div>
                </div>
                <div class="col-lg-5 col-md-3 col-sm-4">
                  <div class="bundtabcnt"><a href="<?php the_permalink() ?>"><?php echo $title;?></a></div>

                  <!--  <a href="<?php the_permalink() ?>" class="btn-main">View Product</a> -->
                  <?php
                  if($type === 'simple')
                  {

                  }
                  else
                  {
                    ?>
                  
                  <span>Variations</span>
                  <div class="select_box">
                    <span class="select_arrow"></span>
                    <select class="form-control">
                      <option value="Choose Color">Select variations</option>
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
                  <?php
                  }
                  ?>
                </div>
               
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="bundeleaqtybx">
                    <div class="qtnbx">
                      <input type="text" id="onebundeleaqty" class="form-control">
                        <button type="button" class="altera acrescimo onchangequ">+</button>
                        <button type="button" class="altera decrescimo onchangequ1">-</button>
                    </div><!--qtnbx-->
                  </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-4">
                  <span class="prciebx"><?php echo $price_html;?></span>
                </div>
              </div><!--row-->
            </div><!--bundlerow_box-->
            <?php
            }
?>
          </div><!--bundlepodouct_mainbx-->
        </div><!---bundleproduct-->
        <?php
      }
      ?>


    </div><!--alremedistabing_sec-->

    <div class="recentyview_sec">
      <div class="container">
        <h2>Recently Viewed Items</h2>
        <div class="recentlyrowbx">
          <div class="row">
            <?php echo do_shortcode('[woocommerce_recently_viewed_products]'); ?>
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

                if(  is_a( $product, 'WC_Product' ) ){
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
<script type="text/javascript">
/*increment decrement js*/
var $input = $("#bundeleaqty");

// Colocar a 0 ao inÃ­cio
$input.val(1);

// Aumenta ou diminui o valor sendo 0 o mais baixo possÃ­vel
$(".altera").click(function(){
    if ($(this).hasClass('acrescimo'))
        $input.val(parseInt($input.val())+1);
    else if ($input.val()>=1)
        $input.val(parseInt($input.val())-1);
});

 /*increment decrement js*/
var $input = $("#onebundeleaqty");
// Colocar a 0 ao inÃ­cio
$input.val(1);

// Aumenta ou diminui o valor sendo 0 o mais baixo possÃ­vel
$(".altera").click(function(){
    if ($(this).hasClass('acrescimo'))
        $input.val(parseInt($input.val())+1);
    else if ($input.val()>=1)
        $input.val(parseInt($input.val())-1);
});
</script>
<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

?>

<script type="text/javascript">
 $(document).ready(function(){

 

 $(".triggerbutton").on("click",function(){
  $("#gform_submit_button_1").trigger("click");
});

 });
</script>

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