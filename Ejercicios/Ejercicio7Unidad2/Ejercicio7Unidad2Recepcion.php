<?php
// Investigar las funciones de fecha de la siguiente https://www.mclibre.org/consultar/php/lecciones/php-fecha-hora.html .
// Crea una función que reciba la fecha y la hora como dos parametros string y devuelva un mensaje con el siguiente formato:
// “Bienvenido [nombre], estás en [primavera/otoño/verano/invierno] quedan xx días para las vacaciones
// de navidad y xxx dias xxx horas para vacaciones de semana santa [del año que viene]. Tu cumpleaños [no] cae en fin de semana y es el día [jueves, 3 de octubre del 22]”
// Siendo la fecha que se introduce en el formulario el cumpleaños del usuario. 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Establecemos el huso horario
    date_default_timezone_set("Europe/Madrid");
    setlocale(LC_TIME, "spanish");

    $fechaCumpleanyos = $_POST['fecha'];
    $horaCumpleanyos = $_POST['hora'];


    // Función para obtener la estación
    function obtenerEstacion($mes)
    {
        // Definir las estaciones según el mes.
        $estaciones = [
            'invierno' => [12, 1, 2],
            'primavera' => [3, 4, 5],
            'verano' => [6, 7, 8],
            'otoño' => [9, 10, 11]
        ];

        // Si el mes pasado como parámetro coincide con uno de los valores del array asociativo(que a su vez, son arrays con el número del mes), devuelve la clave asociada al mes.
        foreach ($estaciones as $estacion => $meses) {
            if (in_array($mes, $meses)) {
                return $estacion;
            }
        }

        return 'desconocida';
    }
    // Función para obtener el mensaje 
    function obtenerMensajeCumpleanyos($fecha, $hora)
    {
        // Obtenemos. los datos de las variables del formulario
        $nombre = $_POST['nombre'];

        $fechaActual = localtime(time(), 1);
        $mesActual = $fechaActual["tm_mon"] + 1;;

        // Convertimos la fecha de la navidad de este año a timestamp para trabajar con ella.
        $fechaNavidadActual = strtotime(date("Y") . "-12-25");
        $timeStampFechaActual = time();
        $fechaActualFormateada = date("Y-m-d H:i:s");

        // Obtenemos la diferencia de días entre la fecha de navidad más cercana y la fecha de hoy.
        //Convertimos a días y le hacemos la función floor para redondear hacia abajo.
        $diasHastaNavidad = floor(($fechaNavidadActual - $timeStampFechaActual) / (60 * 60 * 24));

        // Creo el timestamp para la semana santa usando easter_date
        $timeStampSemanaSanta = easter_date(date("Y"));
        //Creo la fecha para la semana santa.
        $fechaSemanaSanta = date("Y-m-d H:i:s", $timeStampSemanaSanta);
        // Usamos la clase DateTime para crear la fecha de Semana Santa y la actual.
        $fechaSemanaSantaObj = new DateTime($fechaSemanaSanta);
        $fechaActualObj = new DateTime();
        $diferencia = date_diff($fechaSemanaSantaObj, $fechaActualObj);
        $diasHastaSemanaSanta = $diferencia->format("%a");
        $horasHastaSemanaSanta = $diferencia->format("%h");


        $estacion = obtenerEstacion($mesActual);

        // Si el día de la semana del cumpleaños es sábado o domingo, entonces no escribimos nada, sino, escribimos "no".
        $esFinDeSemana = "no";
        $diaDeLaSemanaCumpleanyos = utf8_encode(strftime("%A", strtotime($fecha)));

        if ($diaDeLaSemanaCumpleanyos === "sábado" || $diaDeLaSemanaCumpleanyos === "domingo") {
            $esFinDeSemana = "";
        }

        //Creamos el mensaje
        $mensaje = "Bienvenido {$nombre}, estás en {$estacion}. <br>Quedan {$diasHastaNavidad} días para las vacaciones de navidad
         y {$diasHastaSemanaSanta} dias {$horasHastaSemanaSanta} horas para las vacaciones de semana santa del próximo año.<br>
         Tu cumpleaños {$esFinDeSemana} cae en fin de semana y es el día " . strftime("%A, %d de %B del %Y", strtotime($fecha));
        // Devolvemos el mensaje
        return $mensaje;
    }

    // Obtener el mensaje y mostrarlo
    $mensajeCumpleanyos = obtenerMensajeCumpleanyos($fechaCumpleanyos, $horaCumpleanyos);
    echo $mensajeCumpleanyos;
}
