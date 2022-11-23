<?php   
    namespace App\Controllers;
    use \App\Models\Product;
    class ProductController{
        
        function __construct()
        {
            //echo "<br>Constructor clase PRODUCTCONTROLLER";

        }// fin constructor

        //todos los controladores por defecto tiene que tener un metodo index
        function index(){
            //echo "<br>Dentro index PRODUCTCONTROLLER";
            //metodo home de Controller de mvc00
            $products = Product::all();
            require "../views/product.php";
            // metodo home de Controller de mvc00
        } //fin del metodo index

        function show(){
            //echo "<br>Dentro de show de PRODUCTCONTROLLER";
            //metodo show de Controller de mvc00
            $id= $_GET["id"];
            $product = Product::find($id); //vendra de start.php
            require "../views/show.php";
        } //fin del metodo show

    } //fin clase