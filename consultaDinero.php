<?php
    require 'database.php';
    $url= $_SERVER["REQUEST_URI"];
    $usuario = explode("=", $url);
    $consultaDinero = "SELECT Dinero FROM `Monedero`,`Usuarios` WHERE Monedero.IDusuario = Usuarios.IDusuario AND Usuarios.Nombre = '$usuario[1]' ";
    $result3 = $conn->query($consultaDinero);
    
    while ($dinero = mysqli_fetch_array($result3)) { ?>
        <div id="total">
        <span>Total:</span> <span id="dinero"><?php echo $dinero['Dinero']; ?></span>€
    </div>
    <?php } ?>