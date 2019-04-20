<?php
/**
* Plugin Name: Sections for prices options
* Plugin URI: https://informatica.pereyra.online/
* Description: WordPress plugin to create a shortcode to add sections for different prices options.
* Version: 0.1.0
* Author: Alan Pereyra
* Author URI: https://informatica.pereyra.online/alanpereyra57
**/

$file = 'Sections_for_prices_options';


//Include CSS file

function sfpo_scripts() {
    wp_register_style( 'sfpo-by-ip',  plugin_dir_url( __FILE__ ) . '/sfpo-by-ip.css' );
    wp_enqueue_style( 'sfpo-by-ip' );
}
add_action( 'wp_enqueue_scripts', 'sfpo_scripts');


// Shortcode function


if(!shortcode_exists('sfpo')) {
    function sfpo_shortcode($atts) {

    	// [sfpo 1st="Eco" 2nd="Best option" 3rd="Premium" values="Description.false.true.true,Description 2.some text.more text.and more text"]

    	// atts
    	$atributes = shortcode_atts( array(
	      '1st' => 'Eco',
	      '2nd' => 'Profesional',
	      '3rd' => 'Premium',
	      'values' => array()
	    ), $atts );

        // Head
    	$thead = '<th></th>
		    	<th>'.$atributes['1st'].'</th>
		    	<th>'.$atributes['2nd'].'</th>
		    	<th>'.$atributes['3rd'].'</th>';

	    // Values to array ( "," define end of row element)
	    $values = $atts['values'];
	    $values = explode(';', $values);

	    $rows = count($values);

    	$tbody = [];

		for ($i = 0; $i < $rows; $i++){

			// convert to array values ("." define end of td value)
			${'values'.$i} = $values[$i];
			${'values'.$i} = explode('|', ${'values'.$i});

			// Check, cross or text
			$check = '✔';
			$cross = '❌';

			if((${'values'.$i}[1]) === 'true'){
				$td1 = $check;
			}else if((${'values'.$i}[1]) === 'false'){
				$td1 = $cross;
			}else{
				$td1 = ${'values'.$i}[1];
			}

			if((${'values'.$i}[2]) === 'true'){
				$td2 = $check;
			}else if((${'values'.$i}[2]) === 'false'){
				$td2 = $cross;
			}else{
				$td2 = ${'values'.$i}[2];
			}

			if((${'values'.$i}[3]) === 'true'){
				$td3 = $check;
			}else if((${'values'.$i}[3]) === 'false'){
				$td3 = $cross;
			}else{
				$td3 = ${'values'.$i}[3];
			}

			// Build rows
    		${'row'.$i} =  '<tr>
					    		<th>'.${'values'.$i}[0].'</th>'.
					    		'<td>'.$td1.'</td>'.
					    		'<td>'.$td2.'</td>'.
					    		'<td>'.$td3.'</td>
				    		</tr>';
    		$tbody[] = ${'row'.$i};
    	}

        // always return
        return '<div class="overflow-x-auto">
			        <table class="sfpo-table">'. 
				        '<thead>'.
					        $thead.
					    '</thead>'.
				        '<tbody>'.
					        $tbody[0].$tbody[1].$tbody[2].$tbody[3].$tbody[4].$tbody[5].$tbody[6].$tbody[7].$tbody[8].$tbody[9].
					        $tbody[10].$tbody[11].$tbody[12].$tbody[13].$tbody[14].$tbody[15].$tbody[16].$tbody[17].$tbody[18].$tbody[19].
					        $tbody[20].$tbody[21].$tbody[22].$tbody[23].$tbody2[4].$tbody[25].$tbody[26].$tbody[27].$tbody[28].$tbody[29].
				        '</tbody>'. 
			        '</table>
		        </div>';
    }
    add_shortcode('sfpo', 'sfpo_shortcode');
}

?>