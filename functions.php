<?php

add_action( 'wp_enqueue_scripts', 'porto_child_css', 1001 );

// Load CSS
function porto_child_css() {
	// porto child theme styles
	wp_deregister_style( 'styles-child' );
	wp_register_style( 'styles-child', esc_url( get_stylesheet_directory_uri() ) . '/style.css' );
	wp_enqueue_style( 'styles-child' );


  if (is_wc_endpoint_url('edit-address')) {
    echo "<style>.woocommerce-Address.address .edit.button.wc-action-btn.mt-3.px-4 {display: none !important;}</style>"; 
}

	if ( is_rtl() ) {
		wp_deregister_style( 'styles-child-rtl' );
		wp_register_style( 'styles-child-rtl', esc_url( get_stylesheet_directory_uri() ) . '/style_rtl.css' );
		wp_enqueue_style( 'styles-child-rtl' );
	}
}
require_once('custom-widget-next-delivery-slot.php');
/** Remove product data tabs */
 
add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}

/*if(!is_user_logged_in()) {
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30);
}

add_action('woocommerce_single_product_summary', function() {
    global $product_id;
    if(!is_user_logged_in()) {
        $message = __("You need to be logged in to be able adding to cart…", "woocommerce");
        $button_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $button_text = __("Login or register", "woocommerce");
        $message .= ' <a href="'.$button_link.'" class="login-register button" style="float:right;">'.$button_text.'</a>';
        //echo $message;
    }

});

add_action('woocommerce_get_price_html','login_before_addtocart');

function login_before_addtocart($price)
{

	if(is_user_logged_in() )
	{
		return $price;
	}
	else 
	{
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );	
		$response .= $price;
		$response .= '<br><a href="' .get_permalink(woocommerce_get_page_id('myaccount')). '"><h3 class="woocommerce-loop-product__title1">Login to add product into cart</a></h3>';
		return $response;
   }
}*/


//display custom message after checkout in thank you page for non logged user




// Add custom notice to WooCommerce thank you page for non-logged-in users
function change_order_received_text() {
    // Check if the current user is not logged in
    if (!is_user_logged_in()) {
        // Display the custom notice
        //wc_add_notice('Custom notice for non-logged-in users. Your message goes here.', 'notice');
		echo "Congratulations! Your account has been successfully created";
    }else{
		echo "Thank you. Your order has been received.";
	}
}
//add_action('woocommerce_thankyou', 'custom_thankyou_notice_for_non_logged_in_users', 11, 1);
add_filter('woocommerce_thankyou_order_received_text', 'change_order_received_text', 10, 2 );

// Replacing add-to-cart button in shop pages and archives pages (forn non logged in users)

/*------------------------------

add_filter( 'woocommerce_loop_add_to_cart_link', 'conditionally_change_loop_add_to_cart_link', 10, 2 );
function conditionally_change_loop_add_to_cart_link( $html, $product ) {

    if ( ! is_user_logged_in() ) {
        $link = get_permalink($product->get_id());
		$button_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $button_text = __( "Add to Cart", "woocommerce" );
        //$html = '<a href="'.$link.'" class="button alt add_to_cart_button">'.$button_text.'</a>';
		$html = '<a href="'.$button_link.'" class="button alt add_to_cart_button" onclick="testFunction()">'.$button_text.'</a>';
		//$html = '<button onclick="testFunction()">My Button</button>';
		
    }
    return $html;
}

function my_php_function()
{
    echo '<script>
    function check()
    {
        alert("Please Login or Register to make a purchase");
    }
    function testFunction() {
      check();
    }
  </script>';
}
add_action( 'wp_footer', 'my_php_function' );


------------------------------*/


// Avoid add to cart for non logged user (or not registered)
/*add_filter( 'woocommerce_add_to_cart_validation', 'logged_in_customers_validation', 10, 3 );
function logged_in_customers_validation( $passed, $product_id, $quantity) {
    if( ! is_user_logged_in() ) {
        $passed = false;

        // Displaying a custom message
        $message = __("You need to be logged in to be able adding to cart…", "woocommerce");
        $button_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $button_text = __("Login or register", "woocommerce");
        $message .= ' <a href="'.$button_link.'" class="login-register button" style="float:right;">'.$button_text.'</a>';

        wc_add_notice( $message, 'error' );
    }
    return $passed;
}*/

/*------------------------------

if(!is_user_logged_in()) {
   // remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30);
}

function productsummary()
{
	global $product;
  $product_id=$product->get_id();

  /*$variation_title=$product->get_variation_attributes();

  foreach($variation_title as $var_name => $var_val){

        echo $var_name;
      print_r($var_val);
  }
  
  $variations_attrib="<ul class='filter-item-list' data-name='attribute_pa_color'>";
 // $product = wc_get_product($product_id);
   
   
  if ($product && $product->is_type('variable')) {

   
    // Get variations
    $variations = $product->get_available_variations();
      
    // Display each variation
    foreach ($variations as $variation) {
        $variation_id = $variation['variation_id'];
        $variation_obj = new WC_Product_Variation($variation_id);

       $variations_attrib.="<li> <a href='#' class='filter-color' data-value=''>". implode(', ', $variation_obj->get_variation_attributes())."</a></li>" ;
    }

    $variations_attrib.="</ul><br>";
}*/

/*------------------------------

    if(!is_user_logged_in()) {
       // $message = __("You need to be logged in to add a product to your cart", "woocommerce");
        $button_link = get_permalink( get_option('woocommerce_myaccount_page_id') );
        $button_text = __("Add to Cart", "woocommerce");
        $message .= ' <a href="'.$button_link.'" class="login-register button" onclick="testFunction1()">'.$button_text.'</a>';
        $message.="<style>.single_variation_wrap,.quantity.buttons_added,button.single_add_to_cart_button.button.alt,.sticky-product.pos-top  {
          display: none !important;
      }
      .single-product .cart:not(.variations_form), .single_variation_wrap {
        border: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
      </style>";
        echo $message;
    }
}
add_action('woocommerce_single_product_summary', 'productsummary', 30);

function my_php_function1()
{
    echo '<script>
    function check1()
    {
        alert("Please Login or Register to make a purchase");
    }
    function testFunction1() {
      check1();
    }
  </script>';
}
add_action( 'wp_footer', 'my_php_function1' );

--------------------------*/





function my_php_function2()
{
	echo '<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCk0fpQ6jB25Nutdk1z6uNHtJzE33fem18" type="text/javascript"></script>';
    echo "<script>
  function initialize() {
    var input = document.getElementById('addressTxt');
    if (input !== null) {
      var options = {
        componentRestrictions: {
          country: 'ZA'
        },
        fields: ['name', 'geometry.location', 'place_id', 'formatted_address'],
        // types: 'cities'
      };
      var autocomplete = new google.maps.places.Autocomplete(input, options);
		google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
			document.getElementById('address').value = place.formatted_address;
			document.getElementById('address1').value = place.address_components[0];
            //alert('This function is working!');
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
	
  }
  google.maps.event.addDomListener(window, 'load', initialize);
  
  function secondinitialize() {
    var input = document.getElementById('fulladdressTxt');
    if (input !== null) {
      var options = {
        componentRestrictions: {
          country: 'ZA'
        },
        fields: ['name', 'geometry.location', 'place_id', 'formatted_address'],
        // types: 'cities'
      };
      var autocomplete2 = new google.maps.places.Autocomplete(input, options);
		google.maps.event.addListener(autocomplete2, 'place_changed', function () {
            var place2 = autocomplete2.getPlace();
            document.getElementById('city3').value = place2.name;
            document.getElementById('cityLat1').value = place2.geometry.location.lat();
            document.getElementById('cityLng1').value = place2.geometry.location.lng();
			document.getElementById('fulladdress').value = place2.formatted_address;
			//document.getElementById('address1').value = place2.address_components[0];
            //alert('This function is working!');
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
	
  }
  google.maps.event.addDomListener(window, 'load', secondinitialize);

</script>";
}
add_action( 'wp_footer', 'my_php_function2' );

    function wooc_extra_register_fields() {
		?>           
           <p class="form-row form-row-first">
           <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
           <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
           </p>
           <p class="form-row form-row-last">
           <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
           <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
           </p>
           <!--<p class="form-row form-row-wide">
           <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
           <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
           </p>-->
           <p class="form-row form-row-wide">
           <label for="reg_billing_address"><?php _e( 'Address', 'woocommerce' ); ?><span class="required">*</span></label>
           <input type="text" class="input-text" name="billing_address" id="addressTxt" value="<?php if ( ! empty( $_POST['billing_address'] ) ) esc_attr_e( $_POST['billing_address'] ); ?>" autocomplete="on" />
           <input type="hidden" id="city2" name="city2" />
            <input type="hidden" id="address" name="address" />
            <input type="hidden" id="address1" name="address1" />
  <input type="hidden" id="cityLat" name="cityLat" />
  <input type="hidden" id="cityLng" name="cityLng" />
           </p>
           <div class="clear"></div>
           <?php
     }     
	 add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );
	 
//for checkout page

    function wooc_extra_location_fields_register_for_checkout_page() {
		?>           
           
          
          
           <div id="chlocat" class="form-row form-row-wide">
           <label for="reg_billing_address"><?php _e( 'Address', 'woocommerce' ); ?><span class="required">*</span></label><input type="text" class="input-text" name="billing_address" id="addressTxt" value="<?php if ( ! empty( $_POST['billing_address'] ) ) esc_attr_e( $_POST['billing_address'] ); ?>" autocomplete="on" /><input type="hidden" id="city2" name="city2" /><input type="hidden" id="address" name="address" /><input type="hidden" id="address1" name="address1" /><input type="hidden" id="cityLat" name="cityLat" /><input type="hidden" id="cityLng" name="cityLng" />
           </div>
           
           <?php
     }     
	 add_action( 'woocommerce_after_checkout_billing_form', 'wooc_extra_location_fields_register_for_checkout_page' );

	 

/*add_action('wp_footer', 'distancecalulation');
function distancecalulation($lat1)
{
	echo 'Subhendu Kundu';
}*/

/*add_action('wp_footer', 'wpshout_action_example'); 
function wpshout_action_example() { 
    echo '<div style="background: green; color: white; text-align: right;">WPShout was here.</div>'; 
}*/


//add_action('wp_footer', 'distance'); 
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
  $earthRadius = 6371; // Radius of the earth in kilometers
  
  // Convert degrees to radians
  $lat1 = deg2rad($lat1);
  $lon1 = deg2rad($lon1);
  $lat2 = deg2rad($lat2);
  $lon2 = deg2rad($lon2);
  
  $latDiff = $lat2 - $lat1;
  $lonDiff = $lon2 - $lon1;
  
  $a = sin($latDiff / 2) * sin($latDiff / 2) + cos($lat1) * cos($lat2) * sin($lonDiff / 2) * sin($lonDiff / 2);
  $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
  
  $distance = $earthRadius * $c; // Distance in kilometers
  
  return $distance;
}
	 
	 function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
    
      if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
             $validation_errors->add( 'billing_first_name_error', __( 'First name is required!', 'woocommerce' ) );
      }
      if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
             $validation_errors->add( 'billing_last_name_error', __( 'Last name is required!.', 'woocommerce' ) );
      }
	  if ( isset( $_POST['billing_address'] ) && empty( $_POST['billing_address'] ) ) {
		     
			// $distance = number_format($latitude, $longitude, $orilatitude, $orilongitude, "K"),2);
			 $validation_errors->add( 'billing_address_error', __( 'Address is required!.', 'woocommerce' ) );		 		 
      }	  
	  if(isset( $_POST['billing_address'] ) && empty($_POST['cityLat']) && empty($_POST['cityLng']))
	  {
	     $validation_errors->add( 'billing_address_error', __( 'Please add your address', 'woocommerce' ) );	  
	  }
	  
	  if($_POST['cityLat'] != '' && $_POST['cityLng'] != '')
	  {
			 $lat1 = $_POST['cityLat'];
			 $lon1 = $_POST['cityLng'];
			 $lat2 = '-26.0009587';
			 $lon2 = '27.9833778';
			 //$distance = number_format(distance($latitude, $longitude, $orilatitude, $orilongitude, "K"),2);
			/* 
			 $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  
  
  if ($unit == "K") {
      $miles = $miles * 1.609344;
  } else if ($unit == "N") {
      $miles = $miles * 0.8684;
  } else {
      $miles;

      echo "insides miles";
  }*/
 

$distance = calculateDistance($lat1, $lon1, $lat2, $lon2);
             $distance = round($distance,2);

            


          


           //$validation_errors->add( 'billing_address_error', __(  gettype($distance).' -We do not deliver to'. $distance .'.', 'woocommerce' ) );	
          
         //8.63931

         
       
			 if($distance > 15)		
			 {   
             	$validation_errors->add( 'billing_address_error', __('Unfortunately, we do not deliver to your area yet. Don’t stress, we’ll be there soon!', 'woocommerce' ) );
			 }	
        if($distance <=15)
			 {
        //echo $distance;
        //$validation_errors->add( 'billing_address_error', __( $distance. ' Unfortunately, we do not deliver to your area yet. Don’t stress, we’ll be there soon!', 'woocommerce' ) );
          
           
				 /*$data = array(
					'firstname' => $_POST['billing_first_name'],
					'lastname' => $_POST['billing_last_name'],
					'address' => $_POST['billing_address']	
				   );
				
				   global $wpdb;
				   $table_name = $wpdb->prefix. 'offregisterdata';
				   $insertdata = $wpdb->insert($table_name, $data);*/
           if($distance>20 && $distance<=20){

            $option_name=$_POST['username']."_ext_fee";
             
              $existing_value = get_option($option_name);
              if ($existing_value !== false) {
                  // Option exists, update it
                  update_option($option_name, $distance);
              } else {
                  // Option doesn't exist, add it
                  add_option($option_name, $distance);
              }

           }

				   $title = $_POST['billing_first_name']." ".$_POST['billing_last_name'];
				   $fullcontent = $_POST['billing_address'];
				   $fullemail = $_POST['email'];
				   $post_id = wp_insert_post(array (
   'post_type' => 'nonregisteruser',
   'post_title' => $title,
   'post_content' => $fullcontent,
   'post_status' => 'publish',
   'comment_status' => 'closed',   // if you prefer
   'ping_status' => 'closed',      // if you prefer
));
				   if ($post_id) {
				   // insert post meta
				   update_post_meta($post_id, 'first_name', $_POST['billing_first_name']);
				   update_post_meta($post_id, 'last_name', $_POST['billing_last_name']);
				   update_post_meta($post_id, 'email_address', $fullemail);
				   update_post_meta($post_id, 'full_address', $fullcontent);
				}
			 }		 
	  } 
	  
      return $validation_errors;
}


