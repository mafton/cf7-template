<?php

/*
Plugin Name: Contact Form 7 Template
Plugin URI: http://averta.net
Description: New Feature Added That Made You Capable To More Customization On Your Wordpress Form (Require Contact Form 7)
Version: 1.0.0
Author: averta
Author URI: http://averta.net
License: GPL2
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

define ( 'TEMP_URL' , plugins_url( '', __FILE__  ));
define ( 'TEMP_VER' , '1.0.0' ) ;


add_action( 'admin_enqueue_scripts', 'avc7_enqueue_scripts' );
function avc7_enqueue_scripts() {
	wp_enqueue_script( "jquery" );
	wp_enqueue_style ( 'style',TEMP_URL.'/admin/css/cf7-template-admin.css' );
    wp_enqueue_script( 'cf7-template-admin-script', TEMP_URL.'/admin/js/cf7-template-admin.js',array(), '1.0.0', true);

}


add_action( 'admin_footer', 'avc7_temp_admin_page' );
function avc7_temp_admin_page(){

	$screen = get_current_screen();
	if ( $screen->id == 'toplevel_page_wpcf7' ) {
    echo '<div id="temp_div"><form><fieldset id="temp_fieldset"><legend id="temp_tittle">Template</legend><select id="temp_list_id"><option value="Contact Form">Contact Form </option> <option value="Email Form" >Email Form</option> <option value="Support Form">Support Form </option></select><button type="button" id="temp_button_get" class="temp_button" value="getaction">Action!</button></fieldset></form></div>';

   } 
}

add_action( 'admin_footer', 'avc7_temp_generate' );
function avc7_temp_generate (){

	$screen = get_current_screen();
	if ( $screen->id == 'toplevel_page_wpcf7' ) {

    wp_localize_script('cf7-template-admin-script' , 'avcf' , $args = apply_filters( 'avc1_generate_filter',  
    	         array( 
    	         	    'avcf_label' =>  'qqqqqqqqqq',
						'avcf_form'  =>  'qqqqqqqqqq',
						'avcf_mail'  =>  'qqqqqqqqqq'
						)
	 	   		 ));
    echo json_encode($args, JSON_FORCE_OBJECT);
 	}   
}


?>


