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

/**
 * Shortcode function
 */

if(!shortcode_exists('sfpo')) {
    function sfpo_shortcode($atts ) {

    	// atts
    	extract( shortcode_atts( array(
	      'eco' => 'Eco',
	      'regular' => 'Regular',
	      'pro' => 'Pro',
	      'description' => 'Description',
	      ), $atts ) );

        // Head
    	$thead = '<thead>'.'<th></th><th>'.esc_attr($eco).'</th><th>'.esc_attr($regular).'</th><th>'.esc_attr($pro).'</th></thead>';

    	// Body

    	$description = '<th>'.esc_attr($description).'</th>';
    	$td_1 = '<td>❌</td>';
    	$td_2 = '<td>❌</td>';
    	$td_3 = '<td>✔️</td>';

    	$tbody = '<tbody>'.$description.$td_1.$td_2.$td_3.'</tbody>';

        // always return
        return '<div class="overflow-x-auto"><table class="sfpo-table">'. $thead.$tbody. '</table></div>';
    }
    add_shortcode('sfpo', 'sfpo_shortcode');
}

?>