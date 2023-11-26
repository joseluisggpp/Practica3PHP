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

function tablaNumeros($numeros, $orden = true)
{

    $nprimos = calculoPrimos($numeros);
    $media = calculoMedia($numeros);
    $minimo = calculoMinimo($numeros);

    $resultado = [
        "nprimos" => $nprimos,
        "media" => $media,
        "minimo" => $minimo
    ];
    //Si $orden pasado como parámetro es false, se invierte el orden del array asociativo:
    if (!$orden) {
        $resultado = array_reverse($resultado);
    }

    return $resultado;
}
function calculoPrimos($array)
{
    //Le pasamos como Callback la función que verifica si el elemento del array pasado como parámetro es primo.
    return count(array_filter($array, "esPrimo"));
}
function esPrimo($num)
{
    if ($num > 1) {
        // Verificar si el número es divisible por algún número menor que él
        for ($i = 2; $i < $num; $i++) {
            if ($num % $i == 0) {
                return false; // No es primo
            }
        }
        return true; // Es primo
    } else {
        return false; // No es primo, porque $num es 1 o menor.
    }
}

function calculoMedia($array)
{
    return count($array) > 0 ? array_sum($array) / count($array) : 0;
}
function calculoMinimo($array)
{
    return count($array) > 0 ? min($array) : 0;
}
if (isset($_POST["numeros"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $numerosString = $_POST["numeros"];

    // Eliminar espacios al principio y al final de la cadena
    $numerosString = trim($numerosString);

    // Dividir la cadena en un array usando espacios
    $numerosArray = preg_split('/\s+/', $numerosString);

    // Filtrar elementos vacíos del array
    $numerosArray = array_filter($numerosArray);


    //Devuelve false si está marcado, sino , true(el orden del array
    //asociativo se invertirá dependiendo del valor de $orden).
    $orden = isset($_POST["orden"]) ? false : true;

    $resultado = tablaNumeros($numerosArray, $orden);
    // Mostrar los resultados en una tabla
    echo '<table border="1">';
    echo '<tr><th>Clave</th><th>Valor</th></tr>';
    foreach ($resultado as $clave => $valor) {
        echo "<tr><td>{$clave}</td><td>{$valor}</td></tr>";
    }
    echo '</table>';
}
