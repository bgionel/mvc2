
<?php

session_start(); 
if(!isset($_SESSION["loginok"])){
    header("Location: login.php");
}

//var_dump($_SESSION)
echo "<h2>Bienvenido usuario</h1>" . $_SESSION["loginok"]["nombreusu"];
echo "<h2>El valor de tu rol es: </h2>" . $_SESSION["loginok"]["rol"];
echo "<br><br>";
echo "<a href=\"logout.php\">Cerrar Sesion</a>";