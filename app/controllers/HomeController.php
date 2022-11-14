<?php   
    class HomeController{
        
        function __construct()
        {
            echo "<br>Constructor clase PRODUCTCONTROLLER";

        }// fin constructor

        //todos los controladores por defecto tiene que tener un metodo index
        function index(){
            echo "<br>Dentro index PRODUCTCONTROLLER";
            // metodo home de Controller de mvc00
        } //fin del metodo index

        function show(){
            echo "<br>Dentro de show de PRODUCTCONTROLLER";
        } //fin del metodo show

    } //fin clase