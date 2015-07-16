<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	if ( !current_user_can( 'update_core' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wp-su' ) );
	}
	
	if ( isset( $_POST['selection_js'] )) {

			update_option( 'selection_js', (boolean)$_POST['selection_js']);
	}
	$selection_js = get_option('selection_js');	
?>	
<div class="wrap wpsu">
	
  <div class="head_area">
	<h2><?php _e( '<span class="dashicons dashicons-welcome-widgets-menus"></span>'.$su_name, 'wp-su' ); ?> - JS</h2>
    
    </div>
<?php if ( isset( $_POST['selection_js'] )): ?>    
<div class="updated settings-error" id="setting-error-settings_updated"><p><strong><?php echo __( 'Settings saved.', 'wpsu' ); ?></strong></p></div>
<?php endif; ?>
    
<form method="post">
<div style="clear:both"><input type="submit" name="Submit" class="button-primary" value="<?php _e( 'Save Changes', 'wp-su' ); ?>" /></div>

<div class="selection_div settings">
	<div title="Click here for enable/disable" class="selection_js <?php echo ($selection_js==true)?'':'disabled'; ?>">SpeedUp JS</div>
    <input type="hidden" name="selection_js" value="<?php echo $selection_js; ?>" />
</div>



</form>

</div>