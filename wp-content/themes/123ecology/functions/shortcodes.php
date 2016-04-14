<?php

/* Shortcodes
================================================== */

// This will do nothing but will allow the shortcode to be stripped
add_shortcode( 'foobar', 'shortcode_foobar' );
 
// Actual processing of the shortcode happens here
function foobar_run_shortcode( $content ) {
    global $shortcode_tags;
 
    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    remove_all_shortcodes();
 
    add_shortcode( 'foobar', 'shortcode_foobar' );
 
    // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );
 
    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;
 
    return $content;
}
 
add_filter( 'the_content', 'foobar_run_shortcode', 7 );

/* prettyprint pre
================================================== */
function pre_clean($content){

    $content = str_ireplace('<br />', '', $content);
    return $content;
}

function prettyprint($atts, $content=null){
	return '<pre class="prettyprint linenums">'.pre_clean($content).'</pre>';
}
add_shortcode('prettyprint', 'prettyprint');

/* headings
================================================== */
function h1($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h1 '.$Type.'>'.do_shortcode($content).'</h1>';
}
function h2($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h2 '.$Type.'>'.do_shortcode($content).'</h2>';
}
function h3($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h3 '.$Type.'>'.do_shortcode($content).'</h3>';
}
function h4($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h4 '.$Type.'>'.do_shortcode($content).'</h4>';
}
function h5($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h5 '.$Type.'>'.do_shortcode($content).'</h5>';
}
function h6($atts, $content=null){
	extract(shortcode_atts( array( 'type' => '' ), $atts ));
	$Type = '';
	if($type){ $Type = 'class="'.$type.'"';};
	return '<h6 '.$Type.'>'.do_shortcode($content).'</h6>';
}
add_shortcode('h1', 'h1');
add_shortcode('h2', 'h2');
add_shortcode('h3', 'h3');
add_shortcode('h4', 'h4');
add_shortcode('h5', 'h5');
add_shortcode('h6', 'h6');


/* paragraph
================================================== */
function p($atts, $content=null){
	return '<p>'.do_shortcode($content).'</p>';
}
add_shortcode('p', 'p');


/* image wrap
================================================== */
function image_wrap($atts, $content=null){
	extract(shortcode_atts( array(), $atts ));
							
	return '<div class="image-wrap">'.do_shortcode($content).'</div>';
}
add_shortcode('image-wrap', 'image_wrap');

/* address
================================================== */
function address($atts, $content=null){
	return '<address>'.do_shortcode($content).'</address>';
}
add_shortcode('address', 'address');

/* margin bottom
================================================== */
function margin_bottom($atts, $content=null){
	return '<div style="margin-bottom: 20px;">'.do_shortcode($content).'</div>';
}
add_shortcode('margin-bottom', 'margin_bottom');

/* strong
================================================== */
function strong($atts, $content=null){
	return '<strong>'.do_shortcode($content).'</strong>';
}
add_shortcode('strong', 'strong');

/* selected
================================================== */
function Select($atts, $content=null){
	return '<span class="selected">'.do_shortcode($content).'</span>';
}
add_shortcode('select', 'Select');

/* abbr
================================================== */
function abbr($atts, $content=null){
	extract(shortcode_atts( array( 
							'title' => 'your title goes here',
							), $atts ));
	return '<abbr title="'.$title.'">'.do_shortcode($content).'</abbr>';
}
add_shortcode('abbr', 'abbr');


/* code, pre
================================================== */
function code($atts, $content=null){
	return '<code>'.pre_clean($content).'</code>';
}
add_shortcode('code', 'code');

function pre($atts, $content=null){
	return '<pre>'.pre_clean($content).'</pre>';
}
add_shortcode('pre', 'pre');

/* blockquote
================================================== */
function blockquote( $atts, $content = null ) {
	extract(shortcode_atts(array(
							'cite' => ''
							),$atts));
	$out = '';
    $out .= '<blockquote><p>'.do_shortcode($content).'</p>';
    if($cite){
    $out .= '<small><cite title="'. $cite .'" >'. $cite .'</cite></small></blockquote>';
    }else{
    $out .= '</blockquote>';
    }
    return $out;
}
add_shortcode('blockquote', 'blockquote');

function blockquote_right( $atts, $content = null ) {
	extract(shortcode_atts(array(
							'cite' => ''
							),$atts));
	$out = '';
    $out .= '<blockquote class="pull-right"><p>'.do_shortcode($content).'</p>';
    if($cite){
    $out .= '<small><cite title="'. $cite .'" >'. $cite .'</cite></small></blockquote>';
    }else{
    $out .= '</blockquote>';
    }
    return $out;
}
add_shortcode('blockquote-right', 'blockquote_right');

/* hr
================================================== */
function hr($atts, $content=null){
	return '<hr/>';
}
add_shortcode('hr', 'hr');

/* br
================================================== */
function br($atts, $content=null){
	return '<br/>';
}
add_shortcode('br', 'br');


/* lists
================================================== */
function p_clean($content){

    $content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('<p/>', '', $content);
    return $content;
}
function lists($atts, $content=null){
	extract(shortcode_atts(array(
							'bullet' => 'square',
							'type' => 'style1'
							),$atts));
	
	$type_ = '';
	
	if($type == "style1"){
		$type_ = 'advanced';
	}elseif($type == "style2"){
		$type_ = 'style2';
	}
							
	return'<div class="'.$type_.' lists-'. $bullet .'">'.p_clean(do_shortcode($content)).'</div>';
}
add_shortcode('lists', 'lists');


/* dropcap, dropcap1, dropcap2
================================================== */
function dropcap($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => ''
							),$atts));
	return '<span class="dropcap">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap', 'dropcap');

function dropcap1($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => ''
							),$atts));
	return '<span class="dropcap1">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap1', 'dropcap1');

function dropcap2($atts, $content=null){
	extract(shortcode_atts(array(
							'type' => ''
							),$atts));
	return '<span class="dropcap2 ' . $type . '">'.do_shortcode($content).'</span>';
}
add_shortcode('dropcap2', 'dropcap2');

/* table
================================================== */
function pre_table($content){

    $content = str_ireplace('<br />', '', $content);
    return $content;
}

function table( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
    $out .= '<table class="table '.$type.'">'.do_shortcode(pre_table($content)).'</table>';
    return $out;
}
add_shortcode('table', 'table');

function table_head( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<thead>'.do_shortcode(pre_table($content)).'</thead>';
    return $out;
}
add_shortcode('table-head', 'table_head');

function table_body( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<tbody>'.do_shortcode(pre_table($content)).'</tbody>';
    return $out;
}
add_shortcode('table-body', 'table_body');

function tr( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
    $out .= '<tr class="'.$type.'">'.do_shortcode(pre_table($content)).'</tr>';
    return $out;
}
add_shortcode('tr', 'tr');

function td( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<td>'.do_shortcode(pre_table($content)).'</td>';
    return $out;
}
add_shortcode('td', 'td');

function th( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<th>'.do_shortcode(pre_table($content)).'</th>';
    return $out;
}
add_shortcode('th', 'th');

/* label
================================================== */
function label( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
	if($type){
		$type_ = "label-".$type;
	}
    $out .= '<span class="label '.$type_.'">'.do_shortcode(pre_table($content)).'</span>';
    return $out;
}
add_shortcode('label', 'label');

/* badge
================================================== */
function badge( $atts, $content = null ) {
    extract(shortcode_atts(array('type' => ''), $atts));
	$out = '';
	if($type){
		$type_ = "badge-".$type;
	}
    $out .= '<span class="badge '.$type_.'">'.do_shortcode(pre_table($content)).'</span>';
    return $out;
}
add_shortcode('badge', 'badge');

