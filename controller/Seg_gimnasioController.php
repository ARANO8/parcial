<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'].  "/parcialfinal/config/global.php");
require_once (ROOT_DIR."/model/Seg_gimnasioModel.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);
try {
    $Path_Info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : (isset($_SERVER['ORIG_PATH_INFO']) ? $_SERVER['ORIG_PATH_INFO'] : '');
    $request = explode('/',trim($Path_Info, '/'));
}
catch (Exception $e) {
    echo $e -> getMessage();
}
switch ($method) {
    case 'GET':
        
        $p_ope = !empty($input['ope']) ? $input['ope'] : $_GET['ope'];
        if (!empty($p_ope)) {

            if ($p_ope == 'filterId') {
               filterId($input);
            } elseif ($p_ope == 'filterSearch') {
               filterPaginateAll($input);
            } elseif ($p_ope ==  'filterall') {
                filterAll($input);
            }
        }

        break;
    case 'POST': //inserta
       insert($input);
        break;
    case 'PUT': //actualiza
        update($input);
        break;
    case 'DELETE': //elimina
        delete($input);
        break;
    default: //metodo NO soportado
        echo 'METODO NO SOPORTADO';
        break;
}
function filterAll($input){
    $objGim = new Seg_gimnasioModel();
    $var = $objGim->findall();
    echo json_encode($var);
}
function filterId($input){
    $objGim = new Seg_gimnasioModel();
    $p_codigo_clase=!empty($input['codigo_clase']) ? $input['codigo_clase'] : $_GET['codigo_clase'];
    $var = $objGim->findid($p_codigo_clase);
    echo json_encode($var);
}
function filterPaginateAll($input){
    $page = !empty($input['page']) ? $input['page'] : $_GET['page'];
    $filter = !empty($input['filter']) ? $input['filter'] : $_GET['filter'];
    $nro_record_page = 10;
    $p_limit = 10;
    $p_offset = 0;
    $p_offset = abs(($page-1)*$nro_record_page);
    $objGim = new Seg_gimnasioModel();
    $var = $objGim->findpaginateall($filter, $p_limit,$p_offset);
    echo json_encode($var);
}
function insert($input){
    $p_codigo_clase=!empty ($input['codigo_clase']) ? $input['codigo_clase'] : $_POST['codigo_clase'];
    $p_nombre_clase=!empty ($input['nombre_clase']) ? $input['nombre_clase'] : $_POST['nombre_clase'];
    $p_descripcion=!empty ($input['descripcion']) ? $input['descripcion'] : $_POST['descripcion'];
    $p_duracion=!empty ($input['duracion']) ? $input['duracion'] : $_POST['duracion'];
    $p_instructor=!empty ($input['instructor']) ? $input['instructor'] : $_POST['instructor'];
    $p_dias_semana=!empty ($input['dias_semana']) ? $input['dias_semana'] : $_POST['dias_semana'];
    $p_horario=!empty ($input['horario']) ? $input['horario'] : $_POST['horario'];
    $p_ubicacion=!empty ($input['ubicacion']) ? $input['ubicacion'] : $_POST['ubicacion'];
    $p_nivel=!empty ($input['nivel']) ? $input['nivel'] : $_POST['nivel'];
    $p_equipamiento=!empty ($input['equipamiento']) ? $input['equipamiento'] : $_POST['equipamiento'];
    $p_cupo=!empty ($input['cupo']) ? $input['cupo'] : $_POST['cupo'];
    $p_frecuencia=!empty ($input['frecuencia']) ? $input['frecuencia'] : $_POST['frecuencia'];
    $p_intensidad=!empty ($input['intensidad']) ? $input['intensidad'] : $_POST['intensidad'];
    $p_tipo_clase=!empty ($input['tipo_clase']) ? $input['tipo_clase'] : $_POST['tipo_clase'];
    $p_observaciones=!empty ($input['observaciones']) ? $input['observaciones'] : $_POST['observaciones'];
    $objGim = new Seg_gimnasioModel();
    $var = $objGim->insert($p_codigo_clase,$p_nombre_clase, $p_descripcion, $p_duracion, $p_instructor, $p_dias_semana, $p_horario, $p_ubicacion, $p_nivel, $p_equipamiento, $p_cupo, $p_frecuencia, $p_intensidad, $p_tipo_clase, $p_observaciones);
    echo json_encode($var);
}
function update($input){
    $p_codigo_clase=!empty ($input['codigo_clase']) ? $input['codigo_clase'] : $_POST['codigo_clase'];
    $p_nombre_clase=!empty ($input['nombre_clase']) ? $input['nombre_clase'] : $_POST['nombre_clase'];
    $p_descripcion=!empty ($input['descripcion']) ? $input['descripcion'] : $_POST['descripcion'];
    $p_duracion=!empty ($input['duracion']) ? $input['duracion'] : $_POST['duracion'];
    $p_instructor=!empty ($input['instructor']) ? $input['instructor'] : $_POST['instructor'];
    $p_dias_semana=!empty ($input['dias_semana']) ? $input['dias_semana'] : $_POST['dias_semana'];
    $p_horario=!empty ($input['horario']) ? $input['horario'] : $_POST['horario'];
    $p_ubicacion=!empty ($input['ubicacion']) ? $input['ubicacion'] : $_POST['ubicacion'];
    $p_nivel=!empty ($input['nivel']) ? $input['nivel'] : $_POST['nivel'];
    $p_equipamiento=!empty ($input['equipamiento']) ? $input['equipamiento'] : $_POST['equipamiento'];
    $p_cupo=!empty ($input['cupo']) ? $input['cupo'] : $_POST['cupo'];
    $p_frecuencia=!empty ($input['frecuencia']) ? $input['frecuencia'] : $_POST['frecuencia'];
    $p_intensidad=!empty ($input['intensidad']) ? $input['intensidad'] : $_POST['intensidad'];
    $p_tipo_clase=!empty ($input['tipo_clase']) ? $input['tipo_clase'] : $_POST['tipo_clase'];
    $p_observaciones=!empty ($input['observaciones']) ? $input['observaciones'] : $_POST['observaciones'];
    $objGim = new Seg_gimnasioModel();
    $var = $objGim->update($p_codigo_clase,$p_nombre_clase, $p_descripcion, $p_duracion, $p_instructor, $p_dias_semana, $p_horario, $p_ubicacion, $p_nivel, $p_equipamiento, $p_cupo, $p_frecuencia, $p_intensidad, $p_tipo_clase, $p_observaciones);
    echo json_encode($var);
}
function delete($input){
    $p_codigo_clase=!empty ($input['codigo_clase']) ? $input['codigo_clase'] : $_POST['codigo_clase'];
    $objGim = new Seg_gimnasioModel();
    $var = $objGim->delete($p_codigo_clase);
    echo json_encode($var); 
}

?>