<?php

//ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL));
//ini_set('display_errors','1');
session_start();

require("../../Clases/class.principal.php");
include("../../Administracion_mod/ppal_administracion.server.php");
//APP MOVIL
include("../../app_movil/ppal_app_movil.server.php");


// n = total de registros
// c = pagina actual
// f = funcion que es llamada al hacer click
// rp = cantidad de registros que se mostraran por pagina
// np = numeros de pagina a mostrar
function pagina($n, $c, $f, $rp = 0, $np = 0, $div = 'paginacion') {
    if ($rp == 0)
        $rp = $_SESSION["cant_registros"];
    if ($np == 0)
        $np = $_SESSION["cant_paginas"];
    $paginas = '';
    $objResponse = new xajaxResponse();
    $paginas = ceil($n / $rp);

    $paginacion = '';

    if ($paginas > 1) {
        $pi = $paginas <= $np ? 1 : $c <= (ceil($np / 2)) ? 1 : $c - (floor($np / 2));
        $pf = $paginas - $pi >= $np ? $pi + ($np - 1) : $paginas;
        if ($c > ceil($np / 2))
            $paginacion .= '<span class="navegacion" onclick="' . "$f(1);" . '">&laquo;&nbsp;</span>';
        if ($c > 1)
            $paginacion .= '<span class="navegacion" onclick="' . "$f(" . ($c - 1) . ");" . '">&lsaquo;&nbsp;</span>';
        for ($i = $pi; $i <= $pf; $i ++) {
            $paginacion .= '<span class="' . ($i == $c ? 'actualPage' : 'navegacion') . '" onclick="' . "$f($i" . ');">' . $i . '&nbsp;</span>';
        }
        if ($c < $paginas)
            $paginacion .= '<span class="navegacion" onclick="' . "$f(" . ($c + 1) . ");" . '">&rsaquo;&nbsp;</span>';
        if ($c < $paginas - floor($np / 2))
            $paginacion .= '<span class="navegacion" onclick="' . "$f($paginas);" . '">&raquo;</span>';
        $objResponse->addAssign($div, 'innerHTML', $paginacion);
    }
    else {
        $objResponse->addClear($div, 'innerHTML');
    }
    $objResponse->addScript("infoTitle.SUBNAME.tituloTag();");
    return $objResponse;
}

require('common.funciones_ajax.php');
$ajax->processRequests();
$ajax2->processRequests();
?>