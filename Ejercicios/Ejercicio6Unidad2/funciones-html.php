<?php

function crearTabla($color, $columnas, $filas)
{
    echo "<table style='background-color: $color;'>";
    for ($i = 0; $i < $filas; $i++) {
        echo "<tr>";
        for ($j = 0; $j < $columnas; $j++) {
            echo "<td>Contenido</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function crearSexo()
{
    echo "<label>Sexo:</label>";
    echo "<input type='radio' name='sexo' value='masculino'>Masculino";
    echo "<input type='radio' name='sexo' value='femenino'>Femenino";
}

function crearObservaciones($ancho = 10, $filas = 10)
{
    echo "<label>Observaciones:</label>";
    echo "<textarea name='observaciones' rows='$filas' cols='$ancho'></textarea>";
}
