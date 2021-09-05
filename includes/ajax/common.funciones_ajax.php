<?php
define ('XAJAX_DEFAULT_CHAR_ENCODING', 'utf-8');
require_once("xajax.inc.php");

$ajax = new xajax("../includes/ajax/server.funciones_ajax.php");
$ajax2 = new xajax("../../includes/ajax/server.funciones_ajax.php");
$ajaxsub = new xajax("../../../includes/ajax/server.funciones_ajax.php");

if(!empty($funciones_ajax))
{
    for($i=0;$i<count($funciones_ajax);$i++)
    {
            $ajax->registerFunction($funciones_ajax[$i]);
            $ajax2->registerFunction($funciones_ajax[$i]);
            $ajaxsub->registerFunction($funciones_ajax[$i]);

    }
}

if(isset($_POST['xajax']))//Si la poscion que tiene el nombre de la funcion no es vacia
{
   $ajax->registerFunction($_POST['xajax']);
   $ajax2->registerFunction($_POST['xajax']);
   $ajaxsub->registerFunction($_POST['xajax']);
}
?>