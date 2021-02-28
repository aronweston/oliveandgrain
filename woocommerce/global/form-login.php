<?php
/**
 * Login form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( is_user_logged_in() ) {
	return;
}

?>
<form class="woocommerce-form woocommerce-form-login login" method="post" <?php echo ( $hidden ) ? 'style="display:none;"' : ''; ?>>

	<?php do_action( 'woocommerce_login_form_start' ); ?>

	<?php echo ( $message ) ? wpautop( wptexturize( $message ) ) : ''; // @codingStandardsIgnoreLine ?>
	<!--Username & Remember-->
	<p class="form-row form-row-first">
		<!--Username-->
		<label class="formLabel textLeft" for="username"><?php esc_html_e( 'Username or email', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="formInput input-text" type="text" name="username" id="username" autocomplete="username" />
		<!--Remember Me Checkbox-->
		<label class="accountLinks textLeft">
			<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /><?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
		</label>
		<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
		<input type="hidden" name="redirect" value="<?php echo esc_url( $redirect ); ?>" />
	</p>
	<!--Password & Lost Password-->
	<p class="form-row form-row-last">
		<!--Password-->
		<label class="formLabel textLeft" for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
		<input class="formInput input-text" type="password" name="password" id="password" autocomplete="current-password" />
		<!--Lost Password-->
		<a class="accountLinks floatLeft" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
	</p>
	<div class="clear"></div>

	<?php do_action( 'woocommerce_login_form' ); ?>
	<!--Login button-->
	<p class="form-row form-row-wide">
		<button type="submit" class="formButton main floatLeft" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"><?php esc_html_e( 'Login', 'woocommerce' ); ?></button>
	</p>
	<div class="clear"></div>
	<!-- Spam Trap -->
	<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'Olive&Grain' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

	<?php do_action( 'register_form' ); ?>

	<div class="woocomerce-FormRow form-row form-row-wide">
		<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
		<button type="submit" class="btn hidden" name="register" value="<?php esc_attr_e( 'Register', 'Olive&Grain' ); ?>">
		<?php esc_attr_e( 'Register', 'Olive&Grain' ); ?>
		</button>
	</div>


	<?php do_action( 'woocommerce_login_form_end' ); ?>

</form>
