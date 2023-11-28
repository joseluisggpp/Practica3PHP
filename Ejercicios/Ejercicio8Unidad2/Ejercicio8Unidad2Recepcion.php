<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Página resultante</title>
</head>

<body>
    <!--Crear un formulario que tenga un campo de texto. En el irán codificados los menús superiores e inferiores de la web.
Dependiendo de los valores, en la página destino aparecerá un menú superior y otro inferior con dichas opciones. 
El menú deberá tener una apariencia aceptable con estilo bootstrap última versión.

Ejemplo de codificacion 
S3-CONTACTO-NEGRO-http://www.miweb.com/contacto
S1-INICIO-AZUL-http://www.miweb.com/inicio
S2-CATALOGO-AZUL-http://www.google.es
I1-CATEGORIAS-AZUL-http://www.google.es  
[S-Menu superior/I-Menu inferior][orden del menu]-[nombre menu]-[Color Letra]-[url destino]


También tendrá un grid de checkbox de 4x4, a partir de la máxima anchura y altura en la que haya un checkbox marcado,
creará una tabla en el html final con esa altura y anchura, con el fondo de color distinto en las posiciones con checkbox marcados.
El grid de checkbox se deberá generar con php dinamicamente.-->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


        $codificacion = $_POST['codificacion'];
        $grid = isset($_POST['grid']) ? $_POST['grid'] : [];

        // Función para generar menú
        function generarMenu($codificacion, $tipo)
        {
            $menuItems = explode('|', $codificacion);
            $menu = "<nav class='navbar navbar-expand-lg navbar-light bg-light'>";
            $menu .= "<div class='container-fluid'>";
            $menu .= "<div class='collapse navbar-collapse' id='navbarNav'>";
            $menu .= "<ul class='navbar-nav'>";
            // foreach para asignar los valores de la codificación
            foreach ($menuItems as $item) {
                // Buscar el primer guion (-) y dividir la cadena en consecuencia
                $posicionGuion = strpos($item, '-');
                if ($posicionGuion !== false) {
                    $tipoMenu = substr($item, 0, $posicionGuion - 1);
                    echo $tipoMenu;
                    $orden = substr($item, 0, $posicionGuion);
                    $resto = substr($item, $posicionGuion + 1);
                    list($nombre, $color, $url) = explode('-', $resto, 4);

                    // Resto del código para generar el menú
                    if ($tipoMenu == $tipo) {
                        $menu .= "<li class='nav-item'>";
                        $menu .= "<a class='nav-link' style='color: $color;' href='$url'>$nombre</a>";
                        $menu .= "</li>";
                    }
                } else {
                    // Manejar el caso en el que no se encuentra el guion
                    echo "Error: El formato del menú es incorrecto.";
                }
            }
            $menu .= "</ul>";
            $menu .= "</div>";
            $menu .= "</div>";
            $menu .= "</nav>";
            return $menu;
        }




        // Generar menús superior e inferior
        echo generarMenu($codificacion, 'S');
        echo "<br><br>";
        echo generarMenu($codificacion, 'I');

        // Generar tabla según las selecciones del grid
        $altura = 1;
        $anchura = 1;

        foreach ($grid as $checkbox) {
            list(, $fila, $columna) = explode('_', $checkbox);
            $altura = max($altura, $fila + 1);
            $anchura = max($anchura, $columna + 1);
        }


        echo "<br><br>";
        echo "<table class='table table-bordered'>";
        for ($i = 0; $i < $altura; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $anchura; $j++) {
                $posicion = "checkbox_" . $i . "_" . $j;
                $colorFondo = in_array($posicion, $grid) ? 'lightgray' : 'white';
                echo "<td style='background-color: $colorFondo;'>$posicion</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
</body>

</html>