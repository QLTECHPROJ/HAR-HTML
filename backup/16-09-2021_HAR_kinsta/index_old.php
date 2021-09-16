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
        //echo "<pre>";
        //print_r($loop);
   
                ?>
			<figure>
                <img src="<?php echo get_field('image')?>" alt="">
                <figcaption>
                	<div class="container">
                		<div class="hbanner_cnt">
                           
                            <p><?php echo get_field('descp')?></p>
                           <div class="banner-btn">
                            	<a href="<?php echo get_field('button_link')?>" class="btn-main"><?php echo get_field('button_text')?></a>
                                <?php
                               // echo "if";
                                    $check_button_link = get_field('button_link_2');
                                    $check_button_text = get_field('button_text_2');

                                    if($check_button_text!='' || $check_button_link!='')
                                    {
                                        //echo "if";
                                ?>
                                <a href="<?php echo $check_button_link;?>" class="btn-main"><?php echo $check_button_text;?></a>
                                <?php
                                }
                                ?>
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
	<div class="productfinder_sec" style="display: none">
    	<div class="container">
        	<span>Not sure where to start? Try The</span>
            <h5><i class="fa fa-search"></i>Product Finder</h5>
            <button type="button" class="btn-main" data-toggle="modal" data-target="#startbtnpopupbx">Start Now</button>
        </div>
    </div>
	<div class="spcies_agesec">
    	<div class="container">
        	<h2>Our Awesome Formulas For all Species and Ages</h2>
            <div class="speciesagerowsec mt-1 mt-md-3 mt-lg-5">
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

            


                 


             if($term_id==19 || $term_id==20 || $term_id==18 || $term_id==21)
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
    <!--<div class="hominomal_sec">
    	<div class="container">
        	<h2 class="mb-2 mb-md-2 mb-lg-3">HERE'S WHERE HOMEOANIMAL ™ SHINES</h2>
            <div class="row">
            	<div class="col-lg-6 col-md-6 col-sm-6">
                	<div class="hominalimg">
                    	<img src="https://harsteamlinedesigncom.kinsta.cloud/wp-content/uploads/2021/07/cow_image-Small-1.jpg" alt="">
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
    </div>--><!--hominomal_sec-->
    <div class="client_slidersec">
    	<div class="container">
        	<h2>What Our Customers Say!</h2>
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
                        <?php
                            $images_gallery = get_field('image');
                            //echo "<pre>";
                            //print_r($images_gallery);
                            foreach ($images_gallery as $k => $va) {
                                ?>
                                <img src="<?php echo $va;?>" alt="">
                            <?php
                            }
                        ?>
                    	
                    </div>
                    <div class="clientslidecnt mt-2 mt-md-3 mt-lg-4">
                        <p><?php echo mb_strimwidth(get_field('message'),0,500,'....');?></p> 
                        <a data-id="<?php echo get_the_id();?>" class="readmorebtn">- read more</a>
                        <span class="client_slidauthorname mt-1 mt-md-2">
                            <h4><?php echo get_field('name')?></h4>
                            <?php //echo get_field('name')?>
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
        	<div class="monthlyaimgbx mt-2 mt-md-3 mt-lg-5"><img src="<?php echo get_template_directory_uri() . '/assets/images/donation.jpg'?>" alt=""></div>
            <h5 class="mt-3 mt-md-4">by Dr. Akhilesh DVM India</h5>
        </div>
    </div><!--monthlyanimalfundig_sec-->
    <div class="animalfunding_sec">
    	<div class="container">
        	<h2>HAMPL's Weekly to Monthly Animal Funding</h2>
            <div class="animaltxt  mt-2 mt-md-3 ">
            	<p>Monies received through our Pet formulas are helping provide, on a regular basis, natural medicines and donations to various animal rescue organizations, third world countries and crisis areas - Worldwide</p>
                <p>We thank you from the bottom of our heart!</p>
            </div>
        	<div class="customer_logo pt-2 pt-md-3 pt-lg-5">
                <?php
 $args = array(  
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 10, 
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

        $animal_funding_logo_link = get_field('animal_funding_logo_link');
   
                ?>
            	<a href="<?php echo $animal_funding_logo_link; ?>" target="_blank" class="logobar__item"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ), 'thumbnail' );?>" alt=""></a>
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
                        	<div class="productimg"><img src="https://harsteamlinedesigncom.kinsta.cloud/wp-content/uploads/2021/07/australia-flag-button-square-icon-256_1600x.png" alt=""></div>
                            <div class="prodctcntbx">
                            	<h5 class="m-0">Australian English</h5>
                                <p>Download the HAMPL Pet Formulas catalogue</p>
                                <a href="<?php echo get_home_url(); ?>/wp-content/uploads/2021/02/test_animal.pdf" download class="btn-main tbtnpurpal">Download Catalogue</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    	<div class="productcat_box">
                        	<div class="productimg"><img src="https://harsteamlinedesigncom.kinsta.cloud/wp-content/uploads/2021/07/south-korea-flag-button-square-icon-256_1600x.png" alt=""></div>
                            <div class="prodctcntbx">
                            	<h5 class="m-0">한국어</h5>
                                <p>한국어 카탈로그 다운로드</p>
                                <a href="<?php echo get_home_url(); ?>/wp-content/uploads/2021/02/test_animal.pdf" download class="btn-main tbtnpurpal">카탈로그 다운로드</a>
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
                        <div class="newslidecnt mt-2 mt-md-3">
                            <span class="newsdate"><?php echo get_the_date(); ?> </span>
                            <h6><?php echo print the_title();?> </h6>
                            <?php
                            // $content = get_field('blog_description');
                            // $final_content =  mb_strimwidth($content, 0, 100, '...');
                            $contentblog = mb_strimwidth(get_the_content(), 0, 100, '...');
                            ?>
                            <p><?php echo $contentblog;?></p>
                            <a href="<?php the_permalink() ?>" class="readmorebtn">Read More >></a>
                        </div>
                    </div>
                </div>  

                <?php
                 endwhile;

    wp_reset_postdata(); 
    ?>

               	
               
            </div><!--latestnews_slider-->
        </div><!--container-->
    </div>
