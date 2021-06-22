<?php

/**

 * The main template file

 *

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * E.g., it puts together the home page when no home.php file exists.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */



get_header();

?>





	
	
<section class="banner_sec">
	<div class="banner_sliersec">
    	<div class="hl-banner-slider">
               <?php
 $args = array(  
        'post_type' => 'slider',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        'orderby' => 'title', 
        'order' => 'ASC', 
    );

    $loop = new WP_Query( $args ); 
    /*echo "<pre>";
    print_r($loop);*/
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        /*echo "if";
        print the_title(); 
        the_excerpt(); */
   
                ?>
			<figure>
                <img src="<?php echo get_field('image')?>" alt="">
                <figcaption>
                	<div class="container">
                		<div class="hbanner_cnt">
                            <h1><?php echo get_field('name')?></h1>
                            <p><?php echo get_field('descp')?></p>
                           <div class="banner-btn">
                            	<a href="<?php echo get_field('button_link')?>" class="btn-main"><?php echo get_field('button_text')?></a>
                           </div>
                        </div>
                    </div>
                </figcaption>
            </figure>
            <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>
            
		</div> 
    </div><!--banner_sliersec-->
</section><!--banner_sec-->
<!--header section ends-->
<!--home_page-->
<section class="home_page">
	<div class="productfinder_sec">
    	<div class="container">
        	<span>Not sure where to start? Try The</span>
            <h5><i class="fa fa-search"></i>Product Finder</h5>
            <a href="#." class="btn-main">STArt Now</a>
        </div>
    </div>
	<div class="spcies_agesec">
    	<div class="container">
        	<h2>Our Awesome Formulas For all Species and Ages</h2>
            <div class="speciesagerowsec">
            	<div class="row">
                    <?php

$orderby = 'name';
$order = 'asc';
$hide_empty = false ;
$cat_args = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
    'posts_per_page' => 4,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );
 