add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );
function custom_address_validation($user_id, $load_address) {
  if ( isset( $_POST['billing_address_1'] ) && empty( $_POST['billing_address_1'] ) ) {
		     
    // $distance = number_format($latitude, $longitude, $orilatitude, $orilongitude, "K"),2);
      if(isset( $validation_errors ))
      $validation_errors->add( 'billing_address_error', __( 'Address is required!.', 'woocommerce' ) );		 		 
    
    }	 





}
add_action('woocommerce_customer_save_address', 'custom_address_validation', 10, 2);

    /**
    * Below code save extra fields.
    */
    function wooc_save_extra_register_fields( $customer_id ) {
        if ( isset( $_POST['billing_address'] ) ) {
                     // Address input filed which is used in WooCommerce
                     update_user_meta( $customer_id, 'shipping_address_1', sanitize_text_field( $_POST['city2'] ) );
					           update_user_meta( $customer_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address'] ) );
          }
          if ( isset( $_POST['billing_first_name'] ) ) {
                 //First name field which is by default
                 update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
                 // First name field which is used in WooCommerce
                 update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
          }
          if ( isset( $_POST['billing_last_name'] ) ) {
                 // Last name field which is by default
                 update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
                 // Last name field which is used in WooCommerce
                 update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
          }
    }
    add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );

//------------------- New-------------	 
function wpc_elementor_shortcode( $atts ) {
	//$user_id = 
	$current_user = wp_get_current_user();
	$user_id = $current_user->ID;
	$key = 'shipping_address_1';
	$single = true;
	$usershippingaddress = get_user_meta( $user_id, $key, $single );
  if(is_user_logged_in()){
      if ( $usershippingaddress != '' ) 
      {
        $lastuseraddress = $usershippingaddress;
      }
      else
      {
        $lastuseraddress = '67, 7th street linden Randburg';
      }
    }
    else{

      $lastuseraddress='<div class="elementor-icon-box-wrapper custom-icon-reg">
						<div class="elementor-icon-box-icon">
				<span class="elementor-icon elementor-animation-">
				<i aria-hidden="true" class="fas fa-map-marked-alt"></i>				</span>
			</div>
						<div class="elementor-icon-box-content">
				<h3 class="elementor-icon-box-title">
					<span>
						Register To Add Your Address					</span>
				</h3>
							</div>
		</div><style>
    .elementor-icon-box-wrapper.custom-icon-reg span {
    font-size: 12px;
} 
     .elementor-icon-box-wrapper.custom-icon-reg .elementor-icon i, .elementor-icon-box-wrapper.custom-icon-reg .elementor-icon svg {
    position: relative;
    top: 9px;
    right: 5px;
}
</style>';
    }
	return $lastuseraddress;
	
   // return "This is my custom PHP output in Elementor!";
}
add_shortcode( 'myelementor_php_output', 'wpc_elementor_shortcode');



function wpc_elementor_shortcodepopup( $atts ) {
	
   $test .= '<div class="popupform">
   <form action="#" method="post" name="contact-me">
   <input type="text" class="input-text" name="full_address1" id="fulladdressTxt" value="" autocomplete="on" />
           <input type="hidden" id="city3" name="city3" />
            <input type="hidden" id="fulladdress" name="address1" />            
  <input type="hidden" id="cityLat1" name="cityLat1" />
  <input type="hidden" id="cityLng1" name="cityLng1" />
  <input type="hidden" name="action" value="send_form" style="display: none; visibility: hidden; opacity: 0;">
   <button onclick="testFunction3()">Submit!</button>
</form>
</div>';

    return $test;
}
add_shortcode( 'myelementor_php_popup', 'wpc_elementor_shortcodepopup');

