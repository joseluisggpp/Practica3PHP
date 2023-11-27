<?php

// Incluir el archivo de funciones
include('funciones-html.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $color = $_POST['color'];
    $columnas = $_POST['columnas'];
    $filas = $_POST['filas'];

    // Construir la tabla
    crearTabla($color, $columnas, $filas);

    // Verificar las opciones marcadas y llamar a las funciones correspondientes
    if (isset($_POST['edad'])) {
        // Crear select de edades
        echo "<label>Edad:</label>";
        echo "<select name='edad'>";
        for ($i = 1; $i <= 120; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select>";
    }

    if (isset($_POST['sexo'])) {
        // Crear radio buttons para sexo
        crearSexo();
    }

    if (isset($_POST['observaciones'])) {
        // Obtener el ancho y filas para las observaciones
        $anchoObservaciones = isset($_POST['anchoObservaciones']) ? $_POST['anchoObservaciones'] : 10;
        $filasObservaciones = isset($_POST['filasObservaciones']) ? $_POST['filasObservaciones'] : 10;

        // Crear campo de texto amplio de observaciones
        crearObservaciones($anchoObservaciones, $filasObservaciones);
    }
}
