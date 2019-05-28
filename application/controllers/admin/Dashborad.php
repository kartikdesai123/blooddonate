<?php


class Dashborad extends CI_Controller{
    
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        if (isset($this->session->userdata['blooddonate_admin'])) {
            $data['title']='Blood Donate - Dashborad';
            $data['meta']='Blood Donate - Dashborad';
            $data['page'] = PAGES.'dashborad';   
            $data['pagetitle'] = 'Dashborad';  
            $data['dashborad'] = "active";
            $data['js'] = array(
                'admin/dashborad.js',
                'ajaxfileupload.js',
                'jquery.form.min.js'
            );
            $data['js_plugin'] = array(
            );
            $data['css'] = array(            
            );
            $data['css_plugin'] = array(
            );
            $data['init'] = array(  
                'Dashborad.Init()',
            );
            $this->load->view(ADMINLAYOUT, $data); 
        }else{
            redirect(base_url().'admin');
        }
    }
}