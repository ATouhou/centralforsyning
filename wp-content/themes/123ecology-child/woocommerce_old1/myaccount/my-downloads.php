<?php
/**
 * My Orders
 *
 * Shows recent orders on the account page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce;

if ( $downloads = $woocommerce->customer->get_downloadable_products() ) : ?>

	<h2 class="my-account-title"><?php echo apply_filters( 'woocommerce_my_account_my_downloads_title', __( 'Available downloads', GETTEXT_DOMAIN_CHILD ) ); ?></h2>

	<ul class="digital-downloads">
		<?php foreach ( $downloads as $download ) : ?>
			<li>
				<?php
					do_action( 'woocommerce_available_download_start', $download );

					if ( is_numeric( $download['downloads_remaining'] ) )
						echo apply_filters( 'woocommerce_available_download_count', '<span class="count">' . sprintf( _n( '%s download remaining', '%s downloads remaining', $download['downloads_remaining'], GETTEXT_DOMAIN_CHILD ), $download['downloads_remaining'] ) . '</span> ', $download );

					echo apply_filters( 'woocommerce_available_download_link', '<a href="' . esc_url( $download['download_url'] ) . '">' . $download['download_name'] . '</a>', $download );

					do_action( 'woocommerce_available_download_end', $download );
				?>
			</li>
		<?php endforeach; ?>
	</ul>

<?php endif; ?>