function my_php_function3()
{
	//$address = $_POST["address1"];
   
  ob_start();
	  echo "<script>
    function calcCrow(lat1, lon1, lat2, lon2) {
      var R = 6371; // km
      var dLat = toRad(lat2-lat1);
      var dLon = toRad(lon2-lon1);
      var lat1 = toRad(lat1);
      var lat2 = toRad(lat2);
      var a = Math.sin(dLat/2) * Math.sin(dLat/2) +
        Math.sin(dLon/2) * Math.sin(dLon/2) * Math.cos(lat1) * Math.cos(lat2); 
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
      var d = R * c;
      return d;
    } 
    // Converts numeric degrees to radians
     function toRad(Value) 
     {
         return Value * Math.PI / 180;
     }
     function check3()
    {
		var fulladdress1 = document.getElementById('fulladdressTxt').value;
		document.cookie = 'fulladdress = ' + fulladdress1;
		var fullcity = document.getElementById('city3').value;
		var lat1 = document.getElementById('cityLat1').value;		
		var lon1 = document.getElementById('cityLng1').value;
		var lat2 = -26.012340;		
		var lon2 = 27.996460;		
		var distance = parseFloat(calcCrow(lat1,lon1,lat2,lon2).toFixed(1));
				
		if (lat1 == null || lat1 == '', lon1 == null || lon1 == '') {
      alert('Please add your address in so we can check if you are in our delivery radius');
      //return false;
    }


		if(distance <= 15 )
		{

      console.log('distance is '+ distance);
			//alert('Unfortunately, we do not deliver to your area yet. Don’t stress, we’ll be there soon!');
			
			if(fulladdress1 != '')
			{
             
             
        var data = {
          'action': 'add_address',
          'nonce': my_ajax_obj.nonce
      };
    
      $.ajax({
        type: 'POST',
        url: my_ajax_obj.ajax_url,
        data: data,
        success: function(response) {
           console.log(responde);
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
    var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

             if(screenWidth >= 768)       
    $('.submit-right').colorbox({inline:true, href:'#inline_content2', width:'600px', maxWidth:'98%',height:'500px'});
      else
      $('.submit-right').colorbox({inline:true, href:'#inline_content2', width:'340px', maxWidth:'98%',height:'525px'});
         
                 
			
			}
       
      
    }
		else
		{
			//alert('Success! You're in our delivery radius');	
      console.log('distance is  far'+ distance);
      var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
      if(screenWidth >= 768)      
      $('.submit-right').colorbox({inline:true, href:'#inline_content3', width:'600px', maxWidth:'98%',height:'500px'});
      else
      $('.submit-right').colorbox({inline:true, href:'#inline_content3', width:'340px', maxWidth:'98%',height:'525px'});

      
    } 
		
		//alert(distance);
        //alert('Please Login or Register to make a purchase');
    }

    function testFunction3() {
      $('#cboxClose').addClass('newcloseposition');
      check3();
    }
    </script>";
  $output=ob_get_clean();
  echo $output;
  wp_die();
}

add_action('wp_ajax_call_api', 'my_php_function3');
add_action('wp_ajax_nopriv_call_api', 'my_php_function3');
//add_action( 'wp_footer', 'my_php_function3' );

add_action('wp_ajax_add_address', 'add_address');
add_action('wp_ajax_nopriv_add_address', 'add_address');
function add_address(){

  $title = 'Popup address';
  $post_id1 = wp_insert_post(array (
'post_type' => 'popup_address',
'post_title' => $title,
'post_content' => '',
'post_status' => 'publish',  
));
         if ($post_id1) {
             $phpVar = $_COOKIE['fulladdress'];
         // insert post meta
         update_post_meta($post_id1, 'full_address', $phpVar);
        
      }
echo "post id is".$post_id1 ;
wp_die(0);

}
////------------------popup-----------------------

function add_theme_scripts() {
wp_enqueue_script( 'script1', get_stylesheet_directory_uri() . '/js/jquery-3.1.1.min.js');
wp_enqueue_script( 'script2', get_stylesheet_directory_uri() . '/js/jquery.colorbox.js');
wp_enqueue_script( 'jqui', get_stylesheet_directory_uri() . '/js/jquery-ui.min.js');

wp_enqueue_script('my-ajax-script', get_stylesheet_directory_uri() . '/js/api-load.js');
wp_enqueue_style( 'popupcss', get_stylesheet_directory_uri() .'/css/popup.css' );
wp_localize_script('my-ajax-script', 'my_ajax_obj', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('my-ajax-nonce')
));
$pageid = get_the_ID();

wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri() .'/css/owl.carousel.min.css' );
  wp_enqueue_style( 'home-page-css-fix', get_stylesheet_directory_uri() .'/css/home-page-css-fix.css' );
    wp_enqueue_style( 'owl-carousel-theme', get_stylesheet_directory_uri() .'/css/owl.theme.default.min.css' );
    wp_enqueue_script( 'owl-carousel',  get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );

if ( is_product_category() || $pageid == 14271) {
  //wp_enqueue_style( 'home-page-css-fix', get_stylesheet_directory_uri() .'/css/home-page-css-fix.css' );
  // Code to execute if it is a category page
  //wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri() .'/css/owl.carousel.min.css' );
  //wp_enqueue_style( 'home-page-css-fix', get_stylesheet_directory_uri() .'/css/home-page-css-fix.css' );
   // wp_enqueue_style( 'owl-carousel-theme', get_stylesheet_directory_uri() .'/css/owl.theme.default.min.css' );
   // wp_enqueue_script( 'owl-carousel',  get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );
    //wp_enqueue_script( 'owl-carousal-script', get_stylesheet_directory_uri() . '/js/owl-carousal.js');

  }

  if (is_product()){
    wp_enqueue_script( 'fixquanitity', get_stylesheet_directory_uri() . '/js/fixquantity.js');
    
  }
  wp_enqueue_script( 'script-popup', get_stylesheet_directory_uri() . '/js/popup.js');
	if($pageid == 14271 || $pageid==234952)
	{
wp_enqueue_script( 'script3', get_stylesheet_directory_uri() . '/js/totalscript1.js');
	}
wp_enqueue_style( 'colorbox', get_stylesheet_directory_uri() . '/css/colorbox.css');
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

///----------------------------------

function wpc_elementorpopup_output( $atts ) {
	$pageid = get_the_ID();
	/*if($pageid == 234952)
	{
 
  
$test = '<div style="display:none;"><div id="inline_content1"><img src="https://shop.crazyplastics.co.za/wp-content/uploads/2023/06/Pop-Up-April-01.png" alt="" /><div class="form-sec">
<input type="text" class="input-text" name="full_address1" id="fulladdressTxt" value="" autocomplete="on" placeholder="Add Your Delivery Address" />
          <span>'.$pageid.'</span> <input type="hidden" id="city3" name="city3" />
            <input type="hidden" id="fulladdress" name="address1" />            
  <input type="hidden" id="cityLat1" name="cityLat1" />
  <input type="hidden" id="cityLng1" name="cityLng1" />
  <input type="hidden" name="action" value="send_form" style="display: none; visibility: hidden; opacity: 0;">
<button type="submit" class="submit-right" onclick="testFunction3()">Submit</button></div></div><div id="inline_content2"><img src="https://shop.crazyplastics.co.za/wp-content/uploads/2023/03/success-march.png" alt="" /></div><div id="inline_content3"><img src="https://shop.crazyplastics.co.za/wp-content/uploads/2023/03/error-march.png" alt="" /></div>
</div>';

	}
  else if($pageid==14271){*/

    $test = ' <link rel="stylesheet" type="text/css" href="/wp-content/themes/porto-child/css/popup.css">
    <div style="display:none;"><div id="inline_content1">
    <div class="popup-logo"><img width="367" height="70" src="/wp-content/uploads/2022/08/ezgif.com-gif-maker-1.webp?strip=all&amp;lossy=1&amp;quality=70&amp;sharp=1&amp;ssl=1" class="attachment-full size-full wp-image-174625 lazyloaded" alt="" sizes="(max-width: 367px) 100vw, 367px" data-src="/wp-content/uploads/2022/08/ezgif.com-gif-maker-1.webp?strip=all&amp;lossy=1&amp;quality=70&amp;sharp=1&amp;ssl=1" decoding="async" data-srcset="/wp-content/uploads/2022/08/ezgif.com-gif-maker-1.webp?strip=all&amp;lossy=1&amp;quality=70&amp;sharp=1&amp;ssl=1 367w, /wp-content/uploads/2022/08/ezgif.com-gif-maker-1.webp?strip=all&amp;lossy=1&amp;quality=70&amp;sharp=1&amp;w=228&amp;ssl=1 228w" data-eio-rwidth="367" data-eio-rheight="70" srcset="/wp-content/uploads/2022/08/ezgif.com-gif-maker-1.webp?strip=all&amp;lossy=1&amp;quality=70&amp;sharp=1&amp;ssl=1 367w, /wp-content/uploads/2022/08/ezgif.com-gif-maker-1.webp?strip=all&amp;lossy=1&amp;quality=70&amp;sharp=1&amp;w=228&amp;ssl=1 228w"></div>
    <div class="check-area">
    check your delivery area
    </div>
    <div class="check-desc">Enter your details below
and see if you are in our
area of <strong>Express</strong> delivery.</div>
<div class="check-note">*Please note that we are currently delivering to select areas in Johannesburg</div>
      <div class="form-sec">
    <input type="text" class="input-text" name="full_address1" id="fulladdressTxt" value="" autocomplete="on" placeholder="Add Your Delivery Address" />
               <input type="hidden" id="city3" name="city3" />
                <input type="hidden" id="fulladdress" name="address1" />            
      <input type="hidden" id="cityLat1" name="cityLat1" />
      <input type="hidden" id="cityLng1" name="cityLng1" />
      <input type="hidden" name="action" value="send_form" style="display: none; visibility: hidden; opacity: 0;">
    <button type="submit" class="submit-right" onclick="testFunction3()">Submit</button></div></div><div id="inline_content2"><img src="https://shop.crazyplastics.co.za/wp-content/uploads/2023/10/success-march.jpg" alt="" /></div><div id="inline_content3"><img src="https://shop.crazyplastics.co.za/wp-content/uploads/2023/10/error-march.png" alt="" /></div>
    </div>
    ';
  //}
return $test;
}
add_shortcode( 'elementor_popup_output', 'wpc_elementorpopup_output');

/*************** Updating Order Statutus  ***************/

add_filter( 'wc_order_statuses', 'ts_rename_order_status_msg', 20, 1 );
function ts_rename_order_status_msg( $order_statuses ) {
    $order_statuses['wc-pending']    = _x( 'Order being packed', 'Order status', 'woocommerce' );
    return $order_statuses;
}


foreach( array( 'post', 'shop_order' ) as $hook )
    add_filter( "views_edit-shop_order", 'ts_order_status_top_changed' );
function ts_order_status_top_changed( $views ){

    if( isset( $views['wc-pending'] ) )
        $views['wc-pending'] = str_replace( 'Order being packed', __( 'Order being packed', 'woocommerce'), $views['wc-pending'] );
        return $views;
}

/*************** Address Fields on Checkout Form are READONLY ***************/

//add_action('woocommerce_checkout_fields','customization_readonly_billing_fields',10,1);
function customization_readonly_billing_fields($checkout_fields){
    $current_user = wp_get_current_user();;
    $user_id = $current_user->ID;

    echo "<style>
    input[readonly='readonly'] {
      background:#eee !important;
  }
    </style>
    ";
    $checkout_fields['billing']['billing_city']['custom_attributes'] = array('disabled' => 'disabled');
    $checkout_fields['billing']['billing_state']['custom_attributes'] = array('disabled' => 'disabled');
    $checkout_fields['billing']['billing_postcode']['custom_attributes'] = array('disabled' => 'disabled');
    $checkout_fields['billing']['billing_country']['custom_attributes'] = array('disabled' => 'disabled');
    foreach ( $checkout_fields['billing'] as $key => $field ){

         
        if($key == 'billing_address_1' || $key == 'billing_address_2' || $key == 'billing_city' || $key == 'billing_country' || $key == 'billing_state' || $key == 'billing_postcode'){
            $key_value = get_user_meta($user_id, $key, true);
            if( strlen($key_value)>0){
                $checkout_fields['billing'][$key]['custom_attributes'] = array('readonly'=>'readonly');

                if($key == 'billing_country' || $key == 'billing_state' || $key == 'billing_postcode'){
                  echo "<script>
                  $(document).ready(function(){
                    $('#".$key."').prop('disabled', true);
                     
                  })

                 
                  </script>";
      
              }
            }
              $checkout_fields['billing'][$key]['custom_attributes'] = array('readonly'=>'readonly');
             
        }
        
    }
     
    return $checkout_fields;
}

add_action( 'woocommerce_review_order_before_submit', 'add_custom_checkout_script', 10 );
function add_custom_checkout_script() {
    ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('button#place_order').click(function(e){
                     
                   // $('select').prop('disabled', false);
                   // $('#billing_address_1').prop('readonly', false);
            })
        });
    </script>
    <?php
}

/*****category page related products */
// add_action( 'woocommerce_after_shop_loop', 'display_related_products_on_category_page' );

// function display_related_products_on_category_page() {
//   if ( is_product_category() ) {
//     add_action( 'woocommerce_after_main_content', 'woocommerce_output_related_products', 10 );
//   }
// }

/****check if user logged in and if popup already seen once a day**** */

add_action('wp_ajax_show_popup', 'show_popup');
add_action('wp_ajax_nopriv_show_popup', 'show_popup');
function show_popup(){
$user_logged_in=false;
$already_shown=false;

$relative_path = str_replace(home_url(), "", $_POST['page_url']);
$page = get_page_by_path($relative_path);


if (isset($_COOKIE['show_popup'])) {
  $already_shown=true;
}
else{
  setcookie('show_popup', 'true', time() + 86400);
}
if ( is_user_logged_in() ) {
  $user_logged_in=true;
}

/*if($page->ID==234949)
echo json_encode(array("shown"=>false, "loggedin"=>$user_logged_in, 'pageidpopup'=>$page->ID));
else */

echo json_encode(array("shown"=>$already_shown, "loggedin"=>$user_logged_in, 'pageidnew'=>$page->ID));

wp_die();

}
/*
add_filter('parse_query', 'hide_cancelled_orders');
function hide_cancelled_orders($query) {
    global $pagenow, $post_type;

    if (is_admin() && $pagenow == 'edit.php' && $post_type == 'shop_order') {

      
        $query->query_vars['post_status'] =  array('wc-pending', 'wc-processing', 'wc-on-hold', 'wc-completed', 'wc-refunded', 'wc-failed');
    }
}*/

add_filter('woocommerce_default_address_fields', 'custom_override_default_address_fields');
function custom_override_default_address_fields($address_fields) {
    $address_fields['city']['required'] = false; // Make city not required
    $address_fields['state']['required'] = false; // Make province not required
   $address_fields['postcode']['required'] = false;
    $address_fields['country']['required'] = false;
   $address_fields['billing_address_1']['required'] = false;
    return $address_fields;
}
 

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields) {     
    unset($fields['billing']['billing_address_2']);
    //unset($fields['billing']['billing_address_1']);
    //unset($fields['billing']['billing_company']);
    //unset($fields['billing']['billing_country']);
    //unset($fields['billing']['billing_city']);
    //unset($fields['billing']['billing_state']);
    //unset($fields['billing']['billing_postcode']);
    //unset($fields['billing']['billing_postcode']);
    //unset($fields['billing']['billing_phone']);
    //unset($fields['billing']['billing_billing_address_1']);

    $address = WC()->checkout->get_value('billing_address_1');
   // $address = "4 Poplar Ave, Broadacres Park, Johannesburg, 2055, South Africa";
// Your Bing Maps API key
$api_key = "AjAX_ctD9stYaY39Z30QRMPFytkJxPXZ4dUEZYWMsQK0q-8J1FXfywwACDOpdY5A";


//logged in and log out in user css load

if ( is_user_logged_in() ) {
  echo "<style>
   #chlocat{
	  display: none; 
   }
   p#billing_billing_address_1_field {
    display: none;
}
    </style>
    ";
}else{
	unset($fields['billing']['billing_address_1']);
	
	echo "<style>
p#billing_company_field {
    display: none;
}
p#billing_country_field {
    display: none;
}
p#billing_city_field {
    display: none;
}
p#billing_state_field {
    display: none;
}
p#billing_postcode_field {
    display: none;
}
p#billing_billing_address_1_field {
    display: none;
}
p#kl_newsletter_checkbox_field {
    display: none;
}

    </style>
    ";
}




// Construct the URL for the Bing Maps Geocoding API request
if(!is_null($address))
$url = "http://dev.virtualearth.net/REST/v1/Locations?query=" . urlencode($address) . "&key=" . $api_key;
else
$url = "http://dev.virtualearth.net/REST/v1/Locations?query= " . "&key=" . $api_key;

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Send the HTTP GET request
$response = curl_exec($ch);