</section><!--home_page-->


<div class="scroll-top transition" title="Move to Top">
    <span class="fas fa-caret-up"></span>
</div>	



<div class="starbtn_popup_bx">
    <div class="modal fade" id="startbtnpopupbx" tabindex="-1" role="dialog" aria-labelledby="startbtnpopupbx" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="tab-content" id="tabsss">
                  <div class="container">
                    <div class="row justify-content-center">
                      <div class="col-lg-12 col-md-12 col-sm-12  text-center p-0 mt-3 mb-2">
                        <div id="msform" class="reviewtabprog_mainbx">
                          <!-- progressbar -->
                          <div class="progress">
                            <div class="progress-bar " role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                          </div> <br> <!-- fieldsets -->
                          <fieldset>
                            <div class="reviewcontent" id="rc_one">
                              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/reviewimg1.jpg" alt="">
                              <h2 class="mb-2 mb-md-0 mb-lg-0">Welcome to our product selector</h2>
                              <p class="pb-15">Answer a short selection of questions about your pet. Receive the product recommendations right for your pet. Support their happiest, healthy life.</p>
                            </div><!--reviewcontent-->
                            <input type="button" name="GET STARTED" class="next action-button btn-main mt-2 mt-md-3 mt-lg-4" value="GET STARTED">
                          </fieldset>
                          <fieldset>
                            <form method="POST">
                            <div class="reviewcontent" id="rc_two">
                               <h2 class="mb-2 mb-md-3 mb-lg-4">What kind of pet are you looking for?</h2>
                                <div class="row justify-content-center">
                                  <div class="col-lg-5 col-md-4 col-sm-6">
                                    <a href="#." class="petlookingbx">
                                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dog.svg" alt="" title="Dog">
                                      <span class="petlooktitle">Cat</span>
                                      <input type="hidden" name="petname" value="<?php echo $category->name;?>">
                                      <div class="checkiconbx"><i class="fa fa-check"></i></div>
                                    </a>
                                  </div>
                                   <div class="col-lg-5 col-md-4 col-sm-6">
                                    <a href="#." class="petlookingbx">
                                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/dog.svg" alt="" title="Dog">
                                      <span class="petlooktitle">Dog</span>
                                      <input type="hidden" name="petname" value="<?php echo $category->name;?>">
                                      <div class="checkiconbx"><i class="fa fa-check"></i></div>
                                    </a>
                                  </div>
                                  <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="qulisizeselectbx select_box mt-5">
                                      <span class="select_arrow"></span>
                                        <select class="form-control">
                                          <option value="Select size">Other Pet</option>
                                            <option value="dog">dog</option>
                                            <option value="cat">cat</option>
                                            <option value="dog">dog</option>
                                            <option value="cat">cat</option>
                                        </select>
                                    </div>
                                  </div>
                                </div>
                              </div><!--reviewcontent--> 
                              <input type="button" name="GET STARTED" class="next action-button btn-main mt-2 mt-md-3 mt-lg-4" value="GET STARTED">
                          </fieldset>
                          <fieldset>
                            <div class="reviewcontent" id="rc_three">
                              <h2 class="mb-2 mb-md-3 mb-lg-4">MY PET NEEDS SUPPORT FOR ...</h2>
                              <div class="reviewcntmainbx mb-2 mb-md-3 mb-lg-4">
                                <div class="row justify-content-center">
                                  <div class="col-lg-4 col-md-5 col-sm-6 align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-Behavioral-Condition.svg" class="rethimg"></div>
                                  <div class="col-lg-7 col-md-6 col-sm-6 align-self-center">
                                    <div class="reviewcntxt">
                                      <h5 class="text-left mb-0">A Behavioral Condition</h5>
                                      <p>Nervousness, aggression, scratching, and more</p>
                                    </div>
                                  </div>
                                </div><!--row-->
                              </div><!--reviewcntmainbx-->
                              <div class="reviewcntmainbx mb-2 mb-md-3 mb-lg-4">
                                <div class="row justify-content-center">
                                  <div class="col-lg-4 col-md-5 col-sm-6 align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-Physical-Condition.svg" class="rethimg"></div>
                                  <div class="col-lg-7 col-md-6 col-sm-6 align-self-center">
                                    <div class="reviewcntxt">
                                      <h5 class="text-left mb-0">A Physical Condition</h5>
                                      <p>External (skin, eyes etc.) or internal systems (muscular, skeletal, etc.)</p>
                                    </div>
                                </div>
                              </div><!--row-->
                            </div><!--reviewcntmainbx-->
                        </div><!--reviewcontent-->
                        <input type="button" name="GET STARTED" class="next action-button btn-main mt-2 mt-md-3 mt-lg-4" value="GET STARTED"> 
                          </fieldset>
                          <fieldset>
                            <div class="reviewcontent" id="rc_four">
                              <h2 class="mb-2 mb-md-3 mb-lg-4">WHAT'S THE BEHAVIOR YOU WANT TO ADDRESS?</h2>
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="reviewcntmainbx mb-2 mb-md-3 mb-lg-4">
                                    <div class="row">
                                      <div class="col-lg-4 col-md-5 col-sm-12 align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-Behavioral-Condition.svg" class="rethimg"></div>
                                      <div class="col-lg-8 col-md-7 col-sm-12 align-self-center">
                                        <div class="reviewcntxt">
                                          <h5>Aggression</h5>
                                          <p>(Such as: Excessive biting, scratching, barking or meowing, and not playing well with others.)</p>
                                        </div>
                                      </div>
                                    </div><!--row-->
                                  </div><!--reviewcntmainbx-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="reviewcntmainbx mb-2 mb-md-3 mb-lg-4">
                                    <div class="row">
                                      <div class="col-lg-4 col-md-5 col-sm-12 align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-Behavioral-Condition.svg" class="rethimg"></div>
                                      <div class="col-lg-8 col-md-7 col-sm-12 align-self-center">
                                        <div class="reviewcntxt">
                                          <h5>Hyperactivity</h5>
                                          <p>(Such as: Excessive jumping, scratching, chewing, digging, and high-strung behavior.)</p>
                                        </div>
                                      </div>
                                    </div><!--row-->
                                  </div><!--reviewcntmainbx-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="reviewcntmainbx mb-2 mb-md-3 mb-lg-4">
                                    <div class="row">
                                      <div class="col-lg-4 col-md-6 col-sm-12 align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-Behavioral-Condition.svg" class="alignleft"></div>
                                      <div class="col-lg-8 col-md-6 col-sm-12 align-self-center">
                                        <div class="reviewcntxt">
                                          <h5>Anxiety</h5>
                                          <p>(Such as: Nervousness, trembling, fearfulness during fireworks or loud occasions, and stress.)</p>
                                        </div>
                                      </div>
                                    </div><!--row-->
                                  </div><!--reviewcntmainbx-->
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                  <div class="reviewcntmainbx mb-2 mb-md-3 mb-lg-4">
                                    <div class="row">
                                      <div class="col-lg-4 col-md-5 col-sm-12 align-self-center"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/A-Behavioral-Condition.svg" class="alignleft"></div>
                                      <div class="col-lg-8 col-md-7 col-sm-12 align-self-center">
                                        <div class="reviewcntxt">
                                          <h5>Barking</h5>
                                          <p>(Such as: Excessive barking, especially around strangers, new environments, or other social situations.)</p>
                                        </div>
                                      </div>
                                    </div><!--row-->
                                  </div><!--reviewcntmainbx-->
                                </div>
                              </div><!--row-->
                            </div><!--reviewcontent-->
                            <a href="#." class="btn-main mt-2 mt-md-3 mt-lg-4">GET STARTED</a>
                         </fieldset>
                     </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div><!--modal-dialog-->
    </div>
