<?php 

    /*
        - Si la url no especifica ningun controlador (recurso) => asigno uno por defecto => home
        - Si no la url no especifica ingun método => asigno por defecto : index
    */
    class App{
        function __construct(){
            //http://mvc.local/product/show  =>  http://mvc.local/index.php?url=product/show

            if(isset($_GET["url"]) && !empty($_GET["url"])){
                $url = $_GET["url"];
            }
            else{
                $url = "home";
            }

            //  /product/show/5 -> product : recurso  ; show: accion ; 5: parametro
            $arguments = explode('/', trim($url,'/'));

            //cojo el primer elemento del array y lo extraigo
            $controllerName = array_shift($arguments); //product : ProductController (todos los controladores se llamarán así a partir de ahora)

            //convierte el primer caracter de una palabra en mayuscula
            $controllerName = ucwords($controllerName) . "Controller";

            //si el numero de elementos del array es mayor a 0
            if(count($arguments)) {
                $method = array_shift($arguments); //show
            }
            else{
                $method = "index";
            }

            //voy a cargar el controlador. ProductController.php
            $file = "../app/controllers/$controllerName" . ".php";

            //verificar que un fichero existe 
            if(file_exists($file)){

                require_once $file; //importo el fichero si existe
            }
            else{
                http_response_code(404);
                die("No encontrado");
            }

            $controllerName = "\\App\\Controllers\\$controllerName";
            //existe el metodo en el controlador? 
            $controllerObject = new $controllerName; //objeto de la clase ($controllerName)

            if(method_exists($controllerObject,$method)){
                $controllerObject->$method($arguments);  //si existe, llama al metodo con su parametro corrrespondiente
            }
            else{
                http_response_code(404);
                die("No encontrado");
            }


        } //fin construct
        
    } //fin app