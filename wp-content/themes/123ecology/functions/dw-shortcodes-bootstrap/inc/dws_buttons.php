<?php 
/**
 *DesignWall shortcodes grid
 *@package DesignWall Shorcodes
 *@since 1.0
*/

/**
 * Button
 */
function dws_buttons($params, $content = null){
	extract(shortcode_atts(array(
		'size' => 'default',
		'type' => 'default',
		'value' => 'button',
		'icon' => '',
		'href' => "#"
	), $params));

	$icon_ = '';
	$icon_1 = '';

	if($size=='large'){
		$button_size = '32';
	}else{
		$button_size = '16';
	}
	
	if($type=='default'||$type=='link'){
		$button_type = 'gradient';
	}else{
		$button_type = 'white';
	}
	
	if($icon){
		$icon_ = "<span style='background-image: url(".THEME_ASSETS."475-vector-icons/".$button_size."-".$button_type."/".$button_size."Px---".$icon.".png);'></span>";
		$icon_1 = 'icon';
	}
	
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<a class="btn btn-'.$size.' btn-'.$type.' '.$icon_1.'" href="'.$href.'">'.$icon_.''.$value.'</a>';
	return force_balance_tags( $result );
}
add_shortcode('button', 'dws_buttons');
