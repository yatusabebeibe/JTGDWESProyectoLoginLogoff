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

require_once $vista["layout"];
