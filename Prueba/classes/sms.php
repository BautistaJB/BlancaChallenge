<?php

include("../mod/funciones.php");  
class Sms{

    public static function enviarSMS($mensaje, $idUsuario, $nombreCategoria){
       $usuario = Usuario::obtenerUsuarioPorId($idUsuario);
       $logRegistro = "Se envio SMS a ".$usuario->obtenerNombre()." de categoria". $nombreCategoria." al numero ".$usuario->obtenerTelefono().": ".$mensaje;
        
       $sql = 'insert into bitacora (mensaje) values ("'.$logRegistro.'")';

      return Ejecuta($sql);

    }
}