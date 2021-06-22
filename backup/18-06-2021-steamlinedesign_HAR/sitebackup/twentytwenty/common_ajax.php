<?php
include 'functions.php';
if($_POST['action']=="variation_custom_ajax")
{
	 echo "id";

	 
	 $variation_id = '170';
		$price = get_post_meta($variation_id, '_price', true);
		echo"<pre>";
		 print_r($price);
}

?>