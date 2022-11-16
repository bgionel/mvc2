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


     echo "<h2> Direccionamiento Relativo </h2>";
     echo "<br> Radio de la galaxia:" . RADIO; //como es constante no va con $
     observar("Vía Láctea.");
     $gl = new Galaxia();
     Galaxia::muerte();