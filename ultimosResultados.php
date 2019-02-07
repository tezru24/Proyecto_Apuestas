<?php
    require 'database.php';

    $consultaEquipos = "SELECT Local.Nombre as nombreLocal, GolesLocal, GolesVisitante, Visitante.Nombre as nombreVisitante 
    FROM Partidos 
    LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
    LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
    WHERE Fecha < Now()";
    $result3 = $conn->query($consultaEquipos);
    
    
    $cont = 0;
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