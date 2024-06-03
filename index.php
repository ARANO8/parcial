<?php
session_start();
require_once './config/global.php';

$request = $_SERVER['REQUEST_URI'];
$request = parse_url($request, PHP_URL_PATH);
$segments = explode('/', trim($request, '/'));
function home()
{
    require ROOT_DIR . '/view/home.php';
}
function error404()
{
    require ROOT_DIR . '/view/home.php';
}
function verificarlogin()
{
    if (!isset($_SESSION['login']['full_name'])) {
        echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
    }
}

if ($segments[0] === 'parcial') {
    switch ($segments[1] ?? '') {
        case 'login':
            require ROOT_VIEW . '/seguridad/login.php';
            break;
        case 'register':
            require ROOT_VIEW . '/seguridad/register.php';
            break;
        case 'logout':
            session_destroy();
            $data = [
                'ope' => 'logout',
              
            ];
            $context = stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => 'Content-Type: application/json',
                    'content' => json_encode($data),
                ]
            ]);
            $url = HTTP_BASE . "/controller/LoginController.php";
            $response = file_get_contents($url, false, $context);
            echo '<script>window.location.href="' . HTTP_BASE . '/login"</script>';
            break;
        case 'web':
            verificarlogin();
            switch ($segments[2] ?? '') {
                case 'seg_tienda':
                    switch ($segments[3] ?? '') {
                        case 'list':
                            require ROOT_VIEW . '/web/seg_tienda/list.php';
                            break;
                        case 'create':
                            require ROOT_VIEW . '/web/seg_tienda/create.php';
                            break;
                        case 'edit':
                            if (isset($segments[4])) {
                                $_GET['codigo_ropa'] = $segments[4];
                                require ROOT_VIEW . '/web/seg_tienda/edit.php';
                            } else {
                                error404();
                            }
                            break;
                        case 'delete':
                            if (isset($segments[4])) {
                                $_GET['codigo_ropa'] = $segments[4];
                                require ROOT_VIEW . '/web/seg_tienda/delete.php';
                            } else {
                                error404();
                            }
                            break;
                        case 'view':
                            if (isset($segments[4])) {
                                $_GET['codigo_ropa'] = $segments[4];
                                require ROOT_VIEW . '/web/seg_tienda/view.php';
                            } else {
                                error404();
                            }
                            break;
                    }
                    break;
            }
            break;
        default:
            verificarlogin();
            home();
            break;
    }
}