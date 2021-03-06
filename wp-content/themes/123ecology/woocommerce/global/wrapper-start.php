<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
	
    /* Theme Options
    ================================================== */
    $theme_style = get_option_tree('theme_style',$theme_options);
	
    /* Shop Options
    ================================================== */
    $product_style = get_option_tree('product_style',$theme_options);
    $product_post_style = get_option_tree('product_post_style',$theme_options);
}?>
		<div id="breadcrumb" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> gradient">
			<div class="container">
				<?php get_template_part('includes/heading' ) ?>
			</div>
		</div>
		
<div id="main" class="<?php if($theme_style=="boxed"){?>wrap<?php }?> shop-template 
<?php if(is_singular()){
	if($product_post_style == 'left_sidebar'){?>
		sidebar-template left-sidebar-template
	<?php }else{?>
		sidebar-template
	<?php }
}else{
	if($product_style == 'left_sidebar'){?>
		sidebar-template left-sidebar-template
	<?php }else{?>
		sidebar-template
	<?php }
}?>
">
	<div class="container">
		<div class="row-fluid">
			<?php if(is_singular( 'product' )){ ?>
				<?php if ( is_active_sidebar(6) ){?>
				<div class="span10 post-page product-post">
			    <?php } else{?>
			    <div class="span12 post-page product-post">
			    <?php } ?>
					<div id="content" role="main">
			<?php } else{?>
				<?php if ( is_active_sidebar(5) ){?>
				<div class="span9 post-page">
			    <?php } else{?>
			    <div class="span12 post-page">
			    <?php } ?>
					<div id="content" role="main">
			<?php } ?>