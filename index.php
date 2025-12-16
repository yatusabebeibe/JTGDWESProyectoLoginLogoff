<?php

require_once("./config/confAPP.php");
require_once("./config/confDB.php");

session_start();

if (empty($_SESSION["paginaEnCurso"])) {
    $_SESSION["paginaEnCurso"] = "inicioPublico";
}

require_once($controlador[$_SESSION["paginaEnCurso"]]);