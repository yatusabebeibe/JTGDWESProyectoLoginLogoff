<?php

/**
 * @author Jesús Temprano Gallego
 * @since 18/12/2025
 *
 * Clase que representa un error en la aplicación.
 */
class AppError {
    private string $codError;
    private string $descError;
    private string $archivoError;
    private int $lineaError;
    private string $paginaSiguiente;

    /**
     * Constructor de la clase AppError.
     *
     * @param string $codError Código del error.
     * @param string $descError Descripción del error.
     * @param string $archivoError Archivo donde ocurrió el error.
     * @param int $lineaError Línea donde ocurrió el error.
     * @param string $paginaSiguiente Página a la que se redirige después del error.
     */
    public function __construct(string $codError, string $descError, string $archivoError, int $lineaError, string $paginaSiguiente) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
        $this->paginaSiguiente = $paginaSiguiente;
    }
}
