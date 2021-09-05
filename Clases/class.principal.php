<?php
/*ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL | E_STRICT| E_ALL));
ini_set('display_errors','1');*/
require('config.php');
include("class.singleton_connect_db.php");
include("class.bd.php");
include("class.util.php");
include("HTTPRequester.php");
include("Administracion_mod/class.ppal_administracion.php");
include("App_movil/Neurio/class.ppal_neurio.php");
//libreria pdf 
// include(SIG_DIR."includes/mpdf60/mpdf.php");

?>