<?php

namespace savgym;

class Producto
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

    // CRUD TABLA PRODUCTOS
    public function registrar($_params)
    {
        $sql = "INSERT INTO `productos`(`foto`, `nombre`, `precio_compra`, `precio_venta`, `stock`) 
        VALUES (:foto,:nombre,:precio_compra,:precio_venta,:stock)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":precio_compra" => $_params['precio_compra'],
            ":precio_venta" => $_params['precio_venta'],
            ":stock" => $_params['stock'],
            ":foto" => $_params['foto'],
        );

        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params)
    {
        $sql = "UPDATE `productos` SET `foto`=:foto,`nombre`=:nombre,`precio_compra`=:precio_compra,`precio_venta`=:precio_venta,`stock`=:stock  WHERE `id_producto`=:id_producto";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":nombre" => $_params['nombre'],
            ":precio_compra" => $_params['precio_compra'],
            ":precio_venta" => $_params['precio_venta'],
            ":stock" => $_params['stock'],
            ":foto" => $_params['foto'],
            ":id_producto" => $_params['id_producto'],
        );

        if ($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar()
    {
        $sql = "SELECT * FROM `productos` WHERE `tipo`='producto' ORDER BY `nombre` ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id_producto)
    {

        $sql = "SELECT * FROM `productos` WHERE `id_producto`=:id_producto ";

        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_producto" =>  $id_producto
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    // MEMBRESÍAS Y ASISTENCIAS
    public function mostrarMembresia()
    {
        $sql = "SELECT * FROM `productos` WHERE `tipo`='plan' ORDER BY `precio_venta` ASC";

        $resultado = $this->cn->prepare($sql);

        if ($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarMembresiaPorId($id_producto)
    {
        $sql = "SELECT * FROM `productos` WHERE `id_producto`=:id_producto" ;
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_producto" =>  $id_producto
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    public function asignarMembresia($_params, $_params1)
    {
        //Modifica los datos de la suscripción en la tabla "cliente"
        $sql = "UPDATE `clientes` SET `fecha_renovacion`=:fecha_renovacion, `plan_contratado`=:plan_contratado WHERE `id_cliente`=:id_cliente";
        $resultado = $this->cn->prepare($sql);
        //Registra la venta de la membresía en la tabla "ventas" para contemplarla como un ingreso 
        $sql1 = "INSERT INTO `ventas`(`id_usuario`, `id_cliente`, `id_producto`, `cantidad`, `total`, `estado`) 
            VALUES (:id_usuario,:id_cliente,:id_producto,:cantidad,:total,:estado)";
        $resultado1 = $this->cn->prepare($sql1);

        $_array_venta_membresia = array(
            ":id_usuario" => $_params1['id_usuario'],
            ":id_cliente" => $_params1['id_cliente'],
            ":id_producto" => $_params1['id_producto'],
            ":cantidad" => $_params1['cantidad'],
            ":total" => $_params1['total'],
            ":estado" => $_params1['estado'],
        );
        $_array_actualizar_membresia = array(
            ":id_cliente" => $_params['id_cliente'],
            ":fecha_renovacion" => $_params['fecha_renovacion'],
            ":plan_contratado" => $_params['plan_contratado']
        );
        $resultado->execute($_array_actualizar_membresia);
        $resultado1->execute($_array_venta_membresia);
    }

    public function registrarVisita($id_cliente)
    {
        $sql = "INSERT INTO `visitas`(`id_cliente`) VALUES (:id_cliente)";        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_cliente" =>  $id_cliente
        );

        if ($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

    

    // REGISTRO DE VENTAS DE VENTA 
    public function realizarVenta($_params, $_params1)
    {
        //Descuenta la cantidad vendida a las existencias en la tabla "productos"
        $sql = "UPDATE `productos` SET `stock`=:nueva_existencia WHERE `id_producto`=:id_producto";
        $resultado = $this->cn->prepare($sql);
        //Registra la venta en la tabla "ventas"
        $sql1 = "INSERT INTO `ventas`(`id_usuario`, `id_cliente`, `id_producto`, `cantidad`, `total`, `estado`) 
            VALUES (:id_usuario,:id_cliente,:id_producto,:cantidad,:total,:estado)";
        $resultado1 = $this->cn->prepare($sql1);

        $_array_vender = array(
            ":id_usuario" => $_params1['id_usuario'],
            ":id_cliente" => $_params1['id_cliente'],
            ":id_producto" => $_params1['id_producto'],
            ":cantidad" => $_params1['cantidad'],
            ":total" => $_params1['total'],
            ":estado" => $_params1['estado'],
        );
        $_array_actualizar = array(
            ":id_producto" => $_params['id_producto'],
            ":nueva_existencia" => $_params['nueva_existencia']
        );
        $resultado->execute($_array_actualizar);
        $resultado1->execute($_array_vender);
        // if ($resultado1->execute($_array))
        //     return true;
        // return false;

    }
}
