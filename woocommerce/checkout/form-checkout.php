<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}
?>

		<div id="tabsNav">
			<ul class="tabs">
				<li class="tab-link current" data-tab="tab-1">
					<svg class="checkoutNumbers" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="32.5196" cy="32.5196" r="32.5196" fill="#203631"/>
						<path d="M29.0447 18.5764V47.7549H24.3673V48.6013H41.2062V47.7549H37.7315V16.9281H34.1231L24.0554 18.3091L24.1445 19.2L29.0447 18.5764Z" fill="white"/>
					</svg>
					<span><?php esc_html_e( 'Cart', 'olive&grain' ); ?></span>
				</li>
				<li class="tab-link" data-tab="tab-2">
					<svg class="checkoutNumbers" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="32.5196" cy="32.5196" r="32.5196" fill="#203631"/>
						<path d="M32.1188 16.9281C24.9021 16.9281 21.8284 20.0019 21.8284 23.7439C21.8284 25.9267 23.0312 27.8868 25.7931 27.8868C28.0205 27.8868 29.7133 26.5058 29.7133 24.4121C29.7133 23.5657 29.5796 22.9866 29.3569 22.4074H28.0205C27.8423 21.9174 27.7532 21.4719 27.7532 21.1156C27.7532 19.69 28.5105 17.7745 31.1388 17.7745C34.2126 17.7745 35.059 19.69 35.059 24.1002C35.059 30.3369 32.3861 34.0343 26.6395 39.2909L22.1402 43.4338V48.6013H43.0775L43.523 36.2617H42.7657C42.0975 39.6918 40.9392 41.7856 36.5736 41.7856H25.8822L28.5996 39.8255C39.4692 31.9851 42.8993 29.7578 42.8993 24.5903C42.8993 19.3782 38.9346 16.9281 32.1188 16.9281Z" fill="white"/>
					</svg>
					<span><?php esc_html_e( 'Billing', 'olive&grain' ); ?></span>
				</li>
				<li class="tab-link" data-tab="tab-3">
					<svg class="checkoutNumbers" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="32.5196" cy="32.5196" r="32.5196" fill="#203631"/>
						<path d="M31.7623 16.4825C24.902 16.4825 21.4718 19.5563 21.4718 23.2982C21.4718 25.4811 22.6746 27.4412 25.4365 27.4412C27.6639 27.4412 29.3567 26.0602 29.3567 23.9665C29.3567 23.1201 29.2231 22.5409 29.0003 21.9618H27.7085C27.5303 21.4718 27.4412 21.0263 27.4412 20.6699C27.4412 19.2444 28.1539 17.2843 30.5595 17.2843C33.1433 17.2843 33.856 19.779 33.856 23.6546C33.856 29.5794 32.6978 30.8713 27.4857 31.4059L27.6194 32.3859C29.4013 32.2077 30.0695 32.1186 31.495 31.8068C33.6778 32.8759 35.1033 34.7024 35.1033 39.469C35.1033 44.6365 34.3015 47.7102 30.5595 47.7102C27.263 47.7102 26.8175 45.7502 26.8175 44.5474C26.8175 44.0128 26.9066 43.5673 27.0848 43.0773H28.4658C28.6885 42.4982 28.8222 41.9191 28.8222 41.0727C28.8222 38.9789 27.2184 37.598 24.9911 37.598C22.2291 37.598 20.9373 39.5581 20.9373 41.8745C20.9373 47.1757 26.4611 48.6012 30.7377 48.6012C39.0235 48.6012 43.7901 44.9483 43.7901 39.3353C43.7901 34.9251 40.7163 31.6286 33.0096 31.094V31.005C38.9344 30.0249 42.2309 27.4412 42.2309 23.5655C42.2309 19.1999 39.5135 16.4825 31.7623 16.4825Z" fill="white"/>
					</svg>
					<span><?php esc_html_e( 'Delivery', 'olive&grain' ); ?><span>
				</li>
				<li class="tab-link" data-tab="tab-4">
						<svg class="checkoutNumbers" viewBox="0 0 66 66" fill="none" xmlns="http://www.w3.org/2000/svg">
						<circle cx="32.5196" cy="32.5196" r="32.5196" fill="#203631"/>
						<path d="M27.3403 48H43.6911V47.1314H40.4398V39.8171H45.1047V43.2H46V34.7429H45.1047V38.72H40.4398V16H32.288L19 38.9486V39.8171H31.7696V47.1314H27.3403V48ZM20.5079 38.72L31.7696 19.4743V38.72H20.5079Z" fill="white"/>
					</svg>
					
					<span><?php esc_html_e( 'Review & Payment', 'olive&grain' ); ?></span>
				</li>
			</ul>
		</div>
		<div class="wpb_notices">
			<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
		</div>

		<form id="checkout" name="checkout" method="post" class="woo-c_checkout_form checkout woocommerce-checkout" autocomplete="on" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">


		
			<?php do_action('woocommerce_checkout_before_customer_details' ); ?>
			
			<!--Billing Details-->
			<div id="tab-2" class="tab-content">
				<div class="wpb_wrapper">
					<!--WC Notices -->
					<div class="wpb_notices"><?php wc_print_notices(); ?></div>
					<!--Get Billing -->
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
					<!--Button -->
					<p class="form-row form-row-wide"><a href="#tab-3" data-tab="tab-3" class="nextBtn formButton small-main checkoutBtn"><?php esc_html_e( 'Continue', 'O&G' ); ?></a>
					<a href="#tab-1" data-tab="tab-1" class="nextBtn formButton small-second checkoutBtn"><?php esc_html_e( 'Go Back', 'O&G' ); ?></a></p>
				</div>
			</div>
			<!--Delivery Details-->
			<div id="tab-3" class="tab-content">
				<div class="wpb_wrapper">
					<!--Get Shipping -->
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
					<!--Button -->
					<p class="form-row form-row-wide"><a href="#tab-4" data-tab="tab-4" class="nextBtn formButton small-main checkoutBtn"><?php esc_html_e( 'Continue', 'O&G' ); ?></a>
					<a href="tab-2" data-tab="tab-2" class="nextBtn formButton small-second checkoutBtn"><?php esc_html_e( 'Go Back', 'O&G' ); ?></a></p>
				</div>
			</div>
			<!--Payment + Checkout-->
			<div id="tab-4" class="tab-content">
				<div class="wpb_wrapper">
					<h2 class="checkoutTitle form-row-wide"><?php esc_html_e('Your Order.', 'O&G'); ?></h2>
					<!--Get Payment -->
					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
					<div id="order_review" class="woo-check-order">
						<?php do_action( 'woocommerce_checkout_order_review' ); ?>
					</div>
					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</div>
			</div>		
		</form>