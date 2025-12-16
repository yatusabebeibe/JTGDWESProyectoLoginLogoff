<?php

/** @author Jesús Temprano Gallego
 *  @since 16/12/2025
 */

if (isset($_REQUEST["login"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "login";

    // Redirigimos
    header("Location: index.php");
    exit;
}

$titulo = "Inicio Publico";

require_once $vista["layout"];
