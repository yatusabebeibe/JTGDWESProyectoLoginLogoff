<?php

/**
 * @author Jesús Temprano Gallego
 * @since 15/01/2026
 */


if(isset($_REQUEST['volver'])){
    // Si se pulsa le damos el valor de la página solicitada a la variable $_SESSION.
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexLoginLogoff.php');
    exit;
}

$titulo = "Work In Progress";

require_once $vista['layout'];