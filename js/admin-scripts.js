// JavaScript Document
	function wpsu_go_premium(){
		alert('Go premium for this feature.');
	}
jQuery(document).ready(function($){
	$('.main .selection_css').click(function(){
		document.location.href = 'options-general.php?page=wp_su&type=css';
	});
	$('.main .selection_js').click(function(){
		document.location.href = 'options-general.php?page=wp_su&type=js';
	});	
	
	$('.main .images_compression_report').click(function(){
		document.location.href = 'options-general.php?page=wp_su&type=img';
	});	
	
	$('.images_compression_report ul li.wpsu_link_dir a.wpsu_ud').click(function(){
		
		var linked = $(this).parent().attr('data-linked');
		if(wpsu_pro){
			document.location.href = 'options-general.php?page=wp_su&type=img&wpsu_link_dir='+linked;
		}else{
			wpsu_go_premium();
		}
		
	});			

	$('a.wpsu_ct').click(function(){
		
		if(wpsu_pro){
			document.location.href = 'options-general.php?page=wp_su&type=img&wpsu_ct';
		}else{
			wpsu_go_premium();
		}
		
	});	
	
	
	$('a.wpsu_ctr').click(function(){	

		document.location.href = 'options-general.php?page=wp_su&type=img';
		
	});		
	
		
	$('a.wpsu_ci').click(function(){	

		var ask = confirm("Are you sure you want to delete all temp directories?\n\n"+$(this).attr('title'));
		if(ask){
			document.location.href = 'options-general.php?page=wp_su&type=img&wpsu_clear_imgs';
		}else{
			return false;
		}
		
	});	
	
	$('.settings .selection_js').click(function(){
		if($(this).hasClass('disabled')){
			$(this).removeClass('disabled');
			$('input[name="selection_js"]').val(1);
		}else{
			$(this).addClass('disabled');
			$('input[name="selection_js"]').val(0);
		}
	});	
	
	$('.settings .selection_css').click(function(){
		if($(this).hasClass('disabled')){
			$(this).removeClass('disabled');
			$('input[name="selection_css"]').val(1);
		}else{
			$(this).addClass('disabled');
			$('input[name="selection_css"]').val(0);
		}
	});			
});