<?php

/**El programa debe tener una función que reciba el texto y debe de devolver
 un array asociativo con las claves “nprimos”, “media” y “mínimo”
 asociados a los valores respectivos.
 La función tendrá un segundo parámetro opcional denominado $orden, si es cierto el 
 array resultante primero devolverá “nprimos”, “media” y “mínimo”,
 si es falso será el orden contrario, si no se introduce el valor de $orden, por defecto será cierto.

 Deberá mostrarlos en una tabla, con labels que pongan las claves y sus respectivos valores.
 Realizar 2 versiones de la función, en uno utilizando funciones para realizar el cálculo (explode, max, min)
  y otro sin utilizar ninguna función. */
if (isset($_POST["numeros"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $numeros = $_POST["numeros"];
}
