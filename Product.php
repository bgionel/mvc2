<?php
    // fichero que simula el modelo con datos
    class Product{
        const PRODUCTS = [
            array(1,'Cortacesped'),
            array(1,'Pizarra'),
            array(1,'Billar'),
            array(1,'Dardos')
        ];
    function __construct(){ /*cons vacio*/ }
    public static function all(){
        return Product::PRODUCTS;
    }
    public function find($id){
        return Product::PRODUCTS[$id-1];
    }
    } //fin clase