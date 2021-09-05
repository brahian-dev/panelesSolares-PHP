<?php 
include("../../Clases/class.principal.php");
session_start();
$_SESSION['app_movil']=true;

$obj_util= new util();
$sjs='';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
          <!--Import Google Icon Font-->
          <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

          <link rel="stylesheet" href="../css/materialize.min.css" media="screen,projection"/>
          <link rel="stylesheet" href="https://cdn.rawgit.com/chingyawhao/materialize-clockpicker/master/dist/css/materialize.clockpicker.css"/>
          <link rel="stylesheet" href="../css/jquery-ui.min.css"/>
           <script  src="../js/functions.js" type="text/javascript"></script>
           <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.js" integrity="sha512-b3xr4frvDIeyC3gqR1/iOi6T+m3pLlQyXNuvn5FiRrrKiMUJK3du2QqZbCywH6JxS5EOfW0DY0M6WwdXFbCBLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
<style> 

    * {
        -ms-user-select: none;
		-moz-user-select: -moz-none;
    }
    label
    {
        color: #000;
        font-weight: bold;
    }
    /* label color */
    .input-field label 
    {
        color: #000;
    }

    .ocupado {
        background: #F2514D none repeat scroll 0 0;
        border-radius: 3px;
        display: inline-block;
        height: 25px;
        margin: 0 5px;
       
        width: 25px;
    }
    .seleccionado {
        background:#EBE200 none repeat scroll 0 0;
        border-radius: 3px;
        display: inline-block;
        height: 25px;
        margin: 0 5px;
       
        width: 25px;
		}
    .libre {
        background: #009E17 none repeat scroll 0 0;
        border-radius: 3px;
        display: inline-block;
        height: 25px;
        margin: 0 5px;
       
        width: 25px;
    }


    .table_resp td, th {
        padding: 5px 5px;
        display: table-cell;
        text-align: left;
        vertical-align: middle;
        border-radius: 2px;
    }

    #load 
    {
        position: absolute;
        background: white url('../images/loading.gif') no-repeat center center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    .collection {
        overflow: visible;
    }


    li.collection-item.avatar:hover 
    {
        background-color: #e0f2f1;
    }
    .collapsible li.active i {
        -ms-transform: rotate(180deg); /* IE 9 */
        -webkit-transform: rotate(180deg); /* Chrome, Safari, Opera */
        transform: rotate(180deg);
        background: #90caf9;
    }
	
.collapsible-header:active {
    background-color: #ffffff !important;
}
canvas {
  border: 1px dotted red;
}

.chart-container {
  position: relative;
  margin: auto;
  height: 80vh;
  width: 80vw;
}
</style>        
<div class="container-fluid" id="dvConten">
