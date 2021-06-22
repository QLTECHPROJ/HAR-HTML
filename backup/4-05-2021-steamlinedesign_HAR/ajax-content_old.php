<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->
	<div class="col-lg-4 col-md-4 col-sm-6">
	        <div class="remediesboxcol">
	           <div class="remediesimg">
	           	<?php
	           	//$product_id = the_ID();

	           	$product_id = get_the_id();
	           	//echo $product_id;
	           	$product = wc_get_product( $product_id );
	           	//echo "<pre>";
	           	//print_r($product);


				//echo $image = wp_get_attachment_url($product->get_image_id() );
	           	
	           //echo	$image = wp_get_attachment_url($product->get_image_id() );
	           	?>
	           	<img src='<?php echo wp_get_attachment_url($product->image_id);?>' alt="">
	           	</div>
	           	<div class="remediescntbx">
                <span class="star_reviewtxt">
                	 <?php $starNumber =  $product->get_average_rating();?>
                	 <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
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
                <!-- <a href="<?php echo wc_get_cart_url();?>?add-to-cart=<?php echo $product->id?>" class="btn-main">Add To Cart</a>  -->
                <a href="<?php the_permalink() ?>" class="btn-main">View Product</a>
                <?php
                }
                ?>
                </div>
                 </div>
                </div>
    
