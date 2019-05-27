<?php
class Homepage extends CI_Controller {

    function __construct() {
        parent::__construct();
      
    }

    public function index() {
            $data['title']='Blooddonate - Home';
            $data['meta']='Blooddonate - Home';
            $data['page'] = FRONT_PAGES.'home';   
            $data['home'] = "active";  
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