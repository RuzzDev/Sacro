<?php

namespace savgym;

class Usuario
{

    private $config;
    private $cn = null;

    public function __construct()
    {

        $this->config = parse_ini_file(__DIR__ . '/../config.ini');

        $this->cn = new \PDO($this->config['dns'], $this->config['usuario'], $this->config['clave'], array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
    }

    // funciones de inicio de sesión
    public function login($matricula, $clave)
    {
        $sql = "SELECT * FROM `usuarios` WHERE matricula = :matricula AND clave = :clave ";
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":matricula" => $matricula,
            ":clave" => $clave
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();
        return false;
    }

    public function mostrarPorId($matricula, $clave)
    {
        $sql = "SELECT * FROM `usuarios` WHERE matricula = :matricula AND clave = :clave ";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":matricula" => $matricula,
            ":clave" => $clave
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    // funciones crud
    public function registrar($_params)
    {
        $sql = "INSERT INTO `usuarios`( `nombre`, `matricula`, `clave`, `cargo`) 
        VALUES (:nombre,:matricula,:clave,:cargo)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":matricula" => $_params['matricula'],
            ":clave" => $_params['clave'],
            ":cargo" => $_params['cargo'],
        );

        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `usuarios` SET `nombre`=:nombre,`matricula`=:matricula,`clave`=:clave,`cargo`=:cargo WHERE `id_usuario`=:id_usuario";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":matricula" => $_params['matricula'],
            ":clave" => $_params['clave'],
            ":cargo" => $_params['cargo'],
            ":id_usuario" => $_params['id_usuario'],
        );

        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function darDeBaja($id_usuario)
    {
        $sql = "UPDATE `usuarios` SET `estado`= 'BAJA' WHERE `id_usuario`=:id_usuario";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_usuario" => $id_usuario
        );
        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function darDeAlta($id_usuario)
    {
        $sql = "UPDATE `usuarios` SET `estado`= 'ALTA' WHERE `id_usuario`=:id_usuario";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_usuario" => $id_usuario
        );
        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar()
    {
        $sql = "SELECT * FROM `usuarios` ORDER BY `nombre` ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }


    public function mostrarPorIdUsuario($id_usuario)
    {
        $sql = "SELECT * FROM `usuarios` WHERE id_usuario = :id_usuario";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_usuario" => $id_usuario
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }
}
