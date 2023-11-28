<!-- Crear un formulario que tenga un campo de texto. En el irán codificados los menús superiores e inferiores de la web.
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
El grid de checkbox se deberá generar con php dinamicamente. -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ejercicio 8</title>
</head>

<body>
    <form action="Ejercicio8Unidad2Recepcion.php" method="post">
        <div class="mb-3">
            <label for="codificacion">Código de menús:</label>
            <input type="text" name="codificacion" id="codificacion" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="grid">Selecciona las opciones del grid:</label>
            <?php
            // Generar dinámicamente el grid de checkboxes 4x4
            for ($i = 0; $i < 4; $i++) {
                for ($j = 0; $j < 4; $j++) {
                    $checkboxId = "checkbox_" . $i . "_" . $j;
                    echo "<input type='checkbox' name='grid[]' id='$checkboxId' value='$checkboxId'>";
                    echo "<label for='$checkboxId'></label>";
                }
                echo "<br>";
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>

</html>