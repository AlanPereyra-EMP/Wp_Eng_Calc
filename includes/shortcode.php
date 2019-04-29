<?php 
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

        // Thead
    	$thead = '<th class="w-20"></th>
		    	<th>'.$st[0].'</th>
		    	<th>'.$nd[0].'</th>
		    	<th>'.$rd[0].'</th>';

		// Tbody

	    $rows = count($values);

		for ($i = 0; $i < $rows; $i++){

			// Convert to array values ("|" define end of array element)
			${'values'.$i} = $values[$i];
			${'values'.$i} = explode('|', ${'values'.$i});

			// Check, cross or text
			$check = '✔';
			$cross = '❌';

			$td0 = ${'values'.$i}[0];

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
    		$tbody .=  '<tr>
				    		<th>'.$td0.'</th>'.
				    		'<td>'.$td1.'</td>'.
				    		'<td>'.$td2.'</td>'.
				    		'<td>'.$td3.'</td>
			    		</tr>';
    	}

    	// Links

    	if($st[2]||$nd[2]||$rd[2]){
	    	
	    	// if have link, show button

	    	if($st[2]){
	    		$link0 = $st[2];
		    	$link_name0 = $st[1];
	    		$links_row0 = '<td><a href="'.$link0.'">'.$link_name0.'</a></td>';
	    	}else{
	    		$links_row0 = '<td></td>';
	    	}
	    	if($nd[2]){
		    	$link1 = $nd[2];
		    	$link_name1 = $nd[1];
	    		$links_row1 = '<td><a href="'.$link1.'">'.$link_name1.'</a></td>';
	    	}else{
	    		$links_row1 = '<td></td>';
	    	}
	    	if($rd[2]){
		    	$link2 = $rd[2];
		    	$link_name2 = $rd[1];
	    		$links_row2 = '<td><a href="'.$link2.'">'.$link_name2.'</a></td>';
	    	}else{
	    		$links_row2 = '<td></td>';
	    	}

	    	$tbody_links = '<tr class="sfpo-links">
						    		<th class="sfpo-links-th" style="background: none!important;"></th>'.
						    		$links_row0.$links_row1.$links_row2.
					    		'</tr>';
		}

        // always return
        return '<div class="overflow-x-auto">
			        <table class="sfpo-table">'. 
				        '<thead class="">'.
					        $thead.
					    '</thead>'.
				        '<tbody>'.
					        $tbody.
					        $tbody_links.
				        '</tbody>'. 
			        '</table>
		        </div>';
    }
    add_shortcode('sfpo', 'sfpo_shortcode');
}
?>