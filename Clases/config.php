<?php
//Definicion de constantes en el sistema
if(!defined('PANEL_URL'))define('PANEL_URL', 'https://seosenergy.fredyherrera.com.co/');
if(!defined('BD_NAME'))define('BD_NAME', 'demodb5');
if(!defined('BD_PORT'))define('BD_PORT', '5432');
if(!defined('BD_HOST'))define('BD_HOST', '127.0.0.1');
if(!defined('BD_USER'))define('BD_USER', 'postgres');
if(!defined('BD_PASSWD'))define('BD_PASSWD', 'postgres');
if(!defined('SSESSION_USUARIO'))define('SESSION_USUARIO', 'usuario_demo');
if(!defined('SIG_IP'))define('SIG_IP', '127.0.0.1');
if (!defined('SIG_DIR')) define('SIG_DIR', '/var/www/projects/seosenergy/');
// Variable PAra Modo Errro
if(!defined('SIG_GENERA_ERROR'))define('SIG_GENERA_ERROR','false'); // [true] Para mostrar el error de sql, [false] para generar el archivo de errores(Produccion)
if(!defined('SIG_ARCHIVO_ERROR'))define('SIG_ARCHIVO_ERROR','logs/error_silog.php');
if(!defined('SIG_USUARIO_ERROR'))define('SIG_USUARIO_ERROR','Sitrans');
if(!defined('SIG_PASS_ERROR'))define('SIG_PASS_ERROR','Desarrollo');
if(!defined('URL_BASE_API_GROWATT'))define('URL_BASE_API_GROWATT','http://test.growatt.com/v1/');
if(!defined('URL_BASE_API_NEURIO'))define('URL_BASE_API_NEURIO','https://api.neur.io/v1/');
?>