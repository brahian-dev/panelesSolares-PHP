<?php
function home_consult_neurio($jsonData,$frm)
{
         $r = new xajaxResponse();
         if(!isset($_SESSION['app_movil']))$_SESSION['app_movil']=true;
         $obj_neurio = new neurio();
         $data=array();
         $data['client_id']='NQbpC-z7TLCbw9aLKV5SAA';
         $data['client_secret']='UJ4zFkheRRWUpsIhRPrzhA';
         $data['url']=URL_BASE_API_NEURIO;
         
         $token=$obj_neurio->get_token($data);
         if(!empty($token))
         {
          
             $panel_id=$frm['optPanelId'];
             if(!empty($panel_id))
             {
                $data=array();
                $data['token']=$token;
                $data['url']=URL_BASE_API_NEURIO;
                $data['sensor_id']=$panel_id;
                $json_data=$obj_neurio->get_last_sample($data);
                if(!empty($json_data))
                {
                     $r->addAssign('dvConsult', 'innerHTML', $json_data);
                     $r->addScript("loadLiveData('{$json_data}')");//server hacia el cliente
                }
                else
                {
                     $r->addAssign('dvConsult', 'innerHTML', 'No hay data');
                }
                 
                
             }
             
            //  $r->addAssign('dvConsult', 'innerHTML', $token);
         }
         
         //asignacion data a un div
        //  $r->addAssign('dvConsult', 'innerHTML', "<b>Hola prueba div desde server<b>");
      return $r;
 } 
    
?>