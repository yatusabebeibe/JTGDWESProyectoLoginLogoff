<?php

/** @author Jesús Temprano Gallego
 *  @since 16/12/2025
 */

if (isset($_REQUEST["logoff"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "inicioPublico";

    // Redirigimos
    header("Location: indexLoginLogoff.php");
    exit;
}
if (isset($_REQUEST["detalle"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "detalle";

    // Redirigimos
    header("Location: indexLoginLogoff.php");
    exit;
}

$titulo = "Inicio Privado";

$usuario = $_SESSION["usuarioDAWJTGProyectoLoginLogoff"];

$nombreUsuario = $usuario->getDescUsuario();
$numConexiones = $usuario->getNumAccesos();
$fechaUltConex = $usuario->getFechaHoraUltimaConexionAnterior() ?? null;

if ($fechaUltConex) {
    $formatter = new IntlDateFormatter(
        'es_ES',
        IntlDateFormatter::LONG,   // Fecha larga
        IntlDateFormatter::SHORT,  // Hora corta
        'Europe/Madrid',           // Zona horaria
        IntlDateFormatter::GREGORIAN,
        "d 'de' MMMM 'de' y 'a las' HH:mm"  // Formato personalizado
    );

    $fechaFormateada = "Usted se conectó por última vez el " . $formatter->format($fechaUltConex);
} else {
    $fechaFormateada = "Usted no se había conectado antes";
}

$avInicioPrivado = [
    "saludo" => "Bienvenido {$nombreUsuario}",
    "nConexiones" => "Esta es la " . $numConexiones . "ª vez que se conecta",
    "fechaUltConex" => $fechaFormateada
];

require_once $vista["layout"];
