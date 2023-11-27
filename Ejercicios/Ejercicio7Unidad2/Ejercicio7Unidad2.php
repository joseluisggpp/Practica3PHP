<!-- Crear un formulario que lea los datos del cumpleaños de una persona, con un campo nombre, otro fecha ,
 otro de hora (utilizando los campos de html5) y un botón.
-->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ejercicio 7</title>
</head>

<body>
    <form action="Ejercicio7Unidad2Recepcion.php" method="post">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div>
            <label for="fecha">Fecha de cumpleaños:</label>
            <input type="date" name="fecha" id="fecha" required>
        </div>
        <div>
            <label for="hora">Hora de cumpleaños:</label>
            <input type="time" name="hora" id="hora" required>
        </div>
        <div>
            <button type="submit">Enviar</button>
        </div>
    </form>
</body>

</html>