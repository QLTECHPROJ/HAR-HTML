<?php

/**

 * Header file for the Twenty Twenty WordPress default theme.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */



?><!DOCTYPE html>



<html class="no-js" <?php language_attributes(); ?>>



	<head>



		<meta charset="<?php bloginfo( 'charset' ); ?>">

		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.png'?>" />

		<link rel="profile" href="https://gmpg.org/xfn/11">



		<?php wp_head(); ?>



	</head>



	<body <?php body_class(); ?>>



		<?php

		wp_body_open();

		?>
	<?php
	if ( is_front_page() && is_home() ) 
	{
		
		?>
<div class="header_toppopupnots text-center">
    <div class="container">

    <p> <?php echo do_shortcode('[global_offer_banner]');?></p>
    <span class="htclosebtn"><i class="fas fa-times"></i></span>
  </div>
</div><!--header_toppopupnots-->
<?php
}
?>

<header class="header">
	
  <div class="headertop">
    	<div class="container">
        	<div class="header_topleft">
            	<a href="#." class="hthreiconcntbx"><i class="fa fa-credit-card"></i>SAFE PAYMENT</a>
                <a href="#." class="hthreiconcntbx"><i class="fas fa-truck"></i>FREE SHIPPING on orders $80+</a>
                <a href="#." class="hthreiconcntbx"><i class="fas fa-shield-alt"></i>SATISFACTION GUARANTEED*</a>
            </div>
            <div class="header-topright">
            	<div class="curriens_list">
                	<!-- <select class="form-control" name="currencies"> 															 							
                            <option value="$ AUD">$ AUD</option> 
                            <option value="$ USD">$ USD</option> 
                            <option value="$ CAD">$CAD</option> 
                            <option value="$ GBP">$ GBP</option> 
                            <option value="$ EUR">$ EUR</option> 
                            <option value="$ JPY">$JPY</option> 
                            <option value="$ KRW">$ KRW</option>
                    	</select> -->
                      <?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]');?>
                    
                </div>
            	<div class="select_languagebx">
                	<div class="selectbox">
                    	<span class="select_arrow"></span>
                        <select class="vodiapicker form-control">
                    		<!-- <option value="en" class="test" data-thumbnail="background:url(images/en_icon.png)"><img src="<?php echo get_template_directory_uri() . '/assets/images/en_icon.png'?>">English</option>
                            <option data-imagesrc="background-image:https://sdtimes.com/wp-content/uploads/2018/09/Java-logo-490x301.jpg">Python programming</option> -->
        				</select>
                    
                    </div>
                </div>
            </div>
        </div>
    </div><!--headertop-->
	<div class="main-header">
        <div class="container">
            <a href="https://steamlinedesign.com/HAR/" class="logo">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/new_logo.png'?>" class="img-fluid" alt="">
            </a>
           <div class="headrright">
                    <div class="searchbx">
                        <!-- <input type="text" value="" placeholder="Pets Symptoms or Diagnosis">
                        <button type="submit" class="serachicon"><i class="fas fa-search"></i></button> -->
                        <?php echo do_shortcode('[aws_search_form]');?>
                        <?php //if ( function_exists( 'aws_get_search_form' ) ) { aws_get_search_form(); } ?>
                    </div>
                    <div class="searchbxmo">
                        <button type="submit" class="mobserachicon"><i class="fas fa-search"></i></button>
                        <div class="search-box">
                           <input type="text" value="" placeholder="Pets Symptoms or Diagnosis">
                            <button type="submit" class="serachicon"><i class="fas fa-search"></i></button>
                        </div>
                   </div><!--searchbxmo-->
                    <a href="<?php echo wc_get_cart_url();?>" class="shoppingcartbx">
                        <span class="shoppingcarticon"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 450.391 450.391" style="enable-background:new 0 0 450.391 450.391;" xml:space="preserve"><path d="M143.673,350.322c-25.969,0-47.02,21.052-47.02,47.02c0,25.969,21.052,47.02,47.02,47.02 c25.969,0,47.02-21.052,47.02-47.02C190.694,371.374,169.642,350.322,143.673,350.322z M143.673,423.465 c-14.427,0-26.122-11.695-26.122-26.122c0-14.427,11.695-26.122,26.122-26.122c14.427,0,26.122,11.695,26.122,26.122 C169.796,411.77,158.1,423.465,143.673,423.465z"/><path d="M342.204,350.322c-25.969,0-47.02,21.052-47.02,47.02c0,25.969,21.052,47.02,47.02,47.02s47.02-21.052,47.02-47.02 C389.224,371.374,368.173,350.322,342.204,350.322z M342.204,423.465c-14.427,0-26.122-11.695-26.122-26.122 c0-14.427,11.695-26.122,26.122-26.122s26.122,11.695,26.122,26.122C368.327,411.77,356.631,423.465,342.204,423.465z"/><path d="M448.261,76.037c-2.176-2.377-5.153-3.865-8.359-4.18L99.788,67.155L90.384,38.42 C83.759,19.211,65.771,6.243,45.453,6.028H10.449C4.678,6.028,0,10.706,0,16.477s4.678,10.449,10.449,10.449h35.004 c11.361,0.251,21.365,7.546,25.078,18.286l66.351,200.098l-5.224,12.016c-5.827,15.026-4.077,31.938,4.702,45.453 c8.695,13.274,23.323,21.466,39.184,21.943h203.233c5.771,0,10.449-4.678,10.449-10.449c0-5.771-4.678-10.449-10.449-10.449 H175.543c-8.957-0.224-17.202-4.936-21.943-12.539c-4.688-7.51-5.651-16.762-2.612-25.078l4.18-9.404l219.951-22.988 c24.16-2.661,44.034-20.233,49.633-43.886l25.078-105.012C450.96,81.893,450.36,78.492,448.261,76.037z M404.376,185.228 c-3.392,15.226-16.319,26.457-31.869,27.69l-217.339,22.465L106.58,88.053l320.261,4.702L404.376,185.228z"/></svg></span>
                        <span class="shoppingtxt">
                            <strong>SHOPPING CART</strong>
                            <p class="priceshopping">0 items - <?php woocommerce_mini_cart(); ?></p>
                        </span>
                    </a>
                    <div class="mob-curriensbx">
                        <div class="curriens_list">
                            <!-- <select class="form-control" name="currencies">                                                                                        
                                    <option value="$ AUD">$ AUD</option> 
                                    <option value="$ USD">$ USD</option> 
                                    <option value="$ CAD">$CAD</option> 
                                    <option value="$ GBP">$ GBP</option> 
                                    <option value="$ EUR">$ EUR</option> 
                                    <option value="$ JPY">$JPY</option> 
                                    <option value="$ KRW">$ KRW</option>
                                </select> -->
                              <?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]');?>
                            
                        </div>
                    </div>	
                </div>
        </div>
    </div>
   <!--  <?php
  wp_nav_menu( array(
       'theme_location' => 'primary-menu',
       'menu_id'        => 'primary-menu',
       'depth' => 0,
       'container_class' => 'nav navbar',
  ) );