// Check if the request was successful
if ($response !== false) {
    // Parse the JSON response
    $data = json_decode($response, true);
    
    if (!empty($data) && isset($data['resourceSets'][0]['resources'][0]['address'])) {
        // Extract city and postal code information
        $result = $data['resourceSets'][0]['resources'][0]['address'];
        $city = $result['locality'];
        $postalCode = $result['postalCode'];
        
        if (isset($city) && isset($postalCode)) {
          $fields['billing']['billing_city']['default'] =$city;
          $fields['billing']['billing_postcode']['default'] = $postalCode;
        } 
        else if(isset($city)){
          $fields['billing']['billing_city']['default'] =$city;
        }
        else if(isset($postalCode)){

          $fields['billing']['billing_postcode']['default'] = $postalCode;
        }
        else {
             
        }
    }  

// Close cURL session
curl_close($ch);

$fields['billing']['billing_country']['type'] = 'text';
$fields['billing']['billing_country']['custom_display_value'] = 'South Africa';

$fields['billing']['billing_state']['type'] = 'text';

foreach ($fields as $section => &$field_group) {
  $fields_to_exclude = array(
    'billing_phone','billing_email','billing_first_name','billing_last_name','billing_company'
);
 
  foreach ($field_group as $key=>&$field) {

     
    if (!in_array($key, $fields_to_exclude))  
      $field['custom_attributes'] = array('readonly' => '');

                 
    
  }
}

echo "<style>
    input[readonly='readonly'] {
      background:#eee !important;
  }
    </style>
    ";
    
    return $fields;
}
}

// Add your custom function to change the order status if it's not paid
/*function custom_assign_new_status_to_unpaid_order($order_id) {
  // Get the order object
  $order = wc_get_order($order_id);

  // Check if the order exists and if it's not paid
  if ($order && !($order->is_paid())) {
      // Set the new order status for unpaid orders
      $new_status = 'wc-unpaid'; // Replace with the desired status
      $order->update_status($new_status);
  }
}

// Hook the custom function to the woocommerce_new_order action
add_action('woocommerce_new_order', 'custom_assign_new_status_to_unpaid_order');

// Register a custom order status
function register_custom_order_status() {
  register_post_status('wc-unpaid', array(
      'label'                     => 'Unpaid',
      'public'                    => true,
      'exclude_from_search'       => false,
      'show_in_admin_all_list'    => true,
      'show_in_admin_status_list' => true,
      'label_count'               => _n_noop('Unpaid <span class="count">(%s)</span>', 'Unpaid <span class="count">(%s)</span>', 'woocommerce'),
  ));
}
add_action('init', 'register_custom_order_status');

// Add the custom order status to the list of order statuses
function add_custom_order_status_to_order_statuses($order_statuses) {
  $new_order_statuses = array();
  foreach ($order_statuses as $key => $status) {
      $new_order_statuses[$key] = $status;
      if ('wc-processing' === $key) {
          $new_order_statuses['wc-unpaid'] = 'Unpaid';
      }
  }
  return $new_order_statuses;
}
add_filter('wc_order_statuses', 'add_custom_order_status_to_order_statuses');

function custom_include_custom_status_in_order_query($query) {
  if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'shop_order') {
      $query->set('post_status', array('wc-unpaid', 'wc-processing', 'wc-completed', 'wc-on-hold', 'wc-pending', 'wc-cancelled', 'wc-refunded', 'wc-failed'));
  }
}
add_action('woocommerce_shop_order_query', 'custom_include_custom_status_in_order_query');


// Allow order editing for specific custom statuses
function allow_order_editing_for_custom_statuses($editable, $order) {
  $custom_statuses = 'wc-unpaid'; // Replace with your custom statuses

  if ($order->get_status()=== $custom_statuses) {
      return true;
  }

  return $editable;
}
//add_filter('woocommerce_order_is_editable', 'allow_order_editing_for_custom_statuses', 10, 2);
*/

function add_shortcode_to_footer() {
  echo do_shortcode('[elfsight_whatsapp_chat id="1"]');
}
add_action('wp_footer', 'add_shortcode_to_footer');

function add_custom_fee_distance() {
    global $woocommerce;
    $fee_amount = 75; 

    $option_name=$_POST['username']."_ext_fee";
    $distance = floatval(get_option($option_name));

    if($distance >20 && $distance <=24){
    $woocommerce->cart->add_fee( 'cost', $fee_amount, true, 'standard' );
    }
    else {

      $woocommerce->cart->add_fee( 'cost', 0, true, 'standard' );
    }
}
//add_action( 'woocommerce_cart_calculate_fees', 'add_custom_fee_distance' );



function add_extra_fee_to_shipping( $packages ) {
  print_r($packages);
  $fee_amount = 75;  
  $current_user = wp_get_current_user();
  $username = $current_user->user_login;
  $option_name=$username."_ext_fee";
   
    $distance = floatval(get_option($option_name));
    if($distance >20 && $distance <=25){
     
  foreach( $packages as $package_key => $package ) {
      $packages[$package_key]['rates']['shipping']['cost'] = $fee_amount;
  }
}

foreach( $packages as $package_key => $package ) {
  $packages[$package_key]['rates']['shipping']['cost'] = $fee_amount;
}

  return $packages;
}
//add_filter( 'woocommerce_cart_calculate_shipping', 'add_extra_fee_to_shipping' );


function alter_shipping_cost( $rates, $package ) {


  $current_user = wp_get_current_user();
  $username = $current_user->user_login;
  $option_name=$username."_ext_fee";
   
    $distance = floatval(get_option($option_name));
    if($distance >20 && $distance <=25){
  
      foreach ( $rates as $rate_id => $rate ) {
          
          $rates[$rate_id]->cost = 75; 
      }
    }
   

  return $rates;
}
//add_filter( 'woocommerce_package_rates', 'alter_shipping_cost', 10, 2 );
add_filter('woocommerce_get_script_data', 'remove_ajax_add_to_cart', 10, 2);

function remove_ajax_add_to_cart($data, $handle) {
    if($handle === 'wc-add-to-cart') {
        $data['ajax_url'] = '';
    }
    return $data;
}

function custom_woocommerce_breadcrumb($breadcrumb){
  if (is_singular('product')){
      $product = wc_get_product(get_the_id());
      $categories = wc_get_product_category_list($product->get_id(), ', ', '<span class="posted_in">', '</span>');
      $breadcrumb = preg_replace('#<span class="posted_in">(.+?)</span>#', $categories, $breadcrumb, 1);
  }
  return $breadcrumb;
}
add_filter('woocommerce_breadcrumb', 'custom_woocommerce_breadcrumb');

// Add action to make the order notes field editable
add_action('woocommerce_after_checkout_form', 'make_order_notes_field_editable');

// Function to make the order notes field editable
function make_order_notes_field_editable() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Remove 'readonly' attribute from order notes textarea
            $('#order_comments').removeAttr('readonly');
        });
    </script>
    <?php
}

// Custom error handler function
 // Set minimum quantity
function custom_wc_min_quantity($min, $product) {
  return 1; // Set your minimum quantity here
}
add_filter('woocommerce_quantity_input_min', 'custom_wc_min_quantity', 10, 2);

// Set maximum quantity
function custom_wc_max_quantity($max, $product) {
  return 48; // Set your maximum quantity here
}
add_filter('woocommerce_quantity_input_max', 'custom_wc_max_quantity', 10, 2);


function custom_variation_script() {
  ?>
  <script type="text/javascript">
      (function($) {
          $(document).on('found_variation', function(event, variation) {
              // Set minimum quantity to 1
              $('input[name="quantity"]').attr('min', 1);

              // Set maximum quantity to 48
              $('input[name="quantity"]').attr('max', 48);
          });
      })(jQuery);
     $(document).ready(function() {
 
      /*var previousContent = $('.archive-products ul').html();

    setInterval(function() {
        var currentContent = $('.archive-products ul').html();;
        if (currentContent !== previousContent) {
            $('span.acoplw-badge.acoplw-textBlock.acoplw-elemBlock').each(function(){
             // if($(this).find('> span').length > 1) $(this).remove();
            })
            previousContent = currentContent; // Update previous content
        }
    }, 1000);*/

   $('#main-toggle-menu').on('click',function(){
      var submenu=""
      $('.toggle-menu-wrap.side-nav-wrap > ul li').each(function() {
              $(this).off();
      });

      $('.toggle-menu-wrap.side-nav-wrap > ul > li').each(function() {
          $(this).off();
          var liTop = $(this).position().top;
            console.log(liTop);
            submenu =$(this).find('> .popup');;
            submenu.css('top', liTop + 'px');
          $(this).on('mouseover',function(){
            var popup=$(this).find('> .popup');
            var liTop = $(this).position().top;

            var submenuHeight =  popup.outerHeight();
            var viewportHeight = $(window).height();
            console.log("from top"+(liTop+submenuHeight)+" window height"+viewportHeight);
            if (submenuHeight > (0.75 * viewportHeight)) {
              popup.find('> .inner').css('max-height','75vh');
              popup.find('> .inner').css('overflow-y','scroll');
            }

            if((liTop+submenuHeight)> viewportHeight){
              var diff=liTop-((liTop+submenuHeight)-viewportHeight);
              if(diff>viewportHeight)
              {
                popup.css('top', '0px');
              }
              else{
                diff-=150;
                  popup.css('top', diff + 'px');
              }
            }else{
            popup.css('top', liTop + 'px');
            }
           
});

});
});
});



  </script>
  <style>
    .elementor-section.elementor-top-section.elementor-element.elementor-element-6417e58d.elementor-section-content-middle.elementor-hidden-mobile.elementor-hidden-tablet.elementor-section-boxed.elementor-section-height-default.elementor-section-height-default {
  display: none !important;
}
.related.products:first-child {
    display: none !important;
}

span.cart-tags {
      position: absolute;
      width: 115px;
      left: 0;
      font-size: 8px;
      background: rgba(214, 0, 55, 1);
      color: #fff;
      text-align: center;
      transform: rotate(45deg);
      z-index: 1;
      top: 15px;
  }
  .cart-item-thumbnail {
    overflow: hidden !important;
    display: block;
    width: 100%;
    position: relative;
}  
.elementor-widget-porto_hb_menu #main-toggle-menu .menu-title {
    padding-right: 25px !important;
}

.owl-dots {
    display: none !important;
}
.col-lg-3.sidebar.porto-woo-category-sidebar.left-sidebar.mobile-sidebar div#main-sidebar-menu {
    display: none;
}
.elementor-element-66d19c0 #main-toggle-menu .toggle-menu-wrap {
    width: auto !important;
}
.dVYIqU, div#hu-revoke{bottom:50px !important}
@media (max-width:767px){
      .dVYIqU, div#hu-revoke {
        right: -19px;
        top: 80%;
    }
#hu-revoke .hu-revoke-button{width:64px !important; height:64px !important}

}
  </style>
   <?php
if (is_front_page()) {
// Check if Elementor is active for the current post
$post_id=240736;
if ( \Elementor\Plugin::$instance->db->is_built_with_elementor( $post_id ) ) {
    // Get the saved Elementor CSS for the current post
    $elementor_css = get_post_meta( $post_id, '_elementor_data', true );

    // Check if Elementor data is available
    if ( $elementor_css ) {
        // Extract the CSS from the Elementor data
        $css = '';
       $elementor_css=json_decode($elementor_css);
        foreach ( $elementor_css[0]->elements as $elements ) {


          foreach($elements->elements as $elements){

            foreach($elements->elements as $elements){
              foreach($elements->elements as $elements){
                   if($elements->id=='fb402e0'){

                   /* echo "<pre>";
                    print_r($elements);
                    echo "</pre>";*/
                    
                  $css= ".".str_replace(" ",".",$elements->settings->icon_cl->value)."{font-size:".$elements->settings->icon_size->size. $elements->settings->icon_size->unit." !important}";

                    break;
                   }
              }
            }
          }
              
          
           
        }

        // Save the CSS to a file or database
        // For example, save to a file
        
    }
}

}
?>

