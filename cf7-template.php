<?php

/*
Plugin Name: Contact Form 7 Template
Plugin URI: http://averta.net
Description: New Feature Added That Made You Capable To More Customization On Your Wordpress Form (Require Contact Form 7)
Version: 1.0
Author: averta
Author URI: http://averta.net
License: GPL2
*/?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#post-body-content').css ({'margin-bottom':'0px'});
		$('#post-body-content').append('<div id="temp_div"><form><fieldset id="temp_fieldset"><legend id="temp_tittle">Template</legend><input list="temp_list"> <datalist id="temp_list"><option value="Contact Form"> <option value="Email Form"><option value="Support Form"> </datalist><button type="button" id="temp_button_get" class="temp_button">Action!</button></fieldset></form></div>');
		$('#temp_fieldset').css({'border':'1px solid black','padding':'0 0 5px 5px'});
		$('#temp_tittle').css ({'font-size':'18px','margin':'8px 0px','line-height':'24px','margin-left':'10px'});
		$('.temp_button').css({'font-size':'12px','height':'26px','line-height':'24px','margin':'2px','padding':'0px 8px 1px'});
		$('#temp_button_contact').click(function()
		{
			$('#wpcf7-form').html('hiiiii');
		});

	});


</script>
