<?php
function consult_neurio_history($jsonData,$frm)
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
                $data['sensorId']=$panel_id;
                $data['start']=$frm['txtDateStart'].'T00:00:00';
                $data['end']=$frm['txtDateEnd'].'T23:59:59';
                $data['granularity']='minutes';
                $data['frequency']='5';
                $data['perPage']='5';
                $data['page']='1';
               
                
                $json_data=$obj_neurio->get_history($data);
                if(!empty($json_data))
                {
                     $r->addScript("hideLoadingScreen();");
                     $r->addAssign('dvConsult', 'innerHTML', $json_data);
                      $r->addScript("loadLiveDataHistory('{$json_data}')");//server hacia el cliente
                }
                else
                {
                     $r->addScript("hideLoadingScreen();");
                     $r->addAssign('dvConsult', 'innerHTML', 'No hay data');
                }
                 
                
             }
             else
             {
                  $r->addScript("hideLoadingScreen();");
             }
             
            //  $r->addAssign('dvConsult', 'innerHTML', $token);
         }
      return $r;
 } 
    
?>