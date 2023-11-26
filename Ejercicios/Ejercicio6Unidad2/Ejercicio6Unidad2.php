<!-- Realizar un programa que lea de un formulario los datos de las columnas, filas, color de fondo, de letra para una tabla.
Tambien tres checkbox, edad, sexo y observaciones. Debe llamar a una página php que construya una tabla con esas características. 
Si esta marcado edad se creara además de la tabla un select de selección de edad de 1 a 120 generado en php,
si se marca sexo un radio con las dos opciones y si se marca Observaciones un campo de texto amplio de observaciones.
Para hacer el contenido, se utilizarán funciones, crearTabla(color,columnas,filas), crearSexo(), crearObservaciones(ancho, filas).
Para el ancho y filas de las observaciones se puede utilizar el de la tabla o nuevos campos select. Por defecto para el textarea de observaciones,
los campos tendrán unos valores predefinidos de 10x10 si no se meten valores.

Las funciones deberán estar en un fichero denominado funciones-html.php y deberá incluirse en la pagina web que cree la página final.
	
No se podrá utilizar la etiqueta style ni css dentro del propio fichero. -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ejercicio 5</title>
</head>

<body>
    <form action="Ejercicio6Unidad2Recepcion.php" method="post">
        <label for="numeros">Ingrese una serie de números separados por espacios:</label>
        <input type="text" name="numeros" id="numeros" required>
        <button type="submit">Enviar</button>
    </form>
</body>

</html>