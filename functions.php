<?php
function my_theme_enqueue_styles() { 
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


//Header Scripts
function enqueue_custom_scripts () {
	wp_enqueue_script( 'scripts', '/assets/scripts.js', false );
	wp_enqueue_style( 'slider-css', '/assets/slider.css', false );
	wp_enqueue_style( 'flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css', false );
} add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );



//Header Scripts
function enqueue_header_scripts () {
	if (is_page ('Checkout')) {
		wp_enqueue_script( 'jQuery Tabs', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', false );
	} else {
		return;
	};
} add_action( 'wp_enqueue_scripts', 'enqueue_header_scripts' );


//Footer Scripts
function enqueue_footer_scripts () {
	wp_enqueue_script( 'slider', '/assets/slider.js', array(), false, true );
	wp_enqueue_script( 'flickity-js', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), false, true );
	wp_enqueue_script( 'handlebars', 'https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.2.0/handlebars.min.js', array(), false, true );
	wp_enqueue_script( 'instagramFeed', 'https://www.sowecms.com/demos/jquery.instagramFeed/jquery.instagramFeed.min.js', array(), false, true );
	
} add_action('wp_enqueue_scripts', 'enqueue_footer_scripts');


// Login
function headerLogin ( $args ) {
	ob_start (); 
	?>  
	<div id="login">
		<?php if ( is_user_logged_in() ) { 
			$current_user = wp_get_current_user(); echo '
			<a href="/my-account/">
			<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20 0C8.95161 0 0 8.95161 0 20C0 31.0484 8.95161 40 20 40C31.0484 40 40 31.0484 40 20C40 8.95161 31.0484 0 20 0ZM20 7.74194C23.9194 7.74194 27.0968 10.9194 27.0968 14.8387C27.0968 18.7581 23.9194 21.9355 20 21.9355C16.0806 21.9355 12.9032 18.7581 12.9032 14.8387C12.9032 10.9194 16.0806 7.74194 20 7.74194ZM20 35.4839C15.2661 35.4839 11.0242 33.3387 8.18548 29.9839C9.70161 27.129 12.6694 25.1613 16.129 25.1613C16.3226 25.1613 16.5161 25.1935 16.7016 25.25C17.75 25.5887 18.8468 25.8065 20 25.8065C21.1532 25.8065 22.2581 25.5887 23.2984 25.25C23.4839 25.1935 23.6774 25.1613 23.871 25.1613C27.3306 25.1613 30.2984 27.129 31.8145 29.9839C28.9758 33.3387 24.7339 35.4839 20 35.4839Z" fill="var(--pinkaccent)"/></svg></a>'; } 
			else { echo '<a href="/my-account/">
					<svg class="mobile-nav" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M20 0C8.95161 0 0 8.95161 0 20C0 31.0484 8.95161 40 20 40C31.0484 40 40 31.0484 40 20C40 8.95161 31.0484 0 20 0ZM20 7.74194C23.9194 7.74194 27.0968 10.9194 27.0968 14.8387C27.0968 18.7581 23.9194 21.9355 20 21.9355C16.0806 21.9355 12.9032 18.7581 12.9032 14.8387C12.9032 10.9194 16.0806 7.74194 20 7.74194ZM20 35.4839C15.2661 35.4839 11.0242 33.3387 8.18548 29.9839C9.70161 27.129 12.6694 25.1613 16.129 25.1613C16.3226 25.1613 16.5161 25.1935 16.7016 25.25C17.75 25.5887 18.8468 25.8065 20 25.8065C21.1532 25.8065 22.2581 25.5887 23.2984 25.25C23.4839 25.1935 23.6774 25.1613 23.871 25.1613C27.3306 25.1613 30.2984 27.129 31.8145 29.9839C28.9758 33.3387 24.7339 35.4839 20 35.4839Z" fill="var(--darkgreen)"/>
					</svg>			
				</a>';
			} ?> 
    </div>
	<?php
 
	return ob_get_clean();
}
add_shortcode('headerLogin', 'headerLogin');

// Menu
function fullscreenMenu( $args ) {
  ob_start();
  ?> 
	<a class="nav-icon">
		<svg class="mobile-nav" width="35" height="40" viewBox="0 0 35 33" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="35" height="4" fill="#203631"/>
			<rect y="14.5" width="35" height="4" fill="#203631"/>
			<rect y="29" width="35" height="4" fill="#203631"/>
		</svg>
	</a>

	<div class="nav-overlay">
		<a href="javascript:void(0)" class="closebtn">&times;</a> 
		<div class="nav-overlay-content">
			<div class="menu-wrapper">
				<a href="<?php echo site_url();?>">Home</a>
				<a href="<?php echo site_url();?>/the-deli">The Deli</a>
				<a href="#">Home meals</a>
				<a href="#">Platters</a>
				<a href="#">Cakes and Quiches</a>
				<a href="#">Book catering</a>
				<a href="<?php echo site_url();?>/about-us">About Us</a>
				<a href="<?php echo site_url();?>/contact/">Contact</a>
			</div>
		</div>
	</div>	
<?php
  return ob_get_clean();
}
add_shortcode("fullscreenMenu","fullscreenMenu");

//Header Logo
function headerLogo($args){
	ob_start();
  ?> 
	<svg id="header-logo" class="mobile-nav" width="60" height="60" viewBox="0 0 45 50" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M34.8816 24.401C32.9592 23.0074 29.7712 23.8638 26.9276 23.7937C24.5246 21.1777 18.5811 13.579 16.2021 10.4648L16.138 10.4103C15.2472 9.28209 14.2981 8.19851 13.2945 7.16369C15.0756 8.03877 16.9046 8.81849 18.7734 9.49937C19.6625 10.8852 21.9774 14.0072 24.7649 14.3576C29.3232 14.8589 33.9312 14.0152 37.9895 11.9363C37.9895 11.9363 32.8711 8.23032 28.3774 7.5374C24.837 7.01577 20.7839 8.06682 19.1338 8.57288C16.2951 7.49708 13.5218 6.26496 10.8274 4.88251C7.97005 2.34131 4.4229 0.649861 0.606531 0.00873527C0.539681 -0.00359418 0.470975 -0.00286508 0.404418 0.0108801C0.33786 0.0246252 0.274784 0.0511114 0.218867 0.0887943C0.16295 0.126477 0.11531 0.174603 0.0787246 0.230366C0.0421396 0.286128 0.0173416 0.348412 0.0057764 0.413586C-0.00436412 0.477644 -0.00112887 0.54303 0.0152892 0.605847C0.0317073 0.668663 0.060972 0.727623 0.101338 0.779209C0.141704 0.830796 0.192345 0.873953 0.25024 0.906107C0.308136 0.938261 0.372101 0.958754 0.43832 0.966363C4.52345 1.56585 8.17604 3.74582 11.3721 6.7277C12.3172 8.92323 13.4627 12.3878 13.3906 14.3342C11.7886 14.9337 6.98254 17.0047 5.38053 20.6795C2.78527 26.5342 6.46189 32.5525 6.46189 32.5525C6.46189 32.5525 12.149 28.8154 14.5841 24.3543C16.5225 20.843 15.3851 16.0548 14.3999 14.5911C14.544 12.8627 13.8311 10.3791 13.1823 8.55731C15.6568 11.2958 17.8337 14.2753 19.6785 17.4485C19.6508 17.5346 19.6508 17.627 19.6785 17.7132C20.215 20.2559 20.215 22.8781 19.6785 25.4209C16.6284 27.3029 14.2333 30.0352 12.8059 33.261C12.0385 35.214 11.9123 37.3501 12.4444 39.3757C12.9765 41.4013 14.1409 43.217 15.7776 44.5734C15.7776 44.5734 19.9268 37.3017 22.3378 33.767C23.3952 32.1554 21.3446 27.2583 20.6397 25.7012C21.0962 23.7698 21.218 21.7779 21.0001 19.8075C23.1852 23.8185 25.0594 27.9824 26.6072 32.2644C25.7181 33.6425 23.5634 37.5041 24.5086 41.2412C25.686 45.9126 33.9284 50 33.9284 50C33.4816 46.5794 33.2996 43.1311 33.3837 39.6841C33.5679 35.8536 29.3226 33.0508 27.6405 32.0931C26.0769 28.0297 24.2331 24.0735 22.1216 20.2513C23.307 21.715 24.4445 22.4935 25.3656 23.5446C25.3656 23.5446 30.0836 30.0144 34.1767 32.8873C36.9001 34.8025 44.3575 33.5802 44.3575 33.5802C44.6699 33.2999 41.3938 29.0801 34.8816 24.401Z" fill="#203631"/></svg>
	<?php
  return ob_get_clean();
} add_shortcode("headerLogo", "headerLogo");


// Cart
function headerCart ( $args ) {
	ob_start (); 
	?>  
	<div id="cart">
		<a id="cart-icon">
			<svg class="mobile-cart" width="43" height="40" viewBox="0 0 43 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M11.2324 5.11951L11.3308 5.625H11.8458H41.0707C41.7804 5.625 42.379 6.33664 42.2011 7.15833L38.6838 23.4083C38.557 23.9943 38.0731 24.375 37.5534 24.375H15.742H14.9835L15.1285 25.1195L15.6155 27.6195L15.714 28.125H16.229H36.2005C36.9102 28.125 37.5088 28.8366 37.331 29.6583L36.9205 31.5549L36.8187 32.0254L37.2475 32.2439C38.4264 32.8448 39.256 34.125 39.256 35.625C39.256 37.7252 37.6419 39.375 35.7143 39.375C33.7867 39.375 32.1726 37.7252 32.1726 35.625C32.1726 34.5656 32.5871 33.6149 33.2475 32.9357L34.2786 31.875H32.7994H17.2006H15.7212L16.7525 32.9357C17.4129 33.6149 17.8274 34.5656 17.8274 35.625C17.8274 37.7252 16.2134 39.375 14.2857 39.375C12.3581 39.375 10.7441 37.7252 10.7441 35.625C10.7441 34.22 11.4727 33.0075 12.5352 32.3659L12.9091 32.1401L12.8256 31.7114L7.59881 4.88049L7.50034 4.375H6.98535H1.78572C1.17304 4.375 0.625 3.84445 0.625 3.125V1.875C0.625 1.15555 1.17304 0.625 1.78572 0.625H9.41437C9.94296 0.625 10.4336 1.01903 10.5504 1.6187L10.5504 1.61873L11.2324 5.11951Z" fill="#203631" stroke="#fff" stroke-width="1.25"/>
				</svg>
		</a>
		<span id="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	</div>
	<?php if (function_exists('woocommerce_mini_cart')) { ?>
		<div class="submenu_cart cart <?php if ( ! WC()->cart->is_empty() ) echo esc_attr('cart'); ?>">
            <div class="cart_header">
                <div class="cart_heading">
                    <span class="formLabel cart_heading_title"><?php esc_html_e( 'Review Cart', 'O&G' ); ?></span>
                </div>
                <div class="close close-bar" id="close_cart">
                    <span>&times;</span>
                </div>
            </div>
			<div class="widget_shopping_cart_content"><?php woocommerce_mini_cart();?></div>
		</div>
		<div class="cart-overlay"></div>
	<?php } ?>
	<?php
	return ob_get_clean();
}
add_shortcode("headerCart","headerCart");


//Container for svg logo for 404 page
function error_container ( $args ) {
	ob_start (); 
	?> 
		<div class="empt-container-image">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.37 64.14"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M43.54,31.33c-2.4-1.79-6.38-.69-9.93-.78-3-3.36-10.42-13.12-13.39-17.12l-.08-.07a54.07,54.07,0,0,0-3.55-4.17,68.32,68.32,0,0,0,6.84,3c1.11,1.78,4,5.79,7.48,6.24a28.53,28.53,0,0,0,16.51-3.11s-6.39-4.76-12-5.65C31,9,25.94,10.35,23.88,11A100.15,100.15,0,0,1,13.51,6.26,25.28,25.28,0,0,0,.75,0,.64.64,0,0,0,0,.52a.62.62,0,0,0,.54.71C5.64,2,10.2,4.8,14.19,8.63c1.18,2.82,2.61,7.27,2.52,9.77-2,.77-8,3.43-10,8.15C3.47,34.07,8.06,41.8,8.06,41.8S15.16,37,18.2,31.27c2.42-4.51,1-10.66-.23-12.54.18-2.22-.71-5.41-1.52-7.75A68,68,0,0,1,24.56,22.4a.57.57,0,0,0,0,.34,24.64,24.64,0,0,1,0,9.9,22.42,22.42,0,0,0-8.58,10.07,13,13,0,0,0,3.71,14.53s5.18-9.34,8.19-13.88C29.2,41.29,26.64,35,25.76,33a22.89,22.89,0,0,0,.45-7.57,117.24,117.24,0,0,1,7,16c-1.11,1.77-3.8,6.73-2.62,11.53,1.47,6,11.76,11.25,11.76,11.25a88.54,88.54,0,0,1-.68-13.25c.23-4.92-5.07-8.52-7.17-9.75A123.91,123.91,0,0,0,27.61,26c1.48,1.88,2.9,2.88,4.05,4.23h0s5.89,8.31,11,12c3.4,2.46,12.71.89,12.71.89C55.76,42.76,51.67,37.34,43.54,31.33Z"/></g></g></svg>
		</div>
	<?php

	return ob_get_clean();
}add_shortcode("error_container","error_container");

//Ajax mini cart update
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <span id="cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
        $fragments['#cart-count'] = ob_get_clean();
    return $fragments;
} add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');


