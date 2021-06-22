<?php
/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>


<section class="inner_page allremediespage">
	<div class="container">
		<div class="allremedies_titletxt">
			<h2><?php woocommerce_page_title(); ?></h2>
      <!-- <div class="sortbybox">
          <span>Sort by</span>
            <div class="select_box">
              <span class="select_arrow"><i class="fas fa-chevron-down"></i></span>
                <select class="form-control">
                    <option>Alphabetically. A-Z</option>
                </select> 
            </div>
        </div> -->
		</div>
	<div class="remediestwocolsec">
        	<div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12">
                   <div class="row">
                   	<?php
                   	$current_url =  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 //print_r($current_url);

 $category_name = basename($current_url);


$args = wc_get_products(array(
    'category' => array($category_name),
));
 $args = array( 'post_type' => 'product', 'posts_per_page' => 99, 'orderby' => 'ASC' , 'product_cat' => $category_name, );

    $loop = new WP_Query( $args );

if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) : $loop->the_post();
/*echo "<pre>";
print_r($product);*/
      $asd =  get_the_ID();
   

    $check_product = get_post_meta( $asd, '_custom_product_text_field_yes_no', true );

          //echo $check_product;

          if($check_product!='no')
          {

	?>
		<div class="col-lg-4 col-md-4 col-sm-6">
	        <div class="remediesboxcol">
	           <a href="<?php the_permalink() ?>" class="remediesimg">
	           	<img src='<?php echo wp_get_attachment_url($product->image_id);?>' alt="">
	           </a>
	           <div class="remediescntbx">
                <span class="star_reviewtxt">
                	 <?php $average  =  $product->get_average_rating();
                      
                      if($average!=0)
                      {
                        echo wc_get_rating_html( $product->get_average_rating() );
                      }
                      else
                      {
                        ?>
                        <div class="star-rating">
                        </div>
                        <?php 
                      }
                   ?>  
                	<!-- <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i> -->
                </span>
                <p><a href="<?php the_permalink() ?>"><?php echo the_title();?></a></p>
                <span class="pricetxt"><!-- $ --><?php echo $product->get_price_html();?> <!-- AUD --></span>
                <?php
                if( $product->is_type('variable'))
                {
                  ?>
                    <a href="<?php the_permalink() ?>" class="btn-main">View Product</a> 
                  <?php
                }
                else
                {
                  ?>
                 <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a> 
                <!-- <a href="<?php the_permalink() ?>" class="btn-main">View Product</a> -->
                <?php
                }
                ?>
	                                     <!-- <form class="cart" action="<?php the_permalink() ?>" method="post" enctype="multipart/form-data">
	     <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->id); ?>">
	     <button type="submit" class="btn-main"><?php echo $product->single_add_to_cart_text(); ?></button>
	</form>  -->
	        </div>
	       
	   </div>
	</div>


<?php
}
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

            

              //echo "<pre>";
              //print_r($category);
                 


             if($term_id!=15)
             {
            
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

          /*echo "<pre>";
          print_r($product->id);*/

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
            <a href="<?php echo get_permalink( $product->id ); ?>"><?php echo $product->get_name();?></a> 
            <span class="pricetxt"><?php echo $product->get_price_html();?></span>
           </div>
            </div>
            <?php
          }
        }
    } else {
        echo __( 'No products found' );
    }
    ?>
                       
                    </div>        
                </div><!--remedieboxright-->
            </div>
        </div>
</div>
</div>
</section>
<?php
do_action( 'woocommerce_sidebar' );
get_footer( 'shop' );

?>

