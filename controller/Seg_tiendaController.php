<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

session_start();

require_once ($_SERVER['DOCUMENT_ROOT'].  "/ecommerce/config/global.php");
require_once (ROOT_DIR."/model/Seg_tiendaModel.php");

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
    $objTienda = new Seg_tiendaModel();
    $var = $objTienda->findall();
    echo json_encode($var);
}
function filterId($input){
    $objCat = new Seg_tiendaModel();
    $p_codigo_ropa=!empty($input['codigo_ropa']) ? $input['codigo_ropa'] : $_GET['codigo_ropa'];
    $var = $objCat->findid($p_codigo_ropa);
    echo json_encode($var);
}
function filterPaginateAll($input){
    $page = !empty($input['page']) ? $input['page'] : $_GET['page'];
    $filter = !empty($input['filter']) ? $input['filter'] : $_GET['filter'];
    $nro_record_page = 10;
    $p_limit = 10;
    $p_offset = 0;
    $p_offset = abs(($page-1)*$nro_record_page);
    $objCat = new Seg_tiendaModel();
    $var = $objCat->findpaginateall($filter, $p_limit,$p_offset);
    echo json_encode($var);
}
function insert($input){
    $p_codigo_ropa=!empty ($input['codigo_ropa']) ? $input['codigo_ropa'] : $_POST['codigo_ropa'];
    $p_tipo=!empty ($input['tipo']) ? $input['tipo'] : $_POST['tipo'];
    $p_talla=!empty ($input['talla']) ? $input['talla'] : $_POST['talla'];
    $p_precio=!empty ($input['precio']) ? $input['precio'] : $_POST['precio'];
    $p_stock=!empty ($input['stock']) ? $input['stock'] : $_POST['stock'];
    $p_marca=!empty ($input['marca']) ? $input['marca'] : $_POST['marca'];
    $p_proveedor=!empty ($input['proveedor']) ? $input['proveedor'] : $_POST['proveedor'];
    $p_color=!empty ($input['color']) ? $input['color'] : $_POST['color'];
    $objCat = new Seg_tiendaModel();
    $var = $objCat->insert($p_codigo_ropa, $p_tipo, $p_talla, $p_precio, $p_stock, $p_marca, $p_proveedor, $p_color);
    echo json_encode($var);
}
function update($input){
    $p_codigo_ropa=!empty ($input['codigo_ropa']) ? $input['codigo_ropa'] : $_POST['codigo_ropa'];
    $p_tipo=!empty ($input['tipo']) ? $input['tipo'] : $_POST['tipo'];
    $p_talla=!empty ($input['talla']) ? $input['talla'] : $_POST['talla'];
    $p_precio=!empty ($input['precio']) ? $input['precio'] : $_POST['precio'];
    $p_stock=!empty ($input['stock']) ? $input['stock'] : $_POST['stock'];
    $p_marca=!empty ($input['marca']) ? $input['marca'] : $_POST['marca'];
    $p_proveedor=!empty ($input['proveedor']) ? $input['proveedor'] : $_POST['proveedor'];
    $p_color=!empty ($input['color']) ? $input['color'] : $_POST['color'];
    $objCat = new Seg_tiendaModel();
    $var = $objCat->update($p_codigo_ropa, $p_tipo, $p_talla, $p_precio, $p_stock, $p_marca, $p_proveedor, $p_color);
    echo json_encode($var);
}
function delete($input){
    $p_codigo_ropa=!empty ($input['codigo_ropa']) ? $input['codigo_ropa'] : $_POST['codigo_ropa'];
    $objCat = new Seg_tiendaModel();
    $var = $objCat->delete($p_codigo_ropa);
    echo json_encode($var); 
}

?>