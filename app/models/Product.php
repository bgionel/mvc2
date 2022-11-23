<?php
    namespace App\Models;
    // fichero que simula el modelo con datos
    use PDO;
    use Core\Model;
    class Product{
        const PRODUCTS = [
            array(1,'Cortacesped'),
            array(2,'Pizarra'),
            array(3,'Billar'),
            array(4,'Dardos')
        ];
        function __construct(){ /*cons vacio*/ }
        public static function all(){
            return Product::PRODUCTS;
        }
        public static function find($id){
            return Product::PRODUCTS[$id-1];
        }
    } //fin clase