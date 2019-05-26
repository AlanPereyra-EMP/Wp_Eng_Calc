// Test
function calcTest(){
    var a = parseInt(document.calc.a.value);
    var b = parseInt(document.calc.b.value);
    var result = (a**2)+(b**2);
    document.calc.c.value = Math.sqrt(result)+' mm';
}


// Calculation of slab
function calcSlab(){
    var h = parseInt(document.calc.h.value);
    var dbMayor = parseInt(document.calc.dbMayor.value);
    var Mu = parseInt(document.calc.Mu.value);

    const Ø = 0.9;
    const cc = 2.5;
    const b = 1;

    var Mn = Ø/Mu;
    var d = h - cc - (dbMayor/2);


    var result = d/Math.sqrt(Mn/b);
    document.calc.c.value = 'kd= ' + Math.sqrt(result);
}