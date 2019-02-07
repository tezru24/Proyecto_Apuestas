<?php include 'header.php'; ?>
<body>
    <?php include 'menu.php'; ?>
    <div id="desplegable">
        <p id="inicio">Inicio</p>
        <p id="perfil">Perfil</p>
        <p id="cerrar_sesion">Cerrar Sesión</p>
    </div>
  
     <div id="apuestas">
     <?php include 'consultaEquipos.php'; ?>
    </div>
    <div id="resultados">
        <h1 class="titulo">Últimos Resultados</h1>
        <?php include 'ultimosResultados.php'; ?>
    </div>
    <div id="apuestas_realizadas">
        <h1 class="titulo">Apuestas Realizadas</h1>
        <?php include 'consultaDinero.php'; ?>
    </div>
    <div id="anyadirApuesta">
    <a class='boton_personalizado botonApostar' id="apostar" href='#'>
        Apostar
    </a>
    </div>
</body>
</html>