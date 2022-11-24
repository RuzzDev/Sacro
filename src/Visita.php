<?php

namespace savgym;
session_start();

class Visita
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
    
    public function registrarVisitaDia()
    {
        // Registra la entrada en la tabla visitas
        $sql = "INSERT INTO `visitas`(`id_cliente`) VALUES (:id_cliente)";        
        $resultado = $this->cn->prepare($sql);
        //Registra la visita en la tabla "ventas"
        $sql1 = "INSERT INTO `ventas`(`id_usuario`, `id_cliente`, `id_producto`, `cantidad`, `total`, `estado`) 
            VALUES (:id_usuario,:id_cliente,:id_producto,:cantidad,:total,:estado)";
        $resultado1 = $this->cn->prepare($sql1);

        $_array = array(
            ":id_cliente" => 1
        );
        $_array1 = array(
            ":id_usuario" => 1,
            ":id_cliente" => $_SESSION['usuario_info']['id_usuario'],
            ":id_producto" => 1,
            ":cantidad" => 1,
            ":total" => 40,
            ":estado" => 'contado'
        );
        $resultado->execute($_array);
        $resultado1->execute($_array1);
        // if ($resultado1->execute($_array))
        //     return true;
        // return false;
    }
}