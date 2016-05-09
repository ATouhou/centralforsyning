<?php 
/**
 *DesignWall shortcodes tabs
 *@package DesignWall Shorcodes
 *@since 1.0
*/

/**
 * Tabs
 */
//-------------- 
//	[tabs]
//		[thead]
//			[tab href="#link" title="title"]
//			[dropdown title="title"]
//				[tab href="#link" title="title"]
//			[/dropdown]
//		[/thead]
//		[tcontents]
//			[tcontent id="link"]
//			[/tcontent]
//		[/tcontents]
//	[/tabs]
//	---------------
//	

function dws_tabs_child($params, $content = null){
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="tab_wrap">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('tabs', 'dws_tabs_child');

function dws_thead_child($params, $content = null){
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<ul class="nav nav-tabs">';
	$result .= do_shortcode($content );
	$result .= '</ul>'; 
	return force_balance_tags( $result );
}
add_shortcode('thead', 'dws_thead_child');

function dws_tab_child($params, $content = null){
	extract(shortcode_atts(array(
		'href' => '#',
		'title' => '',
		'class' => ''
 		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);

	$result = '<li class="'.$class.'">';
	$result .= '<a data-toggle="tab" href="'.$href.'">'.$title.'</a>';
	$result .= '</li>'; 
	return force_balance_tags( $result );
}
add_shortcode('tab', 'dws_tab_child');

function dws_dropdown_child($params, $content = null){
	global $dws_timestamp;
	extract(shortcode_atts(array(
		'title' => '',
		'id' => '',
		'class' => '',
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<li class="dropdown">';
	$result .= '<a class="'.$class.' dropdown-toggle" id="'.$id.'" href="#" data-toggle="dropdown">'.$title.'<b class="caret"></b></a>';
	$result .='<ul class="dropdown-menu">';
	$result .= do_shortcode($content);
	$result .= '</ul></li>'; 
	return force_balance_tags( $result );
}
add_shortcode('dropdown', 'dws_dropdown_child');

function dws_tcontents_child($params, $content = null){
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$result = '<div class="tab-content">';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('tcontents', 'dws_tcontents_child');

function dws_tcontent_child($params, $content = null){
	extract(shortcode_atts(array(
		'id' => '',
		'class'=>'',
		), $params));
	$content = preg_replace('/<br class="nc".\/>/', '', $content);
	$class= ($class=='active')?'active in':'';
	$result = '<div class="tab-pane fade '.$class.'" id='.$id.'>';
	$result .= do_shortcode($content );
	$result .= '</div>'; 
	return force_balance_tags( $result );
}
add_shortcode('tcontent', 'dws_tcontent_child');
