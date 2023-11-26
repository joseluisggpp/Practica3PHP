<!-- Realizar un formulario en php que lea un nombre completo de una persona y se llame a sí mismo,
debajo del formulario deberá sacar la cantidad de consonantes que tiene la cadena en cada palabra, así cómo el número de letras.
Realizar dos versiones, una utilizando funciones de cadena y otra sin utilizarlas. Puede existir más de un espacio entre palabras,
 y al principio y final de la cadena.(Investigar trim r y ltrim).
Ejemplo de entrada: Victor Pablo Galvan Florez
salida: Palabra1:4 Consonantes 6 letras, palabra2:3 Consonantes 5 letras, … -->
<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="#" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="" placeholder="Introduzca su nombre completo" style="width: 25%;">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <?php
    /**Si se han enviado datos en el formulario, se ejecuta el código */
    if (isset($_POST["nombre"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        //Almacenamos el nombre separado por espacios en un array.
        $nombre = ($_POST["nombre"]) ? preg_split('/\s+/', $_POST["nombre"]) : [];
        $contador = 1;
        $vocales = "aeiouáéíóúAEIOUÁÉÍÓÚüÜ";
        //Versión con funciones
        foreach ($nombre as $palabra) {
            $numConsonantes = strlen(preg_replace("/[{$vocales}]/u", '', $palabra));
            //Añado la codificación para que los caracteres se procesen internamente bien.
            $numLetras = mb_strlen($palabra, "UTF-8");
            //             Ejemplo de entrada: Victor Pablo Galvan Florez
            // salida: Palabra1:4 Consonantes 6 letras, palabra2:3 Consonantes 5 letras, … -->
            echo "Palabra {$contador}:  {$numConsonantes} Consonantes {$numLetras} letras.</br>";
            $contador++;
        }

        //Versión sin funciones

        $palabraActual = "";
        $contador2 = 1;

        for ($i = 0; $i < count($nombre); $i++) {
            $letra = $nombre[$i];

            if ($letra !== " ") {
                $palabraActual .= $letra;
                //Si se encuentra con un espacio, almacenamos la palabra actual en el array de palabras
                // y contabilizamos sus letras y consonantes. Tras eso, reiniciamos el valor de la palabra actual.
            } else if ($palabraActual !== "") {

                $numLetras = mb_strlen($palabraActual, "UTF-8");
                $numConsonantes = strlen(preg_replace($vocales, '', $palabraActual));
                echo "Palabra {$contador2}: {$numConsonantes} Consonantes {$numLetras} letras.<br>";
                $palabraActual = "";
            }
            $contador2++;
        }

        print_r($nombre);
    }
    ?>
</body>

</html>