if( !empty($product_categories) ){
   
    foreach ($product_categories as $key => $category) {
             $term_id = $category->term_id;

            


                 


             if($term_id!=15)
             {
            
                    $thumbnail_id = get_woocommerce_term_meta( $term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_url( $thumbnail_id );
        ?>


                	<div class="col-lg-3 col-md-3 col-sm-6 col-6">
                    	<a href="<?php echo get_term_link($category);?>" class="spciesagerowbx">
                        	<div class="spciesimgbx"><img src="<?php echo $image;?>" alt=""></div>
                            <span class="spciesimgtitle"><?php echo $category->name;?></span>
                        </a>
                    </div>
                    <?php
                    }
                  }
                }
                ?>
                   
                </div>
            </div><!--speciesagerowsec-->
        </div>
    </div><!--spcies_agesec-->
    <div class="hominomal_sec">
    	<div class="container">
        	<h2>HERE'S WHERE HOMEOANIMAL ™ SHINES</h2>
            <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6">
                	<div class="hominalimg">
                    	<img src="<?php echo get_template_directory_uri() . '/assets/images/blog-img1.jpg'?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                	<div class="hominal_txt">
                    	<div class="hominaltxt_align">
                            <p>Information on this site should not be used to diagnose, treat, prevent or cure any disease or condition. These statements have not been evaluated by the Food and Drug Administration.</p>
                            <p> They are supported by traditional homeopathic principles.</p>
                            <p>Seek Veterinary care in emergency situations.</p>
                            <p> All prices displayed are exclusive of Australian GST (Ex GST).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--hominomal_sec-->
    <div class="client_slidersec">
    	<div class="container">
        	<h2>What Our Clients Say!</h2>
            <div class="client_slider">
                <?php
 $args = array(  
        'post_type' => 'testimonial',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        'orderby' => 'title', 
        'order' => 'ASC', 
    );

    $loop = new WP_Query( $args ); 
    /*echo "<pre>";
    print_r($loop);*/
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        /*echo "if";
        print the_title(); 
        the_excerpt(); */
   
                ?>
            	<div>
                	<div class="clientslideimg">
                    	<img src="<?php echo get_field('image')?>" alt="">
                    </div>
                    <div class="clientslidecnt">
                    	<p><?php echo get_field('message')?></p>
                        <span class="client_slidauthorname">
                        	<h5><?php echo get_field('name')?></h5>
                            <?php echo get_field('name')?>
                        </span>
                    </div>
                </div>
                <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>
                
            </div>
        </div>
    </div>
    <div class="monthlyanimalfundig_sec">
    	<div class="container">
        	<h2>Hampl Homeopathic Donations being put good use</h2>
        	<div class="monthlyaimgbx"><img src="<?php echo get_template_directory_uri() . '/assets/images/donation.jpg'?>" alt=""></div>
            <h5>by Dr. Akhilesh DVM India</h5>
        </div>
    </div><!--monthlyanimalfundig_sec-->
    <div class="animalfunding_sec">
    	<div class="container">
        	<h2>HAMPL's Weekly to Monthly Animal Funding</h2>
            <div class="animaltxt">
            	<p>Monies received through our Pet formulas are helping provide, on a regular basis, natural medicines and donations to various animal rescue organizations, third world countries and crisis areas - Worldwide</p>
                <p>We thank you from the bottom of our heart!</p>
            </div>
        	<div class="customer_logo">
                <?php
 $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        'orderby' => 'title', 
        'order' => 'ASC', 
        'category_name'=>'animal-funding'
    );

    $loop = new WP_Query( $args ); 
    /*echo "<pre>";
    print_r($loop);*/
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        /*echo "if";
        print the_title(); 
        the_excerpt(); */
   
                ?>
            	<a href="<?php //the_permalink() ?>" class="logobar__item"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );?>" alt=""></a>
                 <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>
           </div>
        </div>
    </div>
    <div class="productcatlouge_sec">
    	<div class="container">
        	<h2 class="borderbottomfull">Full Product Catalouge</h2>
            <div class="procatrowsec">
            	<div class="row">
                	<div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="productcat_box">
                        	<div class="productimg"><img src="<?php echo get_template_directory_uri() . '/assets/images/productcat_img1.png'?>" alt=""></div>
                            <div class="prodctcntbx">
                            	<h5>Australian English</h5>
                                <p>Download the HAMPL Pet Formulas catalogue</p>
                                <a href="#." class="btn-main tbtnpurpal">Download Catalogue</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="productcat_box">
                        	<div class="productimg"><img src="<?php echo get_template_directory_uri() . '/assets/images/productcat_img2.png'?>" alt=""></div>
                            <div class="prodctcntbx">
                            	<h5>한국어</h5>
                                <p>한국어 카탈로그 다운로드</p>
                                <a href="#." class="btn-main gryborderbtn">카탈로그 다운로드</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--productcatlouge_sec-->
    <div class="latestnews_sec">
    	<div class="container">
        	<h2>Read Our Latest Blogs</h2>
            <div class="latestnews_slider">
                 <?php
 $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 8, 
        'orderby' => 'title', 
        'order' => 'ASC',
        'category_name'=>'Uncategorized'
    );

    $loop = new WP_Query( $args ); 
    /*echo "<pre>";
    print_r($loop);*/
        
    while ( $loop->have_posts() ) : $loop->the_post(); 
        /*echo "if";
        print the_title(); 
        the_excerpt(); */
   
                ?>
            	<div>
                	<div class="latstnewbx">
                        <div class="newslideimg"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );?>" alt=""></div>
                        <div class="newslidecnt">
                            <span class="newsdate"><?php echo get_the_date(); ?> </span>
                            <h6><?php echo print the_title();?> </h6>
                            <?php
                            $content = get_field('blog_description');
                            $final_content =  mb_strimwidth($content, 0, 100, '...');
                            ?>
                            <p><?php echo  $final_content;?></p>
                            <a href="<?php the_permalink() ?>" class="readmorebtn" target="_blank">Read More >></a>
                        </div>
                    </div>
                </div>  

                <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>

               	
               
            </div>
        </div>
    </div>
</section><!--home_page-->


<div class="scroll-top transition" title="Move to Top">
    <span class="fas fa-caret-up"></span>
</div>	









<?php

get_footer();