<style>
<?php echo $css;?>

</style>
<?php
  echo do_shortcode('[elementor_popup_output]');


}

add_action('wp_footer', 'custom_variation_script');
function move_woocommerce_admin_css_to_footer() {
   
   

  // Enqueue the WooCommerce admin stylesheet in the footer
  wp_enqueue_style('woocommerce_admin_styles_custom-css', plugins_url('woocommerce/assets/css/custom-admin.css'), array(), WC_VERSION, 'all', true);
}
add_action('admin_enqueue_scripts', 'move_woocommerce_admin_css_to_footer', 999);

class CartBadges extends ACOPLW_Badge
      {
        private $active_badges;
          function __construct(){
            $this->active_badges=false;
          }
          public function load_badges()
          {
      
              if ( $this->active_badges === false ) {
      
                  // Get wordpress timezone settings
                  $gmt_offset = get_option('gmt_offset');
                  $timezone_string = get_option('timezone_string');
                  if ($timezone_string) {
                      $datenow = new DateTime(current_time('mysql'), new DateTimeZone($timezone_string));
                  } else {
                      $min = 60 * get_option('gmt_offset');
                      $sign = $min < 0 ? "-" : "+";
                      $absmin = abs($min);
                      $tz = sprintf("%s%02d%02d", $sign, $absmin / 60, $absmin % 60);
                      $datenow = new DateTime(current_time('mysql'), new DateTimeZone($tz));
                  }
      
                  // Converting to UTC+000 (moment isoString timezone)
                  // $datenow->setTimezone(new DateTimeZone('+000')); // Causing issues with timezone @ 1.3.6
                  $datenow = $datenow->format('Y-m-d H:i:s');
                  $stop_date = date('Y-m-d H:i:s', strtotime($datenow . ' +1 day'));
      
                  $day = date("l");
                  $acoplw_badge_args = array(
                      'post_type' => ACOPLW_POST_TYPE,
                      'fields' => 'ids',
                      'post_status' => 'publish',
                      'posts_per_page' => -1,
                      'meta_query' => array(
                          'relation' => 'AND',
                          array(
                              'key' => 'badge_status',
                              'value' => 1,
                              'compare' => '=',
                              'type' => 'NUMERIC'
                          ),
                          array(
                              'key' => 'badge_start_date',
                              'value' => $datenow,
                              'compare' => '<=',
                              'type' => 'DATETIME'
                          ),
                          array(
                              'relation' => 'OR',
                              array(
                                  'key' => 'badge_end_date',
                                  'value' => $datenow,
                                  'compare' => '>=',
                                  'type' => 'DATETIME'
                              ),
                              array(
                                  'key' => 'badge_end_date',
                                  'compare' => 'NOT EXISTS',
                              ),
                              array(
                                  'key' => 'badge_end_date',
                                  'value' => '',
                                  'compare' => '=',
                              ),
                          )
                      )
                  );
      
                  $acoplw_badge_rules     = get_posts($acoplw_badge_args); 
                  $acoplw_active_badges   = $check_rules = array();
                  // Multi Lang
                  $checkML                = call_user_func ( array ( new ACOPLW_ML(), 'is_default_lan' ), '' );
                  $currentLang            = !$checkML ? call_user_func ( array ( new ACOPLW_ML(), 'current_language' ), '' ) : '';
      
                  if ( $acoplw_badge_rules ) {
      
                      foreach ( $acoplw_badge_rules as $acoplwID ) {
      
                          $schedules          = unserialize(get_post_meta($acoplwID, 'badge_schedules', true)); 
                          $pschedule          = get_post_meta($acoplwID, 'badge_use_pschedule', true);
                          
                          // $label_options      = get_post_meta($acoplwID, 'badge_label_options', true);
                          // $style_options      = get_post_meta($acoplwID, 'badge_style_options', true);
                          // $position_options   = get_post_meta($acoplwID, 'badge_position_options', true);
                          // $preview_options    = get_post_meta($acoplwID, 'badge_preview_options', true);
                          $label_options      = get_post_meta($acoplwID, 'badge_label_options', true) ? get_post_meta($acoplwID, 'badge_label_options', true) : [];
                          $style_options      = get_post_meta($acoplwID, 'badge_style_options', true) ? get_post_meta($acoplwID, 'badge_style_options', true) : [];
                          $position_options   = get_post_meta($acoplwID, 'badge_position_options', true) ? get_post_meta($acoplwID, 'badge_position_options', true) : [];
                          $preview_options    = get_post_meta($acoplwID, 'badge_preview_options', true) ? get_post_meta($acoplwID, 'badge_preview_options', true) : [];
      
                          // $onSaleProducts     = $preview_options['assignAll'];
                          $onSaleProducts     = array_key_exists( 'assignAll', $preview_options ) ? $preview_options['assignAll'] : '';
      
                          if ( $pschedule && $onSaleProducts ) { // WC Sale Schedule
      
                              if ( !in_array( $acoplwID, $check_rules ) ) {
      
                                  $this->pScheduleStatus[$acoplwID]   = true;
                                  $check_rules[]                      = $acoplwID; // remove repeated entry - single rule
      
                                  // Multi Lang
                                  if ( $currentLang ) { 
                                      $langLabel          = array_key_exists ( 'badgeLabelLang', $label_options ) ? $label_options['badgeLabelLang'] : [];
                                      $MLBadgeLabel       = !empty ( $langLabel ) ? ( array_key_exists ( $currentLang, $langLabel ) ? $langLabel[$currentLang] : $label_options['badgeLabel'] ) : ( ( $label_options['badgeLabel'] != '' ) ? $label_options['badgeLabel'] : get_the_title ( $acoplwID ) );
                                  } else {
                                      $MLBadgeLabel       = $label_options['badgeLabel'];
                                  } 
      
                                  $acoplw_active_badges[$acoplwID] = array(
      
                                      'id'                        => $acoplwID,
      
                                      'label'                     => $MLBadgeLabel,
                                      'label'                     => $MLBadgeLabel,
                                      'labelColor'                => array_key_exists ( 'badgeLabelColor', $label_options ) ? $label_options['badgeLabelColor'] : '',
                                      'fontSize'                  => array_key_exists ( 'fontSize', $label_options ) ? $label_options['fontSize'] : '',
                                      'fontWeight'                => array_key_exists ( 'fontWeight', $label_options ) ? $label_options['fontWeight'] : '',
                                      'lineHeight'                => array_key_exists ( 'lineHeight', $label_options ) ? $label_options['lineHeight'] : '',
      
                                      'badgeStyle'                => array_key_exists ( 'badgeStyle', $style_options ) ? $style_options['badgeStyle'] : '',
                                      'badgeColor'                => array_key_exists ( 'badgeColor', $style_options ) ? $style_options['badgeColor'] : '',
                                      'badgeWidth'                => array_key_exists ( 'badgeWidth', $style_options ) ? $style_options['badgeWidth'] : '',
                                      'badgeHeight'               => array_key_exists ( 'badgeHeight', $style_options ) ? $style_options['badgeHeight'] : '',
                                      'borderTopLeft'             => array_key_exists ( 'borderTopLeft', $style_options ) ? $style_options['borderTopLeft'] : '',
                                      'borderTopRight'            => array_key_exists ( 'borderTopRight', $style_options ) ? $style_options['borderTopRight'] : '',
                                      'borderBottomLeft'          => array_key_exists ( 'borderBottomLeft', $style_options ) ? $style_options['borderBottomLeft'] : '',
                                      'borderBottomRight'         => array_key_exists ( 'borderBottomRight', $style_options ) ? $style_options['borderBottomRight'] : '',
      
                                      'zIndex'                    => array_key_exists ( 'zIndex', $style_options ) ? $style_options['zIndex'] : '',
      
                                      'opacity'                   => array_key_exists ( 'opacity', $position_options ) ? $position_options['opacity'] : '',
                                      'rotationX'                 => array_key_exists ( 'rotationX', $position_options ) ? $position_options['rotationX'] : '',
                                      'rotationY'                 => array_key_exists ( 'rotationY', $position_options ) ? $position_options['rotationY'] : '',
                                      'rotationZ'                 => array_key_exists ( 'rotationZ', $position_options ) ? $position_options['rotationZ'] : '',
                                      'flipHorizontal'            => array_key_exists ( 'flipHorizontal', $position_options ) ? $position_options['flipHorizontal'] : '',
                                      'flipVertical'              => array_key_exists ( 'flipVertical', $position_options ) ? $position_options['flipVertical'] : '',
                                      'badgePosition'             => array_key_exists ( 'badgePosition', $position_options ) ? $position_options['badgePosition'] : '',
                                      'badgePositionHorizontal'   => array_key_exists ( 'badgePositionHorizontal', $position_options ) ? $position_options['badgePositionHorizontal'] : '',
                                      'posTop'                    => array_key_exists ( 'posTop', $position_options ) ? $position_options['posTop'] : '',
                                      'posBottom'                 => array_key_exists ( 'posBottom', $position_options ) ? $position_options['posBottom'] : '',
                                      'posLeft'                   => array_key_exists ( 'posLeft', $position_options ) ? $position_options['posLeft'] : '',
                                      'posRight'                  => array_key_exists ( 'posRight', $position_options ) ? $position_options['posRight'] : '',
      
                                      'saleBadge'                 => array_key_exists( 'assignAll', $preview_options ) ? $preview_options['assignAll'] : '',
      
                                  );
      
                              }
      
                          } else {
      
                              $this->pScheduleStatus[$acoplwID] = false;
      
                              foreach ( $schedules as $schedule ) {
      
                                  $mn_start_time      = date('H:i' , strtotime($schedule['start_date']));
                                  $mn_end_time        = date('H:i' , strtotime($schedule['end_date']));
                                  $current_time       = strtotime(gmdate('H:i'));
                                  $acoplw_start_date  = $schedule['start_date'];
                                  $acoplw_end_start   = $schedule['end_date'] ? $schedule['end_date'] : $stop_date;
      
                                  if ( ( $acoplw_start_date <= $datenow ) && ( $acoplw_end_start >= $datenow ) && !in_array( $acoplwID, $check_rules ) ) {
      
                                      $check_rules[] = $acoplwID; // remove repeated entry - single rule
      
                                      // Multi Lang
                                      if ( $currentLang ) { 
                                          $langLabel          = array_key_exists ( 'badgeLabelLang', $label_options ) ? $label_options['badgeLabelLang'] : [];
                                          $MLBadgeLabel       = !empty ( $langLabel ) ? ( array_key_exists ( $currentLang, $langLabel ) ? $langLabel[$currentLang] : $label_options['badgeLabel'] ) : ( ( $label_options['badgeLabel'] != '' ) ? $label_options['badgeLabel'] : get_the_title ( $acoplwID ) );
                                      } else {
                                          $MLBadgeLabel       = $label_options['badgeLabel'];
                                      } 
      
                                      $acoplw_active_badges[$acoplwID] = array(
      
                                          'id'                        => $acoplwID,
      
                                          'label'                     => $MLBadgeLabel,
                                          'labelColor'                => array_key_exists ( 'badgeLabelColor', $label_options ) ? $label_options['badgeLabelColor'] : '',
                                          'fontSize'                  => array_key_exists ( 'fontSize', $label_options ) ? $label_options['fontSize'] : '',
                                          'fontWeight'                => array_key_exists ( 'fontWeight', $label_options ) ? $label_options['fontWeight'] : '',
                                          'lineHeight'                => array_key_exists ( 'lineHeight', $label_options ) ? $label_options['lineHeight'] : '',
      
                                          'badgeStyle'                => array_key_exists ( 'badgeStyle', $style_options ) ? $style_options['badgeStyle'] : '',
                                          'badgeColor'                => array_key_exists ( 'badgeColor', $style_options ) ? $style_options['badgeColor'] : '',
                                          'badgeWidth'                => array_key_exists ( 'badgeWidth', $style_options ) ? $style_options['badgeWidth'] : '',
                                          'badgeHeight'               => array_key_exists ( 'badgeHeight', $style_options ) ? $style_options['badgeHeight'] : '',
                                          'borderTopLeft'             => array_key_exists ( 'borderTopLeft', $style_options ) ? $style_options['borderTopLeft'] : '',
                                          'borderTopRight'            => array_key_exists ( 'borderTopRight', $style_options ) ? $style_options['borderTopRight'] : '',
                                          'borderBottomLeft'          => array_key_exists ( 'borderBottomLeft', $style_options ) ? $style_options['borderBottomLeft'] : '',
                                          'borderBottomRight'         => array_key_exists ( 'borderBottomRight', $style_options ) ? $style_options['borderBottomRight'] : '',
      
                                          'zIndex'                    => array_key_exists ( 'zIndex', $style_options ) ? $style_options['zIndex'] : '',
      
                                          'opacity'                   => array_key_exists ( 'opacity', $position_options ) ? $position_options['opacity'] : '',
                                          'rotationX'                 => array_key_exists ( 'rotationX', $position_options ) ? $position_options['rotationX'] : '',
                                          'rotationY'                 => array_key_exists ( 'rotationY', $position_options ) ? $position_options['rotationY'] : '',
                                          'rotationZ'                 => array_key_exists ( 'rotationZ', $position_options ) ? $position_options['rotationZ'] : '',
                                          'flipHorizontal'            => array_key_exists ( 'flipHorizontal', $position_options ) ? $position_options['flipHorizontal'] : '',
                                          'flipVertical'              => array_key_exists ( 'flipVertical', $position_options ) ? $position_options['flipVertical'] : '',
                                          'badgePosition'             => array_key_exists ( 'badgePosition', $position_options ) ? $position_options['badgePosition'] : '',
                                          'badgePositionHorizontal'   => array_key_exists ( 'badgePositionHorizontal', $position_options ) ? $position_options['badgePositionHorizontal'] : '',
                                          'posTop'                    => array_key_exists ( 'posTop', $position_options ) ? $position_options['posTop'] : '',
                                          'posBottom'                 => array_key_exists ( 'posBottom', $position_options ) ? $position_options['posBottom'] : '',
                                          'posLeft'                   => array_key_exists ( 'posLeft', $position_options ) ? $position_options['posLeft'] : '',
                                          'posRight'                  => array_key_exists ( 'posRight', $position_options ) ? $position_options['posRight'] : '',
      
                                          'saleBadge'                 => array_key_exists( 'assignAll', $preview_options ) ? $preview_options['assignAll'] : '',
      
                                      );
      
                                  }
      
                              }
      
                          }
      
                      }
      
                  }
                       
                  $this->active_badges = $acoplw_active_badges;
      
              }
      
          }

          public function cacoplwBadgeElem($product_image, $product){

            
            $productID      = $product->get_id();
            $productThumb   = $product_image;
            $useJqueryPos   = get_option('acoplw_jquery_status') ? get_option('acoplw_jquery_status') : '';

            // Load active badges
            $this->load_badges();
    
            /*
            * jQuery positioning
            * ver 3.1.8
            */
            $badgeListingHide       = $useJqueryPos ? 'acoplw-badge-listing-hide' : '';
    
            foreach ( $this->active_badges as $k => $badge ) {  
    
                $badgeID = array_key_exists ( 'id', $badge ) ? $badge['id'] : '';
    
                /* 
                * Checking Dynamic Pricing Settings
                * ver @ 1.4.3
                */
                $preview_options    = get_post_meta ( $badgeID, 'badge_preview_options', true ) ? get_post_meta ( $badgeID, 'badge_preview_options', true ) : [];
                $dynamicPR          = function_exists ('AWDP') ? ( array_key_exists( 'pricing_rule', $preview_options ) ? $preview_options['pricing_rule'] : false ) : false;
                $wdp_filecheck      = defined('AWDP_FILE') ? realpath(plugin_dir_path(AWDP_FILE)) . DIRECTORY_SEPARATOR . 'includes/class-awdp-plwsupport.php' : ''; 
                if ( $dynamicPR && $wdp_filecheck && file_exists ( $wdp_filecheck ) ) {
                    include_once($wdp_filecheck); // including dynamic pricing file
                    $selectedRule   = array_key_exists ( 'selected_rule', $preview_options ) ? $preview_options['selected_rule'] : '';
                    $awdp           = new AWDP_plwSupport();
                    if ( false === $awdp->plw_check ( $selectedRule, $productID ) ) {
                        continue;
                    }
                } else {
                    // Get Product List
                    if ( !$this->check_in_product_list ( $productID, $badgeID ) ) {
                        continue;
                    }
                }
    
                if ( array_key_exists ( $badgeID, $this->pScheduleStatus ) && $this->pScheduleStatus[$badgeID] ) {
                    if ( !$this->onSaleScheduleList( $productID, $badgeID ) ){
                        continue;
                    }
                }
                   
                $this->acoplwSaleBadge ( $productThumb, $productID, $badgeID );
    
            } 
    
            // Get all badges
            $acoplwActiveBadges = array_key_exists ( $productID, $this->acoplwBadges ) ? $this->acoplwBadges[$productID] : ''; 
            if ( $acoplwActiveBadges ) { 
                $badge = '';
                foreach ( $acoplwActiveBadges as $acoplwActiveBadge ) { 
                    $badge = $badge . $acoplwActiveBadge;
                }
                // $productThumb = '<span class="acoplw-badge">' . $badge . $productThumb . '</span>';
                $productThumb .= '<span class="acoplw-badge acoplw-textBlock acoplw-elemBlock '.$badgeListingHide.'">' . $badge . '</span>';
            } 
    
            // Return
            return $productThumb;
          }


          public function doofinderBadgeElem($product_image, $product_id){

            
            $productID      = $product_id;
            $productThumb   = $product_image;
            $useJqueryPos   = get_option('acoplw_jquery_status') ? get_option('acoplw_jquery_status') : '';

            // Load active badges
            $this->load_badges();
    
            /*
            * jQuery positioning
            * ver 3.1.8
            */
            $badgeListingHide       = $useJqueryPos ? 'acoplw-badge-listing-hide' : '';
    
            foreach ( $this->active_badges as $k => $badge ) {  
    
                $badgeID = array_key_exists ( 'id', $badge ) ? $badge['id'] : '';
    
                /* 
                * Checking Dynamic Pricing Settings
                * ver @ 1.4.3
                */
                $preview_options    = get_post_meta ( $badgeID, 'badge_preview_options', true ) ? get_post_meta ( $badgeID, 'badge_preview_options', true ) : [];
                $dynamicPR          = function_exists ('AWDP') ? ( array_key_exists( 'pricing_rule', $preview_options ) ? $preview_options['pricing_rule'] : false ) : false;
                $wdp_filecheck      = defined('AWDP_FILE') ? realpath(plugin_dir_path(AWDP_FILE)) . DIRECTORY_SEPARATOR . 'includes/class-awdp-plwsupport.php' : ''; 
                if ( $dynamicPR && $wdp_filecheck && file_exists ( $wdp_filecheck ) ) {
                    include_once($wdp_filecheck); // including dynamic pricing file
                    $selectedRule   = array_key_exists ( 'selected_rule', $preview_options ) ? $preview_options['selected_rule'] : '';
                    $awdp           = new AWDP_plwSupport();
                    if ( false === $awdp->plw_check ( $selectedRule, $productID ) ) {
                        continue;
                    }
                } else {
                    // Get Product List
                    if ( !$this->check_in_product_list ( $productID, $badgeID ) ) {
                        continue;
                    }
                }
    
                if ( array_key_exists ( $badgeID, $this->pScheduleStatus ) && $this->pScheduleStatus[$badgeID] ) {
                    if ( !$this->onSaleScheduleList( $productID, $badgeID ) ){
                        continue;
                    }
                }
                   
                $this->acoplwSaleBadge ( $productThumb, $productID, $badgeID );
    
            } 
    
            // Get all badges
            $acoplwActiveBadges = array_key_exists ( $productID, $this->acoplwBadges ) ? $this->acoplwBadges[$productID] : ''; 
            if ( $acoplwActiveBadges ) { 
                $badge = '';
                foreach ( $acoplwActiveBadges as $acoplwActiveBadge ) { 
                    $badge = $badge . $acoplwActiveBadge;
                }
                // $productThumb = '<span class="acoplw-badge">' . $badge . $productThumb . '</span>';
                 $doofinder_badge = '<span class="acoplw-badge acoplw-textBlock acoplw-elemBlock '.$badgeListingHide.'">' . $badge . '</span>';
            } 
    
            // Return
            return strip_tags($doofinder_badge);
          }

          public function acoplwSaleBadge ( $productThumb, $productID, $badgeID ) {
        

           
            if ( $this->active_badges != false && sizeof($this->active_badges) >= 1  ) { 
    
                $customStyle                = '';
                $saleperc                   = '';
                $badge                      = '';
                $wdpDiscLabel               = '';
                $dynmFlag                   = false;
    
                $badgeOptions               = $this->active_badges; 
                $badgeOptions               = $badgeOptions[$badgeID]; 
    
                $label                      = ( array_key_exists ( 'label', $badgeOptions ) && !empty ( $badgeOptions['label'] ) ) ? $badgeOptions['label'] : 'Sale';
                $labelColor                 = array_key_exists ( 'labelColor', $badgeOptions ) ? $badgeOptions['labelColor'] : '';
                $fontSize                   = array_key_exists ( 'fontSize', $badgeOptions ) ? $badgeOptions['fontSize'] : '';
                $fontWeight                 = array_key_exists ( 'fontWeight', $badgeOptions ) ? $badgeOptions['fontWeight'] : '';
                $lineHeight                 = array_key_exists ( 'lineHeight', $badgeOptions ) ? $badgeOptions['lineHeight'] : '';
    
                $badgeStyle                 = array_key_exists ( 'badgeStyle', $badgeOptions ) ? $badgeOptions['badgeStyle'] : '';
                $badgeColor                 = array_key_exists ( 'badgeColor', $badgeOptions ) ? $badgeOptions['badgeColor'] : '';
                $badgeWidth                 = ( array_key_exists ( 'badgeWidth', $badgeOptions ) && $badgeOptions['badgeWidth'] != '' ) ? (int)$badgeOptions['badgeWidth'] : 60;
                $badgeHeight                = ( array_key_exists ( 'badgeHeight', $badgeOptions ) && $badgeOptions['badgeHeight'] != '' ) ? $badgeOptions['badgeHeight'] : 30;
                $borderTopLeft              = array_key_exists ( 'borderTopLeft', $badgeOptions ) ? $badgeOptions['borderTopLeft'] : '';
                $borderTopRight             = array_key_exists ( 'borderTopRight', $badgeOptions ) ? $badgeOptions['borderTopRight'] : '';
                $borderBottomLeft           = array_key_exists ( 'borderBottomLeft', $badgeOptions ) ? $badgeOptions['borderBottomLeft'] : '';
                $borderBottomRight          = array_key_exists ( 'borderBottomRight', $badgeOptions ) ? $badgeOptions['borderBottomRight'] : '';
                
                $zIndex                     = array_key_exists ( 'zIndex', $badgeOptions ) ? $badgeOptions['zIndex'] : '';
    
                $opacity                    = array_key_exists ( 'opacity', $badgeOptions ) ? $badgeOptions['opacity'] : '';
                $rotationX                  = array_key_exists ( 'rotationX', $badgeOptions ) ? $badgeOptions['rotationX'] : '';
                $rotationY                  = array_key_exists ( 'rotationY', $badgeOptions ) ? $badgeOptions['rotationY'] : '';
                $rotationZ                  = array_key_exists ( 'rotationZ', $badgeOptions ) ? $badgeOptions['rotationZ'] : '';
                $flipHorizontal             = array_key_exists ( 'flipHorizontal', $badgeOptions ) ? $badgeOptions['flipHorizontal'] : '';
                $flipVertical               = array_key_exists ( 'flipVertical', $badgeOptions ) ? $badgeOptions['flipVertical'] : '';
                $badgePosition              = array_key_exists ( 'badgePosition', $badgeOptions ) ? $badgeOptions['badgePosition'] : '';
                $badgePositionHorizontal    = array_key_exists ( 'badgePositionHorizontal', $badgeOptions ) ? $badgeOptions['badgePositionHorizontal'] : '';
                $posTop                     = array_key_exists ( 'posTop', $badgeOptions ) ? $badgeOptions['posTop'] : '';
                $posBottom                  = array_key_exists ( 'posBottom', $badgeOptions ) ? $badgeOptions['posBottom'] : '';
                $posLeft                    = array_key_exists ( 'posLeft', $badgeOptions ) ? $badgeOptions['posLeft'] : '';
                $posRight                   = array_key_exists ( 'posRight', $badgeOptions ) ? $badgeOptions['posRight'] : '';
    
                $checkSale                  = array_key_exists ( 'saleBadge', $badgeOptions ) ? $badgeOptions['saleBadge'] : '';
                
                $useJqueryPos               = get_option('acoplw_jquery_status') ? get_option('acoplw_jquery_status') : '';
    
                $CalcSixVal                 = ( $badgeWidth <= 60 ) ? 0.167 : ( ( $badgeWidth <= 90 ) ? 0.22 : ( ( $badgeWidth > 90 ) ? 0.25 : 0 ) );
    
                $CalcFiveValOne             = ( $badgeWidth < 85 ) ? 1.5 : ( ( $badgeWidth > 85 ) ? 1.41 : 0 );
                $CalcFiveValTwo             = ( $badgeWidth <= 40 ) ? 0 : ( ( $badgeWidth < 60 ) ? 0.11 : ( ( $badgeWidth < 85 ) ? 0.167 : ( ( $badgeWidth > 85 ) ? 0.26 : 0 ) ) );
                $CalcFiveValThree           = ( $badgeWidth <= 40 ) ? 0.45 : ( ( $badgeWidth < 60 ) ? 0.43 : ( ( $badgeWidth < 85 ) ? 0.42 : ( ( $badgeWidth > 85 ) ? 0.31 : 0 ) ) );
    
                $bsSixWidth                 = $badgeWidth != '' ? $badgeWidth + 30 : 90;
    
                $bsSixTop                   = $badgeWidth != '' ? $badgeWidth * $CalcSixVal : 15;
    
                $bsFiveWidth                = $badgeWidth != '' ? $badgeWidth * $CalcFiveValOne : 100; 
                $bsFiveTop                  = $badgeWidth != '' ? $badgeWidth * $CalcFiveValTwo : '';
                $bsFiveLeft                 = ( $badgeWidth != '' && $badgePositionHorizontal == 'bpthree' ) ? -$badgeWidth * $CalcFiveValThree . "px" : 'auto';
                $bsFiveRight                = ( $badgeWidth != '' && $badgePositionHorizontal == 'bpfour' ) ? -$badgeWidth * $CalcFiveValThree . "px" : 'auto';
    
                $preview_options            = get_post_meta ( $badgeID, 'badge_preview_options', true ) ? get_post_meta ( $badgeID, 'badge_preview_options', true ) : [];
    
                /*
                * jQuery positioning
                * ver 3.1.8
                */
                $badgeListingHide           = $useJqueryPos ? 'acoplw-badge-listing-hide' : '';
    
                $category                   = '';
    
                /* 
                * Dynamic Values 
                * ver 1.2.9
                * ver 1.3.3 - sale percenatge added
                */
                
                if ( strpos($label,'{day}') !== false || strpos($label,'{month}') !== false || strpos($label,'{year}') !== false || strpos($label,'{salepercentage}') !== false || strpos($label,'{wdpdiscount}') !== false || strpos($label,'{category}') !== false ) {
                    
                    // Get wordpress timezone settings
                    $gmt_offset         = get_option('gmt_offset');
                    $timezone_string    = get_option('timezone_string');
    
                    if ($timezone_string) {
                        $datenow    = new DateTime(current_time('mysql'), new DateTimeZone($timezone_string));
                    } else {
                        $min        = 60 * get_option('gmt_offset');
                        $sign       = $min < 0 ? "-" : "+";
                        $absmin     = abs($min);
                        $tz         = sprintf("%s%02d%02d", $sign, $absmin / 60, $absmin % 60);
                        $datenow    = new DateTime(current_time('mysql'), new DateTimeZone($tz));
                    }
    
                    global $product;
                    if ( ! is_object( $product) ) $product = wc_get_product( get_the_ID() ); 
                    if ( is_a ( $product, 'WC_Product' ) ) { 
                        if( $product->is_on_sale() && $checkSale ) {
                            if ( $product->is_type( 'variable' ) ) { 
                                // The active price min and max
                                $acoplw_sale_price 		= $product->get_variation_sale_price('max'); 
                                $acoplw_regular_price 	= $product->get_variation_regular_price('max'); 
                            } else {
                                $acoplw_sale_price 		= $product->get_sale_price();
                                $acoplw_regular_price 	= $product->get_regular_price();
                            }
                            if ( $acoplw_sale_price && $acoplw_regular_price ) {
                                $acoplw_percentage = 100 - round ( ( $acoplw_sale_price / $acoplw_regular_price ) * 100 );
                                $saleperc = $acoplw_percentage.'%';
                            }
                        }
                    }
    
                    // WDP Discount Value
                    if ( isset ( $preview_options['pricing_rule'] ) && isset ( $preview_options['selected_rule'] ) ) {
                        $wdpRule        = $preview_options['selected_rule'];
                        $wdpDiscount    = get_post_meta ( $wdpRule, 'discount_value', true ) ? get_post_meta ( $wdpRule, 'discount_value', true ) : '';
                        $wdpDiscType    = get_post_meta ( $wdpRule, 'discount_type', true ) ? get_post_meta ( $wdpRule, 'discount_type', true ) : '';
                        if ( $wdpDiscType === 'fixed_product_price' || $wdpDiscType === 'percent_product_price' ) {
                            $wdpDiscLabel = $wdpDiscType === 'fixed_product_price' ? $wdpDiscount . ' OFF' : $wdpDiscount . '%';
                        }
                    }
    
                    // Category
                    if ( strpos($label, '{category}') !== false ) {
                        $cat_list   = wp_get_post_terms($productID,'product_cat',array('fields'=>'names')); 
                        $category   = !empty ( $cat_list ) ? $cat_list[0] : '';
                    }
    
                    $datenow    = $datenow->format('Y-m-d H:i:s');
                    $day        = date("l");
                    $month      = date("F");
                    $year       = date("Y");
    
                    $label      = str_replace('{day}', $day, $label); 
                    $label      = str_replace('{month}', $month, $label); 
                    $label      = str_replace('{year}', $year, $label);
                    $label      = str_replace('{salepercentage}', $saleperc, $label);
                    $label      = str_replace('{wdpdiscount}', $wdpDiscLabel, $label);
                    $label      = str_replace('{category}', $category, $label);
                    
                    $dynmFlag   = true;
                }
    
                /*
                * borderRadiusExclude, badgeHW
                * ver 1.2.0
                */
                $borderRadiusExclude    = array ( 'bseight', 'bsten', 'bsfive', 'bssix', 'bsfifteen' );
                $badgeHW                = array ( 'bsseven', 'bseight' );
                $badgeTrnsVert          = array ( 'bsseven', 'bseight', 'bsten', 'bssix', 'bsfive' );
                $badgeTrnsRot           = array ( 'bssix', 'bsfive' );
                $badgeTrnsRotVal        = ( ( $badgePositionHorizontal == 'bpthree' && $badgePosition == 'bptwo' ) || ( $badgePositionHorizontal == 'bpfour' && $badgePosition == 'bpone' ) ) ? 315 : 45;
                
                /*
                * Border Width Calculations
                * ver 1.2.0
                */
                $BRTen_one              = $badgeWidth ? $badgeWidth * 1.083 : 65;
                $BRTen_two              = $badgeWidth ? $badgeWidth * 0.42 : 25;
    
                /*
                * Border radius fix for badges 
                * ver 1.3.0
                */
                $borderTopLeft          = ( ( $badgeStyle == 'bsfour' || $badgeStyle == 'bstwo' ) &&  $badgePositionHorizontal == 'bpfour' ) ? 0 : $borderTopLeft;
                $borderTopRight         = ( ( $badgeStyle == 'bsfour' || $badgeStyle == 'bstwo' ) &&  $badgePositionHorizontal == 'bpthree' ) ? 0 : $borderTopRight;
                $borderBottomRight      = ( ( $badgeStyle == 'bsfour' || $badgeStyle == 'bstwo' ) &&  $badgePositionHorizontal == 'bpthree' ) ? 0 : $borderBottomRight;
                $borderBottomLeft       = ( ( $badgeStyle == 'bsfour' || $badgeStyle == 'bstwo' ) &&  $badgePositionHorizontal == 'bpfour' ) ? 0 : $borderBottomLeft;
    
                $badgeCSSClass  = 'acoplw-badge-icon acoplw-'.$badgeStyle;
                $badgeCSSClass .= $dynmFlag ? ' acoplw-dynamic-label' : '';
                $badgeCSSClass .= ( $badgePositionHorizontal == 'bpthree' ) ? ' acoplwLeftAlign' : ' acoplwRightAlign';
                $badgeCSSClass .= ( $badgePosition == 'bpone' ) ? ' acoplwPosTop' : ' acoplwPosBtm';
    
                $customClass    = ( $badgeStyle == 'bstwo' || $badgeStyle == 'bsthree' || $badgeStyle == 'bsfour' || $badgeStyle == 'bsten' ) ? 'acoplw-'.get_post_field( "post_name", $badgeID ).'-custom' : '';
    
                // $textcss = "color:rgba(".$labelColor['r'].", ".$labelColor['g'].", ".$labelColor['b'].", ".$labelColor['a'].");font-size:".$fontSize."px;line-height:".$lineHeight."px;";
                $textcss    = "color:rgba(".$labelColor['r'].", ".$labelColor['g'].", ".$labelColor['b'].", ".$labelColor['a'].");";
                // $textcss    .= ( $flipHorizontal && $flipVertical ) ? 'transform: scaleX(-1) scaleY(-1);' : ( ( $flipHorizontal ) ? 'transform: scaleX(-1);' : ( ( $flipVertical ) ? 'transform: scaleY(-1);' : '' ) );
                $textcss .= ( !in_array ( $badgeStyle, $badgeTrnsVert ) ) ? ( ( $flipHorizontal && $flipVertical ) ? ( 'transform: scaleX(-1) scaleY(-1);' ) : ( ( $flipHorizontal ) ? 'transform: scaleX(-1);' : ( ( $flipVertical ) ? 'transform: scaleY(-1);' : '' ) ) ) : ( in_array ( $badgeStyle, $badgeTrnsRot ) ? ( ( $flipHorizontal && $flipVertical ) ? ( 'transform: scaleX(-1) scaleY(-1) rotate('.$badgeTrnsRotVal.'deg); top: auto;' ) : ( ( $flipHorizontal ) ? ( 'transform: scaleX(-1) rotate('.$badgeTrnsRotVal.'deg); top: auto;' ) : ( ( $flipVertical ) ? ( 'transform: scaleY(-1) rotate('.$badgeTrnsRotVal.'deg); top: auto;' ) : '' ) ) ) : ( ( $flipHorizontal && $flipVertical ) ? ( 'transform: scaleX(-1) scaleY(-1) translateY(-50%); top: auto;' ) : ( ( $flipHorizontal ) ? ( 'transform: scaleX(-1) translateY(-50%); top: auto;' ) : ( ( $flipVertical ) ? ( 'transform: scaleY(-1) translateY(-50%); top: auto;' ) : '' ) ) ) );
    
                $textcss    .= ( $badgeStyle == 'bsfive' ) ? ( "background:rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a'].");width:" . $bsFiveWidth . "px;top:" . $bsFiveTop . "px;left:" . $bsFiveLeft . ";right:" . $bsFiveRight . ";" ) : '';
                $textcss    .= ( $badgeStyle == 'bssix' ) ? ( "width:" . $bsSixWidth . "px;top:" . $bsSixTop . "px" ) : '';
    
                $css = "opacity:".($opacity / 100).";width:".$badgeWidth."px;font-size:".$fontSize."px;line-height:".$lineHeight."px;";
                $css .= $fontWeight == 'bold' ? "font-weight: 700;" : ( $fontWeight == 'semi_bold' ? "font-weight: 600;" : "font-weight: 400;" );
                $css .= $zIndex ? ( "z-index:".$zIndex.";" ) : '';
                $css .= ( ( $badgeStyle == 'bsone' || $badgeStyle == 'bsfifteen' )  && $badgeHeight ) ? ( "height:".$badgeHeight."px;" ) : ( ( in_array ( $badgeStyle, $badgeHW ) && $badgeWidth ) ? ( "height:".$badgeWidth."px;" ) : '' );
                $css .= ( $badgeStyle == 'bsfifteen' ) ? ( "width:100%;" ) : '';
                $css .= "transform:rotateX(". ( $rotationX * 3.6 )."deg) rotateY(". ( $rotationY * 3.6 ) ."deg) rotateZ(". ( $rotationZ * 3.6 ) ."deg);";
                $css .= ( !in_array ( $badgeStyle, $borderRadiusExclude ) ) ? ( "border-radius: ".$borderTopLeft."px ".$borderTopRight."px ".$borderBottomRight."px ".$borderBottomLeft."px;" ) : '';
                $css .= ( $posTop && $badgePosition != 'bptwo' ) ? ( "top:".$posTop."px;bottom:auto;" ) : ( ( $badgePosition == 'bpone' ) ? ( $posTop ? "top:".$posTop."px;bottom:auto;" : "top:0px;bottom:auto;" ) : '' );
                $css .= ( $posBottom && $badgePosition != 'bpone' ) ? ( "bottom:".$posBottom."px;top:auto;" ) : ( ( $badgePosition == 'bptwo' ) ? ( $posBottom ? "bottom:".$posBottom."px;top:auto;" : "bottom:0px;top:auto;" ) : '' );
                $css .= ( $badgeStyle == 'bsfifteen' ) ? ( "left:0px;" ) : ( ( $posLeft && $badgePositionHorizontal != 'bpfour' ) ? ( "left:".$posLeft."px;" ) : '' );
                $css .= ( $badgeStyle == 'bsfifteen' ) ? ( "right:0px;" ) : ( ( $posRight && $badgePositionHorizontal != 'bpthree' ) ? ( "right:".$posRight."px;" ) : '' );
                $css .= ( $badgeStyle == 'bsfive' || $badgeStyle == 'bssix' ) ? ( "height:".$badgeWidth."px;" ) : ( "background:rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a'].");" ) ;
    
                /*
                * Width auto for badges bsone, bstwo, bsthree, bsfour 
                * ver 1.3.0
                */
                // $css .= ( $dynmFlag && ( $badgeStyle == 'bsfour' || $badgeStyle == 'bsthree' || $badgeStyle == 'bstwo' || $badgeStyle == 'bsone' ) ) ? 'width:auto' : '';
                $css .= ( $dynmFlag && ( $badgeStyle == 'bsfour' || $badgeStyle == 'bsthree' || $badgeStyle == 'bstwo' || $badgeStyle == 'bsone' ) ) || ( ( array_key_exists ( 'badgeWidth', $badgeOptions ) && $badgeOptions['badgeWidth'] == '' ) && ( $badgeStyle == 'bsfour' || $badgeStyle == 'bsthree' || $badgeStyle == 'bstwo' || $badgeStyle == 'bsone' ) ) ? ( 'width:auto' ) : '';
    
                $blockonecss = ( $badgeStyle == 'bssix' ) ? ( ( $badgePositionHorizontal == 'bpthree' ) ? ( "border-right: none; border-left: ".$badgeWidth."px solid rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a']."); border-bottom: ".$badgeWidth."px solid transparent;" ) : ( "border-left: none; border-right: ".$badgeWidth."px solid rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a']."); border-bottom: ".$badgeWidth."px solid transparent;" ) ) : '' ;
    
                $customClass = "acoplw-".get_post_field( 'post_name', $badgeID )."-custom";
                
                if ( $badgeStyle == 'bstwo' ) {
                    $customStyle = ".".$customClass.":after { background:rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a'].") !important; }";
                } else if ( $badgeStyle == 'bsthree' ) {
                    if ( $badgePositionHorizontal == 'bpthree' ) {
                        $customStyle = ".".$customClass.":before { border-left: 15px solid rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a'].") !important; border-right: none; }";
                    } else {
                        $customStyle = ".".$customClass.":before { border-right: 15px solid rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a'].") !important; border-left: none; }";
                    }
                } else if ( $badgeStyle == 'bsfour' ) {
                    $customStyle = ".".$customClass.":before { border-color:rgba(".$badgeColor['r'].", ".$badgeColor['g'].", ".$badgeColor['b'].", ".$badgeColor['a'].") !important; border-left-color: transparent !important; }";
                } else if ( $badgeStyle == 'bsten' ) {
                    $customStyle = ".".$customClass."{display:inline-block;height:".$BRTen_one."px; border-radius: 3px 3px ".$BRTen_two."px ".$BRTen_two."px;}";
                } 
    
                if ( $css ) {
                    $customStyle .= ".".$customClass." { ".$css." }";
                }
    
                $customStyle .= ' .acoplw-badge{visibility:visible;}';
    
                // Badge View
                if ( $badgeStyle == 'bsfive' ) {
                    $badge = '<span class="test 1'.$badgeCSSClass. ' ' .$customClass.' '.$badgeListingHide.'" style="'.$css.'"><span class="acoplw-blockOne" style="'.$blockonecss.'"></span><span class="acoplw-blockTwo"></span><span class="acoplw-blockText" style="'.$textcss.'width:100px;top:13px; left:auto;right:-26px;font-size:10px">'.$label.'</span></span>';
                } else if ( $badgeStyle == 'bssix' ) {
                    $badge = '<span class="test 2 '.$badgeCSSClass. ' ' .$customClass.' '.$badgeListingHide.'" style="'.$css.'"><span class="acoplw-blockOne" style="'.$blockonecss.'"></span><span class="acoplw-blockTwo"></span><span class="acoplw-blockText" style="'.$textcss.'">'.$label.'</span></span>';
                } else if ( $badgeStyle == 'bseleven' ) {
                    $badge = '<span class=" test 3'.$badgeCSSClass.' '.$badgeListingHide.'" style="'.$css.'">
                                <span class="acoplw-blockwrap">
                                    <span class="acoplw-firstblock"></span>
                                    <span class="acoplw-secondblock"></span>
                                    <span class="acoplw-thirdblock"></span>
                                </span>
                                <span class="acoplw-blockText" style="'.$textcss.'">'.$label.'</span>
                            </span>';
                } else {
                    $badge = '<span class="test 4'.$badgeCSSClass. ' ' .$customClass.'" style="'.$css.'"><span class="acoplw-blockText" style="'.$textcss.'">'.$label.'</span></span>';
                }
                // End Badge View
    
                $this->acoplwBadges[$productID][$badgeID] = $badge;
                $this->customStyles[$badgeID] = $customStyle;
    
            }
    
        }
           
      
      }
