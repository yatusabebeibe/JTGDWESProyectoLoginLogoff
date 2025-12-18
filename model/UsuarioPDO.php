<?php

/**
 * @author Jesús Temprano Gallego
 * @since 18/12/2025
 *
 * Clase que gestiona operaciones sobre usuarios en la base de datos usando PDO.
 */
class UsuarioPDO {

    /**
     * Valida un usuario comprobando su código y contraseña en la base de datos.
     *
     * @param string $codUsuario Código del usuario a validar.
     * @param string $passwd Contraseña del usuario.
     * @return array|null Devuelve los datos del usuario si son correctos, o null si no existen.
     */
    public static function validarUsuario(string $codUsuario, string $passwd) {
        $consulta = <<<CONSULTA
        SELECT * FROM T01_Usuario
        WHERE
            T01_CodUsuario = :usuario
            AND
            T01_Password = SHA2(:contrasenia, 256);
        CONSULTA;

        $parametros = [
            ":usuario" => $codUsuario ?? "",
            ":contrasenia" => $codUsuario.$passwd ?? ""
        ];

        return DBPDO::ejecutarConsulta($consulta,$parametros);
    }

    // public static function x() {}
}
