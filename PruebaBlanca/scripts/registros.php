<?php

    include("../mod/funciones.php");

    $Lista  = "Sin Resultados";

        $sql = 'select mensaje, fecha from bitacora';
        $Resultado = Consulta($sql);
        if ($Resultado) {
            $Lista  = '<table cellspacing=0 cellpadding=0>';
            while ($row = mysqli_fetch_row($Resultado)) {
                    $mensaje = $row[0];
                    $fecha = $row[1];
                $Lista = $Lista.'
                    <tr>
                        <td style="width:70%; text-align: center;">
                            '.$messaje.'
                        </td>
                        <td style="width:30%;">
                            '.$fecha.'
                        </td>
                    </tr>';
            }
            $Lista = $Lista.'</table>';
        }

        echo ' {
            "Resultado":'.$Res.',
            "Mensaje":"'.$Msg.'",
            "Lista":'.json_encode($Lista).'
        }';

