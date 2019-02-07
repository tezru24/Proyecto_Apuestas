<?php
    require 'database.php';

    $usuario = $_POST['usuario'];
    $password = $_POST['contrasenya'];
    $encriptado=md5($password);
    $consulta = "SELECT Correo, Contrasenya FROM Usuarios WHERE Correo = '$usuario' AND Contrasenya = '$encriptado'";
    $consultaNombre = "SELECT Nombre FROM Usuarios WHERE Correo = '$usuario'";
    
    $result = $conn->query($consulta);
    $result2 = $conn->query($consultaNombre);
    while ($nombre = mysqli_fetch_array($result2)) {
        $usuario=$nombre[0];
    }
    
    if ($result->num_rows >= 1) {
        header("Location:sesionActiva.php?usuario=$usuario");
        exit;
    } else {
        header("Location:index.php");
        exit;
    }
    mysqli_close($conn);
?>