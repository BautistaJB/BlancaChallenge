<?php

// Funcion que realiza una consulta a la BD y devuelve un arreglo con el resultado de la consulta
function Consulta($sql) {
    $FnRes = array();
    include ("conexion.php");
    if ($Conectado) {
        $FnRes = mysqli_query($cnxn,$sql);
        mysqli_close($cnxn);
    }
    return $FnRes;
}

// Funcion que ejecuta un query y devuelve un valor boolean confirmando o no su ejecucion
function Ejecuta($sql) {
    $ResQuery = false;
    include ("conexion.php");
    if ($Conectado) {
        if ($cnxn->query($sql) === TRUE) { $ResQuery = true; }
        mysqli_close($cnxn);
    }
    return $ResQuery;
}
