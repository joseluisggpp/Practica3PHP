<!-- Realizar un programa que lea de un formulario una serie de números de cualquier
     longitud en un campo único de texto, separados por espacios.  -->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Ejercicio 5</title>
</head>

<body>
  <form action="Ejercicio5Unidad2Recepcion.php" method="post">
    <label for="numeros">Ingrese una serie de números separados por espacios:</label>
    <input type="text" name="numeros" id="numeros" required>

    <label for="orden">Invertir orden:</label>
    <input type="checkbox" name="orden" id="orden">

    <button type="submit">Enviar</button>
  </form>
</body>

</html>