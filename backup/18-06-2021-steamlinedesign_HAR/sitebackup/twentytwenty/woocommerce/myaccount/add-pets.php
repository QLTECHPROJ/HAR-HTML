<?php


defined( 'ABSPATH' ) || exit;

global $wpdb;

$customer_id =  get_current_user_id();

 	$user_data             = get_userdata( $customer_id );
    $customer_login_name   = $user_data->user_login;
    $customer_login_email  = $user_data->user_email;

$table_name = "har_save_pet_order_data";


//echo $id;

	//$result = $wpdb->get_results("SELECT * FROM har_save_pet_order_data WHERE id = '$id' GROUP BY pet_animal_name");

    //echo "<pre>";
    //print_r($result);

?>

<div class="dashboardtable">
	<div class="acdetailsformbx">
		<form class="woocommerce-EditAccountForm edit-account acdetailformbx contact-form" id="pet_form">

		
			<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id;?>">

      <input type="hidden" name="customer_login_email" id="customer_login_email" value="<?php echo $customer_login_email;?>">

      <input type="hidden" name="customer_login_name" id="customer_login_name" value="<?php echo $customer_login_name;?>">	

				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Your Pet Or Animals Name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="pet_animal_name" id="pet_animal_name" placeholder=""  autocomplete="address-level2" required=""></span></p>

			

				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Species&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="species" id="species" placeholder=""  autocomplete="address-level2"></span></p>

			

				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Breed&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="breed" id="breed" placeholder=""  autocomplete="address-level2"></span></p>



				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Age (if known)&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="number" class="input-text " name="age" id="age" placeholder=""  autocomplete="address-level2"></span></p>


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Diet currently being fed&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="diet_cuurently_being" id="diet_cuurently_being" placeholder=""  autocomplete="address-level2"></span></p>




				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">What Vet Drugs are currently being used?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="vet_drugs" id="vet_drugs" placeholder=""  autocomplete="address-level2"></span></p>




				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Vet Diagnosis (if known)&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="vet_diagnosis" id="vet_diagnosis" placeholder=""  autocomplete="address-level2"></span></p>

			



				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Do you use "chemical insecticide drugs" (heart worm, flea, worming etc), if so what ones?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="chemical_drugs" id="chemical_drugs" placeholder=""  autocomplete="address-level2"></span></p>


		


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Which of our HAMPL remedies have you been using recently?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="hampl_remedies" id="hampl_remedies" placeholder=""  autocomplete="address-level2"></span></p>


			


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">If still vaccinating, how often does your pet get a injection?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="pet_injection" id="pet_injection" placeholder=""  autocomplete="address-level2"></span></p>

			


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Describe ALL SYMPTOMS currently showing with your pet (IMPORTANT).&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="symptoms" id="symptoms" placeholder=""  autocomplete="address-level2" required=""></span></p>

        <div class="pet_btn_tabbx">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				
				<input type="button" class="btn-main" name="SubmitBtn" id="submitbtn" autocomplete="given-name" value="Submit" />

        </p>
        <span id="petanimalcheck" style="display: none;">Petname is mandatory</span>
        <span id="agecheck" style="display: none;">age Cannot be in minus or zero</span>
        <span id="symptomscheck" style="display: none;">symptoms is mandatory</span>
        <span id="duplicatecheck" style="display: none;">Pet name Already Exits</span>
        <span id="errorcheck" style="display: none;">Erro</span>
        
      </div>

		</form>

    <script type="text/javascript">

      $("#pet_form").keypress(function(){

        $('#petanimalcheck').hide();
        $('#agecheck').hide();
        $('#symptomscheck').hide();
        $('#duplicatecheck').hide();
        $('#errorcheck').hide();



      });

    </script>

    <script type="text/javascript">
      
      $("#submitbtn").click(function(){
        

        var check = true;

        var customer_id = $('#customer_id').val();
        var customer_login_email = $('#customer_login_email').val();
        var customer_login_name = $('#customer_login_name').val();
        var pet_animal_name = $('#pet_animal_name').val();
        var species = $('#species').val();
        var breed = $('#breed').val();
        var age = $('#age').val();
        var diet_cuurently_being = $('#diet_cuurently_being').val();
        var vet_drugs = $('#vet_drugs').val();
        var vet_diagnosis = $('#vet_diagnosis').val();
        var chemical_drugs = $('#chemical_drugs').val();
        var hampl_remedies = $('#hampl_remedies').val();
        var pet_injection = $('#pet_injection').val();
        var symptoms = $('#symptoms').val();



        
                if(pet_animal_name!='')
                {

                      if(symptoms!='')
                      {
                          if(age!='')
                          {
                            if(age <= 0)
                            {
                                $('#agecheck').show();
                                check = false;
                                return false;
                            }
                          }

                          if(check==true)
                        { 
                        $.ajax({
                                type: "POST",
                                url: "/HAR/wp-admin/admin-ajax.php",
                                dataType:"json",
                                data: { 
                                    action: 'add_pets_ajax',
                                    customer_id: customer_id,
                                    customer_login_email: customer_login_email,
                                    customer_login_name: customer_login_name,
                                    pet_animal_name: pet_animal_name,
                                    species: species,
                                    breed: breed,
                                    age: age,
                                    diet_cuurently_being: diet_cuurently_being,
                                    vet_drugs: vet_drugs,
                                    vet_diagnosis: vet_diagnosis,
                                    chemical_drugs: chemical_drugs,
                                    hampl_remedies: hampl_remedies,
                                    pet_injection: pet_injection,
                                    symptoms: symptoms,

                                },
                                cache: false,
                                success: function(data){                    
                                    if(data.msg=='duplicate'){


                                       $('#duplicatecheck').show();  
                                           
                                                         
                                    }
                                    else if(data.msg=='error')
                                    {
                                      $('#errorcheck').show();
                                    }
                                    else if(data.msg=='success')
                                    {
                                        window.location.href = 'https://steamlinedesign.com/HAR/my-account/pets/';
                                    }
                                    else{
                                      //alert(data.price);
                                       ////echo "<script> window.location.href = 'https://steamlinedesign.com/HAR/my-account/pets/';   
                                       
                                    }
                                }
                        });
                       }
                      }
                      else
                      {
                          $('#symptomscheck').show();
                      }
                  }
                  else
                  {
                      $('#petanimalcheck').show();
                  }
            
    });
    </script>

		<!-- <?php
  
		if(isset($_POST['SubmitBtn'])) 
     	{


     		/*echo "<pre>";
     		print_r($_POST);*/
     		//exit();

  			//$entry_array = array();
  			$pet_animal_name = $_POST['pet_animal_name'];
  			$species = $_POST['species'];
  			$breed = $_POST['breed'];
  			$age = $_POST['age'];
  			$diet_cuurently_being = $_POST['diet_cuurently_being'];
  			$vet_drugs = $_POST['vet_drugs'];
  			$vet_diagnosis = $_POST['vet_diagnosis'];
  			$chemical_drugs = $_POST['chemical_drugs'];
  			$hampl_remedies = $_POST['hampl_remedies'];
  			$pet_injection = $_POST['pet_injection'];
  			$symptoms = $_POST['symptoms'];

        $data = array(
        'username'          => $customer_login_name,
        'user_id' 			=> $customer_id,
        'pet_animal_name'   => $pet_animal_name,
        'species'   => $species,
        'breed'   => $breed,
        'age'   => $age,
        'diet_currently_being_fed'   => $diet_cuurently_being,
        'what_veg_drugs_are_currently_being_used'   => $vet_drugs,
        'vet_diagnosis'   => $vet_diagnosis,
        'do_use_chemical_drugs'   => $chemical_drugs,
        'which_of_our_hampl_remedies'   => $hampl_remedies,
        'if_still_vaccinating'   => $pet_injection,
        'describe_all_symptonms'   => $symptoms,
    );


  			
  			

     		//exit();

			 $wpdb->insert( $table_name, $data );

			if (is_wp_error($result_update)) 
			{
            	echo "Error.";
        	} 
        	else 
        	{
            	//success, so redirect
            	echo "<script> window.location.href = 'https://steamlinedesign.com/HAR/my-account/pets/'; </script>";
            	
        	}

		}

		?> -->
	</div>
</div>