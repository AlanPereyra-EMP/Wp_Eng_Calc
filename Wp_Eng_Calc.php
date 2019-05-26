<?php
/**
* Plugin Name: Wp Engineer Calc
* Plugin URI: https://informatica.pereyra.online/
* Description: WordPress plugin to create a engineer calcs.
* Version: 1.0.0 beta
* Author: Alan Pereyra
* Author URI: https://informatica.pereyra.online/alanpereyra57
* License: GPLv3 or later
* Licence URI: https://www.gnu.org/licenses/gpl-3.0.en.html
* Text Domain: wec
**/


defined('ABSPATH') or die( 'Whats are you doing here?' );

/**
 * Wec plugin class
 */
class WecClass
{
	
	function __construct()
	{
		add_action( 'init', array( $this, 'custom_post_type' ));
	}

	function activate() {
		$this->custom_post_type();
		flush_rewrite_rules();
	}

	function deactivate() {
		flush_rewrite_rules();
	}


	function custom_post_type() {
		register_post_type( 'wec', ['public' => true, 'label' => 'Wec add'] );
	}
}

if(class_exists('wecClass')){
	$wec_plugin = new wecClass();
}

// activate
register_activation_hook( __FILE__, array( $wec_plugin, 'activate') );

// deactivate
register_deactivation_hook( __FILE__, array( $wec_plugin, 'deactivate') );



// Includes

include 'includes/shortcode.php';


//Include CSS files

function wec_styles() {
    wp_register_style( 'wec-by-ip',  plugin_dir_url( __FILE__ ) . '/public/css/wec-by-ip.css' );
    wp_enqueue_style( 'wec-by-ip' );
}
add_action( 'wp_enqueue_scripts', 'wec_styles');

if(is_admin()){
	function wec_admin_styles() {
	    wp_register_style( 'wec-by-ip1',  plugin_dir_url( __FILE__ ) . '/admin/css/settings.css' );
	    wp_enqueue_style( 'wec-by-ip1' );
	}
	add_action( 'wp_enqueue_scripts', 'wec_admin_styles');
}