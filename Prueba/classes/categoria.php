<?php

//include("../mod/funciones.php");  

include ("sms.php");

$idCategoria = 0;
$mensaje = "";

$Res = 0;

if (isset($_POST["message"]) && isset($_POST["message"]) != "" && isset($_GET["Category"]) && isset($_GET["Category"]) > 0) {
  
  $mensaje = $_POST['message'];
  $Categorias = $_GET["Category"];

  $arrCategorias = explode(",", $Categorias);
  
  class Categoria{
     
    public static function mandarSubscriptores($mensaje, $arrCategorias){

      foreach($arrCategorias as $idCategoria){
        $sql = 'SELECT a.idCanal, a.idUsuario, c.nombreCanal, d.nombre, b.nombreCategoria 
                FROM subscripciones a
                LEFT JOIN categorias b  ON
                    a.idCategoria = b.idCategoria
                LEFT JOIN canales c ON
                    a.idCanal = c.idCanal
                LEFT JOIN usuarios d ON
                    a.idUsuario = d.idUsuario
                WHERE a.idCategoria = '.$idCategoria;         

          $Resultado = Consulta($sql);
          $suscripciones = [];
        
          if ($Resultado) {
              while ($row = mysqli_fetch_row($Resultado)) {            
                  $suscripciones[] = [                  
                    'idCanal'            => $row[0],
                    'idUsuario'          => $row[1],
                    'nombreCanal'        => $row[2],
                    'nombreUsuario'      => $row[3],
                    'nombreCategoria'    => $row[4],
                  ];
              }    
              foreach ($suscripciones as $suscripcion) {
                if ($suscripcion['idCanal'] == 1) {
                  Sms::enviarSMS($mensaje, $suscripcion['idCanal'], $suscripcion['nombreCategoria']);
                } elseif ($suscripcion['idCanal'] == 2) {
                  Email::enviarEmail($mensaje, $suscripcion['idCanal'], $suscripcion['nombreCategoria']);
                } elseif ($suscripcion['idCanal'] == 3) {
                  Push::enviarPush($mensaje, $suscripcion['idCanal'], $suscripcion['nombreCategoria']);
                }
              }        	
          }
      }	 
    }
}

  //categoria::mandarSubscriptores(1, 'Mensaje de prueba ' . date('Y-m-d H:i:s'));

  $Res = 1;
  echo '{"Resultado": '.$Res.'  
        }';

}else{
  echo "No se envio nada";
}
