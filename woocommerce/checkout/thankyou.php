<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :
		echo "<style>.wooHeader{display: none;}</style>";
		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'woocommerce' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>
			<div class="form-row-wide">
			<h1 id="thankyouTitle"><?php esc_html_e('Thank you for shopping with Olive & Grain.', 'O&G'); ?></h1>
			</div>

			<h2 class="formTitle form-row-wide"><?php esc_html_e('Order Received', 'O&G'); ?></h2>
			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received and is currently being processed. If you have chosen to pick up your order at the deli, your order will be ready for you at your chosen time.', 'woocommerce' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			
			<table>
				<thead>
					<tr>		
						<th class="order-item"><?php esc_html_e( '', 'woocommerce' ); ?></th>
						<th class="order-description"><?php esc_html_e( '', 'woocommerce' ); ?></th>
					</tr>
				</thead>
				<tbody id="thankyou" class="tableBkg">
					<tr>
						<th><?php esc_html_e( 'Order number', 'woocommerce' ); ?></th>
						<td><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
					</tr>
					<tr>
						<th><?php esc_html_e( 'Order Date', 'woocommerce' ); ?></th>
						<td><?php echo wc_format_datetime( $order->get_date_created() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>
					</tr>

					<?php if ( $order->get_payment_method_title() ) : ?>
					<tr>
						<th><?php esc_html_e( 'Payment method', 'woocommerce' ); ?></th>
						<td><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></td>	
					</tr>
					<?php endif; ?>

					<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<tr>
						<th><?php esc_html_e( 'Email', 'woocommerce' ); ?></th>
						<td><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>	
					</tr>
					<?php endif; ?>
					
					<tr>
						<th><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
						<td><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></td>	
					</tr>
				</tbody>
			</table>
		
		<?php endif; ?>
		
		<h2 class="formTitle form-row-wide"><?php esc_html_e('Your order', 'O&G'); ?></h2>
		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'woocommerce' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
