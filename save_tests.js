function loadSettings(id,num) {
    var input = [document.getElementById('ABRR').value 
    , document.getElementById('ABRL').value ,  
    document.getElementById('TympanometryR').value ,
    document.getElementById('TympanometryL').value ,
    document.getElementById('OAER').value ,
    document.getElementById('OAEL').value];

    //console.log(input[num] );
    
    if (localStorage[id]) {
        input[num].value = localStorage[id];

    } 
    console.log(input[num]);
}