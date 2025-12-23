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
     * @return bool Devuelve si el usuario es valido o no.
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

        $datos = DBPDO::ejecutarConsulta($consulta,$parametros);

        $usuario = null;
        if ($datos->rowCount() >= 1) {
            $datos = $datos->fetchObject();
            $usuario = new Usuario(
                $datos->{aColumnasUsuario["Codigo"]},
                $datos->{aColumnasUsuario["Password"]},
                $datos->{aColumnasUsuario["Descripcion"]},
                $datos->{aColumnasUsuario["NumConexiones"]} + 1,
                $datos->{aColumnasUsuario["UltimaConexion"]} ? new DateTime($datos->{aColumnasUsuario["UltimaConexion"]}) : null,
                new DateTime(),
                $datos->{aColumnasUsuario["Perfil"]}
            );

            // Guardamos el usuario en la sesión
            $_SESSION["usuarioDAWJTGProyectoLoginLogoffTema5"] = $usuario;
        }

        return isset($usuario);
    }

    public static function actualizarUltimaConexion(string $codUsuario, DateTime $fecha) {
        $consulta = <<<CONSULTA
        UPDATE T01_Usuario
        SET
            T01_FechaHoraUltimaConexion = :fecha,
            T01_NumConexiones = T01_NumConexiones + 1
        WHERE T01_CodUsuario = :usuario ;
        CONSULTA;

        $parametros = [
            ":usuario" => $codUsuario ?? "",
            ":fecha" => $fecha
        ];

        $actualizacion = DBPDO::ejecutarConsulta($consulta, $parametros);

        return ($actualizacion && $actualizacion->rowCount() > 0) ? true : false ;
    }

    // public static function x() {}
}
