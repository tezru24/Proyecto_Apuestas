<?php
    require_once 'database.php';

    function getUser(){
        $conn = connection();
        
        $url= $_SERVER["REQUEST_URI"];
        $usuario = explode("=", $url);
        $nombreUsuario = explode("#", $usuario[1]);
        
        $consultaUsuario = "SELECT IDusuario FROM Usuarios WHERE Nombre = '$nombreUsuario[0]'";
        $result = $conn->query($consultaUsuario);
        if($fila=mysqli_fetch_array($result)){
            $id_Usuario=$fila["IDusuario"];
        }
    
        return $id_Usuario;
    }
    function registrarse(){
        $conn = connection();

        $correo = $_POST['correo'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $contrasenya = $_POST['contrasenya'];
        $encriptar = md5($contrasenya);

        $consulta = "SELECT * FROM Usuarios WHERE Correo = $correo";

        $result = $conn->query($consulta);

        if($result->num_rows >= 1){

            header ("Location: paginaRegistrarse.php");  
        }
        else{
            $sql = "INSERT INTO Usuarios (IDusuario, Nombre, Apellidos, Correo, Contrasenya) VALUES ( NULL,'$nombre','$apellidos', '$correo' , '$encriptar' )";
            $result = $conn->query($sql);

            $consultaID = "SELECT IDusuario FROM Usuarios WHERE Correo = '$correo'";
            $result4 = $conn->query($consultaID);
            
            while($fila = mysqli_fetch_array($result4)){

                $idusuario = $fila['IDusuario'];
                $dineros = 200;
                $insertar = "INSERT INTO Monedero (IDmonedero, Dinero, IDusuario) VALUES ( NULL, '$dineros', '$idusuario')";
                $result5 = $conn->query($insertar);
            }
            
            header ("Location: index.php");
        }
        
        mysqli_close($conn);
    }
    function comprobarUsuarioContrasenya(){
        $conn = connection();
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
    }
    function consultarDinero(){
        $conn = connection();
        $url= $_SERVER["REQUEST_URI"];
        $usuario = explode("=", $url);
        $nombreUsuario = explode("#", $usuario[1]);
        $consultaDinero = "SELECT Dinero FROM `Monedero`,`Usuarios` WHERE Monedero.IDusuario = Usuarios.IDusuario AND Usuarios.Nombre = '$nombreUsuario[0]' ";
        $result3 = $conn->query($consultaDinero);
        
        while ($dinero = mysqli_fetch_array($result3)) { ?>
            <div id="total">
                <span>Total:</span> <span id="dinero"><?php echo $dinero['Dinero']; ?></span>€
            </div>
        <?php }
    }
    function quitarDinero($cantidad){
        $conn = connection();
        $url= $_SERVER["REQUEST_URI"];
        $usuario = explode("=", $url);
        $nombreUsuario = explode("#", $usuario[1]);
        $consultaDinero = "UPDATE `Monedero`,`Usuarios` SET Dinero = Monedero.Dinero-$cantidad WHERE Monedero.IDusuario = Usuarios.IDusuario && Usuarios.Nombre = '$nombreUsuario[0]'  ";
        $result3 = $conn->query($consultaDinero);
    }
    function datosPerfilUsuario(){
        $conn = connection();

        $url= $_SERVER["REQUEST_URI"];
        $usuario = explode("=", $url);
        $nombreUsuario = explode("#", $usuario[1]);
        $consultaDatos = "SELECT Correo,Nombre,Apellidos FROM Usuarios WHERE Nombre = '$nombreUsuario[0]' ";
        $result3 = $conn->query($consultaDatos);
        
        
        while ($datos = mysqli_fetch_array($result3)) { ?>
                <span class="tituloPerfil"><b>DATOS DE <?php echo $datos['Nombre']; ?></b></span>
                <div class="datos">
                    <b>Correo electrónico: </b><i><?php echo $datos['Correo']; ?></i>
                    <b>Nombre: </b><i><?php echo $datos['Nombre']; ?></i><br>
                    <b>Apellidos: </b><i><?php echo $datos['Apellidos']; ?></i>
                </div>
        <?php }
    }
?>

