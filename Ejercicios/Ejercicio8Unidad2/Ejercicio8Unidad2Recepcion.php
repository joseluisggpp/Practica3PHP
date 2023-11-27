<!-- Ejercicio8Unidad2Recepcion.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Resultado del Ejercicio 8</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener el código de menús y el grid seleccionado
        $codificacion = $_POST['codificacion'];
        $grid = isset($_POST['grid']) ? $_POST['grid'] : [];

        // Procesar la codificación de menús
        // ... (implementa la lógica para procesar la codificación y generar los menús)

        // Generar la tabla según las opciones del grid
        $maxWidth = 0;
        $maxHeight = 0;

        foreach ($grid as $checkboxId) {
            list($row, $col) = explode("_", substr($checkboxId, 8));

            $maxWidth = max($maxWidth, $col + 1);
            $maxHeight = max($maxHeight, $row + 1);
        }

        echo "<h2>Menú superior</h2>";
        // ... (imprimir el menú superior)

        // Generar la tabla con el fondo de color distinto en las posiciones con checkbox marcados
        echo "<table class='table table-bordered'>";
        for ($i = 0; $i < $maxHeight; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $maxWidth; $j++) {
                $cellId = "cell_" . $i . "_" . $j;
                $backgroundColor = in_array($cellId, $grid) ? "background-color: #3498db;" : "";
                echo "<td id='$cellId' style='$backgroundColor'>Contenido</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>Menú inferior</h2>";
        // ... (imprimir el menú inferior)
    }
    ?>
</body>

</html>