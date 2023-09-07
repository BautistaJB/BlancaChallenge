<?php
      
    $Res = 0;
    $Msg = 'Error al agregar tareas';
     

    include("../mod/funciones.php");

    if (isset($_POST["message"]) && isset($_POST["message"]) != "" && isset($_GET["Category"]) && isset($_GET["Category"]) > 0) {

        $message = $_POST['message'];
        $Categories = $_GET["Category"];

        $arrCategories = explode(",", $Categories);
        
        foreach($arrCategories as $idCategories){
            $sql = 'SELECT a.idCanal, a.idUsuario, c.nombreCanal, d.nombre, b.nombreCategoria 
                FROM subscripciones a
                LEFT JOIN categorias b  ON
                    a.idCategoria = b.idCategoria
                LEFT JOIN canales c ON
                    a.idCanal = c.idCanal
                LEFT JOIN usuarios d ON
                    a.idUsuario = d.idUsuario
                WHERE a.idCategoria = '.$idCategories;         

          $Resultado = Consulta($sql);
          if ($Resultado) {
            while ($row = mysqli_fetch_row($Resultado)) {                            
                    $idCanal            = $row[0];
                    $idUsuario          = $row[1];
                    $nombreCanal        = $row[2];
                    $nombreUsuario      = $row[3];
                    $nombreCategoria    = $row[4];

                    $Res = 1;

                $mensajeEnBicatacora = ("Se envio mensaje por:".$nombreCanal." a ".$nombreUsuario." por la categoria ".$nombreCategoria);

                foreach($idUsuario as $usuario){
                    $sql = 'insert into bitacora (mensaje) values ("'.$mensajeEnBicatacora.'")';

                    Ejecuta($sql);
                }    
            }               
            }else{
             echo "hubo un error";
            }    
        }   
    }

    echo ' {
        "Resultado":'.$Res.',
        "Mensaje":"'.$Msg.'"
    }';