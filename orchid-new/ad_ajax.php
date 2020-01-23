<?php
/**
 * Plugin Name: Ajax Calls
 * Plugin URI: http://danielpataki.com
 * Description: This is a plugin that allows us to make Ajax calls
 * Version: 1.0.0
 * Author: Rey Angeles
 * Author URI: None
 * License: GPL3
 */
 add_action( 'wp_ad_scripts', 'ad_scripts' );
function ad_scripts() {
	wp_ad_scripts( 'test', plugins_url( '/assets/js/ad_filters.js', __FILE__ ), array('jquery'), '1.0', true );
}
