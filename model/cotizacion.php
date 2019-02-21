<?php
function ganancia($apuesta,$cash){

    $dineroTotal=0;

    if($apuesta == "X"){
        $dineroTotal = $cash*4;
    }
    else if($apuesta == "1"){
        $dineroTotal = $cash*2;
    }
    if($apuesta == "2"){
        $dineroTotal = $cash*3;
    }

    return $dineroTotal;

}



?>