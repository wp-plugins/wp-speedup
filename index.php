<?php defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/*
Plugin Name: WP SpeedUp

Plugin URI: http://www.websitedesignwebsitedevelopment.com/wordpress/plugins/wp-speedup

Description: WP SpeedUp is a great plugin to speedup your WordPress website with a simple installation.

Version: 1.0
Author: Fahad Mahmood 
Author URI: http://www.androidbubbles.com
License: GPL3
*/ 

	


	define( 'WPSU_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
	
	
	
	
	global $su_premium_link, $wpsu_dir, $su_pro, $su_data, $wpsu_css, $dir_size,  $wpsu_compress_images, $su_name, $wpsu_total_bytes, $wpsu_live;
	$wpsu_live = ($_SERVER['REMOTE_ADDR']!='127.0.0.1');
	
	$wpsu_dir = plugin_dir_path( __FILE__ );
	$rendered = FALSE;
	$su_pro = file_exists($wpsu_dir.'inc/functions_extended.php');
	$su_data = get_plugin_data(__FILE__);
	$su_premium_link = 'http://shop.androidbubbles.com/product/wp-speedup-pro';
	$su_name = 'WP SpeedUp'.(' ('.$su_data['Version'].($su_pro?') Pro':')'));
	$wpsu_compress_images = (get_option('wpsu_compress_images') || isset($_GET['wpsu_ct']));
	$wpsu_compress_images = ($wpsu_compress_images?true:false);
	$wpsu_total_bytes = get_option('wpsu_total_bytes');

	
	$ap_data = get_plugin_data(__FILE__);
	
	
	if($su_pro)
	include('inc/functions_extended.php');
	
	include('inc/functions.php');
        
	

	add_action( 'admin_enqueue_scripts', 'register_su_scripts' );
	add_action( 'wp_enqueue_scripts', 'register_su_scripts' );
	add_action('admin_footer', 'wpsu_footer_scripts');

	
	if(is_admin()){
		
		
		
		add_action( 'admin_menu', 'wpsu_menu' );		
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'wpsu_plugin_links' );	
		
		if((isset($_GET['page']) && $_GET['page']=='wp_su') || $wpsu_compress_images){
			add_action('admin_init', 'wpsu_compression_check');
		}
		
	}elseif(!defined( 'XMLRPC_REQUEST' ) && !defined( 'DOING_CRON' )){
		
	
		if(get_option('selection_js')){
			
			add_filter( 'print_scripts_array', 'wpsu_save_do_not_defer_deps' );
			add_filter( 'script_loader_src', 'wpsu_save_dscripts', PHP_INT_MAX, 2 );
			add_action( 'wp_footer', 'wpsu_render_scripts', PHP_INT_MAX );
		}
		
		
			add_action( 'wp_footer', 'wp_speedup' );									
		
	}	