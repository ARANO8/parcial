<?php
include_once "../core/ModeloBasePDO.php";

class Seg_gimnasioModel extends ModeloBasePDO{
    public function __construct(){
        parent::__construct();
    }
    public function findall(){
        $sql="SELECT `codigo_clase`, `nombre_clase`, `descripcion`, `duracion`, `instructor`, `dias_semana`, `horario`, `ubicacion`, `nivel`, `equipamiento`, `cupo`, `frecuencia`, `intensidad`, `tipo_clase`, `observaciones`
        FROM `clases_gimnasio`";
        $param=array();
        return parent::gselect($sql,$param);
    }
    public function findid($p_codigo_clase){
        $sql="SELECT `codigo_clase`, `nombre_clase`, `descripcion`, `duracion`, `instructor`, `dias_semana`, `horario`, `ubicacion`, `nivel`, `equipamiento`, `cupo`, `frecuencia`, `intensidad`, `tipo_clase`, `observaciones`
        FROM `clases_gimnasio`
        WHERE codigo_clase=:p_codigo_clase;";
        $param=array();
        array_push($param,[':p_codigo_clase',$p_codigo_clase,PDO::PARAM_STR]);
        return parent::gselect($sql,$param);
    }
    public function findpaginateall($p_filtro,$p_limit,$p_offset){
        $sql="SELECT `codigo_clase`, `nombre_clase`, `descripcion`, `duracion`, `instructor`, `dias_semana`, `horario`, `ubicacion`, `nivel`, `equipamiento`, `cupo`, `frecuencia`, `intensidad`, `tipo_clase`, `observaciones`FROM `clases_gimnasio`
        WHERE upper(concat(IFNULL(codigo_clase,''),IFNULL(nombre_clase,''),IFNULL(descripcion,''),IFNULL(duracion,''),IFNULL(instructor,''),IFNULL(dias_semana,''),IFNULL(horario,''),IFNULL(ubicacion,''),IFNULL(nivel,''),IFNULL(equipamiento,''),IFNULL(cupo,''),IFNULL(frecuencia,''),IFNULL(intensidad,''),IFNULL(tipo_clase,''),IFNULL(observaciones,'')))
        LIKE concat('%',upper(IFNULL(:p_filtro,'')),'%')
        LIMIT :p_limit
        OFFSET :p_offset;";
        $param=array();
        array_push($param,[':p_filtro',$p_filtro,PDO::PARAM_STR]);
        array_push($param,[':p_limit',$p_limit,PDO::PARAM_INT]);
        array_push($param,[':p_offset',$p_offset,PDO::PARAM_INT]);
        $var=parent::gselect($sql,$param);

        $sqlcount="SELECT count(1) as cant
        FROM `clases_gimnasio`
        WHERE upper(concat(IFNULL(codigo_clase,''),IFNULL(nombre_clase,''),IFNULL(descripcion,''),IFNULL(duracion,''),IFNULL(instructor,''),IFNULL(dias_semana,''),IFNULL(horario,''),IFNULL(ubicacion,''),IFNULL(nivel,''),IFNULL(equipamiento,''),IFNULL(cupo,''),IFNULL(frecuencia,''),IFNULL(intensidad,''),IFNULL(tipo_clase,''),IFNULL(observaciones,'')))
        LIKE concat('%',upper(IFNULL(:p_filtro,'')),'%');";
        $param=array();
        array_push($param,[':p_filtro',$p_filtro,PDO::PARAM_STR]);
        $var1=parent::gselect($sqlcount,$param);
        $var['LENGTH']=$var1 ['DATA'][0]['cant'];
        return $var;
    }
    public function insert($p_codigo_clase,$p_nombre_clase, $p_descripcion, $p_duracion, $p_instructor, $p_dias_semana, $p_horario, $p_ubicacion, $p_nivel, $p_equipamiento, $p_cupo, $p_frecuencia, $p_intensidad, $p_tipo_clase, $p_observaciones){
        $sql="INSERT INTO `clases_gimnasio`(`codigo_clase`, `nombre_clase`, `descripcion`, `duracion`, `instructor`, `dias_semana`, `horario`, `ubicacion` , `nivel`, `equipamiento`, `cupo`, `frecuencia`, `intensidad`, `tipo_clase`, `observaciones`)
        VALUES (:p_codigo_clase, :p_nombre_clase, :p_descripcion, :p_duracion, :p_instructor, :p_dias_semana, :p_horario, :p_ubicacion , :p_nivel, :p_equipamiento, :p_cupo, :p_frecuencia, :p_intensidad, :p_tipo_clase, :p_observaciones)";    
        
        $param=array();
        array_push($param,[':p_codigo_clase',$p_codigo_clase,PDO::PARAM_STR]);
        array_push($param,[':p_nombre_clase',$p_nombre_clase,PDO::PARAM_STR]);
        array_push($param,[':p_descripcion',$p_descripcion,PDO::PARAM_STR]);
        array_push($param,[':p_duracion',$p_duracion,PDO::PARAM_STR]);
        array_push($param,[':p_instructor',$p_instructor,PDO::PARAM_STR]);
        array_push($param,[':p_dias_semana',$p_dias_semana,PDO::PARAM_STR]);
        array_push($param,[':p_horario',$p_horario,PDO::PARAM_STR]);
        array_push($param,[':p_ubicacion',$p_ubicacion,PDO::PARAM_STR]);
        array_push($param,[':p_nivel',$p_nivel,PDO::PARAM_STR]);
        array_push($param,[':p_equipamiento',$p_equipamiento,PDO::PARAM_STR]);
        array_push($param,[':p_cupo',$p_cupo,PDO::PARAM_INT]);
        array_push($param,[':p_frecuencia',$p_frecuencia,PDO::PARAM_STR]);
        array_push($param,[':p_intensidad',$p_intensidad,PDO::PARAM_STR]);
        array_push($param,[':p_tipo_clase',$p_tipo_clase,PDO::PARAM_STR]);
        array_push($param,[':p_observaciones',$p_observaciones,PDO::PARAM_STR]);

        return parent::ginsert($sql,$param);
    }
    public function update($p_codigo_clase, $p_nombre_clase, $p_descripcion, $p_duracion, $p_instructor, $p_dias_semana, $p_horario, $p_ubicacion, $p_nivel, $p_equipamiento, $p_cupo, $p_frecuencia, $p_intensidad, $p_tipo_clase, $p_observaciones){
        $sql="UPDATE `clases_gimnasio` SET
        `nombre_clase`=:p_nombre_clase,
        `descripcion`=:p_descripcion,
        `duracion`=:p_duracion,
        `instructor`=:p_instructor,
        `dias_semana`=:p_dias_semana,
        `horario`=:p_horario,
        `ubicacion`=:p_ubicacion,
        `nivel`=:p_nivel,
        `equipamiento`=:p_equipamiento,
        `cupo`=:p_cupo,
        `frecuencia`=:p_frecuencia,
        `intensidad`=:p_intensidad,
        `tipo_clase`=:p_tipo_clase,
        `observaciones`=:p_observaciones
        WHERE codigo_clase=:p_codigo_clase";
        $param=array();
        array_push($param,[':p_codigo_clase',$p_codigo_clase,PDO::PARAM_STR]);
        array_push($param,[':p_nombre_clase',$p_nombre_clase,PDO::PARAM_STR]);
        array_push($param,[':p_descripcion',$p_descripcion,PDO::PARAM_STR]);
        array_push($param,[':p_duracion',$p_duracion,PDO::PARAM_STR]);
        array_push($param,[':p_instructor',$p_instructor,PDO::PARAM_STR]);
        array_push($param,[':p_dias_semana',$p_dias_semana,PDO::PARAM_STR]);
        array_push($param,[':p_horario',$p_horario,PDO::PARAM_STR]);
        array_push($param,[':p_ubicacion',$p_ubicacion,PDO::PARAM_STR]);
        array_push($param,[':p_nivel',$p_nivel,PDO::PARAM_STR]);
        array_push($param,[':p_equipamiento',$p_equipamiento,PDO::PARAM_STR]);
        array_push($param,[':p_cupo',$p_cupo,PDO::PARAM_INT]);
        array_push($param,[':p_frecuencia',$p_frecuencia,PDO::PARAM_STR]);
        array_push($param,[':p_intensidad',$p_intensidad,PDO::PARAM_STR]);
        array_push($param,[':p_tipo_clase',$p_tipo_clase,PDO::PARAM_STR]);
        array_push($param,[':p_observaciones',$p_observaciones,PDO::PARAM_STR]);
        return parent::gupdate($sql,$param);
    }
    public function delete($p_codigo_clase){
        $sql="DELETE FROM `clases_gimnasio` WHERE codigo_clase=:p_codigo_clase;";
        $param=array();
        array_push($param,[':p_codigo_clase',$p_codigo_clase,PDO::PARAM_STR]);
        return parent::gdelete($sql,$param);
    }
}
?>