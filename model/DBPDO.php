<?php

/**
 * @author Jesús Temprano Gallego
 * @since 18/12/2025
 *
 * Clase para gestionar consultas a la base de datos usando PDO.
 */
class DBPDO {
    /**
     * Ejecuta una consulta SQL preparada con parámetros.
     *
     * @param string $sentenciaSQL La sentencia SQL a ejecutar.
     * @param array $parametros Array con los parámetros para la sentencia SQL.
     * @return PDOStatement|false Devuelve el objeto PDOStatement si la ejecución es correcta, o false si hay error.
     */
    public static function ejecutarConsulta(string $sentenciaSQL, array $parametros) {
        try {
            $miDB = new PDO(DSN, DBUser, DBPass);

            $consulta = $miDB->prepare($sentenciaSQL);

            $consulta->execute($parametros);

            return $consulta;

        } catch (PDOException $error) {
            return false;
        }
    }
}