//Remove Downloads Link from My Account
function remove_downloads_myaccount ( $items ) {
unset($items['downloads']);
return $items;
} add_filter( 'woocommerce_account_menu_items', 'remove_downloads_myaccount', 999 );

/*
//Only deliver to NSW
function deliver_to_nsw() {
   if ( ! is_checkout() ) {
      return;
   }
   ?>
   <script>
   jQuery(document).ready(function($) {
      $(document.body).on('country_to_state_changed', function() {
			function set_shipping_state(state) {
			var $shipping_state = $('#shipping_state');
			var $shipping_state_option = $('#shipping_state option[value="' + state + '"]');
			var $shipping_state_option_no = $('#shipping_state option[value!="' + state + '"]');
			$shipping_state_option_no.remove();
			$shipping_state_option.attr('selected', true);
			}
			var $shipping_country = $('#shipping_country');
			var new_shipping_state = '';
			switch($shipping_country.val()) {
			case 'AU':
				new_shipping_state = 'NSW';
				break;
			}
			if( ! $.isEmptyObject(new_shipping_state)) {
			set_shipping_state(new_shipping_state);
			} 
      });
   });  
   </script>
   <?php
}add_action( 'wp_footer', 'deliver_to_nsw' );



//Auto select the ship to different address section
add_filter( 'woocommerce_ship_to_different_address_checked', '__return_true' );
*/

