<?php
    require_once 'model/equiposDB.php';
    
    $result3 = consultarPartidosPasados();

    while ($equipo = mysqli_fetch_array($result3)) { ?>
        <div class='ultimosResultados'>
            <div class="resultadoPartido">
                <?php echo $equipo['nombreLocal']; ?>
                <?php echo $equipo['GolesLocal']; ?> -
                <?php echo $equipo['GolesVisitante']; ?>
                <?php echo $equipo['nombreVisitante']; ?>
            </div>
        </div>
    <?php } ?>