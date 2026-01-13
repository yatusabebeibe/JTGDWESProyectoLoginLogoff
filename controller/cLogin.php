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

    $usuario = UsuarioPDO::validarUsuario($aRespuestas["usuario"],$aRespuestas["contraseña"]);

    if ($usuario) {
        $_SESSION["usuarioDAWJTGProyectoLoginLogoff"] = $usuario;
        UsuarioPDO::actualizarUltimaConexion($usuario->getCodUsuario(), new DateTime());
        $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"] = "inicioPrivado";

        // Redirigimos
        header("Location: indexLoginLogoff.php");
        exit;
    }
}

$titulo = "Login";

require_once $vista["layout"];