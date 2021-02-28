<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

<div id="customer_login">

	<?php endif; ?>
		

	
		<!--Tabs-->
		<div id="accountNav">
			<ul class="tabs <?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'no' ){ echo single;}?>">
				<li class="tab-link current" data-tab="tab-1"><?php esc_html_e( 'Login', 'olive&grain' ); ?></li>
				<li id="sep">/</li>
				<li class="tab-link" data-tab="tab-2"><?php esc_html_e( 'Sign Up', 'olive&grain' ); ?></li>
			</ul>
		</div>
		<!--Login-->
		<div id="tab-1" class="tab-content current">
			<form method="post" class="login">
					<fieldset>
						<!--Login Fields-->
							<?php do_action( 'woocommerce_login_form_start' ); ?>
								<div class="form-row form-row-wide">
									<input class="accountInput" type="text" placeholder="<?php esc_attr_e( 'Enter your email address.', 'O&G' ); ?>"  name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
								</div>
								<div class="form-row form-row-wide">
									<input class="accountInput" placeholder="<?php esc_attr_e( 'Password', 'O&G' ); ?>" type="password" name="password" id="password" />
								</div>
							<?php do_action( 'woocommerce_login_form' ); ?>
						<!--Login Buttons/Submit-->

						<!--Login button-->
							<div class="form-row form-row-wide">
								<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
								<button type="submit" class="formButton account " name="login" value="<?php esc_attr_e( 'Login', 'O&G' ); ?>">
									<?php esc_attr_e( 'Login', 'O&G' ); ?> <i class="ion ion-right ion-ios-arrow-forward"></i>
								</button>
							</div>
						<!--Login extras-->
							<div class="form-row form-row-wide">
								<label for="rememberme" class="accountLinks">
									<input class="woocommerce-Input woocommerce-Input--checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'O&G' ); ?>
								</label>
								<a class="accountLinks" href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'O&G' ); ?></a>
							</div>
							<?php do_action( 'woocommerce_login_form_end' ); ?>
					</fieldset>
				</form>
		</div>
		
				
			
		<!--Signup-->
		<div id="tab-2" class="tab-content">
			<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>
			
				<form method="post" class="register">
					<fieldset>
						<?php do_action( 'woocommerce_register_form_start' ); ?>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
							
						<div class="form-row form-row-wide">
							<label for="username" class="field-label"><?php esc_attr_e( 'Username', 'O&G' ); ?></label>
							<input type="text" placeholder="<?php esc_attr_e( 'Username', 'O&G' ); ?>" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
						</div>

						<?php endif; ?>
						
						<!--First name-->
						<div class="form-row form-row-wide">	
							<input class="accountInput" type="text" placeholder="<?php esc_attr_e( 'Name', 'O&G' ); ?>" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
						</div>
						
						<div class="form-row form-row-wide">
							<input class="accountInput" type="email" placeholder="<?php esc_attr_e( 'Email address', 'O&G' ); ?>" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
						</div>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<div class="form-row form-row-wide">
							<input class="accountInput" type="password" placeholder="<?php esc_attr_e( 'Password', 'O&G' ); ?>" name="password" id="reg_password" />
						</div>
						
						<div class="form-row form-row-wide">
								<span class="accountInfo"><?php esc_attr_e( 'Your personal data will be used to support your experience throughout the Olive & Grain website. To manage access to your account, change access to your data, delete your account or manage payment information, and for other purposes described in our privacy policy.', 'O&G' ); ?></span>
						</div>

						<?php endif; ?>

						<!-- Spam Trap -->
						<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php esc_html_e( 'Anti-spam', 'O&G' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

						<?php do_action( 'register_form' ); ?>

						<div class="form-row form-row-wide">
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
							<button class="formButton account " type="submit" class="btn" name="register" value="<?php esc_attr_e( 'Register', 'O&G' ); ?>">
							<?php esc_attr_e( 'Sign Up', 'O&G' ); ?> <i class="ion ion-right ion-ios-arrow-forward"></i>
							</button>
						</div>

						<?php do_action( 'woocommerce_register_form_end' ); ?>
					</fieldset>
				</form>
			<?php endif; ?>
		</div>

	
	
</div>
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>