/* icon heading
================================================== */
function icon_heading($atts, $content=null){
	extract(shortcode_atts( array( 
							'icon_size' => '',
                            'align' => '',
							'icon' => '',
							), $atts ));
                            
    if(!$icon_size) {$icon_size = 'icon_64';};
    if($icon_size == '64') {$icon_size_ = 'icon_64';};
    if($icon_size == '48') {$icon_size_ = 'icon_48';};
    if($icon_size == '32') {$icon_size_ = 'icon_32';};
    
    if($icon){
	    $icon_ = "<span class='icon-bg'><span class='img' style='background-image: url(".THEME_ASSETS."475-vector-icons/".$icon_size."-white/".$icon_size."Px---".$icon.".png);'></span></span>";
    }
    
	$out = '';
    $out .= '<div class="header_icon '.$icon_size_.' '.$align.'">';
        $out .= $icon_;
        $out .= '<h4 class="title">'.do_shortcode($content).'</h4>';
    $out .= '</div>';
    return $out;
}
add_shortcode('icon_heading', 'icon_heading');

/* clear
================================================== */
function clear( $atts, $content = null ) {
    extract(shortcode_atts(array(), $atts));
	$out = '';
    $out .= '<div class="clearfix"></div>';
    return $out;
}
add_shortcode('clear', 'clear');

/* hyperlink
================================================== */
function hyperlink($atts, $content=null){
	extract(shortcode_atts( array( 
							'href' => '#',
							'target' => '_self',
							), $atts ));

	return '<a href="'.$href.'" target="'.$target.'">'.do_shortcode($content).'</a>';
}
add_shortcode('hyperlink', 'hyperlink');

/* iconitem
================================================== */
function iconitem($atts, $content=null){
	extract(shortcode_atts( array( 
							'icon' => '',
							'title' => 'Lorem ipsum dolor',
							), $atts ));
	
	$icon_ = '';
	
	if($icon){
		$icon_ = '<img class="icon" alt="'.$icon.'" src="'. get_template_directory_uri() .'/assets/Minicons_Pack_1/'.$icon.'.png" />';	
	}

	return '<div class="iconitem"><h5 class="title">'.$icon_.''.$title.'</h5><div class="content">'.do_shortcode($content).'</div></div>';
	
}
add_shortcode('iconitem', 'iconitem');

/* tooltip
================================================== */
function tooltip($atts, $content=null){
	extract(shortcode_atts( array( 
							'placement' => 'top',
							'title' => 'This is a tooltip',
							), $atts ));
	return '<a href="#" rel="tooltip" class="ttip" data-placement="'.$placement.'" title="'.$title.'">'.do_shortcode($content).'</a>';
}
add_shortcode('tooltip', 'tooltip');

/* carousel
================================================== */
function clear_carousel($content){

	$content = str_ireplace('<p>', '', $content);
    $content = str_ireplace('</p>', '', $content);
    $content = str_ireplace('<br />', '', $content);
    return $content;
}

function carousel($atts, $content=null){

	$rand = rand(2, 999999);
	extract(shortcode_atts( array( 
							'title' => 'Carousel',
							'control' => ''
							), $atts ));
	$title_ = '';
	$control_ = '';
	
	if($title){
		$title_ = '<h4 class="title">'.$title.'</h4>';
	}
	if($control != 'off'){
		$control_ = '	<a class="left carousel-control" href="#myCarousel'.$rand.'" data-slide="prev"></a>
		<a class="right carousel-control" href="#myCarousel'.$rand.'" data-slide="next"></a>';
	}else{
		$control_ = '';
	}
	return $title_. '<div id="myCarousel'.$rand.'" class="carousel slide"><div class="carousel-inner">'.clear_carousel(do_shortcode($content)).'</div>'.$control_.'</div>';
}

add_shortcode('carousel', 'carousel');

function carousel_item($atts, $content=null){

	extract(shortcode_atts( array( 
							'img' => '',
							'link' => ''
							), $atts ));
	
	$link_ = '';
							
	if($link){
		$link_ = '<a href="'.$link.'"><img src="'.$img.'" alt="'.do_shortcode($content).'"/></a>';
	}else{
		$link_ = '<img src="'.$img.'" alt="'.do_shortcode($content).'"/>';
	}						
	return '<div class="item">'.$link_.'</div>';
}

add_shortcode('carousel-item', 'carousel_item');

/* testimonial
================================================== */
function testimonial( $atts, $content = null ) {

	$rand = rand(2, 999999);
	extract(shortcode_atts( array( 
							'title' => 'Testimonial',
							'type' => '',
							'control' => ''
							), $atts ));
	
	$title_ = '';
	$type_ = '';
	$control_ = '';
	
	if($title){
		$title_ = '<div class="row-fluid heading-content">';
			$title_ .= '<div class="span12">';
				$title_ .= '<h4 class="title"><span>'.$title.'</span></h4>';
			$title_ .= '</div>';
		$title_ .= '</div>';
	}
	if($title==''){
		$control_styles= 'style="top: -28px;"';
	}
	if($type=="style2"){
		$type_ = 'style2';
	}
	if($control != 'off'){
		$control_ = '	<a '.$control_styles.' class="left carousel-control" href="#myCarousel'.$rand.'" data-slide="prev"></a>
		<a '.$control_styles.' class="right carousel-control" href="#myCarousel'.$rand.'" data-slide="next"></a>';
	}else{
		$control_ = '';
	}
	return $title_. '<div id="myCarousel'.$rand.'" class="testimonial slide '.$type_.'"><div class="carousel-inner">'.do_shortcode($content).'</div>'.$control_.'</div>';

}
add_shortcode('testimonial', 'testimonial');

function testimonial_item($atts, $content=null){

	extract(shortcode_atts( array( 
							'cite' => '',
							'linktitle' => '',
							'linkurl' => ''
							), $atts ));
	
	$link_ = '';
	$cite_ = '';
							
	if($linktitle&&$linkurl){
		$link_ = '<br /><a href="'.$linkurl.'">'.$linktitle.'</a>';
	}else{
		$link_ = '';
	}
	
	if($cite){
		$cite_ = '<div class="cite">'.$cite.''.$link_.'</div>';
	}
												
	return '<div class="item">'.do_shortcode($content).''.$cite_.'</div>';
}

add_shortcode('testimonial-item', 'testimonial_item');

/* Business Hours
================================================== */
function biz_hours( $atts, $content = null ) {

	extract(shortcode_atts( array( 
							'title' => 'Business Hours'
							), $atts ));
							
	$title_ = '';
							
	if($title){
		$title_ = '<h4 class="title">'.$title.'</h4>';
	}
	
	ob_start();?>
	
    <div class="widget biz_hours-widget list">
        <?php echo $title_; ?>
        <ul class="unstyled">
        	<?php echo do_shortcode($content); ?>
        </ul>
    </div>
	
	<?php return ob_get_clean();

}
add_shortcode('biz-hours', 'biz_hours');


function biz_day($atts, $content=null){

	extract(shortcode_atts( array( 
							'day' => 'Monday :',
							), $atts ));
							
	ob_start();?>
							
    <li><span><?php echo $day; ?></span> <span class="right"><?php echo do_shortcode($content); ?></span></li>
            
    <?php return ob_get_clean();
							
}

add_shortcode('biz-day', 'biz_day');



