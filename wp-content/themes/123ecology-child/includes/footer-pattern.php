<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');

    /* Footer Options
    ================================================== */
    $footer_pattern = get_option_tree('footer_pattern',$theme_options);

}
?>

<?php if($footer_pattern!=''&&$footer_pattern!='none'){?>
<style>
.footer-top{
    background-image: url(<?php echo THEME_ASSETS_CHILD;?>Pattern/footer/<?php echo $footer_pattern;?>.png);
}
</style>
<?php }?>