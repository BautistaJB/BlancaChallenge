<?php

include("../mod/funciones.php");

class Usuario {
  
  private $id;
  private $nombre;
  private $correo;
  private $telefono;
  
	public function __construct($id, $nombre, $correo, $telefono)
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->correo = $correo;
    $this->telefono = $telefono;    
  }
  
  public static function obtenerUsuarioPorId($id){
  

    $usuario = 'select nombre, correo, telefono from usuarios where IdUsuario ='.$id;

    $Resultado = Consulta($usuario);
    if ($Resultado) {
        while ($row = mysqli_fetch_row($Resultado)) {
            $nombre     = $row[0];
            $correo     = $row[1];
            $telefono   = $row[2];
        }
        return  new Usuario($id, $nombre, $correo, $telefono);
    }

  }
  public function obtenerId()
  {
    return $this->id;
  }
  public function obtenerNombre()
  {
    return $this->nombre;
  }
  public function obtenerCorreo()
  {
    return $this->correo;
  }
  public function obtenerTelefono()
  {
    return $this->telefono;
  }

}

$usuario = Usuario::obtenerUsuarioPorId(1);

echo $usuario->obtenerNombre();