//Hide everything but free shipping
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


//Add title to payment methods section
function payment_methods_title() {

  echo '<h2 class="checkoutTitle form-row-wide">Payment Methods</h2>';

}
add_action( 'woocommerce_review_order_before_payment', 'payment_methods_title' );

 
// Shipping to delivery
function fix_woocommerce_strings( $translated, $text, $domain ) {
    // STRING 1
    $translated = str_ireplace( 'Shipping', 'Delivery', $translated );
    return $translated;

}add_filter( 'gettext', 'fix_woocommerce_strings', 999, 3 );

function shipping_to_delivery( $sprintf, $i, $package ) {
    $sprintf = sprintf( _nx( 'Delivery', 'Delivery %d', ( $i + 1 ), 'delivery packages', 'woocommerce' ), ( $i + 1 ) );
    return $sprintf;
} add_filter('woocommerce_shipping_package_name', 'shipping_to_delivery', 20, 3 );


// Add total taxes as a separated line before order total on orders and emails
function insert_custom_line_order_item_totals( $total_rows, $order, $tax_display ){
    // Display only the gran total amount
    $gran_total = wc_price( $order->get_total() );
    $total_rows['order_total']['value'] = is_wc_endpoint_url() ? $gran_total : strip_tags( $gran_total );

    $total_tax_amount = wc_price( $order->get_total_tax() );
    $total_tax_amount = is_wc_endpoint_url() ? $total_tax_amount : strip_tags( $total_tax_amount );

    // Create a new row for total tax
    $tax_row = array( 'order_tax_total' => array(
        'label' => __('GST:','woocommerce'),
        'value' => $total_tax_amount
    ) );

    $total_rows['order_total']['value'] = $gran_total;

    return $total_rows + $tax_row;
}
add_filter( 'woocommerce_get_order_item_totals', 'insert_custom_line_order_item_totals', 10, 3 );



