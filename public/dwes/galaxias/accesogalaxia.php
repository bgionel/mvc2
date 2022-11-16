<?php

    namespace Dwes\Galaxias;

    echo "<br> Namespace actual: " . __NAMESPACE__; //como es constante no va con $

    /*
     * Direccionamiento namespace:
     * 1 - Sin direccionamiento
     * 2 - Con direccionamiento relativo
     * 3 - Direccionamiento absoluto
     */

     include "galaxia1.php";

     echo "<h2> Sin direccionamiento </h2>";

     echo "<br> Radio de la galaxia:" . RADIO; //como es constante no va con $
     observar("Vía Láctea.");
     $gl = new Galaxia();
     Galaxia::muerte();

     echo "<h2>Direccionamiento Relativo </h2>";
     include "pegaso/pegaso.php";

     echo "<br> Radio de la galaxia:" . Pegaso\RADIO; 
     Pegaso\observar("Pegaso.");
     $gl = new Pegaso\Galaxia();
     Pegaso\Galaxia::muerte();

     echo "<h2> Direccionamiento Absoluto </h2>";
     //navego a partir de mi ubicacion ACTUAL.
     echo "<br> Radio de la galaxia:" . \Dwes\Galaxias\Pegaso\RADIO; //como es constante no va con $
     $gl = new \Dwes\Galaxias\Pegaso\Galaxia();
     \Dwes\Galaxias\Pegaso\Galaxia::muerte();

     use const \Dwes\Galaxias\RADIO;
     use function \Dwes\Galaxias\observar;
     use \Dwes\Galaxias\Galaxia; //el mejor

     echo "<br> el radio es:" . RADIO;
     echo "<br> el radio es:" . observar("Otra galaxia");
     echo "<br> objeto de galaxia generico:" . new Galaxia(); // el mejor

     echo "<br><br>";
     use \Dwes\Galaxias\Pegaso\Galaxia as Seiya;
     use \Dwes\Galaxias\Galaxia as Galaxus;

     echo "<br><br>";
     $pg = new Seiya();
     $glc = new Galaxus();

    // Seiya\observar("Observando a Seiya");
     //Galaxus\observar("Observando a Galaxus");

