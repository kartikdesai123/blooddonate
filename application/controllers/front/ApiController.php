<?php

class ApiController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->library('session');
    }

    function index() {
        $data = "userName=Indigo&password=Indigo%40123&agentID=8ef79695-4fe4-4f10-8065-f81869504685";
        $url = "http://indigo.kcits.in/api/api/Authenticate";
        $header = array();
        $result = $this->Api_model->curlCall($url, $data, 'POST',$header);
        $this->session->set_userdata('token', $result['data']['token']);
        print_r($result);
    }

    function getStop() {
        $token = $this->session->userdata('token');
        $data = "token=NgKsXWk2HHwZsOUvAeClfJGVrISyN2Ss";
        $url = "http://indigo.kcits.in/api/api/GetStops";
        $header = array('authorization: '.$token);
        $result = $this->Api_model->curlCall($url, $data, 'GET',$header);
        echo '<pre>';
        print_r($result);
        exit;
    }

    function getTrips() {

        $data = "";
        $token = $this->session->userdata('token');
        $url = "http://indigo.kcits.in/api/api/GetTrips?departureDate=31/05/2018&destinationID=2&sourceID=1";
        $header = array('authorization: '.$token);
        $result = $this->Api_model->curlCall($url, $data, 'GET',$header);
        echo '<pre>';
        print_r($result);
        exit;
    }

    function getupdateBooking() {

        $data = "bookingID=11834&returnBookingID=0&email=priyankas@keyconcepts.co.in&paymentMode=&receiptnumber=&remark=&mobile=9586382983&transactionID=pay_9t7JEWfTlh6BFv&isCorporateBooking=false&companyName=&cgstNo=&address=";
        $url = "http://indigo.kcits.in/api/api/UpdateBooking";
        $result = $this->Api_model->getApiRecord($url, $data, 'POST');
        print_r($result);
        exit;
    }

}

?>