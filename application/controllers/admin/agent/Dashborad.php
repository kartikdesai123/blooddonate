<?php

/**
 * 
 */
class Dashborad extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
	      if (isset($this->session->userdata['roroferry_admin'])) {
                  $data['title']='Roroferry - Agent Dashborad';
                  $data['meta']='Roroferry - Agent Dashborad';
                  $data['page'] = AGENT_PAGES.'dashborad'; 
                  $data['pagetitle'] = 'Dashborad';  
                  $data['dashborad'] = "active";  
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
                  $this->load->view(AGENT_LAYOUT, $data); 
            }else{
                   redirect(base_url());
            }   
	}
}

?>