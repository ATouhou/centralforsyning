<?php

function shop_layout_pages_after() {
    ?></div></div></div><?php    
}

if ( in_array( 'woocommerce/woocommerce.php' , get_option('active_plugins') ) ) {
	add_filter('body_class','my_class_names');
	function my_class_names($classes) {
		$classes[] = 'woocommerce-123ecology';
		return $classes;
	}
}

add_action( 'woocommerce_sidebar', 'shop_layout_pages_after', 99 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
add_action( 'woocommerce_front_rating', 'woocommerce_front_rating', 10);
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
add_action( 'woocommerce_catalog_ordering', 'woocommerce_catalog_ordering', 10 );
add_action( 'woocommerce_breadcrumb', 'woocommerce_breadcrumb', 10 );
add_action( 'woocommerce_template_single_title', 'woocommerce_template_single_title', 10 );
add_action( 'woocommerce_template_single_price', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_template_single_excerpt', 'woocommerce_template_single_excerpt', 10 );
add_action( 'woocommerce_template_single_add_to_cart', 'woocommerce_template_single_add_to_cart', 10 );
add_action( 'woocommerce_template_single_meta', 'woocommerce_template_single_meta', 10 );
add_action( 'woocommerce_template_single_sharing', 'woocommerce_template_single_sharing', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
remove_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );


if ( ! function_exists( 'woocommerce_subcategory_thumbnail' ) ) {

	function woocommerce_subcategory_thumbnail( $category  ) {
		global $woocommerce;

		$thumbnail_size  = apply_filters( 'single_product_small_thumbnail_size', 'shop' );

		$thumbnail_id  = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );

		if ( $thumbnail_id ) {
			$image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size  );
			$image = $image[0];
		} else {
			$image = woocommerce_placeholder_img_src();
		}

		if ( $image )
			echo '<img src="' . $image . '" alt="' . $category->name . '" />';
	}
}

if ( ! function_exists( 'woocommerce_output_related_products' ) ) {

	function woocommerce_output_related_products() {
		woocommerce_related_products( 4, 4  );
	}
}

if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {

	function woocommerce_template_loop_product_thumbnail() {
		echo woocommerce_get_product_thumbnail();
	} 
}

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );
 
if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
	function woocommerce_output_upsells() {
	woocommerce_upsell_display( 4,4 );
	}
}

