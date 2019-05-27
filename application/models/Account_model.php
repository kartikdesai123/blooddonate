<?php

class Account_model extends CI_Model {

    function loginCheck($data) {

        $username = $data['username'];
        $password = $data['password'];

        if (!empty($username) && !empty($password)) {
            //$password = md5($data['password']);
            //$dataArr = "userName=".$username."&password=".$password."&agentID=8ef79695-4fe4-4f10-8065-f81869504685";
            $dataArr = "userName=Indigo&password=Indigo%40123&agentID=8ef79695-4fe4-4f10-8065-f81869504685";
            $url = "http://indigo.kcits.in/api/api/Authenticate";
            $resultData = $this->Api_model->checkAuthentication('POST', $url, $dataArr);
            $result = json_decode($resultData, true);
            //echo "<pre>";print_r($result);exit;

            if ($result['success'] == '1') {
                $json_response['status'] = 'success';
                $json_response['message'] = 'User Login Successfully....!!';
            } else {
                $json_response['status'] = 'error';
                $json_response['message'] = 'Email address and password does not match';
            }
        } else {
            $json_response['status'] = 'error';
            $json_response['message'] = 'Email address and password does not match';
        }
        return $json_response;
    }
    
    function getStops(){
        
        
//        $url = file_get_contents("http://test.indigoseaways.com/api/api/GetStops");
//        $res = json_decode($url, true);
//        echo "<pre>";print_r($res);exit;
                
        $dataArr = '';
        //$dataArr = false;
        $url = "http://test.indigoseaways.com/api/api/GetStops";
        //$url = "http://indigo.kcits.in/api/api/GetStops";
        $resultData = $this->Api_model->getApiRecord('GET', $url, $dataArr);
        $result = json_decode($resultData, true);
        //echo "<pre>";print_r($result);exit;
        return $result;
    }
    
    function getTripData($data){
        
        $sourceId = $data['from'];
        $destinationId = $data['to'];
        $departure = $data['departure'];
        
        if(!empty($sourceId) && !empty($destinationId) && !empty($departure)){
            $dataArr = "";
            //$dataArr = "departureDate=31/03/2018&destinationID=2&sourceID=1";
            //$url = "http://indigo.kcits.in/api/api/GetTrips?departureDate=31/03/2018&destinationID=2&sourceID=1";
            //$url = "http://test.indigoseaways.com/api/api/GetTrips?departureDate=".$departure."&destinationID=".$destinationId."&sourceID=".$sourceId;
            $url = "http://test.indigoseaways.com/api/api/GetTrips?departureDate=31/03/2018&destinationID=2&sourceID=1";
            $resultData = $this->Api_model->getApiRecord('GET', $url, $dataArr);
            $result = json_decode($resultData, true);
            //echo "<pre>";print_r($result);exit;
            return $result;
        }
    }
}