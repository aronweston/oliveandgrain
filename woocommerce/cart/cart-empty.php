<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<section class="woo-cart-empty">
		<div class="page-container">
			<!-- EMPT Container -->
			<div class="empt-container">
				<div class="empt-container-image">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 55.37 64.14"><g id="Layer_2" data-name="Layer 2"><g id="Layer_1-2" data-name="Layer 1"><path d="M43.54,31.33c-2.4-1.79-6.38-.69-9.93-.78-3-3.36-10.42-13.12-13.39-17.12l-.08-.07a54.07,54.07,0,0,0-3.55-4.17,68.32,68.32,0,0,0,6.84,3c1.11,1.78,4,5.79,7.48,6.24a28.53,28.53,0,0,0,16.51-3.11s-6.39-4.76-12-5.65C31,9,25.94,10.35,23.88,11A100.15,100.15,0,0,1,13.51,6.26,25.28,25.28,0,0,0,.75,0,.64.64,0,0,0,0,.52a.62.62,0,0,0,.54.71C5.64,2,10.2,4.8,14.19,8.63c1.18,2.82,2.61,7.27,2.52,9.77-2,.77-8,3.43-10,8.15C3.47,34.07,8.06,41.8,8.06,41.8S15.16,37,18.2,31.27c2.42-4.51,1-10.66-.23-12.54.18-2.22-.71-5.41-1.52-7.75A68,68,0,0,1,24.56,22.4a.57.57,0,0,0,0,.34,24.64,24.64,0,0,1,0,9.9,22.42,22.42,0,0,0-8.58,10.07,13,13,0,0,0,3.71,14.53s5.18-9.34,8.19-13.88C29.2,41.29,26.64,35,25.76,33a22.89,22.89,0,0,0,.45-7.57,117.24,117.24,0,0,1,7,16c-1.11,1.77-3.8,6.73-2.62,11.53,1.47,6,11.76,11.25,11.76,11.25a88.54,88.54,0,0,1-.68-13.25c.23-4.92-5.07-8.52-7.17-9.75A123.91,123.91,0,0,0,27.61,26c1.48,1.88,2.9,2.88,4.05,4.23h0s5.89,8.31,11,12c3.4,2.46,12.71.89,12.71.89C55.76,42.76,51.67,37.34,43.54,31.33Z"/></g></g></svg>
				</div>
				<h3 class="heading-md empt-container-headline">
					<?php esc_html_e( 'Cart is empty', 'stockie' ); ?>
				</h3>
				<p class="empt-container-details">
					<?php esc_html_e( 'View all of our amazing platters, cakes, quiches and more through our online deli!', 'stockie' ); ?>
				</p>
				<div class="empt-container-cta">
					<a class="formButton small-second" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php esc_html_e( 'Browse the deli', 'stockie' ) ?>
					</a>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
