<?php
    //echo "<h2>Contenido PRIVADO</h2>";
    // /recurso/accion/parametro
        //recurso : controlador
        // accion : metodos del controlador . controlador -> show()
        // parametros : posibles parametros . find -> id de producto.
    require_once "../Controller.php";

    $app = new Controller(); 
    //defino variable de peticion en la url 


    // 1- recoger el metodo que pasan como parametro y si no especifican ninguno 
    // cargar el metodo home
    if(isset($_GET["method"])){
        $app->$_GET["method"]; //show, find, create...
        $app->$method();
    }

    // 2- verificar que el metodo introducido existe
    if(method_exists($app, $method)){
        $app->$method();
    } else {
        http_response_code(404);
        die("Metodo no encontrado"); //acaba la ejecucion del programa y muestra un mensaje
    }