/* callout
================================================== */
function callout($atts, $content=null){

	extract(shortcode_atts( array(
							'type' => ''
							), $atts ));
	
	$type_ = '';						
	
	if($type == 'style2'){
		$type_ = 'callout-2';
	}elseif($type == 'style1'){
		$type_ = 'callout-1';
	}else{
		$type_ = 'callout';
	}
	
	$out = '';
	
	$out .= '<div class="'.$type_.'">';
		$out .= do_shortcode($content);
		$out .= '<div class="clearfix"></div>';
	$out .= '</div>';
					
	return $out;
	
}
add_shortcode('callout', 'callout');

function callout_content($atts, $content=null){

	extract(shortcode_atts( array(
							'layout' => 'span8'
							), $atts ));
							
		$out = '';
	
		$out .= '<div class="content '.$layout.'">'.do_shortcode($content).'</div>';
					
	return $out;
	
}
add_shortcode('callout-content', 'callout_content');

function callout_button($atts, $content=null){

	extract(shortcode_atts( array(
							'layout' => 'span4'
							), $atts ));
							
		$out = '';
	
		$out .= '<div class="button '.$layout.'">'.do_shortcode($content).'</div>';
					
	return $out;
	
}
add_shortcode('callout-button', 'callout_button');


/* front tabs widget
================================================== */
function front_tabs( $atts, $content = null ) {
	extract(shortcode_atts( array( 
							'category' => '',
							), $atts ));
     
	$query = new WP_Query();
	$front_tabs_posts = $query->query("front_tabs_category=$category&post_type=front_tabs&posts_per_page=-1");
	
	$out = '';
	
	if($front_tabs_posts){
	
		$out .= '<div class="front_tabs tabbable tabs-left">';
			$out .= '<ul class="nav nav-tabs">';
				$i = 1;
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				$out .= '<li class="';
			    $select_icon = get_post_meta(get_the_ID(), 'select-icon_value', true);
			    if($select_icon == 'none'){
			        $out .= 'none';
			    }else{
			        $icon = "style='background-image: url(".THEME_ASSETS."Minicons_Pack_1/".$select_icon.".png);'";
			    }
			    if($i == 1){
				  $out .= ' active';  
			    }
				$out .= '"><a '.$icon.' href="#tab'.get_the_ID().'" data-toggle="tab">'.get_the_title().'</a></li>';
				$i++;
				endwhile; endif;
			$out .= '</ul>';
			$out .= '<div class="tab-content">';	
				$i = 1;
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				$out .= '<div class="tab-pane'; 
			    if($i == 1){
				  $out .= ' active';  
			    }
				$out .= '" id="tab'.get_the_ID().'">';
				    $content1 = get_the_content();
				    $content1 = apply_filters('the_content', $content1);
				    $content1 = str_replace(']]>', ']]&gt;', $content1);
				    $out .= do_shortcode($content1);
				$out .= '</div>';
				$i++;
				endwhile; endif;	
			$out .= '</div>';
		$out .= '</div>';
			
	}else{
	    
	    $out .= '<p style="color: #ed1c24;">'.__('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN).'</p>';
	    
	}   
        
    return $out;
}
add_shortcode('front_tabs', 'front_tabs');


/* sidebar
================================================== */
function sidebar($atts, $content=null){
	extract(shortcode_atts( array( 
							'type' => 'right',
							), $atts ));
	
	$type_ = '';
	
	if($type == 'left'){
		$type_ = 'sidebar-left';
	}						
							
    ob_start();
    dynamic_sidebar('Shortcode Sidebar');
    $out .= '<div class="shortcode-sb sidebar '.$type_.'">';
    $out .=  ob_get_contents();
    $out .= '<div class="clearfix"></div></div>';
    ob_end_clean();
    return $out;
}
add_shortcode('sidebar', 'sidebar');


/* widget
================================================== */
function widget($atts, $content=null){
	extract(shortcode_atts( array( 
							'layout' => '4-column',
							'type' => 'portfolio',
							'category' => '',
							'title' => 'This is a title',
							'style' => '',
							'orderby' => '',
							'order' => '',
							), $atts ));
							
	$layout_ = '';
	$showposts = '';
	$title_ = '';
	$no_title = '';
	$category_filter = '';
	$out = '';
						
	if($layout == '3-column'){
		$layout_ = 'span4';
		$showposts = '3';
	}elseif($layout == '2-column'){
		$layout_ = 'span6';
		$showposts = '2';
	}elseif($layout == '6-column'){
		$layout_ = 'span2';
		$showposts = '6';
	}else{
		$layout_ = 'span3';
		$showposts = '4';
	}
	
	if($title){
		$title_ = '<div class="row-fluid heading-content"><h4 class="title"><span>'.$title.'</span></h4></div>';
	}
	if(!$title){
		$no_title = "no-title";
	}
	$rand = rand(2, 999999);
	
	if($type=="portfolio"){
		$category_filter = '&portfolio_category='.$category;
	}else{
		$category_filter = '&category_name='.$category;
	}	
		
	$out .= '<div class="news-widget '.$style.' '.$no_title.'">'.$title_;
	$out .= '<div class="Container"><div class="row-fluid">';
				$query = new WP_Query();
				$query->query('showposts='.$showposts.'&post_type='.$type.'&posts_per_page=-1'.$category_filter.'&orderby='.$orderby.'&order='.$order.'');
				if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
				$lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);
				$videoURL_raw = get_post_meta(get_the_ID(), 'video-url_value', true);
				$videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));
				$linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);
				$out .= '<div class="'.$layout_.' item">';
						if ( $lightbox ) {
                            $out .= '<a rel="prettyPhoto[pp_gal-'.get_the_ID().''.$rand.']" class="bw-effect effect-thumb" href="';
                            if ($videoURL) { 
                            	$out .= $videoURL_raw; 
                            }else{ 
	                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
	                            $out .= $image[0];
                            }
                            $out .= '" title="';
                            if ($videoURL) {
                            	$out .= get_the_title();
                            }else{
                            	$attachment = get_post(get_post_thumbnail_id( get_the_ID() ));
                            	$out .= $attachment->post_title;
                            }
                            $out .= '">';
								$out .= '<img class="bw_Thumbnail" alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail-gray' );
								$out .= $image[0].'"/>';
								$out .= '<img class="Thumbnail sd_Thumbnail" alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' );
                            	$out .= $image[0].'"/>';
                            	$out .= '<div class="icon zoom-in"></div>';
                            $out .= '</a>';
                            if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }
                            $args = array(
                            'numberposts' => 9999, // change this to a specific number of images to grab
                            'offset' => 0,
                            'post_parent' => get_the_ID(),
                            'post_type' => 'attachment',
                            'exclude'  => $thumbnail_id,
                            'nopaging' => false,
                            'post_mime_type' => 'image',
                            'order' => 'ASC', // change this to reverse the order
                            'orderby' => 'menu_order ID', // select which type of sorting
                            'post_status' => 'any'
                            );
                            $attachments =& get_children($args);
                            foreach($attachments as $attachment) {
                                $imageTitle = $attachment->post_title;
                                $imageDescription = $attachment->post_content;
                                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);
                                $out .= '<a class="hide" rel="prettyPhoto[pp_gal-'.get_the_ID().''.$rand.']" href="'.$imageArrayFull[0].'" title="'.$imageTitle.'"></a>';
                            }
						} elseif ( $linkURL ) {
							if(has_post_thumbnail()) {
							$out .= '<a href="'.$linkURL.'" class="bw-effect effect-thumb">';
								$out .= '<img class="bw_Thumbnail" alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail-gray' );
								$out .= $image[0].'"/>';
								$out .= '<img class="Thumbnail sd_Thumbnail" alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' );
								$out .= $image[0].'"/>';
								$out .= '<div class="icon link"></div>';
							$out .= '</a>';
							}else{
							$out .= '<a href="'.$linkURL.'" class="effect-thumb hidden-phone">';
								$out .= '<img class="sd_Thumbnail" alt="'.get_the_title().'" src="'.THEME_ASSETS.'img/placeholder-link.png"/>';
								$out .= '<div class="icon link"></div>';
							$out .= '</a>';
							}
                        } elseif ( $videoURL ) {
                            if(has_post_thumbnail()) {
							$out .= '<a href="'.get_permalink().'" class="bw-effect effect-thumb">';
								$out .= '<img class="bw_Thumbnail" alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail-gray' );
								$out .= $image[0].'"/>';
								$out .= '<img class="Thumbnail sd_Thumbnail" alt="'.get_the_title().'" src="';
								$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' );
								$out .= $image[0].'"/>';
								$out .= '<div class="icon eye"></div>';
							$out .= '</a>';
                            }else{
							$out .= '<a href="'.get_permalink().'" class="effect-thumb hidden-phone">';
								$out .= '<img class="sd_Thumbnail" alt="'.get_the_title().'" src="'.THEME_ASSETS.'img/placeholder-camera.png"/>';
								$out .= '<div class="icon eye"></div>';
							$out .= '</a>';
                            }
                        } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						$out .= '<a href="'.get_permalink().'" class="bw-effect effect-thumb">';
							$out .= '<img class="bw_Thumbnail" alt="'.get_the_title().'" src="';
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail-gray' );
							$out .= $image[0].'"/>';
							$out .= '<img class="Thumbnail sd_Thumbnail" alt="'.get_the_title().'" src="';
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' );
							$out .= $image[0].'"/>';
							$out .= '<div class="icon eye"></div>';
						$out .= '</a>';
                        }else{
						$out .= '<a href="'.get_permalink().'" class="effect-thumb hidden-phone">';
							$out .= '<img class="sd_Thumbnail" alt="'.get_the_title().'" src="'.THEME_ASSETS.'img/placeholder-page.png"/>';
							$out .= '<div class="icon eye"></div>';
						$out .= '</a>';
                        }
						if ( $linkURL ) {
						$out .= '<h5 class="title"><a href="'.$linkURL.'">'.get_the_title().'</a></h5>';
						}else{
						$out .= '<h5 class="title"><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
						}
						
						$out .= '<div class="post_meta">';
							$out .= '<a class="date" href="'.get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')).'">'.get_the_time('M j, Y').'</a> <span>|</span> ';
							if($type=="portfolio"){
								$out .= '<a href="'.get_author_posts_url(get_the_author_meta( 'ID' )).'" class="author">'.get_the_author().'</a>';
							}else{
								$out .= '<a class="comment" href="'.get_comments_link().'">';
								$num_comments=get_comments_number();
									if ( $num_comments == 0 ) {
										$out .=  __('No Comments', GETTEXT_DOMAIN);
									} elseif ( $num_comments > 1 ) {
										$out .=  $num_comments . __(' Comments', GETTEXT_DOMAIN);
									} else {
										$out .=  __('1 Comment', GETTEXT_DOMAIN);
									}
								$out .= '</a>';
							}
						$out .= '</div>';
						
						$out .= '<div class="content">';
							$out .= '<p>'.excerpt_portfolio(15);
							if ( $linkURL ) {
							$out .= ' <a class="more-link" href="'.$linkURL.'">'.__( '[view more]', GETTEXT_DOMAIN).'</a></p>';
							}else{
							$out .= ' <a class="more-link" href="'.get_permalink().'">'.__( '[read more]', GETTEXT_DOMAIN).'</a></p>';
							}
						$out .= '</div>';
				$out .= '</div>';
				endwhile; endif; 
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';
													
	return $out;
}
add_shortcode('widget', 'widget');

