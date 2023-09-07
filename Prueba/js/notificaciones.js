let EstadoModal = 0;


function sendMessage(){
    Espera(true);
    let Formulario = document.getElementById("formCategories");
    let Ajax = new XMLHttpRequest();
    if(document.getElementById("message").value !== ""){
    var arrayCat = []
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
    arrayCat.push(checkboxes[i].value)
    }
    if(arrayCat > 0 && arrayCat !== ""){
        Ajax.addEventListener("load", function () {
        ObjJSON = JSON.parse(this.responseText);
        if (ObjJSON.Resultado == 1) {
            document.getElementById("sports").checked   = false;
            document.getElementById("finance").checked  = false;
            document.getElementById("movie").checked    = false;
            document.getElementById("message").value = "";
            alert('Si esta entrando');
            Espera(false);
        } else {
            Espera(false);
            alert('No funciona');
        }
        }, false);
        Ajax.open('POST', 'classes/categoria.php?Category='+arrayCat);
        Ajax.send(new FormData(Formulario)); 
    }else{
        Espera(false);
        alert('Selecciona al menos una categoria');
    }    
    }else{
        Espera(false);
        alert('Favor de agregar mensaje');
    }     
}

function Espera(blbVer) {
    let DivBloqueo = document.getElementById("Bloqueo");
    if (blbVer) {
        DivBloqueo.style.visibility = "visible";
    } else {
        DivBloqueo.style.visibility = "hidden";
    }
}

function TerminaCarga() {
    Espera(false);    
}


// Listeners
document.getElementById("formCategories").addEventListener("submit",
    (e) => {e.preventDefault()});

document.getElementById("sendForm").addEventListener("click", function(){
    sendMessage();
});





