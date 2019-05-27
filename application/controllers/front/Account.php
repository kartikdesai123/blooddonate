<?php

class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model('Account_model', 'Api_model', 'this_model');
        //$this->load->model('Api_model', 'Account_model');
        $this->load->model('Api_model');
        $this->load->model('Account_model');
        $this->load->helper('cookie');
    }

    function index() {
        
        $this->login();
    }

    function home() {
        
        $data['page'] = "front/home/home";
        $data['var_meta_title'] = 'home';
        $data['var_meta_description'] = 'home';
        $data['var_meta_keyword'] = 'home';
        $data['js'] = array(
            'front/contact.js'
        );
        $data['js_plugin'] = array(
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['init'] = array(
            'Contact.contactInit()'
        );
        if ($this->input->post()) {
            $mailCheck = $this->this_model->sendEmail($this->input->post());
            redirect('/');
        }
        $this->load->view(FRONT_LAYOUT, $data);
    }
    
    function login() {
        
        $data['page'] = "front/login";
        $data['var_meta_title'] = 'login';
        $data['var_meta_description'] = 'login';
        $data['var_meta_keyword'] = 'login';
        $data['js'] = array(
           // 'front/contact.js'
        );
        $data['js_plugin'] = array(
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['init'] = array(
            //'Contact.contactInit()'
        );
        if ($this->input->post()) {
            $result = $this->Account_model->loginCheck($this->input->post());
            if($result['status'] == 'success'){
                redirect('dashboard');
            }else{
                redirect('login');
            }
        }
        $this->load->view(FRONT_LAYOUT, $data);
    }
    
    function dashboard() {
        $data['page'] = "front/home/dashboard";
        $data['var_meta_title'] = 'dashboard';
        $data['var_meta_description'] = 'dashboard';
        $data['var_meta_keyword'] = 'dashboard';
        
        //$stopList = $this->Account_model->getStops();
        $data['js'] = array(
           
        );
        $data['js_plugin'] = array(
            
        );
        $data['css'] = array(
            
        );
        $data['css_plugin'] = array(
            
        );
        $data['init'] = array(
            
        );
        if ($this->input->post()) {
            redirect('trip-detail');
            //echo "<pre>";print_r($this->input->post());exit;
            
            $result = $this->Account_model->getTripData($this->input->post());
            if($result['status'] == 'success'){
                redirect('detail');
            }else{
                redirect('dashboard');
            }
        }
        $this->load->view(FRONT_LAYOUT, $data);
    }
    
    function detail() {
        $data['page'] = "front/home/detail";
        $data['var_meta_title'] = 'Trip Detail';
        $data['var_meta_description'] = 'Trip Detail';
        $data['var_meta_keyword'] = 'Trip Detail';
        $data['js'] = array(
           
        );
        $data['js_plugin'] = array(
            
        );
        $data['css'] = array(
            
        );
        $data['css_plugin'] = array(
            
        );
        $data['init'] = array(
            
        );
        
        $this->load->view(FRONT_LAYOUT, $data);
    }

}

?>