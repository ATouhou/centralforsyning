<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */?>

<?php if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Shop Page Options
    ================================================== */
    $zoom = get_option_tree('zoom',$theme_options);
}?>
<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;?>

<div class="span6 product-image">

<?php if ($product->is_on_sale()) : ?>

	<?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__('Sale!', GETTEXT_DOMAIN_CHILD).'</span>', $post, $product); ?>

<?php endif; ?>
					
		<?php if ( has_post_thumbnail() ) : ?>
		
		<?php if($zoom){?>
		
			<div class="images">
			
				<?php $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'product' ) );
				$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
				$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
				$attachment_count   = count( $product->get_gallery_attachment_ids() );
	
				if ( $attachment_count > 0 ) {
					$gallery = '[product-gallery]';
				} else {
					$gallery = '';
				}
	
				echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s"  rel="prettyPhoto' . $gallery . '">%s</a>', $image_link, $image_title, $image ), $post->ID );?>
			
			</div>
			
			<?php do_action( 'woocommerce_product_thumbnails' ); ?>
		
		<?php } else{ ?>
		
		<div class="visible-desktop etalage-full"><ul id="etalage2">
			<li>
				<!-- Put the lightbox destination for this frame in the anchor tag -->
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>">
					<img class="etalage_thumb_image" alt="" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product' ); echo $image[0];?>" />
					<img class="etalage_source_image" alt=""  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zoom' ); echo $image[0];?>" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>" />
				</a>
			</li>
			<?php $attachments = $product->get_gallery_attachment_ids();
			if ($attachments) {
		
				foreach($attachments as $attachment) {

					$image = wp_get_attachment_image_src($attachment, 'product', false);
		            $imageLarge = wp_get_attachment_image_src($attachment, 'large', false);
		            $imagezoom = wp_get_attachment_image_src($attachment, 'zoom', false);
				?>
					
					
					<li>
						<!-- Put the lightbox destination for this frame in the anchor tag -->
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo get_the_title($attachment); ?>" />
						</a>
					</li>
					
					
				<?php }
		
			} ?>
			<?php foreach ( $product->get_children() as $child_id ) {
			
				$variation = $product->get_child( $child_id  );
				
				if ( $variation instanceof WC_Product_Variation ) {
				
					if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
					
					$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
					
					$imageTitle = get_the_title($attachment_id);
					$image[0] = current(wp_get_attachment_image_src($attachment_id, 'product', false));
					$imageLarge[0] = current(wp_get_attachment_image_src($attachment_id, 'large', false));
					$imagezoom[0] = current(wp_get_attachment_image_src($attachment_id, 'zoom', false));?>
					
					<li>
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					<?php }
				
				}
			
			}?>
		</ul></div>
				
		<div class="visible-desktop etalage-portrait"><ul id="etalage">
			<li>
				<!-- Put the lightbox destination for this frame in the anchor tag -->
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>">
					<img class="etalage_thumb_image" alt="" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product' ); echo $image[0];?>" />
					<img class="etalage_source_image" alt=""  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zoom' ); echo $image[0];?>" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>" />
				</a>
			</li>
			<?php $attachments = $product->get_gallery_attachment_ids();
			if ($attachments) {
		
				foreach($attachments as $attachment) {

					$image = wp_get_attachment_image_src($attachment, 'product', false);
		            $imageLarge = wp_get_attachment_image_src($attachment, 'large', false);
		            $imagezoom = wp_get_attachment_image_src($attachment, 'zoom', false);
				?>
					
					
					<li>
						<!-- Put the lightbox destination for this frame in the anchor tag -->
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo get_the_title($attachment); ?>" />
						</a>
					</li>
					
					
				<?php }
		
			} ?>
			<?php foreach ( $product->get_children() as $child_id ) {
			
				$variation = $product->get_child( $child_id  );
				
				if ( $variation instanceof WC_Product_Variation ) {
				
					if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
					
					$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
					
					$imageTitle = get_the_title($attachment_id);
					$image[0] = current(wp_get_attachment_image_src($attachment_id, 'product', false));
					$imageLarge[0] = current(wp_get_attachment_image_src($attachment_id, 'large', false));
					$imagezoom[0] = current(wp_get_attachment_image_src($attachment_id, 'zoom', false));?>
					
					<li>
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					<?php }
				
				}
			
			}?>
		</ul></div>
		
		<div class="visible-tablet"><ul id="etalage1">
			<li>
				<!-- Put the lightbox destination for this frame in the anchor tag -->
				<a href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); echo $image[0];?>">
					<img class="etalage_thumb_image" alt="" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'product' ); echo $image[0];?>" />
					<img class="etalage_source_image" alt=""  src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'zoom' ); echo $image[0];?>" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>" />
				</a>
			</li>
			<?php $attachments = $product->get_gallery_attachment_ids();
			if ($attachments) {
		
				foreach($attachments as $attachment) {

					$image = wp_get_attachment_image_src($attachment, 'product', false);
		            $imageLarge = wp_get_attachment_image_src($attachment, 'large', false);
		            $imagezoom = wp_get_attachment_image_src($attachment, 'zoom', false);
				?>
					
					
					<li>
						<!-- Put the lightbox destination for this frame in the anchor tag -->
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo get_the_title($attachment); ?>" />
						</a>
					</li>
					
					
				<?php }
		
			} ?>
			<?php foreach ( $product->get_children() as $child_id ) {
			
				$variation = $product->get_child( $child_id  );
				
				if ( $variation instanceof WC_Product_Variation ) {
				
					if ( has_post_thumbnail( $variation->get_variation_id() ) ) {
					
					$attachment_id = get_post_thumbnail_id( $variation->get_variation_id() );
					
					$imageTitle = get_the_title($attachment_id);
					$image[0] = current(wp_get_attachment_image_src($attachment_id, 'product', false));
					$imageLarge[0] = current(wp_get_attachment_image_src($attachment_id, 'large', false));
					$imagezoom[0] = current(wp_get_attachment_image_src($attachment_id, 'zoom', false));?>
					
					<li>
						<a href="<?php echo $imageLarge[0];?>">
							<img class="etalage_thumb_image" alt="" src="<?php echo $image[0];?>" />
							<img class="etalage_source_image" alt=""  src="<?php echo $imagezoom[0];?>" title="<?php echo $imageTitle; ?>" />
						</a>
					</li>
					
					<?php }
				
				}
			
			}?>
		</ul></div>
		<div id="hidden1"><div id="zoom"></div></div>
		
		<div class="visible-phone"><a itemprop="image" href="<?php echo wp_get_attachment_url( get_post_thumbnail_id(), 'large' ); ?>" class="zoom phone-thumbnail" rel="prettyPhoto[product-gallery]" title="<?php echo get_the_title( get_post_thumbnail_id() ); ?>"><?php echo get_the_post_thumbnail( $post->ID, 'portfolio-post' ) ?></a></div>
		

	<div class="clear"></div>
	
	<div class="visible-phone"><?php do_action('woocommerce_product_thumbnails'); ?></div>
	
	<?php }?>

	<?php else : ?>

	<div class="images">
		<div class="placeholder-main-image">
			<img class="placeholder_product-post" src="<?php echo woocommerce_placeholder_img_src(); ?>" alt="Placeholder" />
		</div>
	</div>
	
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>

	<?php endif; ?>

	
</div>
