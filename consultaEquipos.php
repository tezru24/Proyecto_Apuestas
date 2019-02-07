<?php
    require 'database.php';

    $consultaEquipos = "SELECT Local.Nombre as nombreLocal, Visitante.Nombre as nombreVisitante, IDpartidos 
    FROM Partidos 
    LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
    LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
    WHERE Fecha > Now()";

    $result3 = $conn->query($consultaEquipos);
    ?>
    <div id="ponerScroll">
    <?php
    while ($equipo = mysqli_fetch_array($result3)) { ?>
            <div class='proximoPartido' id='partido_<?php echo $equipo['IDpartidos'];?>'>
                <div class='campo equipo'><?php echo $equipo['nombreLocal']." - ".$equipo['nombreVisitante']; ?></div>
                    <div class='campo ux2'>
                        <input type="radio" class='campo' name="radio_<?php echo $equipo['IDpartidos'];?>" /><div class="uno">1</div>
                        <input type="radio" class='campo' name="radio_<?php echo $equipo['IDpartidos'];?>" /><div class="equis">X</div>
                        <input type="radio" class='campo' name="radio_<?php echo $equipo['IDpartidos'];?>" /><div class="dos">2</div>
                    </div>
                <div class='campo apuesta'>
                    <input type='number' class='apuesta2' value="0" min="1" pattern="^[0-9]+">
                </div>
                <div class="boton">
                    <a class='boton_personalizado botonApostar' id="apostar_<?php echo $equipo['IDpartidos'];?>" href='#'>
                        Añadir
                    </a>
                </div>    
                <div style="clear:both"></div>
            </div>
    <?php } ?>
    </div>
    
