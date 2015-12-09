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
	wp_register_script( 'cf7-template-script', TEMP_URL.'/admin/js/cf7-template-admin.js');
    wp_enqueue_script( 'cf7-template-admin-script', TEMP_URL.'/admin/js/cf7-template-admin.js');


}

add_action( 'admin_footer', 'avc7_temp_contact' );
function avc7_temp_contact(){

	$screen = get_current_screen();
	if ( $screen->id == 'toplevel_page_wpcf7' ) {
		wp_enqueue_script( 'cf7-template-admin',TEMP_URL.'/admin/js/cf7-template-admin.js' );
    $avc7_template_content = '<div id="temp_div"><form><fieldset id="temp_fieldset"><legend id="temp_tittle">Template</legend><input id="temp_list_id" list="temp_list"> <datalist id="temp_list"><option value="Contact Form"> <option value="Email Form" ><option value="Support Form"> </datalist><button type="button" id="temp_button_get" class="temp_button" value="getaction">Action!</button></fieldset></form></div>';

   } 

}


?>