/* clients
================================================== */
function clients($atts, $content=null){
	extract(shortcode_atts( array(
							'title' => 'This is a title',
							), $atts ));
	$out = "";
	$title_ = "";
							
	if($title){
		$title_ = '<div class="row-fluid heading-content"><div class="span12"><h4 class="title"><span>'.$title.'</span></h4></div></div>';
	}
			
    $query = new WP_Query();
    $client_posts = $query->query('post_type=client&posts_per_page=-1');
    if($client_posts){
			$out .= '<div class="clients-widget">'.$title_;
				$out .= '<ul class="unstyled clearfix">';
					if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
					if(get_the_excerpt() == ""){
						$url = '#';
					}else{
						$url = get_the_excerpt();
					}
					$out .= '<li>';
					if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {
						$out .= '<a href="'.$url.'" title="'.get_the_title().'" class="grayscale">';
	                        $out .= '<img alt="'.get_the_title().'" class="bw_Thumbnail" src="';
	                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'client-gray' );
	                        $out .= $image[0].'" />';
	                        $out .= '<img alt="'.get_the_title().'" class="Thumbnail" src="';
	                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'client' );
	                        $out .= $image[0].'" />';
						$out .= '</a>';
					} else {
                    	$out .= '<p style="color: #ed1c24;">'.__( 'Please add an image to "Featured Image" for client thumbnail.', GETTEXT_DOMAIN).'</p>';
                    }
					$out .= '</li>';
					endwhile; endif;
				$out .= '</ul>';
			$out .= '</div>';
	}else{
    	$out .= '<p style="color: #ed1c24;">'.__('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN).'</p>';
    }
									
	return $out;
}
add_shortcode('clients', 'clients');

/* title
================================================== */
function title($atts, $content=null){
	extract(shortcode_atts( array(), $atts ));
	
	$out .= '<div class="title-widget">';
		$out .= '<div class="row-fluid heading-content">';
			$out .= '<div class="span12">';
				$out .= '<h4 class="title"><span>'.do_shortcode($content).'</span></h4>';
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';
	
	return $out;
}
add_shortcode('title', 'title');


/* video youtube or vimeo
================================================== */
function video($atts, $content=null){
global $woocommerce_loop;
	extract(shortcode_atts( array( 
							'video_url' => '',
							), $atts ));
	
	$video = theme_parse_video($video_url);
	
	ob_start();
	
	if($video_url==""){?>
	
		<p><?php _e('Please enter a "video_url" value for "Video" shortcode.', GETTEXT_DOMAIN); ?></p>
	
	<?php }else{?>
	
		<iframe class="scale-with-grid" width="620" height="349" src="<?php echo $video ?>?wmode=transparent;showinfo=0" frameborder="0" allowfullscreen></iframe>
	
	<?php }
	
	return ob_get_clean();

}
add_shortcode('video', 'video');

/* divider20 divider10 divider5
================================================== */
function divider20($atts, $content=null){

	extract(shortcode_atts( array( 
	), $atts ));

	ob_start();
	
	?><div class="divider20"></div><?php
	
	return ob_get_clean();

}
add_shortcode('divider20', 'divider20');

function divider10($atts, $content=null){

	extract(shortcode_atts( array( 
	), $atts ));

	ob_start();
	
	?><div class="divider10"></div><?php
	
	return ob_get_clean();

}
add_shortcode('divider10', 'divider10');

function divider5($atts, $content=null){

	extract(shortcode_atts( array( 
	), $atts ));

	ob_start();
	
	?><div class="divider5"></div><?php
	
	return ob_get_clean();

}
add_shortcode('divider5', 'divider5');

