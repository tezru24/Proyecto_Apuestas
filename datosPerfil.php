<?php
    require 'database.php';
    $url= $_SERVER["REQUEST_URI"];
    $usuario = explode("=", $url);
    $consultaDatos = "SELECT Correo,Nombre,Apellidos FROM Usuarios WHERE Nombre = '$usuario[1]' ";
    $result3 = $conn->query($consultaDatos);
    
    
    while ($datos = mysqli_fetch_array($result3)) { ?>
            <span class="tituloPerfil"><b>DATOS DE <?php echo $datos['Nombre']; ?></b></span>
            <div class="datos">
                <b>Correo electrónico: </b><i><?php echo $datos['Correo']; ?></i>
                <b>Nombre: </b><i><?php echo $datos['Nombre']; ?></i><br>
                <b>Apellidos: </b><i><?php echo $datos['Apellidos']; ?></i>
            </div>
    <?php } ?>