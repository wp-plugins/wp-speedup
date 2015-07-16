<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
	if ( !current_user_can( 'update_core' ) ) {
		wp_die( __( 'You do not have sufficient permissions to access this page.', 'wp-su' ) );
	}
	global $su_premium_link;
	
?>	
<div class="wrap wpsu">
	
  <div class="head_area">
  <?php if(!$su_pro): ?><a href="<?php echo $su_premium_link; ?>" target="_blank">Go Premium</a><?php endif; ?>
  
	<h2><?php _e( '<span class="dashicons dashicons-welcome-widgets-menus"></span>'.$su_name, 'wp-su' ); ?></h2>
    <div class="wpsu_actions">
    <?php if(!isset($_GET['wpsu_ct'])): ?>
    <a class="wpsu_ct" title="It will create a temp directory and copy compressed versions there instead of replacing original images.">Compress All Images <span></span>(It's Safe)</a>&nbsp;|&nbsp;<a title="Warning! Make sure that you didn't switch the original directories as temp directories because this action will remove temp directories permanantly." class="wpsu_ci">Delete All Temp Directories</a>
    <?php else: ?>
    <a class="wpsu_ctr" title="A temp directory is created and compressed versions are copied there instead of replacing original images.">All files are successfully compressed. Click here to refresh.</a>
    <?php endif; ?>
	</div>
    
    </div>

	


    <div class="images_compression_report">
    
	<?php wpsu_load_img_module(); ?>
    
	</div>
	<script type="text/javascript" language="javascript">
	jQuery(document).ready(function($){
		 setTimeout(function(){
			 if($('.wpsu_temp_text').length>0){
				$('a.wpsu_ct span').html('Again ');
			 }
		 }, 500);
		 
		 
	});
	</script>