?> -->
    <div class="header_bottom">
        <div class="container">
           <nav class="navbar navbar-expand-xl navbar-light " className="bg-none">
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
              
                <div class="justify-content-center" id="">
                  <?php

                    wp_nav_menu( array( 
                        'theme_location' => 'my-custom-menu', 
                        'container' => 'ul',
                        'menu_class'=> 'navbar-nav',
                        'add_li_class'  => 'nav-item',
                        'walker' => new Primary_Walker_Nav_Menu()

                     ) ); 
                  ?>
                    <!-- <ul class="navbar-nav">
                        <div>
                            <li class="nav-item">
                                <a class="nav-link active" href="index.html">Home</a>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item dropdown position-static"><a class="nav-link dropdown-toggle main-menu-toggle" href="javascript:void(0)" id="navbarDropdown" role="button"data-toggle="dropdown">Categories</a>
                                <ul class="dropdown-menu main-menu">
                                   <li><a href="#.">Allergies</a></li>
                                   <li><a href="#.">Bacteria</a></li>
                                   <li><a href="#.">Behaviour</a></li>
                                   <li><a href="#.">Bird</a></li>
                                   <li><a href="#.">Bladder</a></li>
                                   <li><a href="#.">Bleeding</a></li>
                                   <li><a href="#.">Blockages</a></li>
                                   <li><a href="#.">Blood</a></li>
                                   <li><a href="#.">Bone</a></li>
                                   <li><a href="#.">Bowel</a></li>
                                   <li><a href="#.">Brain</a></li>
                                   <li><a href="#.">Cancer</a></li>
                                   <li><a href="#.">Cat</a></li>
                                   <li><a href="#.">Detox</a></li>
                                   <li><a href="#.">Digestion</a></li>
                                   <li><a href="#.">Disease</a></li>
                                   <li><a href="#.">Dog</a></li>
                                   <li><a href="#.">Ear</a></li>
                                   <li><a href="#.">Emergency</a></li>
                                   <li><a href="#.">Endocrine</a></li>
                                   <li><a href="#.">Equine</a></li>
                                   <li><a href="#.">Eyes</a></li>
                                   <li><a href="#.">Fungal</a></li>
                                   <li><a href="#.">Glands</a></li>
                                   <li><a href="#.">Heart</a></li>
                                   <li><a href="#.">Hormone</a></li>
                                   <li><a href="#.">Immune</a></li>
                                   <li><a href="#.">Infection</a></li>
                                   <li><a href="#.">Inflammation</a></li>
                                   <li><a href="#.">Injury</a></li>
                                   <li><a href="#.">Joints</a></li>
                                   <li><a href="#.">Kidney</a></li>
                                   <li><a href="#.">Kits</a></li>
                                   <li><a href="#.">Liver</a></li>
                                   <li><a href="#.">Lungs</a></li>
                                   <li><a href="#.">Lymph</a></li>
                                   <li><a href="#.">Mature</a></li>
                                   <li><a href="#.">Metabolic</a></li>
                                   <li><a href="#.">Mouth</a></li>
                                   <li><a href="#.">Muscle</a></li>
                                   <li><a href="#.">Nerves</a></li>
                                   <li><a href="#.">Neurological</a></li>
                                   <li><a href="#.">Nose</a></li>
                                   <li><a href="#.">Old Age</a></li>
                                   <li><a href="#.">Organs</a></li>
                                   <li><a href="#.">Pain</a></li>
                                   <li><a href="#.">Paralysis</a></li> 
                                </ul>
                            </li>
                        </div>
                        <div>
                            <li class="nav-item"><a class="nav-link" href="#.">Product List</a></li>
                        </div>
                        <div>
                            <li class="nav-item"><a class="nav-link" href="#.">Home Therapy Instructions</a></li>
                        </div>
                        <div>
                            <li class="nav-item"><a class="nav-link" href="#.">Blog</a></li>
                        </div>
                    	  <div>
                        	<li class="nav-item dropdown position-static"><a class="nav-link dropdown-toggle main-menu-toggle" href="javascript:void(0)" id="navbarDropdown" role="button"data-toggle="dropdown">Pet Health</a>
                                <div class="dropdown-menu main-menu petmenubx">
                                	<div class="row">
                                    	<div class="col-lg-4 col-md-4 col-sm-6 menusubbx">
                                        	<h6>Article List (A-F)</h6>
                                        	<ul>
                                           <li><a href="#.">About our Naturopathic Remedies for Animals</a></li>
                                           <li><a href="#.">Avoid Toxins and Poisons</a></li>
                                           <li><a href="#.">Cancer Conditions</a></li>
                                           <li><a href="#.">Dangers of Commercial Food</a></li>
                                           <li><a href="#.">Emergency Or Casual - Vitamin C Dosing for All Species</a></li>
                                           <li><a href="#.">Euthanasia and the Right Time!</a></li>
                                           <li><a href="#.">Feline General Diet Info</a></li>
                                   		</ul>
                                		</div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 menusubbx">
                                        	<h6>Article List (G-R)</h6>
                                            <ul>
                                               <li><a href="#.">Herbal Liquid Tincture</a></li>
                                               <li><a href="#.">Herbs for Animals</a></li>
                                               <li><a href="#.">Home Pet Remedies</a></li>
                                   				<li><a href="#.">How to do Enemas at Home (“Acute” Constipation)</a></li>
                                               <li><a href="#.">Natural Alternative to Vaccine</a></li>
                                               <li><a href="#.">Oral Feeding when your Pet is Sick</a></li>
                                               <li><a href="#.">Pet Sterilization</a></li>
                                               <li><a href="#.">Pet’s Immune System for Optimum Health</a></li>
                                               <li><a href="#.">Recommended Canine Diet</a></li>
                                               <li><a href="#.">Recommended Feline Diet</a></li>
                                                
                                            </ul>
                                		</div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 menusubbx">
                                        	<h6>Article List (S-Z)</h6>
                                            <ul class="">
                                   				<li><a href="#.">Surgery and Natural Therapies</a></li>
                                   				<li><a href="#.">TTouch Therapy</a></li>
                                   				<li><a href="#.">Tooth Decay and Why?</a></li>
                                   				<li><a href="#.">Veterinary Drugs</a></li>
                                   				<li><a href="#.">Vitamin C Snake Bite Emergency</a></li>
                                   				<li><a href="#.">What is Homeopathy?</a></li>
                                   				<li><a href="#.">What is a Homeopathic “Dose”?</a></li>
                                   				<li><a href="#.">Why Does My Pet Get Sick?</a></li>
                                   
                                			</ul>
                                		</div>
                                	</div>
                                </div>
                            </li>
                        </div>
                      	<div>
                              <li class="nav-item"><a class="nav-link" href="#.">Wholesale</a></li>
                          </div>
                      	<div>
                              <li class="nav-item"><a class="nav-link" href="#.">Contact Us</a></li>
                          </div>
                      	<div>
                          <li class="nav-item"><a class="nav-link" href="#.">My Account</a></li>
                      </div>
                    
                    </ul> -->
                </div>
            </div>
            </nav>
        </div>
    </div>
</header>
<script type="text/javascript">
	
	$(function() {
		$('ul li ul li').find('ul').removeClass('dropdown-menu main-menu petmenubx scrollable-menu');
		$('li.menusubbx a').addClass('headerbold');
		$('ul li ul li ul').find('a').removeClass('headerbold');
		// $('#menu-item-166 a').addClass('dropdown-toggle main-menu-toggle');
		// $('ul li ul li ul').find('a').removeClass('dropdown-toggle main-menu-toggle');
		
		// $('#menu-item-205 ul').removeClass('dropdown-menu main-menu petmenubx');
	    // $('#menu-item-206 ul').removeClass('dropdown-menu main-menu petmenubx');
	    
	});
</script>


		<?php

		// Output the menu modal.

		get_template_part( 'template-parts/modal-menu' );

