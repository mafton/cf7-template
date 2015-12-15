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
		var avc7_content = {emailform :'<p>Your Name (required)<br />[text* your-name]</p>', contactform : avc7.cf1 , supportform: 'heeey'};
			 $('#post-body-content').append($('#temp_div'));
		    $('#temp_button_get').click(function() {
		    			    			    		
		    	var ef = $('#temp_list_id').val();
		    	console.log (avc7.cf1);
		    	if (ef === "Email Form"){

		    		$('#wpcf7-form').append(avc7_content.emailform);
		    		
		    	} else if (ef === "Contact Form"){
		    	   
		    		 $('#wpcf7-form').append(avc7_content.contactform);

		    	} else if   (ef === "Support Form"){
		    		
		    		$('#wpcf7-form').append(avc7_content.supportform);	
		    	}
		    	
			});
	

	});





