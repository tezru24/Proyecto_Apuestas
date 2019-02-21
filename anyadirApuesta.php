<?php

require_once 'model/usersDB.php';
require_once 'model/equiposDB.php';
require_once 'model/cotizacion.php';

$apuesta = $_POST["apuesta"];
$cash = $_POST["dineros"];
$idPartido = $_POST["idPartido"];
$dineroUsuario = $_POST["dineroUsuario"];
$contarDinero = $_POST["contarDinero"];
$cont = 1;

$dineroTotal = ganancia($apuesta,$cash);

$id_Usuario = getUser();



if($apuesta != "0" && $cash != "0" && $cash <= $dineroUsuario && $contarDinero <= $dineroUsuario) {
insertarTablaApuestas($idPartido,$id_Usuario,$cash,$apuesta,$dineroTotal);

}
else {
    
}

$result5 = consultarApuestasPendientes($id_Usuario);

$result7 = consultarIDapuestasPendientes();

?>
<div class="ordenarPartidos">
    <div class="scrollAnyadirApuesta" id="scrollAnyadir">
<?php

    $result3 = consultarEquiposApuestasPendientes();
    while ($equipo = mysqli_fetch_array($result5)) { 
        if($nombre=mysqli_fetch_array($result3)){
        if($idapuesta=mysqli_fetch_array($result7)){
            $id = $idapuesta['IDapuesta'];
        }
        ?>
        
            <div class="partidoApuesta" id="apuesta_<?php echo $id; ?>">
                <?php echo $nombre['nombreLocal']." - ".$nombre['nombreVisitante']." / ".$equipo['1X2']." ".$equipo['Cantidad_Dinero']."€"?><span class="cerrar" id="cerrar_<?php echo $id; ?>" onclick="EliminarApuesta(event)">&times;</span>
                <hr />
            </div>
            
<?php } 
    }
?>
    </div>
</div>
   
    <?php 
    $result6 = consultarGananciaTotal($id_Usuario);
    if($dineritos=mysqli_fetch_array($result6)){ ?>
        <div class="dinero-ganar2">Ganancia: <span class="gananciaDineros"><?php echo $dineritos['SUM(Dinero_Ganado)'] ?></span>€</div>
    <?php }

?>