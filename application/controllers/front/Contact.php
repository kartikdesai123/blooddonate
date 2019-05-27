<?php

class Contact extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['page'] = "front/contact/contact";
        $data['dashboard'] = 'active';
        $data['pagetitle'] = 'contact';
        $data['var_meta_title'] = 'contact';
        $data['breadcrumb'] = array(
            'contact' => 'Home',
            'contact' => 'Dashboard',
        );
        $data['css'] = array(
        );
        $data['css_plugin'] = array(
        );
        $data['js_plugin'] = array(
        );
        $data['init'] = array(
//            'Dashboard.init()',
        );
        if ($this->input->post()) {
            print_r($this->input->post());
            exit;
        }
        $this->load->view(FRONT_LAYOUT, $data);
    }

}

?>