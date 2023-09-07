let EstadoModal = 0;


function RegistraTarea() {
    Espera(true);
    let Formulario = document.getElementById("formCategories");
    let Ajax = new XMLHttpRequest();
    var arrayCat = []
    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
    for (var i = 0; i < checkboxes.length; i++) {
    arrayCat.push(checkboxes[i].value)
    }
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
}

function Bitacora() {
    Espera(true);
    let LogList = document.getElementById("Loglista");
    let Ajax = new XMLHttpRequest();
    Ajax.addEventListener("load", function () {
        ObjJSON = JSON.parse(this.responseText);
        if (ObjJSON.Resultado == 1) {
        LogList.innerHTML = this.responseText;
        Espera(false);
        }else {
            Espera(false);
            alert('No funciona');
        }
    }, false);
    Ajax.open('POST', 'scripts/lista_tareas.php');
    Ajax.send();   

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
    RecargaLista();
    Espera(false);    
}



// Listeners
window.addEventListener("load", TerminaCarga,Bitacora);
//window.addEventListener("load", RecargaLista);

document.getElementById("formCategories").addEventListener("submit",
(e) => {e.preventDefault()});


document.getElementById("sendForm").addEventListener("click", function() {
    RegistraTarea();
});