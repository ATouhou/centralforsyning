<?php
/**
 * Customer note email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>

<p><?php _e("Hello, a note has just been added to your order:", GETTEXT_DOMAIN_CHILD); ?></p>

<blockquote><?php echo wpautop(wptexturize( $customer_note )) ?></blockquote>

<p><?php _e("For your reference, your order details are shown below.", GETTEXT_DOMAIN_CHILD); ?></p>

<?php do_action('woocommerce_email_before_order_table', $order, false); ?>

<h2><?php echo __( 'Order:', GETTEXT_DOMAIN_CHILD ) . ' ' . $order->get_order_number(); ?></h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Product', GETTEXT_DOMAIN_CHILD ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Quantity', GETTEXT_DOMAIN_CHILD ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Price', GETTEXT_DOMAIN_CHILD ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( $order->is_download_permitted(), true ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['label']; ?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<?php do_action('woocommerce_email_after_order_table', $order, false); ?>

<?php do_action( 'woocommerce_email_order_meta', $order, false ); ?>

<h2><?php _e( 'Customer details', GETTEXT_DOMAIN_CHILD ); ?></h2>

<?php if ($order->billing_email) : ?>
	<p><strong><?php _e( 'Email:', GETTEXT_DOMAIN_CHILD ); ?></strong> <?php echo $order->billing_email; ?></p>
<?php endif; ?>
<?php if ($order->billing_phone) : ?>
	<p><strong><?php _e( 'Tel:', GETTEXT_DOMAIN_CHILD ); ?></strong> <?php echo $order->billing_phone; ?></p>
<?php endif; ?>

<?php woocommerce_get_template('emails/email-addresses.php', array( 'order' => $order )); ?>

<?php do_action('woocommerce_email_footer'); ?>