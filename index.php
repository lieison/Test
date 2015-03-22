<!DOCTYPE html>
<!--
PLANTEAMIENTO DEL PROBLEMA:

TENEMOS UNA TABLA QUE SE GENERA MEDIANTE PHP 
    ->LA TABLA DEVUELVE DATOS DETERMINADOS EN UN ARREGLO
    ->LOS DATOS VIENEN DE UNA CLASE 
SE NECESITA UNAS FUNCIONES EN JQUERY O JAVASCRIPT EN LA CUAL HAGAN LO SIGUIENTE
    ->EDITAR LOS DATOS
    ->ELIMINAR LOS DATOS
NOTA(:SOLO AHRA UNA EDITAR O ELIMINAR , ELIJA LA QUE QUIERA )

NO SE DEBE ENVIAR PETICION A LA PAGINA , POR ENDE DEBERA USAR AJAX Y OTROS ELEMENTOS DE JQUERY
    -> CUANDO ELIMINE O EDITE DEBE VERSE DESDE EL FRONT-END SIN REFLESCAR LA PAGINA
    ->DEBE DE USAR LOS SCRIPTS Accciones.js (PARA COLOCAR TODO CODIGO JS O JQ)
      Envio.php PARA ENVIAR LAS PETICIONES MEDIANTE EL METODO POST O GET 
    ->LA CLASE Test.php TIENE TODO CON LO QUE TRABAJAR 
        ->SE COMPONE DE UNOS SIMPRES PROCEDIMIENTOS
        ->PARA MAS INFORMACION REVISAR LA CLASE
NO SE PREOCUPE EN UNA FUNCION ESTARA PREDETERMINADA $.AJAX POR SI NO RECUERDA

TIENE 30 MIN.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>PRUEBA PASANTES 2015</title>
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="Acciones.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <body>
        <?php
        
             
             include_once 'Test.php';
             $test = new Test();
             
             if(isset($_REQUEST['reload'])){
                 $test->Destroy();
                 $test = new Test();
             }
             
             $result = $test->GetData();
             
        ?>
        
      <div class="container">
          <h2>TEST LIEISON 2015 &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" href="index.php?reload=true">Reiniciar</a> </h2>                                                                             
      <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
           /*PISTA:
            *   SE PUEDE APRECIAR EN EL FOREACH QUE AL MOMENTO DE AGREGAR
            *   ESTABLECE QUE LOS "TR" SEAN HIJOS DE LA TABLA 
            *   <tr id='child" . (string) $id  . "'>
            *   ESTO PUEDE AYUDAR AL MOMENTO DE EJECUTAR CON JQUERY ALGUNA FUNCION 
            *    $("#child" + id).sentencia("ejemplo"); 
            */
           foreach ($result as $key=>$value):
                $id = $key;
                echo "<tr id='child" . (string) $id  . "'>";
                echo "<td>" . $value['nombre'] . "</td>";
                echo "<td>" . $value['apellido'] . "</td>";
                echo "<td>" . $value['edad'] . "</td>";
                echo "<td>" . $value['estado'] . "</td>";
                echo "<td><button class='btn btn-info' onclick='Edit($id);'><i class='fa fa-pencil'></i></button>";
                echo "<button class='btn btn-danger' onclick='Delete($id);'><i class='fa fa-trash-o'></i></button></td>";
                echo "</tr>";
           endforeach;

          ?>
        </tbody>
      </table>
      </div></div>
    </body>
</html>
