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

add_action( 'plugins_loaded', 'wpcf7av_init' , 20 );
function wpcf7av_init(){
	add_action( 'wpcf7av_init', 'wpcf7_add_shortcode_template' );
	add_filter( 'wpcf7_validate_template', 'wpcf7_template_validation_filter', 10, 2 );
}

function wpcf7_add_shortcode_template() {
	wpcf7_add_shortcode(
		array( 'cf7template' , 'cf7template*' , 'templatehidden' ),
		'wpcf7_template_shortcode_handler', true );
}

function wpcf7_template_shortcode_handler( $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	if ( empty( $tag->name ) )
		return '';

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type, 'wpcf7dtx-dynamictext' );


	if ( $validation_error )
		$class .= ' wpcf7-not-valid';

	$atts = array();

	$atts['size'] = $tag->get_size_option( '40' );
	$atts['maxlength'] = $tag->get_maxlength_option();
	$atts['minlength'] = $tag->get_minlength_option();

	if ( $atts['maxlength'] && $atts['minlength'] && $atts['maxlength'] < $atts['minlength'] ) {
		unset( $atts['maxlength'], $atts['minlength'] );
	}

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

	if ( $tag->has_option( 'readonly' ) )
		$atts['readonly'] = 'readonly';

	if ( $tag->is_required() )
		$atts['aria-required'] = 'true';

	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$value = (string) reset( $tag->values );

	if ( $tag->has_option( 'placeholder' ) || $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$value = $tag->get_default_option( $value );

	$value = wpcf7_get_hangover( $tag->name, $value );

	$scval = do_shortcode('['.$value.']');
	if( $scval != '['.$value.']' ){
		$value = esc_attr( $scval );
	}

	$atts['value'] = $value;
	
//echo '<pre>'; print_r( $tag ); echo '</pre>';
	switch( $tag->basetype ){
		case 'dynamictext':
			$atts['type'] = 'text';
			break;
		case 'dynamichidden':
			$atts['type'] = 'hidden';
			break;
		default:
			$atts['type'] = 'text';
			break;
	}

	$atts['name'] = $tag->name;

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		sanitize_html_class( $tag->name ), $atts, $validation_error );

	return $html;
}

function wpcf7_template_validation_filter( $result, $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	$name = $tag->name;

	$value = isset( $_POST[$name] )
		? trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) )
		: '';

	if ( 'cf7template' == $tag->basetype ) {
		if ( $tag->is_required() && '' == $value ) {
			$result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
		}
	}

	if ( ! empty( $value ) ) {
		$maxlength = $tag->get_maxlength_option();
		$minlength = $tag->get_minlength_option();

		if ( $maxlength && $minlength && $maxlength < $minlength ) {
			$maxlength = $minlength = null;
		}

		$code_units = wpcf7_count_code_units( $value );

		if ( false !== $code_units ) {
			if ( $maxlength && $maxlength < $code_units ) {
				$result->invalidate( $tag, wpcf7_get_message( 'invalid_too_long' ) );
			} elseif ( $minlength && $code_units < $minlength ) {
				$result->invalidate( $tag, wpcf7_get_message( 'invalid_too_short' ) );
			}
		}
	}

	return $result;
}


if ( is_admin() ) {
	
	add_action( 'wpcf7_admin_init' , 'wpcf7_add_tag_generator_template' , 100 );
}

function wpcf7_add_tag_generator_template() {

	if ( ! class_exists( 'WPCF7_TagGenerator' ) ) return;

	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'template', __( 'Averta Template 1 ', 'contact-form-7' ),
		'wpcf7_tag_generator_template' );

	$tag_generator->add( 'dynamichidden', __( 'Averta Template 2', 'contact-form-7' ),
		'wpcf7_tag_generator_templatet' );
}








?>