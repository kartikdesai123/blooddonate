<?php

/**
 * 
 */
class Busroute extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
                 $this->load->model(BUSROUTE_MODEL,'this_model');
	}

	public function index(){
	      if (isset($this->session->userdata['roroferry_admin'])) {
                  $data['title']='Roroferry - Bus Route';
                  $data['meta']='Roroferry - Bus Route';
                  $data['page'] = PAGES.'busroute/busroute-list'; 
                  $data['pagetitle'] = 'Bus Route List';  
                  $data['busroute'] = "active";  
                  $data['js'] = array(
                    'ajaxfileupload.js',
                    'jquery.form.min.js',
                    'busroute.js',
                  );
                  $data['js_plugin'] = array(
                  );
                  $data['css'] = array(            
                  );
                  $data['css_plugin'] = array(
                  );
                  $data['init'] = array(  
                       'Busroute.Init()',
                  );
                  $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            }   
	}
        
        
        public function addRoute(){
            if (isset($this->session->userdata['roroferry_admin'])) {
                if ($this->input->post()) {
                    $result= $this->this_model->addRoute($this->input->post());
                        if($result){
                            $json_response['status'] = 'success';
                            $json_response['message'] = 'Bus route successfully added';
                            $json_response['redirect'] = base_url().'bus-route';
                        }else{
                            $json_response['status'] = 'error';
                            $json_response['message'] = 'Something goes to wrong';
                        }
                        echo json_encode($json_response);
                        exit();
                }
                  $data['title']='Roroferry - Add Bus Route';
                  $data['meta']='Roroferry - Add Bus Route';
                  $data['page'] = PAGES.'busroute/add-busroute'; 
                  $data['pagetitle'] = 'Add Bus Route';  
                  $data['busroute'] = "active";  
                  $data['js'] = array(
                        'ajaxfileupload.js',
                        'jquery.form.min.js',
                        'busroute.js',
                        'timepicki.js',
                  );
                  $data['js_plugin'] = array(
                  );
                  $data['css'] = array(    
                      'timepicki.css',
                  );
                  $data['css_plugin'] = array(
                  );
                  $data['init'] = array(  
                       'Busroute.Add()',
                  );
                  $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            }
        }
        
        public function editRoute($id){
            $data['routeDetails']= $this->this_model->EditRouteDetails($id);
            
            if (isset($this->session->userdata['roroferry_admin'])) {
                if ($this->input->post()) {
                   
                    $result= $this->this_model->EditRoute($this->input->post());
                        if($result){
                            $json_response['status'] = 'success';
                            $json_response['message'] = 'Bus route successfully updated';
                            $json_response['redirect'] = base_url().'bus-route';
                        }else{
                            $json_response['status'] = 'error';
                            $json_response['message'] = 'Something goes to wrong';
                        }
                        echo json_encode($json_response);
                        exit();
                }
                  $data['title']='Roroferry - Edit Bus Route';
                  $data['meta']='Roroferry - Edit Bus Route';
                  $data['page'] = PAGES.'busroute/edit-busroute'; 
                  $data['pagetitle'] = 'Edit Bus Route';  
                  $data['busroute'] = "active";  
                  $data['js'] = array(
                        'ajaxfileupload.js',
                        'jquery.form.min.js',
                        'busroute.js',
                        'timepicki.js',
                  );
                  $data['js_plugin'] = array(
                  );
                  $data['css'] = array(    
                       'timepicki.css',
                  );
                  $data['css_plugin'] = array(
                  );
                  $data['init'] = array(  
                       'Busroute.Edit()',
                  );
                  $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            }
        }

        public function ajaxcall(){
            $action= $this->input->post('action');
            switch ($action) {
                
                case 'busRoute':
                    $fetch_data= $this->this_model->busRouteList();
            $data =[];
             $no =0;
            foreach($fetch_data as $row)  
            {  
               $no++;
                if($row->is_active == 'active'){
                    $html='<span class="label label-success">ACTIVE</span>';
                }else{
                    $html='<span class="label label-danger">DEACTIVE</span>';
                }
                 $sub_array = array();
                 $sub_array[] = $no; 
                 $sub_array[] = $row->route;
                 $sub_array[] = $row->time; 
                 $sub_array[] = $html; 
                 $sub_array[] = '<a href="'.base_url().'edit-route/'.$row->id.'"><i class="fa fa-pencil-square-o" ></i></a>&nbsp;<a href="#deleteModel" data-toggle="modal" data-id="'.$row->id.'"  class="link-black text-sm deleteImage" data-original-title="Delete"><i class="fa fa-trash"></i></a>'; 
                 $data[] = $sub_array;  
            }  
            
            $output = array(  
                 "draw"               =>     intval($_POST["draw"]),  
                 "recordsTotal"       =>     $this->this_model->get_all_data(),  
                 "recordsFiltered"    =>     $this->this_model->get_filtered_data(),  
                 "data"               =>     $data  
            );
            echo json_encode($output);
            break;
            }
            
        }
        
        public function deleteRoute(){
            if ($this->input->post()) {
                   
                    $result= $this->this_model->deleteRoute($this->input->post());
                        if($result){
                            $json_response['status'] = 'success';
                            $json_response['message'] = 'Bus route successfully deleted';
                            $json_response['redirect'] = base_url().'bus-route';
                        }else{
                            $json_response['status'] = 'error';
                            $json_response['message'] = 'Something goes to wrong';
                        }
                        echo json_encode($json_response);
                        exit();
                }
        }
}

?>