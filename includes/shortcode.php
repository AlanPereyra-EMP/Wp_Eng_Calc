<?php 
if(!shortcode_exists('wec')) {
    function wec_shortcode($atts) {

    	// atts
    	$atributes = shortcode_atts( array(
	      'calc_name' => 'test'
	    ), $atts );


        $calc_js = plugin_dir_url( __FILE__ ) . 'wec.js'; 

        if ($atributes['calc_name'] === 'test'){

            $calc_retun = '<script src="'.$calc_js.'"></script>
                            <p class="wec-p">Calculadora de hipotenusa <br>(ingresar ambos catetos)</p>
                            <form id="wec-form" name="calc">
                                <input class="wec-input" type="text" name="a" placeholder="Cateto a (mm)">
                                <input class="wec-input" type="text" name="b" placeholder="Cateto b (mm)">
                                <input id="wec-submit" type="button" name="result" value="Resultado" onclick="calcTest()">
                                <input class="wec-input-result" type="text" name="c">
                            </form>
                            <p class="wec-p"><small>Formula utilizada: a²+b²=c²</small></p>';
        } else if ($atributes['calc_name'] === 'slab'){

            $calc_retun = '<script src="'.$calc_js.'"></script>
                            <p class="wec-p">Calculadora de prueba <br>(primera parte)</p>
                            <form id="wec-form" name="calc">
                                <input class="wec-input" type="text" name="h" placeholder="Altura">
                                <input class="wec-input" type="text" name="dbMayor" placeholder="Diámetro de la armaduta (adaptado)">
                                <input class="wec-input" type="text" name="Mu" placeholder="Momento mayorado">
                                <input id="wec-submit" type="button" name="result" value="Resultado" onclick="calcSlab()">
                                <input class="wec-input-result" type="text" name="c">
                            </form>
                            <p class="wec-p"><small>Formula utilizada: a²+b²=c²</small></p>';
        }

        // always return
        return '<div id="wec">'.$calc_retun.'</div>';
    }
    add_shortcode('wec', 'wec_shortcode');
}