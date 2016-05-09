<?php
/*
Plugin Name: scORE!
Plugin URI: http://software.wiputra.com/web/score_plugin/
Description: Publish scores, movie ratings, current values, or other ratings on a post. Based on 'punts' plugin by Carles Company Soler (email : e3128927@est.fib.upc.es), with major additions and modifications. The plugin uses custom field 'scORE_score' to store rating data.
Version: 1
Author: Yogi Wiputra
Author URI: http://www.wiputra.com/

	Copyright 2008 Yogi Wiputra (yogi.wiputra at gmail.com).
	Based on 'punts' plugin by Carles Company Soler (email : e3128927@est.fib.upc.es)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


load_plugin_textdomain('scORE');

/**
*/
class scORE{
	var $scORE_version = "1";
 	var $wp_version;
	var $wp_post_id;

	/**
	*/
	function scORE() {
		global $wp_version;
		$this->wp_version = $wp_version;
		global $post;
		$this->wp_post_id = $post->ID;
	}

	/**
	*/
	function scORE_content($content){
		$score = get_post_custom_values('scORE_score');
		if(!empty($score)){
			$scOREstring="";
			
			// For number-based scores, stars are displayed
			// Disabled for the time being, but will return in later version
			/*
			if($score[0] > 5){
				$score[0]=5;
			}elseif($score[0] < 0){
				$score[0]=0;
			}
			for ($i = 0; $i < $scORE[0]; $i++){
				// Lit star display
				$scOREstring=$scOREstring."<img src='".get_settings('siteurl')."/wp-content/plugins/scORE/estrella.png' alt='O' />";
			}
			for ($i = $scORE[0]; $i < 5; $i++){
				// Empty star display
				$scOREstring=$scOREstring."<img src='".get_settings('siteurl')."/wp-content/plugins/scORE/apagat.png' alt='X' />";
			}
			*/

			// For letter-based scores, just display the appropriate letter
			$scOREstring = $score[0];

			// Display score
			// Note: Please implement scORE_display class in your CSS theme or template
			$content="<div class='scORE_display'>"._("Score: ").$scOREstring."</div>".$content;
		}
		return $content;
	}

	/**
	*/
	function scORE_admin_menus(){
		add_options_page('scORE', 'scORE!', 8, __FILE__, array('scORE','scORE_options_page'));
	}

	/**
	*/
	function scORE_options_page() {
		echo "<div class='wrap'><h2>scORE! Options</h2>";
		echo _("There are no options yet. Stay tuned for updates.")."</div>";
	}

