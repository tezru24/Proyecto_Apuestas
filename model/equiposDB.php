<?php

    require_once 'database.php';

    function consultarPartidosADisputar(){
        $conn = connection();

        $consultaEquipos = "SELECT Local.Nombre as nombreLocal, Visitante.Nombre as nombreVisitante, IDpartidos 
        FROM Partidos 
        LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
        LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
        WHERE Fecha > Now()";

        $result3 = $conn->query($consultaEquipos);
        
        return $result3;
    }
    function eliminarApuestaPendiente(){
        $conn = connection();

        $idApuesta = $_POST['idApuesta'];

        $eliminar = "DELETE FROM Apuestas WHERE IDapuesta = '$idApuesta'";
        $result = $conn->query($eliminar);
    }
    function updatePendiente($id_Usuario){
        $conn = connection();

        $update = "UPDATE `Apuestas` SET `Pendiente` = '0' WHERE IDusuario='$id_Usuario'";
        $result3 = $conn->query($update);
    }
    function consultarPagadasSegunUsuario($id_Usuario){
        $conn = connection();

        $SelectApuestas = "SELECT  * FROM Apuestas WHERE IDusuario='$id_Usuario' && Pendiente = '0'";
        $result4 = $conn->query($SelectApuestas);

        return $result4;
    }
    function consultarEquiposApuestasPagadas(){
        $conn = connection();

        $consultaEquipos = "SELECT Local.Nombre as nombreLocal, Visitante.Nombre as nombreVisitante 
        FROM Apuestas
        LEFT JOIN Partidos ON Partidos.IDpartidos = Apuestas.IDpartidos 
        LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
        LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
        WHERE Apuestas.Pendiente = '0'";
        
        $result2 = $conn->query($consultaEquipos);

        return $result2;
    }
    function consultarDineroGanado($id_Usuario){
        $conn = connection();

        $consultaDineroGanado = "SELECT SUM(Dinero_Ganado) FROM `Apuestas` WHERE IDusuario='$id_Usuario' ";
        $resultDineros = $conn->query($consultaDineroGanado);

        return $resultDineros;
    }
    function consultarPartidosPasados(){
        $conn = connection();

        $consultaEquipos = "SELECT Local.Nombre as nombreLocal, GolesLocal, GolesVisitante, Visitante.Nombre as nombreVisitante 
        FROM Partidos 
        LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
        LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
        WHERE Fecha < Now()";

        $result3 = $conn->query($consultaEquipos);
        return $result3;
    }
    function insertarTablaApuestas($idPartido,$id_Usuario,$cash,$apuesta,$dineroTotal){
        $conn = connection();
        
        $insertarTabla = "INSERT INTO Apuestas (IDpartidos,IDusuario,Cantidad_Dinero,1X2,Dinero_Ganado,Pendiente) VALUES ('$idPartido','$id_Usuario','$cash','$apuesta','$dineroTotal','1')";
        $result1 = $conn->query($insertarTabla);
    }
    function consultarApuestasPendientes($id_Usuario){
        $conn = connection();
        
        $SelectApuestas = "SELECT  * FROM Apuestas WHERE IDusuario='$id_Usuario' && Pendiente = '1'";
        $result5 = $conn->query($SelectApuestas);

        return $result5;
    }
    function consultarIDapuestasPendientes(){
        $conn = connection();

        $ultimaApuesta = "SELECT IDapuesta FROM Apuestas WHERE Pendiente = '1'";
        $result7 = $conn->query($ultimaApuesta);

        return $result7;
    }
    function consultarEquiposApuestasPendientes(){
        $conn = connection();

        $consultaEquipos = "SELECT Local.Nombre as nombreLocal, Visitante.Nombre as nombreVisitante 
        FROM Apuestas
        LEFT JOIN Partidos ON Partidos.IDpartidos = Apuestas.IDpartidos 
        LEFT JOIN Equipos AS Local ON Local.IDequipos = Partidos.IDlocal 
        LEFT JOIN Equipos AS Visitante ON Visitante.IDequipos = Partidos.IDvisitante 
        WHERE Apuestas.Pendiente = '1'";
        
        $result3 = $conn->query($consultaEquipos);

        return $result3;
    }
    function consultarGananciaTotal($id_Usuario){
        $conn = connection();

        $consultaDinero = "SELECT SUM(Dinero_Ganado) FROM Apuestas WHERE IDusuario = '$id_Usuario' && Pendiente = '1'";
        $result6 = $conn->query($consultaDinero);

        return $result6;
    }

?>