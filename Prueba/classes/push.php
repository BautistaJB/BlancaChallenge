<?php

include_once("../mod/funciones.php");  
class Push{

    public static function enviarPush($mensaje, $idUsuario, $nombreCategoria){
       $usuario = Usuario::obtenerUsuarioPorId($idUsuario);
       $logRegistro = "Se envio notificacion a ".$usuario->obtenerNombre()." de categoria". $nombreCategoria.": ".$mensaje;
        
       $sql = 'insert into bitacora (mensaje) values ("'.$logRegistro.'")';

      return Ejecuta($sql);

    }
}