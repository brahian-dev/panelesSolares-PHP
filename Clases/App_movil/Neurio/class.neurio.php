<?php
class neurio {

    function get_token($data) {
     
        $token='';
        $data_send=array();
        $data_send['client_secret']=$data['client_secret'];
        $data_send['client_id']=$data['client_id'];
        $data_send['grant_type']='client_credentials';
        
        $arr_in=array();
        $arr_in['url']=$data['url'].'oauth2/token';
        $arr_in['params']=$data_send;
        $arr_in['arr_headers']=array('Content-Type:application/x-www-form-urlencoded');
        
         $response = HTTPRequester::HTTPPost($arr_in);
         
         if(!empty($response))
         {
             $arr_rep= json_decode($response,true);
             $token=$arr_rep['access_token'];
         }
        return $token;
    }
    function get_last_sample($data) {
     
        $json_data='';
        $data_send=array();
        $data_send['sensorId']=$data['sensor_id'];

        $arr_in=array();
        $arr_in['url']=$data['url'].'samples/live/last';
        $arr_in['params']=$data_send;
        $arr_in['token']=$data['token'];
        $arr_in['arr_headers']=array('Content-Type:application/json');
        
         $response = HTTPRequester::HTTPGet($arr_in);
         
         if(!empty($response))
         {
             $json_data=$response;
         }
        return $json_data;
    }
    function get_history($data) {
     
        $json_data='';
        
        $arr_in=array();
        $arr_in['url']=$data['url'].'samples';
         $arr_in['token']=$data['token'];
        unset($data['url']);
        unset($data['token']);
        $arr_in['params']=$data;
       
        $arr_in['arr_headers']=array('Content-Type:application/json');
        
         $response = HTTPRequester::HTTPGet($arr_in);
         
         if(!empty($response))
         {
             $json_data=$response;
         }
        return $json_data;
    }

}