class CartBadgesAPi extends ACOPLW_Api{

        function __construct(){
            
        }
}
class CartFrontEnd extends ACOPLW_Front_End{

  private $badge;
  

  function __construct($badge, $file = '', $version = '1.0.0'){
               
          if($this->acoplw_check_woocommerce_active() ){
              $this->badge=$badge;
            add_filter('woocommerce_cart_item_thumbnail', array($this,'custom_cart_item_thumbnail'), 10, 3);
           add_filter ('woocommerce_get_product_thumbnail',array($this,'custom_category_page_thumbnail'), 10, 2);
         
          }

          
  }

  public function custom_cart_item_thumbnail($product_image, $cart_item, $cart_item_key){
      
    $product_id = $cart_item['product_id'];
      
        $product=wc_get_product($product_id);

      $image_html ="<div class='product-image2'>";
      $image_html.="<div class='inner'>";

      $image_html.=$this->badge->cacoplwBadgeElem( $product_image, $product );
      $image_html.="</div>";
      $image_html.="</div>";

      return  $image_html;
  }
  public function custom_category_page_thumbnail($product_image, $product){
    echo "<div>new image</div>";    
  //$product_id = $product->get_id();
    
  //$product=wc_get_product($product_id);

    $image_html ="<div class='product-image2'>";
    $image_html.="<div class='inner'>";

    $image_html.=$this->badge->cacoplwBadgeElem( $product_image, $product );
    $image_html.="</div>";
    $image_html.="</div>";

    return  $image_html;
}
  public function do_finder_labels(){

    $args = array(
      'post_type'      => 'product',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
  );
  
  $products_query = new WP_Query( $args );
  
  if ( $products_query->have_posts() ) {
      while ( $products_query->have_posts() ) {
          $products_query->the_post();
          
          // Access product properties
          $product_id = get_the_ID();
    
          $product_image = get_the_post_thumbnail( $product_id, 'full' );
         
      
      

      $image_html=$this->badge->doofinderBadgeElem( $product_image, $product_id );
      
        update_post_meta( $product_id, 'do-labels', $image_html );
      }
    }
        // Perform actions based on the custom meta data
  }
  

}
$cbadge = new CartBadges();
 