//Mini-cart buttons
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_proceed_to_checkout', 20 );

function my_woocommerce_widget_shopping_cart_proceed_to_checkout() {
    echo '<a href="' . esc_url( wc_get_checkout_url() ) . '" class="formButton minicartBtn">' . esc_html__( 'Checkout', 'woocommerce' ) . '</a>';
}

add_action( 'woocommerce_widget_shopping_cart_buttons', 'my_woocommerce_widget_shopping_cart_proceed_to_checkout', 10 );


// Insta
function feedAbout ( $args ) {
	ob_start (); 
	?>  
	<div id="instagramFeed" class="instagram-feed-wrapper"></div>
    <script id="instagram-template" type="text/x-handlebars-template">
    <a href="{{link}}" class="carousel-cell Instafeed--item" rel="nofollow noopener" target="_blank">
        <img src="{{image_url}}" class="Instafeed--thumbnail" />
    </a>
    </script>
	<?php
	return ob_get_clean();
}
add_shortcode('feedAbout','feedAbout');



//Create two column layout
function add_classes( $fields ) {

	$fields['billing']['billing_phone']['class'] = array('form-row', 'form-row', 'form-row-first', 'formLabel');
	$fields['billing']['billing_email']['class'] = array('form-row', 'form-row', 'form-row-last', 'formLabel');
	$fields['account']['account_password']['class'] = array('form-row-last');
	$fields['order']['order_comments']['class'] = array('form-row-wide');
    return $fields;
} add_filter( 'woocommerce_checkout_fields', 'add_classes');

