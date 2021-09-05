<?php
ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL | E_STRICT| E_ALL));
ini_set('display_errors','1');

include("Clases/class.principal.php");
session_start();
$prefijo = PANEL_URL;
$_SESSION[PANEL_URL]=$prefijo;
$id_empresa = 10;

$_SESSION[SESSION_USUARIO]=10000;
 $_SESSION['nom_usuario']='USUARIO';
 $_SESSION['apellidos_usuario']=' DEMO SITRANS';

$_SESSION["cant_registros"] = 10;
$_SESSION["cant_paginas"] = 10;
$arrayPagina=array();
$arrayPagina=$_SERVER['SCRIPT_NAME'];
define('URLLOCAL','http://'.SIG_IP.$arrayPagina);
$arrayPagina=  explode('/', $arrayPagina);
$pagina=array();
$i=0;

for($i=0;$i<count($arrayPagina);$i++)
{}
$pagina=$arrayPagina[$i-1];
$pagina=explode('.', $pagina);
define('PGLOCAL',$pagina[0]);
$pagina=  str_ireplace('_', ' ', $pagina[0]);


$pagina=strtolower($pagina);
$pagina=ucwords($pagina);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta http-equiv='cache-control' content='no-cache'/>
<meta http-equiv='expires' content='0'/>
<meta http-equiv='pragma' content='no-cache'/>
	<title><?=$pagina;?></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
        <link rel="Shortcut Icon" type="image/x-icon" href="<?=$prefijo;?>sitrans.ico" />
        <!--Estilos Css-->
	<link rel="stylesheet" type="text/css" href="<?=$prefijo?>estilos/cssGeneral-min.css"/>
        
          <!--[if lte IE 7]>
            <link type="text/css" rel="stylesheet" media="all" href="estilos/screen_ie.css" />
            <![endif]-->

        <!--Archivo Js-->
        <script type="text/javascript" src="<?=$prefijo;?>js/jsGeneral-1.min.js"></script>
      
</head>
<body style="margin-left:0; margin-top:0; margin:0;">
 
    <!-- Div para mostrar las alertas  -->
    <!-- Div para mostrar las alertas  -->
    <div id="dialog" name="dialog"></div>
    <div class='notifications top-right'></div>
    <div class='notifications bottom-right'></div>
    <div class='notifications top-left'></div>
    <div class='notifications bottom-left'></div>
    
<div id="cpb" ></div>
<div id="cpf"></div>

<table align="center">
<tr>    
	<td>
		<div id="header">
		</div>
	</td>
</tr>
<tr>
<td>
<div id="content" style="border-radius: 20px;">


