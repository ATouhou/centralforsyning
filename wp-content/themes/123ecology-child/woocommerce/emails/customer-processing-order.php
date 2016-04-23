<?php
/**
 * Customer processing order email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php do_action('woocommerce_email_header', $email_heading); ?>
<span>
	<p><?php echo "Kære Kunde"?></p>
	<br>
	<p><?php echo "Vores administration har modtaget Deres ordre."?></p>
	<p><?php echo "Produktet bestilles fra producenten idag og vi beregner at De vil modtage produkterne i løbet af 1-5 arbejdsdage. Vi gør ydermere opmærksom på at der i ferieperioder og højtider kan forekomme forlænget leveringstid."?></p>
	<p><?php echo "Betaling sker via bankoverførsel. De vil modtage en faktura sammen med produktet og der vil blive fremsendt en kopi af fakturaen til den e-mail adresse som er angivet ved købet."?></p>
	<p><?php echo "Hvis De har spørgsmål eller ændringer til Deres ordre kan vores kundecenter kontaktes pr. telefon eller mail. Tlf: + 45 70 77 79 32. Mail: info@centralforsyning.dk"?></p>
	<br>
	<p><?php echo "Vi ønsker Dem god fornøjelse."?></p>
</span>
<h2><?php echo __( 'Order Details', GETTEXT_DOMAIN )?></h2>

<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee; color: black;" border="1" bordercolor="#eee">
	<thead>
		<tr>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Product', GETTEXT_DOMAIN ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Quantity', GETTEXT_DOMAIN ); ?></th>
			<th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e( 'Price', GETTEXT_DOMAIN ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php echo $order->email_order_items_table( $order->is_download_permitted(), true, ($order->status=='processing') ? true : false ); ?>
	</tbody>
	<tfoot>
		<?php
			if ( $totals = $order->get_order_item_totals() ) {
				$i = 0;
				foreach ( $totals as $total ) {
					$i++;
					?><tr>
						<th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php _e( $total['label'], GETTEXT_DOMAIN );?></th>
						<td style="text-align:left; border: 1px solid #eee; <?php if ( $i == 1 ) echo 'border-top-width: 4px;'; ?>"><?php echo $total['value']; ?></td>
					</tr><?php
				}
			}
		?>
	</tfoot>
</table>

<h2><?php _e( 'Customer details', GETTEXT_DOMAIN ); ?></h2>
<div>
	<?php if ($order->billing_first_name && $order->billing_last_name) : ?>
		<span><p><strong><?php echo  $order->billing_first_name . " " . $order->billing_last_name;?></p></strong></span>
	<?php endif; ?>

	<?php if ($order->billing_email) : ?>
		<p><strong><?php _e( 'Email:', GETTEXT_DOMAIN ); ?></strong> <?php echo $order->billing_email; ?></p>
	<?php endif; ?>
	<?php if ($order->billing_phone) : ?>
		<p><strong><?php _e( 'Tel:', GETTEXT_DOMAIN ); ?></strong> <?php echo $order->billing_phone; ?></p>
	<?php endif; ?>
</div>
<?php woocommerce_get_template('emails/email-addresses.php', array( 'order' => $order )); ?>

<?php do_action('woocommerce_email_footer'); ?>