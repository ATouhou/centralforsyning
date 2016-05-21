<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked woocommerce_show_messages - 10
	 */
	 do_action( 'woocommerce_before_single_product' );
	 do_action('woocommerce_breadcrumb');
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="row-fluid">
	
	<?php
		/**
		 * woocommerce_show_product_images hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="span6 product-content">

		<?php
			/**
			 * woocommerce_single_product_summary hook
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 */
			#do_action( 'woocommerce_single_product_summary' );
		?>
			
			<?php do_action( 'woocommerce_template_single_title' );?>
			
			<div class="main-product-meta clearfix">
			
				<?php do_action( 'woocommerce_template_single_price' );?>
			
				<div class="stock-meta">
				
					<?php
						// Availability
						
						global $product;
						$availability = $product->get_availability();
					
						if ($availability['availability']) :
							echo apply_filters( 'woocommerce_stock_html', '<p class="stock '.$availability['class'].'"><span>'.__('Availability:', GETTEXT_DOMAIN_CHILD).'</span> '.$availability['availability'].'</p>', $availability['availability'] );
					    endif;
					?>
					
					<?php if ($product->get_sku() ) : ?>
						<p itemprop="productID" class="sku"><span><?php _e('SKU:', GETTEXT_DOMAIN_CHILD); ?></span> <?php echo $product->get_sku(); ?>.</p>
					<?php endif; ?>
				
				</div>
	
			</div>
			<hr />
			<?php do_action( 'woocommerce_template_single_excerpt' );?>
			<?php do_action( 'woocommerce_template_single_add_to_cart' );?>
			<?php do_action( 'woocommerce_template_single_meta' );?>
								
			<ul class="social">
				<li>
					<div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
				</li>
				<li>
					<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                </li>
                <li>
                    <!-- Place this tag where you want the +1 button to render -->
                    <div class="g-plusone" data-size="medium" data-annotation="none" data-href="<?php the_permalink(); ?>"></div>
                    <!-- Place this render call where appropriate -->
                    <script type="text/javascript">
                      (function() {
                        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                        po.src = 'https://apis.google.com/js/plusone.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                      })();
                    </script>
                </li>
                <li>
                    <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>&description=<?php the_title();?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
                </li>
			</ul>
		

	</div></div><!-- .summary -->

	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>