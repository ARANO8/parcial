<?php
define("CONTROLADOR_DEFECTO", "Usuarios");
define("ACCION_DEFECTO", "index");

define("RUTA_BASE",$_SERVER['DOCUMENT_ROOT']."/");
define("HTTP_BASE","http://127.0.0.1/parcialfinal");
define('ROOT_DIR',RUTA_BASE.'parcialfinal');
define('ROOT_CORE',RUTA_BASE.'parcialfinal/core');
define('ROOT_UPLOAD',RUTA_BASE.'parcialfinal/uploads');
define('ROOT_VIEW',RUTA_BASE.'parcialfinal/view');
define('ROOT_REPORT',RUTA_BASE.'parcialfinal/reports');
define('ROOT_REPORT_DOWN',RUTA_BASE.'parcialfinal/reports_download');
//define("URL_RESOURCES", DIR_SIS."/public/resources/");
define("URL_RESOURCES", "http://127.0.0.1/parcialfinal/public/");
//JWT TOKEN
define('SECRET_KEY','MIEMPRESA.MBmxKMifghY7d55sghvTlB1jyAjB3uN0g6ZDdOXpz21');  // secret key can be a random string and keep in secret from anyone
define('ALGORITHM','HS256');   // Algorithm used to sign the token

?>