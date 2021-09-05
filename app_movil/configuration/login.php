<?php
ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL));
ini_set('display_errors','1');
include("../../Clases/class.principal.php");
// decoding the json array
$arr_json = json_decode(file_get_contents("php://input"), true);

$respond="";

$user=$arr_json['user'];
$pass=$arr_json['pass'];
$imei=(isset($arr_json['imei']))?$arr_json['imei']: 0;

/*
$user=4321;
$pass=  54321;
$imei='';
$imei=357838083378051;*/

if(isset($user)&&isset($pass)&&isset($imei))
{
    $respond=json_encode(login_user($user, $pass,$imei));
}

function login_user($nro_identification, $passwd,$imei) {

    $obj_util = new util();
    $bd= new conector_bd();
    $nro_ident = $obj_util->limpia_dato($nro_identification);
    $arr_respuesta['msgError']="";
    
    return $arr_respuesta;
}
echo $respond;
header('Content-Type: application/json');
?>
