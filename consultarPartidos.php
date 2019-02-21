<?php

require_once 'model/usersDB.php';
require_once 'model/equiposDB.php';
$id_Usuario = getUser();
consultarDinero();
$result4 = consultarPagadasSegunUsuario($id_Usuario);

?>
<h1 class="titulo2">Apuestas Realizadas</h1>
<div class="ordenarRealizadas">
    <div class="scrollApuestasPagadas">
<?php 
$result2 = consultarEquiposApuestasPagadas();
$color = 0;
while($idapuesta = mysqli_fetch_array($result4)){
    
    if($nombre = mysqli_fetch_array($result2)){
        ?>
            <div class="apuestaRealizada" style="<?php if($color%2==0) echo 'background-color:silver !important;color:white !important;'; ?>">
            <?php echo $nombre['nombreLocal']." - ".$nombre['nombreVisitante']." / ".$idapuesta['1X2']." "."Cantidad Apostada: ".$idapuesta['Cantidad_Dinero']."€"?>
            </div>
        <?php 
        $color++;
    }?>
    

<?php } ?>
    </div>

    <hr class="linea"/>

</div>
