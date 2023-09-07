<?php

include("../mod/funciones.php");  
class Email{

    public static function enviarEmail($mensaje, $idUsuario, $nombreCategoria){
       $usuario = Usuario::obtenerUsuarioPorId($idUsuario);
       $logRegistro = "Se envio Email a ".$usuario->obtenerNombre()." de categoria". $nombreCategoria." al correo".$usuario->obtenerCorreo().": ".$mensaje;
        
       $sql = 'insert into bitacora (mensaje) values ("'.$logRegistro.'")';

      return Ejecuta($sql);

    }
}