<?php   
    class HomeController{
        
        function __construct()
        {
            echo "<br>Constructor clase HOMECONTROLLER";

        }// fin constructor

        //todos los controladores por defecto tiene que tener un metodo index
        function index(){
            echo "<br>Dentro index HOMECONTROLLER";
            require "../app/views/home.php";
            // metodo home de Controller de mvc00
        } //fin del metodo index

        function home(){
            echo "<br>Dentro de show de HOMECONTROLLER";
        } //fin del metodo show

    } //fin clase