<?php
/**
* Plugin Name: Sections for prices options
* Plugin URI: https://informatica.pereyra.online/
* Description: WordPress plugin to create a shortcode to add sections for different prices options.
* Version: 0.0.1
* Author: Alan Pereyra
* Author URI: https://informatica.pereyra.online/alanpereyra57
**/

$file = 'Sections_for_prices_options';

/**
 * Include CSS file for MyPlugin.
 */
function sfpo_scripts() {
    wp_register_style( 'sfpo-by-ip',  plugin_dir_url( __FILE__ ) . '/sfpo-by-ip.css' );
    wp_enqueue_style( 'sfpo-by-ip' );
}
add_action( 'wp_enqueue_scripts', 'sfpo_scripts');

// add hello world message

function hello_world() {
	echo '<br><div class="hello-world notice notice-success is-dismissible">Hello World</div>';
}

add_action('admin_notices', 'hello_world');

function hello_css(){
	echo '
	<style>
	.hello-world{
		padding:10px;
	}
	</style>';
}

add_action( 'admin_head', 'hello_css' );


// display this message one time

function sample_admin_notice__error() {
	$class = 'notice notice-error is-dismissible';
	$message = __( 'Irks! An error has occurred.', 'sample-text-domain' );

	printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
}

if (!$sample_message_was_view){
	add_action( 'admin_notices', 'sample_admin_notice__error' );
	$sample_message_was_view;
}

?>