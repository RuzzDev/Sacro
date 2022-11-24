<?php 
    
namespace savgym;
    
class Cliente{
    private $config;
    private $cn = null;

    public function __construct(){

        $this->config = parse_ini_file(__DIR__.'/../config.ini') ;

        $this->cn = new \PDO( $this->config['dns'], $this->config['usuario'],$this->config['clave'],array(
            \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        ));
        
    }

    public function registrar($_params){
        $sql = "INSERT INTO `clientes`( `matricula`, `nombre`, `telefono`, `edad`, `foto`) 
        VALUES (:matricula,:nombre,:telefono,:edad,:foto)";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":matricula" => $_params['matricula'],
            ":nombre" => $_params['nombre'],
            ":telefono" => $_params['telefono'],
            ":edad" => $_params['edad'],
            ":foto" => $_params['foto'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function actualizar($_params){
        $sql = "UPDATE `clientes` SET `matricula`=:matricula,`nombre`=:nombre,`telefono`=:telefono,`edad`=:edad,`foto`=:foto  WHERE `id_cliente`=:id_cliente";

        $resultado = $this->cn->prepare($sql);

        $_array = array(
            ":matricula" => $_params['matricula'],
            ":nombre" => $_params['nombre'],
            ":telefono" => $_params['telefono'],
            ":edad" => $_params['edad'],
            ":foto" => $_params['foto'],
            ":id_cliente" => $_params['id_cliente'],
        );

        if($resultado->execute($_array))
            return true;

        return false;
    }

    public function mostrar(){
        $sql = "SELECT * FROM `clientes` ORDER BY `nombre` ASC";

        $resultado = $this->cn->prepare($sql);

        if($resultado->execute())
            return $resultado->fetchAll();

        return false;
    }

    public function mostrarPorId($id_cliente){

        $sql = "SELECT * FROM `clientes` WHERE `id_cliente`=:id_cliente ";
        
        $resultado = $this->cn->prepare($sql);
        $_array = array(
            ":id_cliente" =>  $id_cliente
        );

        if($resultado->execute($_array))
            return $resultado->fetch();

        return false;
    }

}   
?>  