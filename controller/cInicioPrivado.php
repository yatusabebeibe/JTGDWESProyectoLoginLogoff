<?php

/** @author Jesús Temprano Gallego
 *  @since 16/12/2025
 */

if (isset($_REQUEST["logoff"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "inicioPublico";

    // Redirigimos
    header("Location: index.php");
    exit;
}

$titulo = "Inicio Privado";

require_once $vista["layout"];
