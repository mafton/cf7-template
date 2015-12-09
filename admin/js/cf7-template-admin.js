/*
Plugin Name: Contact Form 7 Template
Plugin URI: http://averta.net
Description: New Feature Added That Made You Capable To More Customization On Your Wordpress Form (Require Contact Form 7)
Version: 1.0
Author: averta
Author URI: http://averta.net
License: GPL2
*/


    jQuery(document).ready(function($){
		//bbbbb
			$('#post-body-content').append('<?php echo $avc7_template_content; ?>');

		    $('#temp_button_get').click(function() {
		    	
		    	var ef = $('#temp_list option[value="Email Form"]').val();
		    	if (ef === "Email Form"){
		    		$('#wpcf7-form').append('<?php echo $avc7_email_form ?>')
		    	}
		    	
			});
	

	});