//Create two column layout
function add_classes_two( $address_fields ) {
	$address_fields['first_name']['class'] = array('form-row', 'form-row', 'form-row-first', 'formLabel');
	$address_fields['last_name']['class'] = array('form-row', 'form-row', 'form-row-last', 'formLabel');
	$address_fields['city']['class'] = array('form-row', 'form-row', 'form-row-first', 'formLabel');
	$address_fields['postcode']['class'] = array('form-row', 'form-row', 'form-row-last', 'formLabel');
	$address_fields['state']['class'] = array('form-row', 'form-row', 'form-row-first', 'formLabel');
	$address_fields['country']['class'] = array('form-row', 'form-row', 'form-row-last', 'formLabel');
	$address_fields['company']['class'] = array('form-row', 'form-row', 'form-row-wide', 'formLabel');
	$address_fields['address_1']['class'] = array('form-row', 'form-row', 'form-row-wide', 'formLabel');
    return $address_fields;
} add_filter( 'woocommerce_default_address_fields', 'add_classes_two');


//Create two column layout - priority
function reorder_billing( $checkout_fields ) {
	//Billing
	$checkout_fields['billing']['billing_first_name']['priority'] = 10;
	$checkout_fields['billing']['billing_last_name']['priority'] = 20;
	$checkout_fields['billing']['billing_phone']['priority'] = 30;
	$checkout_fields['billing']['billing_email']['priority'] = 40;
	$checkout_fields['billing']['billing_company']['priority'] = 50;
	$checkout_fields['billing']['billing_address_1']['priority'] = 60;
	$checkout_fields['billing']['billing_city']['priority'] = 70;
	$checkout_fields['billing']['billing_postcode']['priority'] = 80;
	$checkout_fields['billing']['billing_state']['priority'] = 90;
	$checkout_fields['billing']['billing_country']['priority'] = 100;
	
	return $checkout_fields;
} add_filter( 'woocommerce_checkout_fields', 'reorder_billing');


function custom_override_default_locale_fields( $fields ) {
	$fields['first_name']['priority'] = 10;
	$fields['last_name']['priority'] = 20;
	$fields['company']['priority'] = 50;
	$fields['address_1']['priority'] = 60;
	$fields['city']['priority'] = 70;
	$fields['postcode']['priority'] = 80;
	$fields['state']['priority'] = 90;
	$fields['country']['priority'] = 100;
    return $fields;
} add_filter( 'woocommerce_default_address_fields', 'custom_override_default_locale_fields' );


//Shortcode to show any divi library section as a shortcode 
function showmodule_shortcode($moduleid) {
extract(shortcode_atts(array('id' =>'*'),$moduleid)); 
return do_shortcode('[et_pb_section global_module="'.$id.'"][/et_pb_section]');
}
add_shortcode('showmodule', 'showmodule_shortcode');


