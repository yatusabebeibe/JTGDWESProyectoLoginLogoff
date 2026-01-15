<?php

/** @author Jesús Temprano Gallego
 *  @since 16/12/2025
 */

if (isset($_REQUEST["logoff"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "inicioPublico";
    unset($_SESSION["usuarioDAWJTGProyectoLoginLogoff"]);

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
if (isset($_REQUEST["departamentos"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "wip";

    // Redirigimos
    header("Location: indexLoginLogoff.php");
    exit;
}
if (isset($_REQUEST["error"])) {
    if (! DBPDO::ejecutarConsulta("SELECT * FROM x")) {
        $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"] = "error";

        // Redirigimos
        header("Location: indexLoginLogoff.php");
        exit;
    }
}

$titulo = "Inicio Privado";

$usuario = $_SESSION["usuarioDAWJTGProyectoLoginLogoff"];

$nombreUsuario = $usuario->getDescUsuario();
$numConexiones = $usuario->getNumAccesos();
$fechaUltConex = $usuario->getFechaHoraUltimaConexionAnterior() ?? null;

$idiomas = ['ES' => 'es_ES', 'EN' => 'en_US', 'JP' => 'ja_JP'];

$traducciones = [
    'ES' => [
        'saludo' => 'Bienvenido',
        'nConexiones' => 'Esta es la %ª vez que se conecta',
        'noConectado' => 'Usted no se había conectado antes',
        'fechaUltConex' => 'Usted se conectó por última vez el %',
        'timezone' => 'Europe/Madrid',
        'formatoFecha' => "d 'de' MMMM 'de' y 'a las' HH:mm"
    ],
    'EN' => [
        'saludo' => 'Welcome',
        'nConexiones' => 'This is your % time logging in',
        'noConectado' => "You haven't logged in before",
        'fechaUltConex' => 'Your last login was on %',
        'timezone' => 'Europe/London',
        'formatoFecha' => "MMMM d, y 'at' HH:mm"
    ],
    'JP' => [
        'saludo' => 'ようこそ',
        'nConexiones' => 'これは%回目のログインです',
        'noConectado' => '以前にログインしていません',
        'fechaUltConex' => '最後のログインは%です',
        'timezone' => 'Asia/Tokyo',
        'formatoFecha' => "y年M月d日 HH:mm"
    ]
];

// Idioma desde la cookie con default
$idioma = $_COOKIE["idioma"] ?? 'ES';
$locale = $idiomas[$idioma] ?? $idiomas['ES'];

$formatter = new IntlDateFormatter(
    $locale,
    IntlDateFormatter::LONG,
    IntlDateFormatter::SHORT,
    $traducciones[$idioma]['timezone'],
    IntlDateFormatter::GREGORIAN,
    $traducciones[$idioma]['formatoFecha']
);

$fechaUltConexTexto = $fechaUltConex
    ? str_replace('%', $formatter->format($fechaUltConex), $traducciones[$idioma]['fechaUltConex'])
    : $traducciones[$idioma]['noConectado'];

$avInicioPrivado = [
    'saludo' => "{$traducciones[$idioma]['saludo']} {$nombreUsuario}",
    'nConexiones' => str_replace('%', $numConexiones, $traducciones[$idioma]['nConexiones']),
    'fechaUltConex' => $fechaUltConexTexto
];

require_once $vista["layout"];
