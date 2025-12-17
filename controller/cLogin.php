<?php

/** @author Jesús Temprano Gallego
 *  @since 16/12/2025
 */

// Comprobamos si se ha pulsado el botón 'cancelar'
if (isset($_REQUEST["cancelar"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "inicioPublico";

    // Redirigimos
    header("Location: index.php");
    exit;
}
// Comprobamos si se ha pulsado el botón 'entrar'
if (isset($_REQUEST["entrar"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "inicioPrivado";

    // Redirigimos
    header("Location: index.php");
    exit;
}

// Comprobamos si se ha enviado un idioma por formulario
if (!empty($_REQUEST["idioma"])) {

    // Creamos la cookie 'idioma' con el valor enviado y duración de 1 hora
    setcookie("idioma", $_REQUEST["idioma"], time() + 60*60);

    // Recargamos la página principal para aplicar el cambio de idioma
    header("Location: .");
    exit;
}

// Si no existe la cookie de idioma
if (empty($_COOKIE["idioma"])) {

    // la creamos con valor por defecto 'ES'
    setcookie("idioma", "ES", time() + 60*60);

    // Recargamos la página para que la cookie esté disponible
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

$titulo = "Login";

require_once $vista["layout"];