</div><!--starbtn_popup_bx-->
<!--testimonial popup html-->
<div class="modal testionial_popupbx" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal">&times;</button>      
          <div class="modal-body">
            <div class="clientslideimg modalclientslideimg"><img src="" alt=""></div>
            
            <div class="clientslidecnt modalclientslide">
                
             
                
               
            </div>
              <!-- <div class="nameclient modalclientname"></div> -->
              <span class="client_slidauthorname">
                    <h4 class="modalclient slidauthorname" id="nameclient"></h4>
                   
                </span>
          </div>

     
      

    </div>
  </div>
</div>
<div class="onloadpage_popupbx" id="popup">
    <div class="onloadpopuptxt">
        <span class="clsoebtn"><i class="fas fa-times"></i></span>
        <p>Please note that we have migrated to a new website. You are requested to reset your password to access your account and start ordering!! </p>
        <a href="<?php get_home_url();?>/my-account/lost-password/" class="btn-main onloadpopupbtn">Reset your password</a>
    </div><!--onloadpopuptxt-->
</div><!--onloadpage_popupbx-->
<!--end testimonial popup html-->
<script>
 $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});

</script>
<script type="text/javascript">
    
    $('.readmorebtn').click(function(){

        var data_id = $(this).data('id');
        //alert(data_id);
        if(data_id!="")
    {
        
        $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                dataType:"json",
                data: { 
                    action: 'modal_testimonail_id',
                    data_id: data_id,
                },
                cache: false,
                success: function(data){                    
                    if(data.post_id==''){
                       //jQuery('#ajax_result').hide();  
                       //alert('blank');                      
                    }
                    else{
                      //alert(data.post_id);
                      //$('#myModal').show();
                      $('.modalclient').html(data.name_testi);
                      $('.modalclientslide').html(data.message_testi);
                      $('.modalclientslideimg').children('img').attr('src',data.image_testi);
                      //$('.modalclient_slidauthorname').text(data.name_testi);
                      
                      $('#myModal').modal('show'); 

                       
                       
                    }
                }
        });
      }
    });
</script>
<?php

get_footer();

