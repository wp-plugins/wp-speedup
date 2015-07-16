<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	if ( !current_user_can( 'update_core' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wp-su' ) );
	}
	
	
?>	
<div class="wrap wpsu">
	
  <div class="head_area">
	<h2><?php _e( '<span class="dashicons dashicons-welcome-widgets-menus"></span>'.$su_name, 'wp-su' ); ?></h2>
    
    
    
    </div>

<div class="selection_div main">
	<div class="selection_css" title="Click here for settings">CSS</div>
	<div class="selection_js" title="Click here for settings">JS</div>
    <div class="images_compression_report">
	<?php wpsu_load_img_module(); ?>
</div>

</div>