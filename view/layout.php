<?php

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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Steam Inspirado - Inicio</title>
    <link rel="stylesheet" href="./webroot/style.css">
</head>
<body>
    <header>
        <div class="logo">Steam</div>
        <h1 class="titulo"><?= $titulo ?></h1>
        <div class="header-actions">
            <form id="idiomas" method="post" class="idiomas">
                <input type="radio" name="idioma" id="ES" value="ES" <?=  $_COOKIE["idioma"]=="ES" ? "checked" : "" ?>>
                <label for="ES"><img src="./webroot/images/flags/ES.png" alt="Español"></label>

                <input type="radio" name="idioma" id="EN" value="EN" <?=  $_COOKIE["idioma"]=="EN" ? "checked" : "" ?>>
                <label for="EN"><img src="./webroot/images/flags/EN.png" alt="Inglés"></label>

                <input type="radio" name="idioma" id="JP" value="JP" <?=  $_COOKIE["idioma"]=="JP" ? "checked" : "" ?>>
                <label for="JP"><img src="./webroot/images/flags/JP.png" alt="Japonés"></label>
            </form>
            <form id="login" action="" method="post">
                <input type="submit" value="Iniciar sesión" name="login">
            </form>
        </div>
    </header>

    <main>
        <?php require_once $vista[$_SESSION["paginaEnCurso"]]; ?>
    </main>

    <footer>
        <a href="https://github.com/yatusabebeibe/JTGDWESProyectoLoginLogoff/" target="_blank">
            <img src="./webroot/images/github.svg">
        </a>
        <p><a href="../../" target="_self">Jesús Temprano Gallego</a> | <a href="https://store.steampowered.com/" target="_blank">Pagina imitada</a> | 16/12/2025</p>
    </footer>
</body>
</html>