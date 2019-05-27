<?php

class Homepage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Api_model');
        $this->load->model('Account_model');
        $this->load->helper('cookie');
    }

    public function index() {
       
        $data['page'] = "front/home/index";
        $data['var_meta_title'] = 'login';
        $data['var_meta_description'] = 'login';
        $data['var_meta_keyword'] = 'login';
        $data['js'] = array(
            'front/home.js'
        );
        $data['js_plugin'] = array(
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['init'] = array(
            'Home.init()'
        );
       
        $this->load->view(FRONT_LAYOUT, $data);
    }

    public function dd()
    {
        echo 'dd';exit;
    }
    
}

?>