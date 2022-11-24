<?php

namespace savgym;

class Deuda
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
    
    public function mostrar()
    {
        $sql = "SELECT * FROM `ventas` WHERE `estado`='credito'";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarDeudas()
    {
        $sql = "SELECT * FROM `ventas` WHERE `estado`='credito'";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function pagar($id_venta)
    {
        $sql = "UPDATE `ventas` SET `estado`='liquidado'  WHERE `id_venta`=:id_venta";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":id_venta" => $id_venta,
        );

        if ($resultado->execute($_array))
            return true;

        return false;
    }
}