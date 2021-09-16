<?php

/**

 * The template for displaying the footer

 *

 * Contains the opening of the #site-footer div and all content after.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package WordPress

 * @subpackage Twenty_Twenty

 * @since Twenty Twenty 1.0

 */



?>

			
<footer>
	<div class="footer_firstrowbx">
        <div class="container">
            <div class="footer_subscribebx">
                <h2>Subscribe to the exclusive deals!</h2>
                <div class="footersubscribe_formbx">
                    <?php  gravity_form(2, false, false, false, '', true, 12);  ?>
                    <!-- <input type="text" value="" placeholder="Enter your email here..." class="form-control">
                    <button type="submit" class="serachicon"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve"><path d="M507.608,4.395c-4.243-4.244-10.609-5.549-16.177-3.321L9.43,193.872c-5.515,2.206-9.208,7.458-9.42,13.395 c-0.211,5.936,3.101,11.437,8.445,14.029l190.068,92.181l92.182,190.068c2.514,5.184,7.764,8.455,13.493,8.455 c0.178,0,0.357-0.003,0.536-0.01c5.935-0.211,11.189-3.904,13.394-9.419l192.8-481.998 C513.156,15.001,511.851,8.638,507.608,4.395z M52.094,209.118L434.72,56.069L206.691,284.096L52.094,209.118z M302.883,459.907
     l-74.979-154.599l228.03-228.027L302.883,459.907z"/></svg></button>-->
                </div>
            </div>
            <div class="footer_main">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="mobile-accordion mobile-toggle ftmainbx footerlogo">
                            <?php
                                if(is_active_sidebar('footer-1')){
                                    dynamic_sidebar('footer-1');
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="mobile-accordion mobile-toggle ftmainbx">
                            <?php
                                if(is_active_sidebar('footer-2')){
                                    dynamic_sidebar('footer-2');
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="mobile-accordion mobile-toggle ftmainbx">
                            <?php
                                if(is_active_sidebar('footer-3')){
                                    dynamic_sidebar('footer-3');
                                }
                            ?>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="mobile-accordion mobile-toggle ftmainbx">
                            <?php
                                if(is_active_sidebar('footer-4')){
                                    dynamic_sidebar('footer-4');
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-12">
                        <div class="mobile-accordion mobile-toggle ftmainbx">
                            <?php
                                if(is_active_sidebar('footer-5')){
                                    dynamic_sidebar('footer-5');
                                }
                            ?>
                        </div>
                    </div>
                 </div>
                <div class="footer_maintxt">
                    <?php
                        if(is_active_sidebar('footer-6')){
                            dynamic_sidebar('footer-6');
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
     <div class="footerheadertop">
        <div class="container">
            <div class="header_topleft">
                <a href="#." class="hthreiconcntbx"><i class="far fa-credit-card"></i>SAFE PAYMENT</a>
                <a href="#." class="hthreiconcntbx"><i class="fas fa-truck"></i>FREE SHIPPING on orders $80+</a>
                <a href="#." class="hthreiconcntbx"><i class="fas fa-shield-alt"></i>SATISFACTION GUARANTEED*</a>
            </div>
            
        </div>
    </div><!--footerheadertop-->
    <div class="coprightbx">
        <div class="container">
            <div class="cpyrightleft">
            <p>© <?php echo date(Y);?> Holistic Animal Remedies.</p>
            </div>
    	    <?php
                if(is_active_sidebar('footer-7')){
                    dynamic_sidebar('footer-7');
                }
            ?>
        
        </div>
    </div>
</footer>



		<?php wp_footer(); ?>

<script>

 $(".clsoebtn").click(function(){
            $(".onloadpage_popupbx").hide();
          });
</script>

	</body>

</html>