/* shop tabs
================================================== */
function shop_tabs($atts, $content=null){
global $woocommerce_loop;
	extract(shortcode_atts( array( 
							'columns' => '4',
							'orderby' => 'date',
							'order' => 'desc',
							'include_id' => '',
							), $atts ));

	
	$rand = rand(2, 999999);
	
	$args = array( 'include' => $include_id ); 

	ob_start();
	
	
    $plugins = get_option('active_plugins');
    $required_plugin = 'woocommerce/woocommerce.php';
    if ( in_array( $required_plugin , $plugins ) ) {?>
	
	<div class="shop-tabs woocommerce tabbable tabs-top">
		<ul class="nav nav-tabs">
			<?php $terms = get_terms('product_cat', $args);?>
			<?php $i = 1;?>
			<?php foreach ($terms as $term) {?>
				<li class="<?php if ($i==1){ echo "active"; } ?>"><a href="#tab-<?php echo $term->term_id;?>-<?php echo $rand;?>" data-toggle="tab"><?php echo $term->name;?></a></li>
			<?php $i++; }?>
		</ul>
		<div class="tab-content">
			<?php $terms = get_terms('product_cat', $args);?>
			<?php $i = 1;?>
			<?php foreach ($terms as $term) {?>
				<div class="tab-pane <?php if ($i==1){ echo "active"; } ?>" id="tab-<?php echo $term->term_id;?>-<?php echo $rand;?>">
				<?php $args = array(
					'post_type'	=> 'product',
					'posts_per_page' => $columns,
					'orderby' => $orderby,
					'order' => $order,
					'product_cat' => $term->slug
				);
				
				$products = new WP_Query( $args );
				
				$woocommerce_loop['columns'] = $columns;
				
				if ( $products->have_posts() ) : ?>
				
				<ul class="products">
				
					<?php while ( $products->have_posts() ) : $products->the_post(); ?>
				
						<?php woocommerce_get_template_part( 'content', 'product' ); ?>
				
					<?php endwhile; // end of the loop. ?>
				
				</ul>
				
				<?php endif;
				
				wp_reset_query(); ?>
				</div>
			<?php $i++; }?>
		</div>
	</div><?php
	}else{
		?><p><?php _e('Sorry, shortcode is not available now, please activate WooCommerce plugin.', GETTEXT_DOMAIN); ?></p><?php
	}
	
	return ob_get_clean();

}
add_shortcode('shop-tabs', 'shop_tabs');

/* google map
================================================== */
function map($atts, $content=null){
	extract(shortcode_atts( array( 
		'latitude' => '51.507335',
		'longitude' => '-0.127683',
		'icon' => '',
		'zoom' => '13',
		'height_px' => '300'
		), $atts ));
							
	$rand = rand(2, 999999);
	ob_start();
	
	$height = "";
	
	if($height_px){
		$height = 'style="height: '.$height_px.'px"';
	}
	?>
	
	<div <?php echo $height;?> id="map-canvas-<?php echo $rand;?>" class="google-map"></div>
	
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
	function initialize_<?php echo $rand;?>() {
	var map;
    var center = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
	  var mapOptions = {
		zoom: <?php echo $zoom;?>,
		center: center,
		center: center,
		scrollwheel: false,
		panControl: false,
		zoomControl: true,
		mapTypeControl: false,
		scaleControl: false,
		streetViewControl: false,
		overviewMapControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  map = new google.maps.Map(document.getElementById('map-canvas-<?php echo $rand;?>'),
	      mapOptions);
	         
		<?php if($icon){?>
		var image = '<?php echo $icon;?>';
		<?php }else{?>
		var image = '<?php echo get_template_directory_uri(); ?>/assets/475-vector-icons/32-gradient/32Px---196.png';
		<?php }?>
	  
	  var myLatLng = new google.maps.LatLng(<?php echo $latitude;?>,<?php echo $longitude;?>);
	  var beachMarker = new google.maps.Marker({
	      position: myLatLng,
	      map: map,
	      icon: image
	  });

	}
	
	google.maps.event.addDomListener(window, 'load', initialize_<?php echo $rand;?>);
    </script>

    
	<?php return ob_get_clean();	
	
}
add_shortcode('map', 'map');


/*  team members
================================================== */
function team_members($atts, $content=null){
	extract(shortcode_atts( array( 
		'columns' => '4',
		'posts' => '',
		'title' => '',
		'name' => '',
		'id' => '',
		), $atts ));
		
	$post_per_page = '';
							
	if($posts){
		$post_per_page = $posts;
	}else{
		$post_per_page = '-1';
	}
	
	if($name=='script'){
		$name = 'script';
	}else{
		$name = '';
	}
	
	ob_start();?>
	
					<?php $query = new WP_Query();?>
				    <?php $about_posts = $query->query('post_type=about&posts_per_page='.$post_per_page.'&about_category='.$title.'&p='.$id.'');?>
				    <?php if($about_posts){?>
				    
				    <div class="about-post clearfix">
				    
				    <?php $loop = 1; $column = $columns;?>      
					<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
					<?php $about_buttons = get_post_meta(get_the_ID(), 'about_buttons_value', true);?>
						
					<div class="
						<?php if($column=="1"){?>
						span12
						<?php }elseif($column=="2"){?>
						span6
						<?php }elseif($column=="3"){?>
						span4
						<?php }elseif($column=="4"){?>
						span3
						<?php }elseif($column=="6"){?>
						span2
						<?php }else{?>
						span4
						<?php }?>
						 member <?php if ( ( $loop - 1 ) % $column == 0 ) echo 'first'; ?>">
							
					    <?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
					        <img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'portfolio-post' ); echo $image[0];?>"/>
					    <?php } else{?>
					        <img alt="<?php _e('No Picture', GETTEXT_DOMAIN); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-user.png"/>
					    <?php }?>
					    
					    <div class="member-content">
					        <h4 class="name <?php echo $name;?>"><?php the_title(); ?></h4>
					        <span class="info">
					                <?php $terms = get_the_terms( get_the_ID(), 'about_category' );
					                if($terms) : foreach ($terms as $term) { echo ''.$term->name.' '; } endif; ?>
					        </span>
					        <p class="excerpt"><?php echo excerpt_portfolio(20)?></p>
					        <?php if($about_buttons){ ?>
					        <div class="member-social">
					            
					            <?php $separator = "%%";
					            $output = '';
					            foreach ($about_buttons as $item) {
					                if($item){
					                    list($item_text1, $item_text2) = explode($separator, trim($item));
					                    $output .= '<a class="icon ' . $item_text1 . '" href="' . $item_text2 . '" title="' . $item_text1 . '">' . $item_text1 . '</a> ';
					                }
					            }
					            echo $output;?>
					            
					        </div>
					        <?php } ?>
					    </div>
						
			        </div>
								
			        <?php $loop++; endwhile; endif; ?>
			        
			        </div>

				    <?php }else{?>
				    	<p style="color: #ed1c24;"><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
				    <?php }?>
    
	<?php return ob_get_clean();	
	
}
add_shortcode('team-members', 'team_members');

