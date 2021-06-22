<?php

/**

 * Template Name: Blog Template

 * Template Post Type: post, page

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */

get_header();

?>
<section class="blog_list_section_1">
    <div class="container">
        <div class="blog_list_section_1_data">
            <div class="row">
                <div class="col-xl-8 col-lg-12 xl-mb-4">
                    <div class="breadcrumb" id="crumbs"><?php get_breadcrumb(); ?></div>
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

                    <ul>
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
    
    while ( $loop->have_posts() ) : $loop->the_post(); 
        /*echo "if";
        print the_title(); 
        the_excerpt(); */
   
    ?>
            <li>
                <div class="blog_inner_w_100">
                    <div class="blog_inner_image">
                        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );?>" alt="" class="img-fluid">
                    </div>
                    <div class="blog_inner_data">
                        <h4><?php echo the_title();?> </h4>
                         <span><?php echo get_the_date(); ?> Posted By Admin</span> 
                        <?php
                //$content = get_field('blog_description');
                $final_content =  mb_strimwidth(get_field('blog_description'), 0, 150, '...');
                ?>
                        <?php //echo  $final_content;?>
                        <?php echo the_content(); ?>
                    </p>
                       <a href="<?php the_permalink() ?>"><button class="btn btn-border">Read More</button></a>
                    </div>
                </div>
            </li>

            <?php
     endwhile;

    wp_reset_postdata(); 
    ?>
                    </ul>
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

<?php

get_footer();

?>