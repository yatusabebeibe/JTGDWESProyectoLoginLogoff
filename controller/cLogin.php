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

$titulo = "Login";

require_once $vista["layout"];