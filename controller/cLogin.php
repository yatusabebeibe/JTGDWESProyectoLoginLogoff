<?php

/** @author Jesús Temprano Gallego
 *  @since 16/12/2025
 */

require_once __DIR__ . '/../model/UsuarioPDO.php';

// Comprobamos si se ha pulsado el botón 'cancelar'
if (isset($_REQUEST["cancelar"])) {

    $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
    $_SESSION["paginaEnCurso"] = "inicioPublico";

    // Redirigimos
    header("Location: indexLoginLogoff.php");
    exit;
}

$encontrado = false; // Variable que indicará si se ha encontrado el usuario
$aRespuestas = ["usuario"=>"","contraseña"=>""]; // Array para almacenar los datos del usuario
$aErrores = ["login"=>""]; // Array para almacenar el mensaje errores en el login

// Comprobamos si se ha pulsado el botón 'entrar'
if (isset($_REQUEST["entrar"])) {

    $aRespuestas["usuario"] = $_REQUEST["usuario"];
    $aRespuestas["contraseña"] = $_REQUEST["contraseña"];

    $usuarioValido = UsuarioPDO::validarUsuario($aRespuestas["usuario"],$aRespuestas["contraseña"]);

    if ($usuarioValido) {
        $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"] = "inicioPrivado";

        // Redirigimos
        header("Location: indexLoginLogoff.php");
        exit;
    }
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