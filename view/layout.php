<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/svg+xml" href="./webroot/images/logo.svg">
    <title>Jesús Temprano Gallego - <?= $titulo ?></title>
    <link rel="stylesheet" href="./webroot/css/style.css">
    <?php if ($_SESSION["paginaEnCurso"] === "login"): ?>
    <link rel="stylesheet" href="./webroot/css/login.css">
    <?php endif; ?>
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
            <?php if ( $_SESSION["paginaEnCurso"] != "login" ): ?>
            <form id="login" action="" method="post">
                <?php if ( $_SESSION["paginaEnCurso"] == "inicioPublico" ): ?>
                <input type="submit" value="Iniciar sesión" name="login">
                <?php else: ?>
                <input type="submit" value="Cerrar sesión" name="logoff">
                <?php endif; ?>
            </form>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <?php require_once $vista[$_SESSION["paginaEnCurso"]]; ?>
    </main>

    <footer>
        <a href="https://github.com/yatusabebeibe/JTGDWESProyectoLoginLogoff/" target="_blank">
            <img src="./webroot/images/github.svg" style="filter: invert(1);">
        </a>
        <p><a href="../../" target="_self">Jesús Temprano Gallego</a> | <a href="https://store.steampowered.com/" target="_blank">Pagina imitada</a> | 16/12/2025</p>
    </footer>
</body>
</html>