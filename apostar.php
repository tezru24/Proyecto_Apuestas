<?php

require 'database.php';

$url= $_SERVER["REQUEST_URI"];
$usuario = explode("=", $url);

$apuesta = $_POST["apuesta"];
$cash = $_POST["dineros"];
$idPartido = $_POST["idPartido"];
$dineroUsuario = $_POST["dineroUsuario"];
$cont = 1;
$dineroTotal = 0;

if($apuesta == "x"){
    $dineroTotal = $cash*4;
}
else if($apuesta == "1"){
    $dineroTotal = $cash*2;
}
if($apuesta == "2"){
    $dineroTotal = $cash*3;
}

$consultaUsuario = "SELECT IDusuario FROM Usuarios WHERE Nombre = '$usuario[1]'";
$result = $conn->query($consultaUsuario);
if($fila=mysqli_fetch_array($result)){
    $id_Usuario=$fila["IDusuario"];
 
}
$insertarTabla = "INSERT INTO Apuestas (IDpartidos,IDusuario,Cantidad_Dinero,1X2,Dinero_Ganado)VALUES('$idPartido','$id_Usuario','$cash','$apuesta','$dineroTotal')";

$result1 = $conn->query($insertarTabla);

$consultaEquipos = "SELECT Local.Nombre as nombreLocal, Visitante.Nombre as nombreVisitante 
FROM Partidos 
LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
WHERE IDpartidos = $idPartido";

$result3 = $conn->query($consultaEquipos);

$SelectApuestas = "SELECT  * FROM Apuestas WHERE IDusuario='$id_Usuario'";
$result5 = $conn->query($SelectApuestas);

if($cash <= $dineroUsuario){
?>
<div class="ordenarPartidos">
<?php if($fila = mysqli_fetch_array($result3)){    
 while ($equipo = mysqli_fetch_array($result5)) { ?>
        <div class="partidoApuesta">
            <?php echo $fila['nombreLocal']." - ".$fila['nombreVisitante']." / ".$equipo['1X2']." ".$equipo['Cantidad_Dinero']?>
            <hr />
        </div>

<?php } 
}
?>
</div>

<?php } ?>

<a class='boton_personalizado botonApostar' id="apostar" href='#'>
    Apostar
</a>