//Cart page on checkout
function bbloomer_cart_on_checkout_page_only() {
?>  
	<div id="tab-1" class="tab-content current">
		<?php if ( is_wc_endpoint_url( 'order-received' ) ) return;
			echo do_shortcode('[woocommerce_cart]'); ?>
			<!--Button -->
		<p ><a href="#tab-2" data-tab="tab-3" class="nextBtn formButton small-main checkoutBtn"><?php esc_html_e( 'Continue', 'O&G' ); ?></a>
	</div>
 <?php
}add_action( 'woocommerce_before_checkout_form', 'bbloomer_cart_on_checkout_page_only', 5 );



//Custom add to cart message
add_filter( 'wc_add_to_cart_message_html', 'bbloomer_custom_add_to_cart_message' );
 
function bbloomer_custom_add_to_cart_message() {
$message = 'Product added to your cart, want to <a href="/the-deli/">continue shopping?</a>' ;
return $message;
}



//Remove add to cart redirect 
add_filter( 'woocommerce_checkout_redirect_empty_cart', '__return_false' );
add_filter( 'woocommerce_checkout_update_order_review_expired', '__return_false' );


//Quantity Before Cart
function qty_before_cart() {
 echo '<div class="qty"><span>Quantity</span></div>'; 
}
add_action( 'woocommerce_before_add_to_cart_quantity', 'qty_before_cart' );

///Free delivery notice
function free_delivery_notice() {
   $min_amount = 100; //change this to your free shipping threshold
   $current = WC()->cart->subtotal;
   $togo = $min_amount - $current;
	if ($current<$min_amount){
		echo "<br><div id='delivery-update' class='woocommerce-message' style='clear:both'>Get free Eastern Suburbs delivery if you order <strong>$$togo</strong> more!</div>";
	} elseif ($current==$min_amount) {
		echo "<br><div id='delivery-update' class='woocommerce-message' style='clear:both'>Your cart total is <strong>$$current</strong> and you now have free delivery on your order for anywhere in the Eastern Suburbs.</div>";
	}
}add_action( 'woocommerce_before_add_to_cart_button', 'free_delivery_notice' );


//Remove headers
add_filter( 'woocommerce_product_upsells_products_heading', 'remove_heading' );
add_filter( 'woocommerce_product_related_products_heading', 'remove_heading' );
function remove_heading() {
   return '';
}

//Gallery
function yourtheme_setup() {
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'yourtheme_setup' );



// add_action( 'woocommerce_after_add_to_cart_button', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_after_add_to_cart_form', 'woocommerce_template_single_meta', 40 );
function woocommerce_template_single_meta(){
    global $product;
    // Output your custom text
    echo '<div class="custom-text-product"><p>Pick a suitable delivery date and a timeframe at the checkout.</p></div>';
}

/*
//Bulk measurment calc 
function bulk_update_woo_measurement_price_calc(){
 ?>
    <script>
    jQuery(document).ready(function($) {
        function bulk_edit_woo_price_measurement() {
			$('select[name="_measurement_price_calculator"]  option[value="weight"]').prop("selected", true );
			//
			$("#_measurement_weight_pricing").prop("checked", true);
			//Front end label
			$('input[name="_measurement_weight_pricing_label"]').val("per kg");
			//Unit
			$('select[name="_measurement_weight_pricing_unit"]  option[value="kg"]').prop("selected", true );
			//Price calc enabled 
			$("#_measurement_weight_pricing_calculator_enabled").prop("checked", true);
			//Pricing weight enabled
			$("#_measurement_weight_pricing_weight_enabled").prop("checked", true);
			//FE Label
			$('input[name="_measurement_weight_label"]').val("Weight");
			//Min qty
			$('input[name="_measurement_weight_input_attributes[min]"]').val("100");
			//Increments
			$('input[name="_measurement_weight_input_attributes[step]"]').val("50");
        }
        if ($("body.post-type-product").length > 0) {
            bulk_edit_woo_price_measurement();
        }
    });
    </script>
 <?php
}
add_action( 'admin_print_scripts', 'bulk_update_woo_measurement_price_calc', 9999 );
*/
