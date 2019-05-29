<?php 
if(!shortcode_exists('wec')) {
    function wec_shortcode($atts) {

    	// atts
    	$atributes = shortcode_atts( array(
	      'calc_name' => 'test'
	    ), $atts );

        // Js include
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

            $calc_img = plugin_dir_url( __FILE__ ) . 'img/formula-losa-min.png';

            $calc_retun = '<script src="'.$calc_js.'"></script>
                            <p class="wec-p">Calculadora de prueba <br>(primera parte)</p>
                            <form id="wec-form" name="calc">
                                <select name="type" class="wec-select">
                                  <option value="noValue">Selecionar opción</option>
                                  <option value="asd">Volvo</option>
                                  <option value="type">Saab</option>
                                  <option value="type">Opel</option>
                                  <option value="type">Audi</option>
                                </select>
                                <input class="wec-input" type="text" name="lMa" placeholder="Luz mayor (mtrs)">
                                <input class="wec-input" type="text" name="lMe" placeholder="Luz menor (mtrs)">
                                <input class="wec-input" type="text" name="Mu" placeholder="Momento mayorado (Mu)">
                                <input class="wec-input" type="text" name="Mu" placeholder="Momento mayorado (Mu)">
                                <input id="wec-submit" type="button" name="result" value="Resultado" onclick="calcSlab()">
                                <input class="wec-input-result" type="text" name="output">
                            </form>
                            <p class="wec-p">
                                Fórmula usada: <br>
                                <img class="no-shadow" src="'.$calc_img.'" height="auto" width="100" /><br>
                                <br>
                                d = h - Recubrimiento - (dbMayor/2)<br>
                                <br>
                                <strong>h</strong> = altura <br>
                                Recubrimiento = 2.5cm <br>
                                <strong>dbMayor</strong> = Diámetro de la armadura <br>
                                <br>
                                Mn = Mu / Ø<br>
                                <strong>Mu</strong> = Momento mayorado <br>
                                Ø = 0.9 <br>
                                <br>
                                b = 1m <br>
                            </p>';

        }

        // always return
        return '<div id="wec">'.$calc_retun.'</div>';
    }
    add_shortcode('wec', 'wec_shortcode');
}