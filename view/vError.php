<div class="hero-text">
    <h1>Ha habido un error inesperado</h1>
    <br>
    <h2>Código de error: <?= $avError['codError'] ?></h2>
    <h3>Descripción del error: <?= $avError['descError'] ?></h3>
    <h3>Archivo donde se ha producido el error: <?= $avError['archivoError'] ?></h3>
    <h3>Línea del archivo donde se ha producido el error: <?= $avError['lineaError'] ?></h3>
    <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
        <div><input type="submit" value="Volver" name="volver"></div>
    </form>
</div>