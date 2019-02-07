var usuario=window.location.href.split("=")[1];
var apuesta = 0;
var cash = 0;
var cont;
var partidos = document.getElementsByClassName("proximoPartido");

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
function realizarApuesta() {

    //Controlar si están todos los datos introducidos. Money y 1x2

    var dineros = 0;
    
    var idPartido = this.id;
    
    var partido = this.parentNode.parentNode;
    
    var datos = partido.getElementsByTagName("input");

    if (datos[0].checked) apuesta = "1";
    if (datos[1].checked) apuesta = "x";
    if (datos[2].checked) apuesta = "2";
    
    cash = datos[3].value;



    var infoApuesta = new FormData();

    var id = idPartido.split("_")[1];
    var dineroUsuario = document.getElementById("dinero").innerHTML;

    infoApuesta.append("dineros", cash);
    infoApuesta.append("apuesta", apuesta);
    infoApuesta.append("idPartido", id);
    infoApuesta.append("dineroUsuario", dineroUsuario);
    infoApuesta.append("contador",cont);
    cont++;

    dineros += Number(cash);
       
    /*arrayApuesta[i] = apuesta;
    arrayCash[i] = cash;*/


    Ajax(infoApuesta);
    
    if(dineros <= document.getElementById("dinero").innerHTML){
        var resultado = document.getElementById("dinero").innerHTML - dineros;
        document.getElementById("dinero").innerHTML = resultado;
    }
    else {
        alert("ERROR");
    }
}
function Ajax(info){
    
    //Pasamos la info recibida a PHP y, mediante una consulta del partido que es, realizamos una apuesta
    
    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://localhost/apuestas/apostar.php?usuario='+usuario, true);

    //Enviamos parámetros;
    peticion_http.send(info);

    function mostrar() {
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            document.getElementById("anyadirApuesta").innerHTML =  peticion_http.responseText;
        }
    }
}
function Cargar(){
    document.getElementById("inicio").addEventListener("click",Inicio);
    document.getElementById("usuario").addEventListener("click",PonerDiv);
    document.getElementById("cerrar_sesion").addEventListener("click",CerrarSesion);
    document.getElementById("nombre").innerHTML = usuario;
    document.getElementById("perfil").addEventListener("click",Perfil);

    var apuestas = document.getElementsByClassName("botonApostar");
    for (var i = 0; i < apuestas.length ; i++) {
        apuestas[i].addEventListener("click", realizarApuesta);
    }

}
document.addEventListener("DOMContentLoaded",Cargar);