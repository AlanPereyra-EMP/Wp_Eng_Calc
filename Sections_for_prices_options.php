<?php
/**
* Plugin Name: Sections for prices options
* Plugin URI: https://informatica.pereyra.online/
* Description: WordPress plugin to create a shortcode to add sections for different prices options.
* Version: 1.0.1 beta
* Author: Alan Pereyra
* Author URI: https://informatica.pereyra.online/alanpereyra57
**/

//Include CSS file
$file = 'Sections_for_prices_options';

function sfpo_scripts() {
    wp_register_style( 'sfpo-by-ip',  plugin_dir_url( __FILE__ ) . '/sfpo-by-ip.css' );
    wp_enqueue_style( 'sfpo-by-ip' );
}
add_action( 'wp_enqueue_scripts', 'sfpo_scripts');

// Setting sfpo
function sfpo_register_settings() {
   add_option( 'sfpo_option_name', 'SFPO');
   register_setting( 'sfpo_options_group', 'sfpo_option_name', 'sfpo_callback' );
}
add_action( 'admin_init', 'sfpo_register_settings' );

// Sfpo option page
function sfpo_register_options_page() {
  add_options_page('Sections for prices options', 'Sections for prices options', 'manage_options', 'sfpo', 'sfpo_options_page');
}
add_action('admin_menu', 'sfpo_register_options_page'); 

function sfpo_options_page(){
	sfpo_scripts()
	?>
		<style type="text/css">
			.sfpo-all-content{
				margin-right: 10px;
			}
			.sfpo-table{
			  width: 100%;
			  position: relative;
			  min-width: 0;
			  border-collapse: collapse;
			}
			.sfpo-table tr:hover{
				background: none!important;
			}
			.sfpo-table th{
				padding: 0!important;
			}
			.sfpo-table input{
			  width: 100%;
			  position: relative;
			  background: none;
			  height: 50px;
			  border: none!important;
			  box-shadow: none!important;
			  text-align: center;
			}
			.sfpo-table input:hover,.sfpo-table input:focus{
				border: none!important;
				box-shadow: none!important;
			}
			.sfpo-table th input{
			  border: 1px solid #ccc;
			}
			.sfpo-admin-title{
			  padding: 20px 0;
			  text-align: center;
			}
			.sfpo-w-100{
				width: 100%;
			}
			.sfpo-w-25{
				width: 25%;
			}
			.sfpo-text-center{
				text-align: center;
			}
			.sfpo-no-border td{
				border: none!important;
			}

		</style>
	  <div class="sfpo-all-content">
	  <h1 class="sfpo-admin-title ">Section for prices options "SFPO"</h1>
	  <form method="post" action="options.php">
	  <?php settings_fields( 'myplugin_options_group' ); ?>
	  <br>
	  <table class="sfpo-table">
	  	<thead>
		  <tr>
		    <th class="sfpo-w-25"></th>
		    <th><input type="text" id="1st" placeholder="Eco" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>" /></th	>
		    <th><input type="text" id="2nd" placeholder="Normal" name="myplugin_option_name" value="<?php echo get_option('myplugin_option_name'); ?>" /></th>
		    <th><input type="text" id="3rd" placeholder="Premium" value="<?php echo get_option('myplugin_option_name'); ?>" /></th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
		  	<th><input type="text" placeholder="Descripción" name=""></th>
		  	<td><input type="text" placeholder="valor*" name=""></td>
		  	<td><input type="text" placeholder="valor*" name=""></td>
		  	<td><input type="text" placeholder="valor*" name=""></td>
		  </tr>
		</tbody>
	  </table>
	  <br>
	  <p class="sfpo-text-center">*Las celdas <b>valor</b> se pueden rellenar con "si" para un ✔️ y "no" para un ❌. También pueden incluir texto texto</p>
	  <br>
	  <?php  submit_button('', 'sfpo-w-100 button button-primary'); ?>
	  </form>
	  </div>
	<?php
}


