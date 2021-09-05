<?php
function home_consult_growatt($jsonData)
{
         $r = new xajaxResponse();
         if(!isset($_SESSION['app_movil']))$_SESSION['app_movil']=true;
         $obj_util = new util();
         //asignacion data a un div
          $r->addAssign('dvConsult', 'innerHTML', "<b>Hola prueba div desde server<b>");
      return $r;
 } 
    
?>