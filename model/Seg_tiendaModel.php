<?php
include_once "../core/ModeloBasePDO.php";

class Seg_tiendaModel extends ModeloBasePDO{
    public function __construct(){
        parent::__construct();
    }
    public function findall(){
        $sql="SELECT `codigo_ropa`, `tipo`, `talla`, `precio`, `stock`, `marca`, `proveedor`, `color`
        FROM `tienda_ropa`";
        $param=array();
        return parent::gselect($sql,$param);
    }
    public function findid($p_codigo_ropa){
        $sql="SELECT `codigo_ropa`, `tipo`, `talla`, `precio`, `stock`, `marca`, `proveedor`, `color`
        FROM `tienda_ropa`
        WHERE codigo_ropa=:p_codigo_ropa;";
        $param=array();
        array_push($param,[':p_codigo_ropa',$p_codigo_ropa,PDO::PARAM_STR]);
        return parent::gselect($sql,$param);
    }
    public function findpaginateall($p_filtro,$p_limit,$p_offset){
        $sql="SELECT `codigo_ropa`, `tipo`, `talla`, `precio`, `stock`, `marca`, `proveedor`, `color`
        FROM `tienda_ropa`
        WHERE upper(concat(IFNULL(codigo_ropa,''),IFNULL(tipo,''),IFNULL(talla,''),IFNULL(precio,''),IFNULL(stock,''),IFNULL(marca,''),IFNULL(proveedor,''),IFNULL(color,'')))
        LIKE concat('%',upper(IFNULL(:p_filtro,'')),'%')
        LIMIT :p_limit
        OFFSET :p_offset;";
        $param=array();
        array_push($param,[':p_filtro',$p_filtro,PDO::PARAM_STR]);
        array_push($param,[':p_limit',$p_limit,PDO::PARAM_INT]);
        array_push($param,[':p_offset',$p_offset,PDO::PARAM_INT]);
        $var=parent::gselect($sql,$param);

        $sqlcount="SELECT count(1) as cant
        FROM `tienda_ropa`
        WHERE upper(concat(IFNULL(codigo_ropa,''),IFNULL(tipo,''),IFNULL(talla,''),IFNULL(precio,''),IFNULL(stock,''),IFNULL(marca,''),IFNULL(proveedor,''),IFNULL(color,'')))
        LIKE concat('%',upper(IFNULL(:p_filtro,'')),'%');";
        $param=array();
        array_push($param,[':p_filtro',$p_filtro,PDO::PARAM_STR]);
        $var1=parent::gselect($sqlcount,$param);
        $var['LENGTH']=$var1 ['DATA'][0]['cant'];
        return $var;
    }
    public function insert($p_codigo_ropa, $p_tipo, $p_talla, $p_precio, $p_stock, $p_marca, $p_proveedor, $p_color){
        $sql="INSERT INTO `tienda_ropa`(`codigo_ropa`, `tipo`, `talla`, `precio`, `stock`, `marca`, `proveedor`, `color`) VALUES (:p_codigo_ropa, :p_tipo, :p_talla, :p_precio, :p_stock, :p_marca, :p_proveedor, :p_color)";    
        $param=array();
        array_push($param,[':p_codigo_ropa',$p_codigo_ropa,PDO::PARAM_STR]);
        array_push($param,[':p_tipo',$p_tipo,PDO::PARAM_STR]);
        array_push($param,[':p_talla',$p_talla,PDO::PARAM_STR]);
        array_push($param,[':p_precio',$p_precio,PDO::PARAM_INT]);
        array_push($param,[':p_stock',$p_stock,PDO::PARAM_INT]);
        array_push($param,[':p_marca',$p_marca,PDO::PARAM_STR]);
        array_push($param,[':p_proveedor',$p_proveedor,PDO::PARAM_STR]);
        array_push($param,[':p_color',$p_color,PDO::PARAM_STR]);
        return parent::ginsert($sql,$param);
    }
    public function update($p_codigo_ropa, $p_tipo, $p_talla, $p_precio, $p_stock, $p_marca, $p_proveedor, $p_color){
        $sql="UPDATE `tienda_ropa` SET
        `codigo_ropa`=:p_codigo_ropa,
        `tipo`=:p_tipo,
        `talla`=:p_talla,
        `precio`=:p_precio,
        `stock`=:p_stock,
        `marca`=:p_marca,
        `proveedor`=:p_proveedor,
        `color`=:p_color
        WHERE codigo_ropa=:p_codigo_ropa";
        $param=array();
        array_push($param,[':p_codigo_ropa',$p_codigo_ropa,PDO::PARAM_STR]);
        array_push($param,[':p_tipo',$p_tipo,PDO::PARAM_STR]);
        array_push($param,[':p_talla',$p_talla,PDO::PARAM_STR]);
        array_push($param,[':p_precio',$p_precio,PDO::PARAM_INT]);
        array_push($param,[':p_stock',$p_stock,PDO::PARAM_INT]);
        array_push($param,[':p_marca',$p_marca,PDO::PARAM_STR]);
        array_push($param,[':p_proveedor',$p_proveedor,PDO::PARAM_STR]);
        array_push($param,[':p_color',$p_color,PDO::PARAM_STR]);
        return parent::gupdate($sql,$param);
    }
    public function delete($p_codigo_ropa){
        $sql="DELETE FROM `tienda_ropa` WHERE codigo_ropa=:p_codigo_ropa;";
        $param=array();
        array_push($param,[':p_codigo_ropa',$p_codigo_ropa,PDO::PARAM_STR]);
        return parent::gdelete($sql,$param);
    }
}
?>