<?php
/*
Plugin Name: Cornerstone Library: Layerslider
Plugin URI:  http://cornerstonelibrary.com/
Description: This is a template plugin for creating new elements for Cornerstone
Version:     0.1
Author:      Your Name
Author URI:  http://yourwebsite.com
Author Email: youremail@example.com
Text Domain: __x__
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
 * => Enqueue Scripts
 * ---------------------------------------------------------------------------*/
function csl_layerslider_scripts() {
	wp_enqueue_script( 'csl-layerslider-script', plugins_url( '/assets/js/custom.js', __FILE__ ), array( 'jquery' ), null, true );
	wp_enqueue_style( 'csl-layerslider-css', plugins_url( '/assets/css/custom.css', __FILE__ ), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'csl_layerslider_scripts', 100 );


/*
 * => Load Shortcodes
 * ---------------------------------------------------------------------------*/
require_once('includes/shortcodes.php');

/*
 * => ADD CUSTOM ELEMENTS TO CORNERSTONE
 * ---------------------------------------------------------------------------*/
function csl_layerslider_elements() {
	require_once( 'includes/layerslider-element.php' );
	require_once( 'includes/layerslider-element-item.php' ); // include this if your item has a child type
  cornerstone_add_element( 'CSL_LayerSlider' );
  cornerstone_add_element( 'CSL_LayerSlider_Item' );
}
add_action( 'cornerstone_load_elements', 'csl_layerslider_elements' );
