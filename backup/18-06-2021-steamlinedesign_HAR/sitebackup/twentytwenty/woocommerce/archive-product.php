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

global $product;
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

<?php

echo do_shortcode('[ajax_posts]');

?>
</div>
<div class="col-lg-3 col-md-4 col-sm-12">
          <div class="searchbx remedicssearchbx">
                <?php if ( function_exists( 'aws_get_search_form' ) ) { aws_get_search_form(); } ?>
            </div>
            <div class="remedies_sidebox">
              <h3 class="title_head">Product Categories</h3>
                <ul class="scrollbx">
                  <?php

$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
 
if( !empty($product_categories) ){
   
    foreach ($product_categories as $key => $category) {
             $term_id = $category->term_id;

             if($term_id!=15)
             {
                    //echo "<pre>";
                    //print_r($product_categories);
                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
        ?>
                  <li><a href="<?php echo get_term_link($category);?>"><?php echo $category->name;?></a></li>

                  <?php
                    }
                  }
                }
                ?>
                </ul>
            </div>
           <div class="remedies_sidebox">
              <h3 class="title_head">Animals</h3>
                <ul>
                  <?php

$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
 
if( !empty($product_categories) ){
   
    foreach ($product_categories as $key => $category) {
             $term_id = $category->term_id;

             //echo "<pre>";
             //print_r($category);

             $feature_group = get_term_meta( $term_id, 'animals', true );

             if($feature_group=='yes')
             {
                ?>
             
                <li><a href="<?php echo get_term_link($category);?>"><?php echo $category->name;?></a></li>
                <?php
              }

             
  }
}
  ?>
                </ul>
            </div>
            <div class="remedies_sidebox">
              <h3 class="title_head">Top Rated Products</h3>
                <div class="remedieboxright">
                  
                    <?php
                          $args = array(
        'limit'     => '5',
        'orderby'   => array( 'meta_value_num' => 'DESC', 'title' => 'ASC' ),
        'meta_key'  => 'total_sales',
    );

    $query    = new WC_Product_Query( $args );
    $products = $query->get_products();
    if ( $products ) {
        foreach ( $products as $product ) {
          //echo $product;

          $asd =  $product->id;
   

    $check_product = get_post_meta( $asd, '_custom_product_text_field_yes_no', true );

          //echo $check_product;

        if($check_product!='no')
        {

         $url= wp_get_attachment_url( get_post_thumbnail_id($asd));
          ?>
          <div class="remediebxrightrow">
          <a href="<?php echo get_permalink( $product->id ); ?>" class="remerightimgsthumb"><img src="<?php echo $url;?>" alt=""></a>
        <div class="remdirightcntbx">
            <a href="<?php echo get_permalink( $product->id ); ?>"><p><?php echo $product->get_name();?></p></a> 
            <span class="pricetxt"><?php echo $product->get_price_html();?></span>
          </div> 
          </div><!--remediebxrightrow-->
            <?php
          }
        }
        
    } else {
        echo __( 'No products found' );
    }
    ?>
                        
                          
                </div><!--remedieboxright-->
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

?>
<!-- <script type="text/javascript">
  $(document).ready(function() {

    $("#loadMore").on('click', function(e) {
        //init
        var that = $(this);
        var page = $(this).data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        //ajax call
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                page: page,
                action: 'ajax_script_load_more'
 
            },
            error: function(response) {
                console.log(response);
            },
            success: function(response) {
                //check
                if (response == 0) {
                    $('#ajax-content').append('<div class="text-center"><h3>You reached the end of the line!</h3><p>No more posts to load.</p></div>');
                    $('#loadMore').hide();
                } else {
                    that.data('page', newPage);
                    $('#ajax-content').append(response);
                }
            }
        });
    });
  });

</script> -->
 <script type="text/javascript">
  
  
  //jQuery.noConflict();
  
/* Ajax functions */
var processing;
$(document).ready(function() {
    //find scroll position
    $(window).scroll(function() {
        //init
        var that = $('#loadMore');
        var page = $('#loadMore').data('page');
        var newPage = page + 1;
        var ajaxurl = $('#loadMore').data('url');

        if (processing)
            return false;

        //check
        var scrollAmount = $(window).scrollTop();
    var documentHeight = $(document).height();
    var scrollPercent = (scrollAmount / documentHeight) * 100;
        //if ($(window).scrollTop() >= ($(document).height() - $(window).height())*0.7){
         // alert(scrollPercent);
          if(scrollPercent > 35) {
          
             processing = true;
            //ajax call
            $.ajax({
                url: ajaxurl,
                type: 'post',
                data: {
                    page: page,
                    action: 'ajax_script_load_more'
                },
                error: function(response) {
                    console.log(response);
                },
                success: function(response) {
                    //check
                    if (response == 0) {
                        //check
                        if ($("#no-more").length == 0) {
                          
                            $('#ajax-content').append('<div id="no-more" class="text-center"><h3>You reached the end of the line!</h3><p>No more products to load.</p></div>');
                        }
                        $('#loadMore').hide();
                    } else {
                        $('#loadMore').data('page', newPage);
                        $('#ajax-content').append("<div class='row'>"+response+"</div>");
                        processing = false;
                    }
                }
            });
        }
    });
});
</script> 

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function($) {
  $('#chkYes').on( "click", function() {

    $('#dvPinNo').show();
      
  });
});

$(document).ready(function($) {
  $('#chkNo').on( "click", function() {

    $('#dvPinNo').hide();
      
  });
})
</script> -->
<!-- <script type="text/javascript">
 $(document).ready(function(){

  $("#select").change(function(){

    var text_select = $("#select" ).val();
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
                                          
                    }
                    else{
                      //alert(data.price);
                       $('#price_sa').html(data.price);
                       $('#sku_variable').html(data.sku);  
                       $('#variation_url').attr("href", "<?php echo wc_get_cart_url();?>?add-to-cart="+text_select);                           
                    }
                }
        });
      }
});
 });

</script> -->
<!-- <script type="text/javascript">
  
  $( document ).ready(function() {
 function getUrlParameter(sParam) {
var sPageURL = decodeURIComponent(window.location.search.substring(1)),
sURLVariables = sPageURL.split('&'),
sParameterName,
i;
alert(sPageURL);
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
}
});
</script> -->

