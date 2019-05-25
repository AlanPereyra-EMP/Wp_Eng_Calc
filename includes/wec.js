// Test
function calcTest(){
    var a = parseInt(document.calc.a.value);
    var b = parseInt(document.calc.b.value);
    var result = (a**2)+(b**2);
    document.calc.c.value = Math.sqrt(result)+' mm';
}