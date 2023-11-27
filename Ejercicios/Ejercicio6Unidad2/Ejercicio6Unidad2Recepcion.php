<?php

// Incluir el archivo de funciones
include('funciones-html.php');
// Implemento Bootstrap
echo "<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color = $_POST['color'];
    $columnas = $_POST['columnas'];
    $filas = $_POST['filas'];

    // Construir la tabla
    crearTabla($color, $columnas, $filas);

    // Comprobar las opciones marcadas en el checkbox de Edad 
    if (isset($_POST['edad'])) {
        // Crear select de edades
        echo "<label>Edad:</label>";
        echo "<select name='edad'>";
        for ($i = 1; $i <= 120; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select><br>";
    }
    // Comprobar las opciones marcadas en el checkbox de Sexo
    if (isset($_POST['sexo'])) {
        // Crear radio buttons para sexo
        crearSexo();
    }
    echo "<br>";

    // Comprobar las opciones marcadas en el checkbox de Sexo
    if (isset($_POST['observaciones'])) {
        // Obtener el ancho y filas para las observaciones
        $anchoObservaciones = isset($_POST['anchoObservaciones']) ? $_POST['anchoObservaciones'] : 10;
        $filasObservaciones = isset($_POST['filasObservaciones']) ? $_POST['filasObservaciones'] : 10;

        // Crear campo de texto amplio de observaciones
        crearObservaciones($anchoObservaciones, $filasObservaciones);
    }
}
