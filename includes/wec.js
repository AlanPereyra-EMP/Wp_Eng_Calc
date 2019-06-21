// Test
function calcTest(){
    var a = parseInt(document.calc.a.value);
    var b = parseInt(document.calc.b.value);
    var result = (a**2)+(b**2);
    document.calc.c.value = Math.sqrt(result)+' mm';
}


// Calculation of slab
function calcSlab(){

	// Inputs
	var luzMayor = document.calc.lMa.value;
	var luzMenor = document.calc.lMe.value;
	var parapeto = document.calc.parapeto.value;
	var type = document.calc.type.value;
	// todo add all inputs

	var luzFinal = luzMayor/luzMenor;

	if (luzFinal > 2){
		// Unidireccional
		var type = 'Unidireccional';
	} else {
		// Bidireccional
		var type = 'Bidireccional';
	}

	
	// const cc = 2;
	// const b = 1;

    // var d = h - cc - (2);

    // Definir m

	// Analisis de carga
	// var Ø = luzMenor/m;
    
    
    // const carpeta = [2100, 0.02];
    // const contrapiso = [1800, 0.08];
    // const losaHA = [2500, 0.12]; 
    // const cieloRa =[1900, 20]
    // var Mu = document.calc.Mu.value;

    // var espesor = lMe/m;

    // var Mn = Mu/Ø;


    var result = type;

    document.calc.output.value = result;

}