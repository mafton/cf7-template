<?php

/*
Plugin Name: Contact Form 7 Template
Plugin URI: http://averta.net
Description: New Feature Added That Made You Capable To More Customization On Your Wordpress Form (Require Contact Form 7)
Version: 1.0
Author: averta
Author URI: http://averta.net
License: GPL2
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}

define ( 'TEMP_URL' , plugins_url( '', __FILE__  ));

add_action( 'admin_enqueue_scripts', 'avc7_enqueue_scripts' );
function avc7_enqueue_scripts() {
	wp_enqueue_script("jquery");
	wp_enqueue_style ( 'style',TEMP_URL.'/style.css' );

}


add_action( 'admin_footer', 'avc7_temp_contact' );
function avc7_temp_contact(){
	$screen = get_current_screen();
	if ($screen->id == 'toplevel_page_wpcf7') {
		
	
    $avc7_template_content = '<div id="temp_div"><form><fieldset id="temp_fieldset"><legend id="temp_tittle">Template</legend><input id="temp_list_id" list="temp_list"> <datalist id="temp_list"><option value="Contact Form"> <option value="EmailForm"><option value="Support Form"> </datalist><button type="button" id="temp_button_get" class="temp_button" value="getaction">Action!</button></fieldset></form></div>';
   }
?>
	<script type="text/javascript">
	console.log(jQuery);
	jQuery(document).ready(function($){
		//bbbbb

		$('#post-body-content').append('<?php echo $avc7_template_content; ?>');

	    $("#temp_button_get").click(function() {
	    	$('#temp_list').change(function(){
	    		var val = $(this).val();
	    		if (val === "EmailForm") {
	    			$('#temp_button_get').hide();
	    		}

	    	});


		});

	});


</script>
<?php
}
?>
