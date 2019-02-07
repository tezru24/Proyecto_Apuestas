<?php include 'header.php'; ?>
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
        <div class="loginPrincipal">
            <form action="consulta.php" method="POST">
                Usuario:
                <input class="rellenar" type="text" name="usuario" placeholder="Nombre de usuario">
                Contraseña:
                <input class="rellenar" type="password" name="contrasenya" placeholder="Contraseña">
                <input class="boton" type="submit" name="enviar" value="Enviar">
            </form>
        </div>
    </div>
    <div class="cuerpo">
        <img id="logo" src="img/logoPrincipal.png" width="400px" height="400px" >
    </div>
</body>
</html>