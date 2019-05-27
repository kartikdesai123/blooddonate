<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['page'] = "front/account/dashboard";
        $data['dashboard'] = 'active';
        $data['pagetitle'] = 'Dashboard';
        $data['var_meta_title'] = 'Dashboard';
        $data['breadcrumb'] = array(
            'dashboard' => 'Home',
            'dashboard1' => 'Dashboard',
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