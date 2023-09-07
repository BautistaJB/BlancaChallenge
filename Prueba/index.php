<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Notifications</title>
        <link rel="stylesheet" href="css/styles.css"/>
        
    </head>
    <body>
        <!-- Contenedor principal de la aplicacion -->
        <div class="ContenedorPrincipal">
            <!--Primer contenedor del Grid -->
            <div class="Encabezado">
                <table cellspacing=0 cellpadding=0 class="TblEncabezado">
                    <tr>
                        <td style="width:64%; text-align: left;">
                            <label class="Titulo">Notification System</label>
                            <label class="SubTitulo">Blanca Ruiz</label>
                        </td>
                    </tr>
                </table>
            </div>
            <!--Segundo contenedor del Grid -->
            
            <div class="AreaLista">

                <div class="Formulario">
                    <form action="" method="POST" id="formCategories" style="height: 100%;">
                        <table cellpadding=0 cellspacing=0 style="height: 100%; width:100%">
                            <tr>
                                <td>
                                    <input type="checkbox" id="sports" name="sports" value="1">
                                    <label id="sportslbl" name="sportslbl" for="sports" style="cursor:pointer;">Sports</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="finance" name="finance" value="2">
                                    <label id="financelbl" name="financelbl" for="finance" style="cursor:pointer;">Finance</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" id="movie" name="movie" value="3">
                                    <label id="movielbl" name="movielbl" for="movie" style="cursor:pointer;">Movies</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" style="width:100%;" id="message" name="message" autocomplete="off">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button id="sendForm" style="margin-left: 40%;">Send</button>
                                </td>
                            </tr>
                        </table>
                    </form>       
                </div>

                <div class="ListaTareas" id="LogList">

                </div>

            </div>
            <!--Tercer contenedor del Grid -->
            <div class="Footer">
            </div>
        </div>

        <!-- Contendor de Bloqueo para procesos -->
        <div class="bgBloqueo" id="Bloqueo">
            <img src="res/spinner.gif">
        </div>



        <!-- Archivo de recursos Javascript -->
        <script src="js/notificaciones.js"></script>
    </body>
</html>