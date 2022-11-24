<?php

namespace savgym;

class Reporte
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


    public function mostrarVentasPorUsuario($id_usuario)
    {
        $sql = "SELECT * FROM `ventas` WHERE `id_usuario`=:id_usuario";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_usuario" =>  $id_usuario
        );

        if ($resultado->execute($_array))
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarVentasPorRangoDeFecha($fecha_inicio,$fecha_fin)
    {
        // $sql = "SELECT * FROM `ventas` WHERE `fecha_venta` >= '2016-10-01' AND `fecha_venta` <= '2022-11-01' "; 
        $sql = "SELECT * FROM `ventas` WHERE `fecha_venta` >= :fecha_inicio AND `fecha_venta` <= :fecha_fin "; 

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":fecha_inicio" =>  $fecha_inicio,
            ":fecha_fin" =>  $fecha_fin,
        );

        if ($resultado->execute($_array))
            return $resultado->fetchAll();

        return false;
    }

}
?>