new CartFrontEnd($cbadge, __FILE__, ACOPLW_VERSION);




// Add custom meta field to product
function custom_product_meta_field() {
  global $post;

  echo '<div class="options_group">';

  // Custom meta field for product
  woocommerce_wp_text_input(
      array(
          'id'            => 'do-labels',
          'label'         => __( 'Do Labels', 'text-domain' ),
          'placeholder'   => '',
          'description'   => __( 'Enter Do Labels here.', 'text-domain' ),
      )
  );

  echo '</div>';
}
add_action( 'woocommerce_product_options_general_product_data', 'custom_product_meta_field' );

// Save custom meta field
function save_custom_product_meta_field( $product_id ) {
  // Save custom meta field
  $do_labels = isset( $_POST['do-labels'] ) ? sanitize_text_field( $_POST['do-labels'] ) : '';
  update_post_meta( $product_id, 'do-labels', $do_labels );
}
add_action( 'woocommerce_process_product_meta', 'save_custom_product_meta_field' );

//FIBO SEARCH BAR//
add_filter('porto_search_form_content', function ($html) {

    $html = do_shortcode('[fibosearch]');

    return $html;
});

add_filter('dgwt/wcas/scripts/mobile_breakpoint', function () {
    return 768;
});

add_action('wp_head', function () {
    ?>
    <style>
        .header-center .dgwt-wcas-search-wrapp {
            width: 440px;
        }

        #header .searchform-popup .search-toggle {
            display: none !important;
        }

    </style>
    <?php
});
