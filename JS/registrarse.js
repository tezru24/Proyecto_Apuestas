function BotonRegistrarse(){
    window.location.href = "paginaRegistrarse.php";
}

function Cargar(){
    document.getElementById("registra").addEventListener("click",BotonRegistrarse);   
}
document.addEventListener("DOMContentLoaded",Cargar);