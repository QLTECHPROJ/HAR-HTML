<?php


get_header();


?>




<section class="blog_list_section_1">

    <div class="container">

        <div class="blog_list_section_1_data">

            <div class="row">

                <div class="col-xl-8 col-lg-12 xl-mb-4">

                    <div class="breadcrumb" id="crumbs"><?php get_breadcrumb(); ?></div>
                    <div>&nbsp;</div>

                    <div class="d-xl-none d-inline">

                        <div class="sidebar_inner_list">

                            <div class="input-group mb-0  w-small-300">

                                <!-- <input type="text" class="form-control search" placeholder="Search..." aria-describedby="basic-addon2">

                                <div class="input-group-append">

                                    <button type="submit" class="search_side"><i class="fas fa-search"></i></button>

                                </div> -->

                            </div>

                        </div>

                    </div>
<?php while ( have_posts() ) : the_post(); ?>

                    <div class="blog_details">



                        <div class="card_img">

                            <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );?>" class="img-fluid" alt="">

                            <h2><?php echo print the_title();?></h2>

                            <span class="d-block"><?php echo get_the_date(); ?> Posted By Admin</span>

                            <?php echo get_field('blog_description');?>
                       

                            
                           



                            <div class="share_post">

                                <div class="row justify-content-between ">

                                    <div class="col-md-7 col-lg-7 md-mb-4 text-medium-center">

                                        <div class="sidebar_tags">

                                        	<?php
                            	$blog_tag = get_field('blog_tag');
                            	//print_r($blog_tag);

                            	//$blog_tag_array = $

                            	$explode = explode(',',$blog_tag);
                            	//print_r($explode);

                            	foreach ($explode as $key => $value) {
                            		?>

                            		<a href="javascript:void(0);" class="tags"><?php echo $value;?></a>
                            		<?php
                            	}
                            	?>

                                        </div>

                                    </div>

                                    <div class="col-md-5 col-lg-5 text-medium-center text-right">

                                        <ul>

                                            <li>Share this post:</li>

                                            <li>

                                                <i class="fa fa-home"></i>

                                            </li>

                                            <li>

                                               <!--  <i class="fa fa-home"></i> -->

                                                 <i class="fa fa-twitter"></i> 

                                            </li>

                                            <li>

                                               <!--  <i class="fa fa-home"></i> -->

                                                <i class="fa fa-pinterest"></i> 

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                     <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>

                </div>

                <div class="col-xl-4 col-lg-12">

                    <div class="sidebar_sticky side_blog_listing">

                        <div class="d-xl-inline d-none">

                            <div class="sidebar_inner_list">

                                <div class="input-group mb-0 w-small-300">

                                    <!-- <input type="text" class="form-control search" placeholder="Search..." aria-describedby="basic-addon2">

                                    <div class="input-group-append">

                                        <button type="submit" class="search_side"><i class="fas fa-search"></i></button>

                                    </div> -->

                                </div>

                            </div>

                        </div>

                        <!-- recent post -->

                        <div class="sidebar_inner_list">

                            <div class="title_head">

                                <h2>RECENT POST</h2>

                            </div>

                            <?php
 $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 4, 
        'orderby' => 'title', 
        'order' => 'DESC',
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

                            <div class="recent_post">
                                <div class="recent_post_image">
                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );?>" alt="" class="img-fluid"></a>
                                </div>
                                <div class="recent_post_data">
                                    <?php

                                    $contenttitle = mb_strimwidth(get_the_title(), 0, 50, '...');
                                    ?>
                                    <p><a href="<?php the_permalink(); ?>"><?php echo $contenttitle?></a></p>
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            </div>

                            <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>


                        </div>

                        <!-- tags -->

                        

                       <!--  <div class="sidebar_inner_list">

                            <div class="title_head">

                                <h2>Tags</h2>

                            </div>

                            <div class="sidebar_tags">



                                <a href="javascript:void(0);" class="tags">animal</a>

                                <a href="javascript:void(0);" class="tags">bath</a>

                                <a href="javascript:void(0);" class="tags">cat</a>

                                <a href="javascript:void(0);" class="tags">dog</a>

                                <a href="javascript:void(0);" class="tags">dry</a>

                                <a href="javascript:void(0);" class="tags">food</a>

                                <a href="javascript:void(0);" class="tags">grooming</a>

                                <a href="javascript:void(0);" class="tags">medical</a>

                                <a href="javascript:void(0);" class="tags">pet</a>

                                <a href="javascript:void(0);" class="tags">Shovel</a>

                                <a href="javascript:void(0);" class="tags">styling</a>

                            </div>

                        </div> -->

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>