var usuario=window.location.href.split("=")[1];

function PonerDiv(){
    if(document.getElementById("desplegable").style.display == "block"){
        document.getElementById("desplegable").style.display = "none";
    }
    else {
        document.getElementById("desplegable").style.display = "block";
    }
    
}
function CerrarSesion(){
    window.location.href = 'index.php';
    document.getElementById("dinero").value = 0;
}
function Perfil(){
    window.location.href = "perfil.php?usuario="+usuario;
}
function Inicio(){
    window.location.href = "sesionActiva.php?usuario="+usuario;
}

function Cargar(){
    document.getElementById("inicio").addEventListener("click",Inicio);
    document.getElementById("usuario").addEventListener("click",PonerDiv);
    document.getElementById("cerrar_sesion").addEventListener("click",CerrarSesion);
    document.getElementById("nombre").innerHTML = usuario;
    document.getElementById("perfil").addEventListener("click",Perfil);
}
document.addEventListener("DOMContentLoaded",Cargar);