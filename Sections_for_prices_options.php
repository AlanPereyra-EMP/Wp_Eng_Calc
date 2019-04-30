<?php
/**
* Plugin Name: Sections for prices options
* Plugin URI: https://informatica.pereyra.online/
* Description: WordPress plugin to create a shortcode to add sections for different prices options.
* Version: 1.0.1 beta
* Author: Alan Pereyra
* Author URI: https://informatica.pereyra.online/alanpereyra57
* License: GPLv3 or later
* Licence URI: https://www.gnu.org/licenses/gpl-3.0.en.html
* Text Domain: sfpo
**/


define( 'SFPO_PLUGIN', __FILE__ );

define( 'SFPO_PLUGIN_BASENAME', plugin_basename( SFPO_PLUGIN ) );

define( 'SFPO_PLUGIN_NAME', trim( dirname( SFPO_PLUGIN_BASENAME ), '/' ) );

define( 'SFPO_PLUGIN_DIR', untrailingslashit( dirname( SFPO_PLUGIN ) ) );

// Includes

include 'includes/shortcode.php';
include 'includes/options-page.php';


//Include CSS files

function sfpo_styles() {
    wp_register_style( 'sfpo-by-ip',  plugin_dir_url( __FILE__ ) . '/public/css/sfpo-by-ip.css' );
    wp_enqueue_style( 'sfpo-by-ip' );
}
add_action( 'wp_enqueue_scripts', 'sfpo_styles');

if(is_admin()){
	function sfpo_admin_styles() {
	    wp_register_style( 'sfpo-by-ip1',  plugin_dir_url( __FILE__ ) . '/admin/css/settings.css' );
	    wp_enqueue_style( 'sfpo-by-ip1' );
	}
	add_action( 'wp_enqueue_scripts', 'sfpo_admin_styles');
}

?>