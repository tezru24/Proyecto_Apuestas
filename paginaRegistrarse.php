<?php include 'header2.php'; ?>
<body>
<div class="menu">
        <div class="imagenes">
            <img src="img/alaves.png" width="40px" height="40px" >
            <img src="img/atleti.png" width="40px" height="40px" >
            <img src="img/athletic.png" width="40px" height="40px" >
            <img src="img/barcelona.png" width="40px" height="40px" >
            <img src="img/betis.png" width="40px" height="40px" >
            <img src="img/eibar.png" width="40px" height="40px" >
            <img src="img/espanyol.png" width="40px" height="40px" >
            <img src="img/getafe.png" width="40px" height="40px" >
            <img src="img/girona.png" width="40px" height="40px" >
            <img src="img/huesca.png" width="40px" height="40px" >
            <img src="img/lega.png" width="40px" height="40px" >
            <img src="img/levante.png" width="40px" height="40px" >
            <img src="img/rayo.png" width="40px" height="40px" >
            <img src="img/madrid.png" width="40px" height="40px" >
            <img src="img/sociedad.png" width="40px" height="40px" >
            <img src="img/sevilla.png" width="40px" height="40px" >
            <img src="img/vlc.png" width="40px" height="40px" >
            <img src="img/valladolid.png" width="40px" height="40px" >
            <img src="img/villareal.png" width="40px" height="40px" >
        </div>
</div>

<div class="perfil">
    <div class="claseTitulo"><h1>REGISTRO</h1></div>
        <form  class="formulario" action="registrarse.php" method="POST">
            <div class="claseCorreo"><span class="etiquetas">Correo electrónico</span></div>
            <div class="claseInputCorreo"><input class="inputsRegistra" type="text" name="correo" placeholder="Nombre de usuario"><br /><br /></div>
            <div class="claseNombre"><span class="etiquetas">Nombre</span></div>
            <div class="claseInputNombre"><input class="inputsRegistra" type="text" name="nombre" placeholder="Nombre"><br /><br /></div>
            <div class="claseApellidos"><span class="etiquetas">Apellidos</span></div>
            <div class="claseInputApellidos"><input class="inputsRegistra" type="text" name="apellidos" placeholder="Apellidos"><br /><br /></div>
            <div class="claseContraseña"><span class="etiquetas">Contraseña</span></div>
            <div class="claseInputContraseña"><input class="inputsRegistra" type="password" name="contrasenya" placeholder="Contraseña"><br /><br /></div>
            <div class="claseBoton"><input class="registrarse" type="submit" name="registrar" value="Registrar"></div>
        </form>
</div>
</body>