<?php

/**
 * @author Jesús Temprano Gallego
 * @since 15/01/2026
 */

if(isset($_REQUEST['volver'])){

    // Limpiamos el error de la sesión
    unset($_SESSION['error']);

    // Si se pulsa le damos el valor de la página solicitada a la variable $_SESSION.
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    header('Location: indexLoginLogoff.php');
    exit;
}

$avError = [
    'codError' => '',
    'descError' => '',
    'archivoError' => '',
    'lineaError' => '',
    'paginaSiguiente' => ''
];
// Si existe un error en la sesión, lo recogemos y lo almacenamos en un array para pasarlo a la vista
if (isset($_SESSION['error'])) {
    $oError = $_SESSION['error'];
    $avError = [
        'codError' => $oError->getCodError(),
        'descError' => $oError->getDescError(),
        'archivoError' => $oError->getArchivoError(),
        'lineaError' => $oError->getLineaError(),
        'paginaSiguiente' => $oError->getPaginaSiguiente()
    ];
}

$titulo = "Error {$avError['codError']}";

require_once $vista['layout'];