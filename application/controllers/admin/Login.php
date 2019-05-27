<?php

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
         $this->load->model(LOGIN_MODEL,'this_model');
    }

    public function index() {
            $data['title']='Roroferry - Login';
            $data['meta']='Roroferry - Login';
            $data['page'] = PAGES.'loginpage';   
            $data['home'] = "active";  
            if ($this->input->post()) {
                
                $result= $this->this_model->logincheck($this->input->post());
                if($result == TRUE){
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Well done Login Successfully Done';
                    
                    if($this->session->userdata['roroferry_admin']['userType'] == "admin"){
                      $json_response['redirect'] = base_url().'dashboard';  
                    }else{
                      $json_response['redirect'] = base_url().'agent-dashboard';  
                    }
                    
                }else{
                    $json_response['status'] = 'error';
                    $json_response['message'] = 'Email address or password does not match';
                }
                  echo json_encode($json_response);
                exit();
            }
            $data['js'] = array(
                'login.js',
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
                'Login.loginInit()',
            );
            $this->load->view(ADMINLOGINLAYOUT, $data);   
    }
    
    public function logout(){
        $this->session->unset_userdata('luxolla_admin');
        redirect(base_url().'admin');
    } 
}

?>