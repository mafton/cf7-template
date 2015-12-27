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

		var avcf_label  = { avcf_lbl  : avcf.avcf_label };
		var avcf_frm    = { tmpfrm    : avcf.avcf_form  };
		var avcf_mail   = { emailform : avcf.avcf_mail  };
		  
		   //  avcf_frm.push ('avc7.avcf_new_input');

			$('#post-body-content').append($('#temp_div'));
			  $('#temp_list_id').append( "<option value='avcf_label.avcf_lbl'> "+ avcf_label.avcf_lbl + "<option>");
			    $('#temp_button_get').click(function() {
			      if (confirm ('Do you want to do this action?')){ 	
			    	$('#wpcf7-form').empty();
			    	$('#wpcf7-mail-body').empty();		    			    		
			    	var ef = $('#temp_list_id').val();
			    	console.log (avcf.args);
			    	if (ef === "Email Form"){

			    		$('#wpcf7-form').append(avcf.avcf_label);
			    		
			    	} else if (ef === "Contact Form"){
			    	   
			    		 $('#wpcf7-form').append(avcf_frm.contactform);

			    	} else if   (ef === "Support Form"){
			    		
			    		$('#wpcf7-form').append(avcf_frm.supportform);

			    	} else if ( ef === "avcf_label.avcf_lbl"){

			    		$('#wpcf7-form').append( avcf_frm.tmpfrm );
			    		$('#wpcf7-mail-body').append( avcf_mail.emailform );
			    		console.log ( avcf_frm.tmpfrm);
			    	}
			    }	
			    	
				});
	});





