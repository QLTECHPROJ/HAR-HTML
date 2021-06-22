<?php


defined( 'ABSPATH' ) || exit;

global $wpdb;

$id = get_query_var('view-pets');

$table_name = "har_save_pet_order_data";


//echo $id;

	$result = $wpdb->get_results("SELECT * FROM har_save_pet_order_data WHERE id = '$id'");

    //echo "<pre>";
    //print_r($result);

?>

<div class="dashboardtable">
	<div class="acdetailsformbx">
		<form class="woocommerce-EditAccountForm edit-account acdetailformbx contact-form" action="" method="post">

		
				

				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Your Pet Or Animals Name&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="pet_animal_name" id="pet_animal_name" placeholder="" value="<?php echo $result[0]->pet_animal_name; ?>" autocomplete="address-level2" required="" readonly></span></p>

			

				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Species&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="species" id="species" placeholder="" value="<?php echo $result[0]->species; ?>" autocomplete="address-level2"></span></p>

			

				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Breed&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="breed" id="breed" placeholder="" value="<?php echo $result[0]->breed; ?>" autocomplete="address-level2"></span></p>



				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Age (if known)&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="number" class="input-text " name="age" id="age" placeholder="" value="<?php echo $result[0]->age; ?>" autocomplete="address-level2"></span></p>


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Diet currently being fed&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="diet_cuurently_being" id="diet_cuurently_being" placeholder="" value="<?php echo $result[0]->diet_currently_being_fed; ?>" autocomplete="address-level2"></span></p>




				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">What Vet Drugs are currently being used?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="vet_drugs" id="vet_drugs" placeholder="" value="<?php echo $result[0]->what_veg_drugs_are_currently_being_used; ?>" autocomplete="address-level2"></span></p>




				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Vet Diagnosis (if known)&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="vet_diagnosis" id="vet_diagnosis" placeholder="" value="<?php echo $result[0]->vet_diagnosis; ?>" autocomplete="address-level2"></span></p>

			



				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Do you use "chemical insecticide drugs" (heart worm, flea, worming etc), if so what ones?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="chemical_drugs" id="chemical_drugs" placeholder="" value="<?php echo $result[0]->do_use_chemical_drugs; ?>" autocomplete="address-level2"></span></p>


		


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Which of our HAMPL remedies have you been using recently?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="hampl_remedies" id="hampl_remedies" placeholder="" value="<?php echo $result[0]->which_of_our_hampl_remedies; ?>" autocomplete="address-level2"></span></p>


			


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">If still vaccinating, how often does your pet get a injection?&nbsp;<abbr class="required" title="required"></abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="pet_injection" id="pet_injection" placeholder="" value="<?php echo $result[0]->if_still_vaccinating; ?>" autocomplete="address-level2"></span></p>

			


				<p class="form-row address-field validate-required form-row-wide" id="billing_city_field" data-priority="70" data-o_class="form-row form-row-wide address-field validate-required"><label for="billing_city" class="">Describe ALL SYMPTOMS currently showing with your pet (IMPORTANT).&nbsp;<abbr class="required" title="required">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="symptoms" id="symptoms" placeholder="" value="<?php echo $result[0]->describe_all_symptonms; ?>" autocomplete="address-level2" required=""></span></p>

        <div class="pet_btn_tabbx">
				<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				
				<input type="submit" class="woocommerce-Input woocommerce-Input--text input-text" name="SubmitBtn" id="account_first_name" autocomplete="given-name" value="Submit" />

        </p>&nbsp;&nbsp;&nbsp;&nbsp;
        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<input type="submit" class="woocommerce-Input woocommerce-Input--text input-text whitebtn" name="InactiveBtn" id="Inactive" autocomplete="given-name" value="Inactive" />
				</p>
      </div>
		</form>
		<?php

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

			$result_update = $wpdb->update( $table_name, $data ,array('id'=>$id));

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

		if(isset($_POST['InactiveBtn'])) 
     	{

     	/*	echo "<pre>";
     		print_r($_POST);
     		exit();*/

  			//$entry_array = array();
  			$data = array(
        'flag'   => 1,
         );

      
  			
  			//print_r($entry_array_status);

     		//exit();

			 $result_inactive = $wpdb->update( $table_name, $data ,array('id'=>$id));

			     if (is_wp_error($result_inactive)) 
			     {
            	echo "Error.";
        	 } 
        	else 
        	{
            	//success, so redirect
            	echo "<script> window.location.href = 'https://steamlinedesign.com/HAR/my-account/pets/'; </script>";
            	
        	}

		}
		?>
	</div>
</div>