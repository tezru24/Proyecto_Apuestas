var usuario=window.location.href.split("=")[1];
var nombreUsuario = usuario.split("#")[0];
var ip = "192.168.4.11";
var apuesta = 0;
var cash = 0;
var cont;
var contarDinero = 0;
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
    window.location.href = "perfil.php?usuario="+nombreUsuario;
}
function Inicio(){
    window.location.href = "sesionActiva.php?usuario="+nombreUsuario;
}
function realizarApuesta() {

    //Controlar si están todos los datos introducidos. Money y 1x2

    var dineros = 0;
    
    var idPartido = this.id;
    
    var partido = this.parentNode.parentNode;
    
    var datos = partido.getElementsByTagName("input");

    if (datos[0].checked) apuesta = "1";
    if (datos[1].checked) apuesta = "X";
    if (datos[2].checked) apuesta = "2";
    
    cash = datos[3].value;
    contarDinero = Number(contarDinero) + Number(cash);
    console.log(contarDinero);
    var infoApuesta = new FormData();

    var id = idPartido.split("_")[1];
    var dineroUsuario = document.getElementById("dinero").innerHTML;

    infoApuesta.append("dineros", cash);
    infoApuesta.append("apuesta", apuesta);
    infoApuesta.append("idPartido", id);
    infoApuesta.append("dineroUsuario", dineroUsuario);
    infoApuesta.append("contarDinero", contarDinero);
    cont++;
    console.log(contarDinero);
    Ajax(infoApuesta);
    
    if(dineros > document.getElementById("dinero").innerHTML){
        alert("ERROR");
    }
}
function Ajax(info){
    
    //Pasamos la info recibida a PHP y, mediante una consulta del partido que es, realizamos una apuesta
    
    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://'+ip+'/apuestas/anyadirApuesta.php?usuario='+nombreUsuario, true);

    //Enviamos parámetros;
    peticion_http.send(info);

    function mostrar() {
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            document.getElementById("anyadirApuesta").innerHTML =  peticion_http.responseText;
        }
    }
}
function EliminarApuesta(event){

    var id = event.target.id;

    var idApuesta = id.split("_")[1];

    var partidete = document.getElementsByClassName("partidoApuesta");

    for (let i = 0; i < partidete.length; i++) {
        var idPartido = partidete[i].id.split("_")[1];
        if(idPartido == idApuesta){
            var final = idPartido;       
        }
    }
    var segundoinfoApuesta = new FormData();

    segundoinfoApuesta.append("idApuesta",final);
    SegundoAjax(segundoinfoApuesta);

}
function SegundoAjax(info){
    
    //Pasamos la info recibida a PHP y, mediante una consulta del partido que es, realizamos una apuesta
    
    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://'+ip+'/apuestas/eliminarApuestaPendiente.php', true);

    //Enviamos parámetros;
    peticion_http.send(info);

    function mostrar() {
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            document.getElementById("anyadirApuesta").innerHTML =  peticion_http.responseText;
            location.reload();
        }
    }

}
function TercerAjax(){
    //Pasamos la info recibida a PHP y, mediante una consulta del partido que es, realizamos una apuesta
    
    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://'+ip+'/apuestas/hacerApuesta.php?usuario='+nombreUsuario, true);

    //Enviamos parámetros;
    peticion_http.send(null);

    function mostrar() {
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            document.getElementById("apuestas_realizadas").innerHTML =  peticion_http.responseText;
            var apuestas = document.getElementById("anyadirApuesta");
            var hijos = apuestas.getElementsByClassName("partidoApuesta");
            if(hijos.length != 0){
                hijos[0].parentNode.innerText ="";
                var dineritos = document.getElementsByClassName("gananciaDineros");
                dineritos[0].innerText = "";
            }
        }
    }
}
function AjaxCargarApuestasRealizadas(){
    //Pasamos la info recibida a PHP y, mediante una consulta del partido que es, realizamos una apuesta
    
    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://'+ip+'/apuestas/consultarPartidos.php?usuario='+nombreUsuario, true);

    //Enviamos parámetros;
    peticion_http.send(null);

    function mostrar() {
        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            document.getElementById("apuestas_realizadas").innerHTML =  peticion_http.responseText;
        }
    }
}
function Cargar(){
    document.getElementById("inicio").addEventListener("click",Inicio);
    document.getElementById("usuario").addEventListener("click",PonerDiv);
    document.getElementById("cerrar_sesion").addEventListener("click",CerrarSesion);
    document.getElementById("nombre").innerHTML = nombreUsuario;
    document.getElementById("perfil").addEventListener("click",Perfil);
    document.getElementById("apostar").addEventListener("click",TercerAjax);

    AjaxCargarApuestasRealizadas();

    var apuestas = document.getElementsByClassName("botonApostar");
    for (var i = 0; i < apuestas.length ; i++) {
        apuestas[i].addEventListener("click", realizarApuesta);
    }
}

document.addEventListener("DOMContentLoaded",Cargar);