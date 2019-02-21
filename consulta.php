<?php
    require_once 'model/usersDB.php';

    comprobarUsuarioContrasenya();

    mysqli_close($conn);
?>