// Shortcode "Section For Prices Options"

if(!shortcode_exists('sfpo')) {
    function sfpo_shortcode($atts) {

    	// [sfpo 1st="Eco," 2nd="Profesional" 3rd="Premium" values="Description.false.true.true,Description 2.some text.more text.and more text"]

    	// atts
    	$atributes = shortcode_atts( array(
	      '1st' => 'Eco',
	      '2nd' => 'Normal',
	      '3rd' => 'Premium',
	      'values' => 'Basic options|true|true|true;Medium options|false|true|true;Special options|false|false|true'
	    ), $atts );

    	// Values to array ( ";" define end of array element)
    	if($atributes['1st']!='Eco'){
		    $st = $atts['1st'];
		    $st = explode(';', $st);
		}else{
			$st[] = $atributes['1st'];
		}
		if($atributes['2nd']!='Normal'){
		    $nd = $atts['2nd'];
		    $nd = explode(';', $nd);
		}else{
			$nd[] = $atributes['2nd'];
		}
		if($atributes['3rd']!='Premium'){
		    $rd = $atts['3rd'];
		    $rd = explode(';', $rd);
		}else{
			$rd[] = $atributes['3rd'];
		}
		if($atributes['values']!='Basic options|true|true|true;Medium options|false|true|true;Special options|false|false|true'){
		    $values = $atts['values'];
		    $values = explode(';', $values);
		}else{
			$values = $atributes['values'];
			$values = explode(';', $values);
			$st[] = 'Show more';
			$st[] = '#';
			$nd[] = 'Show more';
			$nd[] = '#';
			$rd[] = 'Show more';
			$rd[] = '#';
		}

        // Head
    	$thead = '<th class="w-20"></th>
		    	<th>'.$st[0].'</th>
		    	<th>'.$nd[0].'</th>
		    	<th>'.$rd[0].'</th>';

	    $rows = count($values);

    	$tbody = [];

		for ($i = 0; $i < $rows; $i++){

			// Convert to array values ("|" define end of array element)
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

    	$tbody['space'] = '<th></th><td></td><td></td><td></td>';

    	if($st[2]&&$nd[2]&&$rd[2]){
	    	$link0 = $st[2];
	    	$link1 = $nd[2];
	    	$link2 = $rd[2];
	    	$link_name0 = $st[1];
	    	$link_name1 = $nd[1];
	    	$link_name2 = $rd[1];

	    	$tbody['links'] = '<tr class="sfpo-links">
						    		<th class="sfpo-links-th" style="background: none!important;"></th>'.
						    		'<td><a class="shadow-grey-down button" href="'.$link0.'">'.$link_name0.'</a></td>'.
						    		'<td><a class="shadow-grey-down button" href="'.$link1.'">'.$link_name1.'</a></td>'.
						    		'<td><a class="shadow-grey-down button" href="'.$link2.'">'.$link_name2.'</a></td>
					    		</tr>';
		}

        // always return
        return '<div class="overflow-x-auto">
			        <table class="sfpo-table">'. 
				        '<thead class="shadow-grey-down">'.
					        $thead.
					    '</thead>'.
				        '<tbody>'.
					        $tbody[0].$tbody[1].$tbody[2].$tbody[3].$tbody[4].$tbody[5].$tbody[6].$tbody[7].$tbody[8].$tbody[9].
					        $tbody[10].$tbody[11].$tbody[12].$tbody[13].$tbody[14].$tbody[15].$tbody[16].$tbody[17].$tbody[18].$tbody[19].
					        $tbody[20].$tbody[21].$tbody[22].$tbody[23].$tbody2[4].$tbody[25].$tbody[26].$tbody[27].$tbody[28].$tbody[29].
					        $tbody['links'].
				        '</tbody>'. 
			        '</table>
		        </div>';
    }
    add_shortcode('sfpo', 'sfpo_shortcode');
}

?>