	/**
	*/
	function scORE_add_post_menu() {
		global $post;
		$post_id = $post->ID;

		// Compatibility provision for WordPress versions under 2.5
		// WordPress before version 2.5 is not officially supported. Use at your own risk.
		if (substr($this->wp_version, 0, 3) >= '2.5') { ?>
			<div id="postscore" class="postbox open">
			<h3><?php _e('Score', 'scORE') ?></h3>
			<div class="inside">
			<div id="postscore">
		<?php
		}
		else
		{
		?>
			<div class="dbx-b-ox-wrapper">
			<fieldset id="scOREdiv" class="dbx-box">
			<div class="dbx-h-andle-wrapper">
			<h3 class="dbx-handle"><?php _e('Score', 'scORE') ?></h3>
			</div>
			<div class="dbx-c-ontent-wrapper">
			<div class="dbx-content">
		<?php
		}
		?>

		<a target="__blank" href="mailto:yogi.wiputra@gmail.com"><?php _e('Click here for Support', 'scORE') ?></a>

		<table style="margin-bottom:40px">
		<tr>
		<th style="text-align:left;" colspan="2">
		</th>
		</tr>
		<tr>
		<td style="text-align:right; vertical-align:top"><?php _e('Score:', 'scORE') ?></th>
		<td>
		<?php
		// Fetch data for displaying in admin
		$scORE_radio = get_post_meta($post_id,"scORE_score",true);
		?>
		<table>
		    <tr>
		      <td><input type="radio" name="scORE_radio" id="A0" value="A+" <?php if ($scORE_radio == "A+") { echo "checked=\"checked\"" ; } ?> />
		      A+</td>
		      <td><input type="radio" name="scORE_radio" id="A1" value="A" <?php if ($scORE_radio == "A") { echo "checked=\"checked\"" ; } ?> />
		      A</td>
		      <td><input type="radio" name="scORE_radio" id="A2" value="A-" <?php if ($scORE_radio == "A-") { echo "checked=\"checked\"" ; } ?> />
		      A-</td>
		    </tr>
		    <tr>
		      <td><input type="radio" name="scORE_radio" id="B0" value="B+" <?php if ($scORE_radio == "B+") { echo "checked=\"checked\"" ; } ?> />
		      B+</td>
		      <td><input type="radio" name="scORE_radio" id="B1" value="B" <?php if ($scORE_radio == "B") { echo "checked=\"checked\"" ; } ?> />
		      B</td>
		      <td><input type="radio" name="scORE_radio" id="B2" value="B-" <?php if ($scORE_radio == "B-") { echo "checked=\"checked\"" ; } ?> />
		      B-</td>
		    </tr>
		    <tr>
			<td><input type="radio" name="scORE_radio" id="C0" value="C+" <?php if ($scORE_radio == "C+") { echo "checked=\"checked\"" ; } ?> />
		      C+</td>
		      <td><input type="radio" name="scORE_radio" id="C1" value="C" <?php if ($scORE_radio == "C") { echo "checked=\"checked\"" ; } ?> />
		      C</td>
		      <td><input type="radio" name="scORE_radio" id="C2" value="C-" <?php if ($scORE_radio == "C-") { echo "checked=\"checked\"" ; } ?> />
		      C-</td>
		    </tr>
		    <tr>
			<td><input type="radio" name="scORE_radio" id="D0" value="D+" <?php if ($scORE_radio == "D+") { echo "checked=\"checked\"" ; } ?> />
		      D+</td>
		      <td><input type="radio" name="scORE_radio" id="D1" value="D" <?php if ($scORE_radio == "D") { echo "checked=\"checked\"" ; } ?> />
		      D</td>
		      <td><input type="radio" name="scORE_radio" id="D2" value="D-" <?php if ($scORE_radio == "D-") { echo "checked=\"checked\"" ; } ?> />
		      D-</td>
		    </tr>
		    <tr>
		      <td colspan="3">
		      <input type="radio" name="scORE_radio" id="F" value="F" <?php if ($scORE_radio == "F") { echo "checked=\"checked\"" ; } ?> />
		      F</td>
		    </tr>
		</table>
		</td>
		</tr>
		</table>
		
		<?php
		// WordPress before version 2.5 is not officially supported. Use at your own risk.
		if (substr($this->wp_version, 0, 3) >= '2.5') { ?>
		</div>
		</div>
		</div>
		<?php } else { ?>
		</div>
		</fieldset>
		</div>
		<?php } ?>

		<?php
	}

	/**
	*/
	function scORE_post_custom_field($post_id)
	{
	    $scORE_edit = $_POST["score_edit"];
	    if (isset($scORE_edit) && !empty($scORE_edit)) {
			$scORE = $_POST["scORE_radio"];

			// if field already exists, it should be deleted first, if at all possible
			delete_post_meta($post_id, 'scORE_score');

			// add custom field 'score'
			if (isset($scORE) && !empty($scORE)) {
				add_post_meta($post_id, 'scORE_score', $scORE);
			}
		}
	}
}

add_filter('the_content',array('scORE','scORE_content'));
add_action('admin_menu', array('scORE','scORE_admin_menus'));

$scORE = new scORE();

// WordPress before version 2.5 is not officially supported. Use at your own risk.
if (substr($scORE->wp_version, 0, 3) >= '2.5')
{
	add_action('edit_form_advanced', array($scORE, 'scORE_add_post_menu'));
	// add_action('simple_edit_form', array($scORE, 'scORE_add_post_menu'));
	// add_action('edit_page_form', array($scORE, 'scORE_add_post_menu'));
}
else
{
	add_action('dbx_post_advanced', array($scORE, 'scORE_add_post_menu'));
	// add_action('dbx_page_advanced', array($scORE, 'scORE_add_post_menu'));
}

add_action('edit_post', array($scORE, 'scORE_post_custom_field'));
add_action('publish_post', array($scORE, 'scORE_post_custom_field'));
add_action('save_post', array($scORE, 'scORE_post_custom_field'));
add_action('edit_page_form', array($scORE, 'scORE_post_custom_field'));

?>