/*  showbiz pro
================================================== */
function showbiz($atts, $content=null){
	extract(shortcode_atts( array( 
		'columns' => '4',
		'category' => '',
		'type' => '',
		'title' => '',
		'style' => '',
		'carousel' => 'off',
		'drag' => 'off',
		'navigation' => 'on',
		), $atts ));
		
	$post_per_page = '';
							
	if($posts){
		$post_per_page = $posts;
	}else{
		$post_per_page = '-1';
	}
	
	$rand = rand(2, 999999);
	
	if($type=="portfolio"){
		$category_filter = '&portfolio_category='.$category;
	}else if($type=="product"){
		$category_filter = '&product_cat='.$category;
	}else{
		$category_filter = '&category_name='.$category;
	}
	
	global $woocommerce;
	
	ob_start();?>
	
	<?php if($style=="style2"){ ?>
		<div class="showbiz-widget2">
		
		<?php if($title){?>
			<div class="row-fluid heading-content"><div class="span12"><h4 class="title"><span><?php echo $title;?></span></h4></div></div>
		<?php }?>

			<div class="divide30"></div>

			<!-- DEMO V. -->
			<div id="showbiz2-<?php echo $rand;?>" class="showbiz-container skin-123ecology <?php if ($type=="product") {?>woocommerce product-post-sb<?php };?>">

				<?php if($navigation=="on"){ ?>
				<!-- THE NAVIGATION OUTSIDE THE SHOWBIZ CONTAINER FOR BG COLORISING-->
				<div class="showbiz-navigation center sb-nav-123ecology <?php if($title){?>sb-nav-title<?php }?>">
					<div id="showbiz_left_5-<?php echo $rand;?>" class="sb-navigation-left"><i class="Icon-left-open"></i></div>
					<div id="showbiz_right_5-<?php echo $rand;?>" class="sb-navigation-right"><i class="Icon-right-open"></i></div>
					<div class="sbclear"></div>
				</div> <!-- END OF THE NAVIGATION -->
				<?php }?>

				<div class="divide20"></div>

				<!--	THE PORTFOLIO ENTRIES	-->
				<div class="showbiz" data-left="#showbiz_left_5-<?php echo $rand;?>" data-right="#showbiz_right_5-<?php echo $rand;?>">
					<!-- THE OVERFLOW HOLDER CONTAINER, DONT REMOVE IT !! -->
					<div class="overflowholder">
						<!-- LIST OF THE ENTRIES -->
						<ul>
						
							<?php $query = new WP_Query();
							$query->query('showposts='.$showposts.'&post_type='.$type.'&posts_per_page=-1'.$category_filter.'');
							if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
							$lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);
							$videoURL_raw = get_post_meta(get_the_ID(), 'video-url_value', true);
							$videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));
							$videoURL_yt_id = theme_parse_video_yt_id(get_post_meta(get_the_ID(), 'video-url_value', true));
							$videoURL_vimeo_id = theme_parse_video_vimeo_id(get_post_meta(get_the_ID(), 'video-url_value', true));
							$linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
						
							<!-- AN ENTRY HERE -->
							<li class="sb-media-skin">
								<div class="mediaholder ">
									<div class="mediaholder_innerwrap">
									<?php if ($type=="product") {?>
										<?php global $post, $product;?>
										<?php if ($product->is_on_sale()) : ?>
											<?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__( 'Sale!', 'woocommerce' ).'</span>', $post, $product); ?>
										<?php endif; ?>
										<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
										<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>"/>
										<?php } else{?>
										<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-465.png"/>
										<?php };?>
									<?php } else{?>
										<?php if ( $linkURL ) {?>
											<?php if(has_post_thumbnail()) {?>
											<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>"/>
											<?php } else{?>
											<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-link-533.png"/>
											<?php };?>
										<?php } elseif ( $videoURL ) {?>
											<?php if(has_post_thumbnail()) {?>
											<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>"/>
											<?php } else{?>
											<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-camera-533.png"/>
											<?php };?>
										<?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
										<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>"/>
										<?php } else{?>
										<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-page-533.png"/>
										<?php };?>
									<?php };?>
									</div>
								</div>
								<!-- ANIMATED HEADING INFORMATION, ALWAYS VISIBLE -->
								<h4 class="showbiz-title go-to-top">
								<?php if ( $videoURL_raw ) {?>
									<?php if($lightbox){;?>
										<div class="
										<?php if ( $videoURL_yt_id ) {?>
											redbg
										<?php } else{?>
											bluebg
										<?php };?>
										"><a rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>-front]" href="
								        <?php if ($videoURL) { 
								        	echo $videoURL_raw; 
								        }else{ 
								            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
								            echo $image[0];
								        };?>
										"><?php the_title(); ?></a></div>
										<?php if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }
							            $args = array(
							            'numberposts' => 9999, // change this to a specific number of images to grab
							            'offset' => 0,
							            'post_parent' => get_the_ID(),
							            'post_type' => 'attachment',
							            'exclude'  => $thumbnail_id,
							            'nopaging' => false,
							            'post_mime_type' => 'image',
							            'order' => 'ASC', // change this to reverse the order
							            'orderby' => 'menu_order ID', // select which type of sorting
							            'post_status' => 'any'
							            );
							            $attachments =& get_children($args);
							            foreach($attachments as $attachment) {
							                $imageTitle = $attachment->post_title;
							                $imageDescription = $attachment->post_content;
							                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);?>
							                <a class="hide" rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>-front]" href="<?php echo $imageArrayFull[0]; ?>" title="<?php echo $imageTitle; ?>"></a>
							            <?php }?>
									<?php } else{?>
										<?php if ( $videoURL_yt_id ) {?>
											<div class="redbg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<?php } else{?>
											<div class="bluebg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<?php };?>
									<?php }?>
								<?php } else{?>
									<?php if($linkURL){;?>
									<div class="blackbg"><a href="<?php echo $linkURL; ?>"><?php the_title(); ?></a></div>
									<?php } elseif($lightbox){;?>
									<div class="blackbg"><a rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>]" href="
							        <?php if ($videoURL) { 
							        	echo $videoURL_raw; 
							        }else{ 
							            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
							            echo $image[0];
							        };?>
									"><?php the_title(); ?></a></div>
									<?php } else{?>
									<div class="blackbg"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<?php }?>
								<?php };?>
								</h4>
								<?php if ( $videoURL_raw ) {?>
								<!-- REVEAL CONTAINER (SINGLE MODE) -->
								<div class="reveal_container">
									<?php if ($lightbox) {;?>
										<div class="reveal_container">
											<h4 class="showbiz-title go-to-top"><div class="blackbg"><a href="#"><?php the_title(); ?></a></div></h4>
											<div class="reveal_wrapper">
												<p class="p40"><?php echo excerpt_portfolio(70)?> 
												<?php if ($lightbox) {;?>
												<a rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>]" href="
										        <?php if ($videoURL) { 
										        	echo $videoURL_raw; 
										        }else{ 
										            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
										            echo $image[0];
										        };?>
												">[<?php _e('view gallery', GETTEXT_DOMAIN); ?>]</a>
												<?php };?>
												<?php if ( $lightbox ) {;
										            if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }
										            $args = array(
										            'numberposts' => 9999, // change this to a specific number of images to grab
										            'offset' => 0,
										            'post_parent' => get_the_ID(),
										            'post_type' => 'attachment',
										            'exclude'  => $thumbnail_id,
										            'nopaging' => false,
										            'post_mime_type' => 'image',
										            'order' => 'ASC', // change this to reverse the order
										            'orderby' => 'menu_order ID', // select which type of sorting
										            'post_status' => 'any'
										            );
										            $attachments =& get_children($args);
										            foreach($attachments as $attachment) {
										                $imageTitle = $attachment->post_title;
										                $imageDescription = $attachment->post_content;
										                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);?>
										                <a class="hide" rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>]" href="<?php echo $imageArrayFull[0]; ?>" title="<?php echo $imageTitle; ?>"></a>
										            <?php }
												}?>
												</p>
											</div>
										</div>
									<?php }else{;?>
										<!-- THE REVEAL CONTENT, ONLY IN DETAIL MODE VISIBLE -->
										<div class="reveal_wrapper">
											<!-- THE YOUTUBE OR VIMEO HELPER CLASS (sb-yt-markup or sb-vimeo-markup) USE OPTIONS FOR IFRAME MARKUP BUILDING -->
											<?php if ( $videoURL_yt_id ) {?><div class="sb-yt-markup" data-videoid="<?php echo $videoURL_yt_id;?>"></div>
											<?php } else {?><div class="sb-vimeo-markup" data-videoid="<?php echo $videoURL_vimeo_id;?>"></div>
											<?php };?>
										</div>
									<?php };?>
								</div><!-- END OF REVEAL CONTAINER -->
								<?php } else{?>
								<div class="reveal_container">
									<h4 class="showbiz-title go-to-top"><div class="blackbg"><a href="#"><?php the_title(); ?></a></div></h4>
									<div class="reveal_wrapper">
										<?php if ($type=="product") {?>
											<?php global $post, $product;?>
											<span class="price p40"><?php echo $product->get_price_html(); ?></span>
											<p><?php echo excerpt_portfolio(70); ?>
										<?php }else{;?>
											<p class="p40"><?php echo excerpt_portfolio(70);?> 
										<?php };?>
										<?php if ($lightbox) {;?>
										<a rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>]" href="
			                            <?php if ($videoURL) { 
			                            	echo $videoURL_raw; 
			                            }else{ 
				                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
				                            echo $image[0];
			                            };?>
										">[<?php _e('view gallery', GETTEXT_DOMAIN); ?>]</a>
										<?php }elseif($linkURL){;?>
										<a href="<?php echo $linkURL; ?>
										">[<?php _e('view more', GETTEXT_DOMAIN); ?>]</a>
										<?php }elseif($type=="product") {;?>
										<a href="<?php the_permalink(); ?>
										">[<?php _e('purchase now', GETTEXT_DOMAIN); ?>]</a>
										<?php }else{;?>
										<a href="<?php the_permalink(); ?>
										">[<?php _e('read more', GETTEXT_DOMAIN); ?>]</a>
										<?php };?>
										<?php if ( $lightbox ) {;
				                            if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }
				                            $args = array(
				                            'numberposts' => 9999, // change this to a specific number of images to grab
				                            'offset' => 0,
				                            'post_parent' => get_the_ID(),
				                            'post_type' => 'attachment',
				                            'exclude'  => $thumbnail_id,
				                            'nopaging' => false,
				                            'post_mime_type' => 'image',
				                            'order' => 'ASC', // change this to reverse the order
				                            'orderby' => 'menu_order ID', // select which type of sorting
				                            'post_status' => 'any'
				                            );
				                            $attachments =& get_children($args);
				                            foreach($attachments as $attachment) {
				                                $imageTitle = $attachment->post_title;
				                                $imageDescription = $attachment->post_content;
				                                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);?>
				                                <a class="hide" rel="prettyPhoto[pp_gal-<?php echo get_the_ID(); ?><?php echo $rand; ?>]" href="<?php echo $imageArrayFull[0]; ?>" title="<?php echo $imageTitle; ?>"></a>
				                            <?php }
										}?>
										</p>
									</div>
								</div>
								<?php };?>
								<!-- THE REVEAL OPEN/CLOSE BUTTON - ONLY VISIBLE ON HOVER, DEFAULT STYLE -->
									<div class="reveal_opener show_on_hover">
									<span class="openme">+</span>
									<span class="closeme">-</span>
								</div>
							</li>
							
							<?php endwhile; endif; ?>

						</ul>
						<div class="sbclear"></div>
					</div> <!-- END OF OVERFLOWHOLDER -->
					<div class="sbclear"></div>
				</div>
			</div><!-- END OF DEMO III. -->



			<div class="divide30"></div>

	</div>
	
		<script>
		jQuery(document).ready(function() {

		jQuery('#showbiz2-<?php echo $rand;?>').showbizpro({
			dragAndScroll:"<?php echo $drag; ?>",
			visibleElementsArray:[<?php echo $columns; ?>,3,2,1],
			carousel:"<?php echo $carousel; ?>",
			ytMarkup:"<iframe src='http://www.youtube.com/embed/%%videoid%%?hd=1&amp;wmode=opaque&amp;autohide=1&amp;showinfo=0&amp;autoplay=1'></iframe>",
			vimeoMarkup:"<iframe src='http://player.vimeo.com/video%%videoid%%?title=0&amp;byline=0&amp;portrait=0;api=1&amp;autoplay=1'></iframe>",
			closeOtherOverlays:"on",
			allEntryAtOnce:"on",
			mediaMaxHeight:[450,300,340,260],
		});

		});
		</script>
	<?php }else{ ?>
		<div class="showbiz-widget">

	
		<?php if($title){?>
			<div class="row-fluid heading-content"><div class="span12"><h4 class="title"><span><?php echo $title;?></span></h4></div></div>
		<?php }?>
		
			<div class="divide30"></div>

			<?php if($navigation=="on"){ ?>
			<!-- THE NAVIGATION OUTSIDE THE SHOWBIZ CONTAINER FOR BG COLORISING-->
			<div class="showbiz-navigation center sb-nav-123ecology <?php if($title){?>sb-nav-title<?php }?>">
				<div id="showbiz_left_4-<?php echo $rand;?>" class="sb-navigation-left"><i class="Icon-left-open"></i></div>
				<div id="showbiz_right_4-<?php echo $rand;?>" class="sb-navigation-right"><i class="Icon-right-open"></i></div>
				<div class="sbclear"></div>
			</div> <!-- END OF THE NAVIGATION -->
			<?php };?>

			<div class="divide20"></div>


			<!-- DEMO IV. -->
			<div id="showbiz1-<?php echo $rand;?>" style="padding-right: 1px;" class="showbiz-container skin-123ecology <?php if ($type=="product") {?>woocommerce product-post-sb<?php };?>">

				<!--	THE PORTFOLIO ENTRIES	-->
				<div class="showbiz" data-left="#showbiz_left_4-<?php echo $rand;?>" data-right="#showbiz_right_4-<?php echo $rand;?>">
					<!-- THE OVERFLOW HOLDER CONTAINER, DONT REMOVE IT !! -->
					<div class="overflowholder">
						<!-- LIST OF THE ENTRIES -->
						<ul>

							<?php $query = new WP_Query();
							$query->query('showposts='.$showposts.'&post_type='.$type.'&posts_per_page=-1'.$category_filter.'');
							if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
							$lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);
							$videoURL_raw = get_post_meta(get_the_ID(), 'video-url_value', true);
							$videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));
							$linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>

							<!-- AN ENTRY HERE WITH PREDEFINED SHOWCASE SKIN-->
							<li class="sb-showcase-skin">

										<!-- THE MEDIA HOLDER HERE -->
										<div class="mediaholder ">
											<div class="mediaholder_innerwrap <?php if(!has_post_thumbnail()) {?>placeholder-img<?php };?>">
											<?php if ($type=="product") {?>
												<?php global $post, $product;?>
												<?php if ($product->is_on_sale()) : ?>
													<?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__( 'Sale!', 'woocommerce' ).'</span>', $post, $product); ?>
												<?php endif; ?>
												<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
												<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' ); echo $image[0];?>"/>
												<?php } else{?>
												<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-321.png"/>
												<?php };?>
											<?php } else{?>
												<?php if ( $linkURL ) {?>
													<?php if(has_post_thumbnail()) {?>
													<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' ); echo $image[0];?>"/>
													<?php } else{?>
													<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-link.png"/>
													<?php };?>
												<?php } elseif ( $videoURL ) {?>
													<?php if(has_post_thumbnail()) {?>
													<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' ); echo $image[0];?>"/>
													<?php } else{?>
													<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-camera.png"/>
													<?php };?>
												<?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
												<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'widget-thumbnail' ); echo $image[0];?>"/>
												<?php } else{?>
												<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-page.png"/>
												<?php };?>
											<?php };?>
											</div>
										</div><!-- END OF MEDIA CONTAINER -->

										<!-- SOME ALWAYS VISIBLE CONTENT -->
										<div class="detailholder">
											<h4 class="showbiz-title txt-center"><a href="#"><?php the_title(); ?></a></h4>
											<div class="divide5"></div>
									
											<?php if ($type=="product") {?>
												<?php global $post, $product;?>
												<p class="txt-center"><span class="price"><?php echo $product->get_price_html(); ?></span></p>
												<?php do_action( 'woocommerce_front_rating' ); ?>
											<?php }else{;?>
												<p class="txt-center"><?php echo excerpt_portfolio(10)?></p>
											<?php };?>
											
										</div><!-- END OF DEATIL CONTAINER -->

										<!-- THE REVEAL CONTAINER - OPENING IN FULLWIDTH -->
										<div class="reveal_container tofullwidth">

											<!-- THE REVEL HIDDEN / VISIBLE CONTAINER -->
											<div class="reveal_wrapper">
												<!-- THE HEIGHT ADJUSTER CONTAINER -->
												<div class="heightadjuster table">

													<!-- TABLE CONSTRUCT FOR LEFT / RIGHT CONTENTS -->
													<div class="table-cell onethird <?php if(!has_post_thumbnail()) {?>placeholder-img<?php };?>">	
														<?php if ( $linkURL ) {?>
															<?php if(has_post_thumbnail()) {?>
															<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>" style="width: 100%"/>
															<?php } else{?>
															<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-link-533.png" style="width: 100%"/>
															<?php };?>
														<?php } elseif ( $videoURL ) {?>
															<?php if(has_post_thumbnail()) {?>
															<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>" style="width: 100%"/>
															<?php } else{?>
															<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-camera-533.png" style="width: 100%"/>
															<?php };?>
														<?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) {?>
														<img alt="<?php the_title(); ?>" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'showbiz-thumbnail' ); echo $image[0];?>" style="width: 100%"/>
														<?php } else{?>
															<?php if ($type=="product") {?>
															<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-465.png" style="width: 100%"/>
															<?php } else{?>
															<img alt="<?php the_title(); ?>" src="<?php echo THEME_ASSETS; ?>img/placeholder-page-533.png" style="width: 100%"/>
															<?php };?>
														<?php };?>
													</div>

													<!-- CONTENT IN TABLE -->
													<div class="table-cell pl20">
														<h3 class="showbiz-title"><?php the_title(); ?></h3>
														<div class="post_meta">
															<a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>" class="date"><?php the_time('M j, Y'); ?></a>
															<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="author"><?php echo get_the_author(); ?></a>
															<?php if($type!="portfolio"){;?><a href="<?php comments_link(); ?>" class="comment"><?php comments_number(__('No Comments', GETTEXT_DOMAIN), __('1 Comment', GETTEXT_DOMAIN), __('% Comments', GETTEXT_DOMAIN)); ?></a><?php };?>
														</div>
														<?php do_action( 'woocommerce_front_rating' ); ?>
														<div class="divide10"></div>
														<?php if ($type=="product") {?>
														<p><?php echo excerpt_portfolio(100)?></p>
														<?php }else{;?>
														<p><?php echo excerpt_portfolio(100)?></p>
														<?php };?>
														
														<?php if ($type=="product") {?>
															<?php global $post, $product;?>
															<span class="price"><?php echo $product->get_price_html(); ?></span>
														<?php };?>

														<?php if ($type=="product") {?>
															<p><a class="btn btn-normal btn-small" href="<?php the_permalink(); ?>"><?php _e('Purchase Now', GETTEXT_DOMAIN); ?></a></p>
														<?php }else{;?>
															<?php if ( $lightbox ) {;?>
															<p><a class="btn btn-normal btn-small" rel="prettyPhoto[pp_gal-'<?php echo get_the_ID(); ?><?php echo $rand; ?>']" href="
								                            <?php if ($videoURL) { 
								                            	echo $videoURL_raw; 
								                            }else{ 
									                            $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'large' ); 
									                            echo $image[0];
								                            };?>
															"><?php _e('View Gallery', GETTEXT_DOMAIN); ?></a></p>
															<?php } elseif($linkURL){;?>
															<p><a class="btn btn-normal btn-small" href="<?php echo $linkURL; ?>"><?php _e('View More', GETTEXT_DOMAIN); ?></a></p>
															<?php } else{;?>
															<p><a class="btn btn-normal btn-small" href="<?php the_permalink(); ?>"><?php _e('Read More', GETTEXT_DOMAIN); ?></a></p>
															<?php };?>
														<?php };?>

														<?php if ( $lightbox ) {;
								                            if (!$videoURL) { $thumbnail_id = get_post_thumbnail_id( get_the_ID() ); }
								                            $args = array(
								                            'numberposts' => 9999, // change this to a specific number of images to grab
								                            'offset' => 0,
								                            'post_parent' => get_the_ID(),
								                            'post_type' => 'attachment',
								                            'exclude'  => $thumbnail_id,
								                            'nopaging' => false,
								                            'post_mime_type' => 'image',
								                            'order' => 'ASC', // change this to reverse the order
								                            'orderby' => 'menu_order ID', // select which type of sorting
								                            'post_status' => 'any'
								                            );
								                            $attachments =& get_children($args);
								                            foreach($attachments as $attachment) {
								                                $imageTitle = $attachment->post_title;
								                                $imageDescription = $attachment->post_content;
								                                $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'large', false);?>
								                                <a class="hide" rel="prettyPhoto[pp_gal-'<?php echo get_the_ID(); ?><?php echo $rand; ?>']" href="<?php echo $imageArrayFull[0]; ?>" title="<?php echo $imageTitle; ?>"></a>
								                            <?php }
														}?>
														
														<div class="divide20"></div>
													</div><!-- END OF CONTENT  -->

												</div><!-- END OF HEIGHT ADJUSTER CONTAINER -->
											</div><!-- END OF REVEAL HIDDEN/VISIBLE CONTAINER -->

											<!-- THE CLOSER / OPENER FUNCTION -->
											<div class="reveal_opener opener_big_grey">
												<span class="openme">+</span>
												<span class="closeme">-</span>
											</div><!-- END OF CLOSER / OPENER -->

										</div><!-- END OF THE REVEAL CONTAINER -->
								</li><!-- END OF ENTRY -->
								
								<?php endwhile; endif; ?>
								
						</ul>
						<div class="sbclear"></div>
					</div> <!-- END OF OVERFLOWHOLDER -->
					<div class="sbclear"></div>
				</div>
			</div><!-- END OF DEMO IV. -->



			<div class="divide30"></div>

	</div>
		
		<script>
		jQuery(document).ready(function() {
	
			jQuery('#showbiz1-<?php echo $rand;?>').showbizpro({
				dragAndScroll:"<?php echo $drag; ?>",
				visibleElementsArray:[<?php echo $columns; ?>,3,2,1],
				carousel:"<?php echo $carousel; ?>",
			});
	
		});
		</script>
	<?php }?>					
    
	<?php return ob_get_clean();	
	
}
add_shortcode('showbiz', 'showbiz');

?>