/*if ( ! function_exists( 'woocommerce_front_rating' ) ) {

	function woocommerce_front_rating() {
		echo woocommerce_get_front_rating();
	} 
}*/


 if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {
	
	function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
		global $post, $woocommerce;
		global $product;

		if ( ! $placeholder_width )
			$placeholder_width = $woocommerce->get_image_size( 'shop_catalog_image_width' );
		if ( ! $placeholder_height )
			$placeholder_height = $woocommerce->get_image_size( 'shop_catalog_image_height' );
			
			
				if ( (! $product->is_in_stock()) || ($product->product_type == 'external') || ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ) ){
				
					$effect = 'effect-thumb';
				
				}else{
					
					$effect = 'effect-thumb effect-thumb-2';
					
				}
			
			$output = '<div class="imagewrapper '.$effect.'">';

	
			if ( has_post_thumbnail() ) {
				
				$output .= get_the_post_thumbnail( $post->ID, 'shop' );
				$output .= '<div class="extras"></div>';
				

if ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ){

	$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
	
}else{

	if ( ! $product->is_in_stock() ){
	
		$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
	
	}else{
			switch ( $product->product_type ) {
				case "variable" :
					$icon   = 'check';
					$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'variable_add_to_cart_text', __('V&aelig;lg muligheder', GETTEXT_DOMAIN) );
				break;
				case "grouped" :
					$icon   = 'search';
					$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', GETTEXT_DOMAIN) );
				break;
				case "external" :
					$disable = 'yes';
					#$icon   = 'shopping-cart';
					#$link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
					#$label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
				break;
				default :
					$icon   = 'shopping-cart';
					$link 	= apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
					$label 	= apply_filters( 'add_to_cart_text', __('Add to cart', GETTEXT_DOMAIN) );
				break;
			}
			
			if($disable == 'yes'){
			
				$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
				
			}else{
			
				$output .= '<div class="effect-wrap clearfix"><a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
				$output .= '<a class="icon icon2 shopping-cart ttip add_to_cart_button product_type_'.$product->product_type.'" data-product_id="'.$product->id.'" href="'.$link.'" rel="tooltip" data-placement="bottom" title="'.$label.'"></a></div>';
				
			}
	}

}



				
			} else {
			
				$output .= '<img src="'. woocommerce_placeholder_img_src() .'" alt="Placeholder" width="480" height="480" />';
				$output .= '<div class="extras"></div>';
		



if ( ! $product->is_purchasable() && ! in_array( $product->product_type, array( 'external', 'grouped' ) ) ){

	$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
	
}else{

	if ( ! $product->is_in_stock() ){
	
		$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.apply_filters( 'out_of_stock_add_to_cart_url', get_permalink( $product->id ) ).'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
	
	}else{
			switch ( $product->product_type ) {
				case "variable" :
					$icon   = 'check';
					$link 	= apply_filters( 'variable_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'variable_add_to_cart_text', __('Select options', GETTEXT_DOMAIN) );
				break;
				case "grouped" :
					$icon   = 'search';
					$link 	= apply_filters( 'grouped_add_to_cart_url', get_permalink( $product->id ) );
					$label 	= apply_filters( 'grouped_add_to_cart_text', __('View options', GETTEXT_DOMAIN) );
				break;
				case "external" :
					$disable = 'yes';
					#$icon   = 'shopping-cart';
					#$link 	= apply_filters( 'external_add_to_cart_url', get_permalink( $product->id ) );
					#$label 	= apply_filters( 'external_add_to_cart_text', __('Read More', 'woocommerce') );
				break;
				default :
					$icon   = 'shopping-cart';
					$link 	= apply_filters( 'add_to_cart_url', esc_url( $product->add_to_cart_url() ) );
					$label 	= apply_filters( 'add_to_cart_text', __('Add to cart', GETTEXT_DOMAIN) );
				break;
			}
			
			if($disable == 'yes'){
			
				$output .= '<a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
				
			}else{
			
				$output .= '<div class="effect-wrap clearfix"><a class="icon info ttip" rel="tooltip" data-placement="bottom" href="'.get_permalink().'" title="'.__('Read More', GETTEXT_DOMAIN).'"></a>';
				$output .= '<a class="icon icon2 shopping-cart ttip add_to_cart_button product_type_'.$product->product_type.'" data-product_id="'.$product->id.'" href="'.$link.'" rel="tooltip" data-placement="bottom" title="'.$label.'"></a></div>';
				
			}
	
	}

}
				
			}
			
			$output .= '</div><div class="clearfix"></div>';
			
			
			return $output;
	}
 }
 
 /*if ( ! function_exists( 'woocommerce_get_front_rating' ) ) {
	
	function woocommerce_get_front_rating() {
		global $post;
		global $wpdb;
	
	$count = $wpdb->get_var("
		SELECT COUNT(meta_value) FROM $wpdb->commentmeta
		LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
		WHERE meta_key = 'rating'
		AND comment_post_ID = $post->ID
		AND comment_approved = '1'
		AND meta_value > 0
	");

	$rating = $wpdb->get_var("
		SELECT SUM(meta_value) FROM $wpdb->commentmeta
		LEFT JOIN $wpdb->comments ON $wpdb->commentmeta.comment_id = $wpdb->comments.comment_ID
		WHERE meta_key = 'rating'
		AND comment_post_ID = $post->ID
		AND comment_approved = '1'
	");
	
	if ( $count > 0 ){
	
			$average = number_format($rating / $count, 2);
			
			$output .= '<div class="star-rating" title="'.sprintf(__('Rated %s out of 5', GETTEXT_DOMAIN), $average).'"><span style="width:'.($average*16).'px"><span itemprop="ratingValue" class="rating">'.$average.'</span> '.__('out of 5', GETTEXT_DOMAIN).'</span></div>';

	}
			
			return $output;
	}
 }*/

add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

function custom_woocommerce_placeholder_img_src( $src ) {
    $upload_dir = wp_upload_dir();
    $uploads = THEME_ASSETS;
    $src = $uploads . '/img/placeholder.png';
    return $src;
}

if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Shop Options
    ================================================== */
    $loop_shop_per_page = get_option_tree('loop_shop_per_page',$theme_options);
    $shop_columns = get_option_tree('shop_columns',$theme_options);
    $product_style = get_option_tree('product_style',$theme_options);
    $product_post_style = get_option_tree('product_post_style',$theme_options);
    $sale_flash_color1 = get_option_tree('sale_flash_color1',$theme_options);
    $sale_flash_color2 = get_option_tree('sale_flash_color2',$theme_options);
}

if (!$loop_shop_per_page){
    $loop_shop_per_page = 12;
}
$loop_shop_per_page = "return $loop_shop_per_page;";
$loop_shop_per_page = create_function('$cols', $loop_shop_per_page);

add_filter('loop_shop_per_page', $loop_shop_per_page);


if ( ! function_exists( 'woocommerce_show_messages1' ) ) {
	function woocommerce_show_messages1() {
		global $woocommerce;

		if ( $woocommerce->error_count() > 0  )
			woocommerce_get_template( 'notices/error.php', array(
					'messages' => $woocommerce->get_errors()
				) );


		if ( $woocommerce->message_count() > 0  )
			woocommerce_get_template( 'notices/notice.php', array(
					'messages' => $woocommerce->get_messages()
				) );

		
	}
}

add_filter ( 'single_product_small_thumbnail_size', 'lts_456shop' ); 
add_filter ( 'single_product_large_thumbnail_size', 'lts_456shop' ); 
function lts_456shop() {
	return 'product';
}
?>