<?php
    //echo "<h2>Contenido PRIVADO</h2>";
    // /recurso/accion/parametro
        //recurso : controlador
        // accion : metodos del controlador . controlador -> show()
        // parametros : posibles parametros . find -> id de producto.
    require_once "../Controller.php";

    $app = new Controller(); 
    //defino variable de peticion en la url 
    if(isset($_GET["method"])){
        $app->$_GET["method"]; //show, find, create...
        $app->method();
    }