<?php


class Station extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model(STATION_MODEL,'this_model');
    }
    
    public function index(){
       if (isset($this->session->userdata['roroferry_admin'])) {
                  $data['title']='Roroferry - Station List';
                  $data['meta']='Roroferry - Station List';
                  $data['page'] = PAGES.'station/station-list'; 
                  $data['pagetitle'] = 'Station List';  
                  $data['station'] = "active";  
                  $data['js'] = array(
                        
                        'ajaxfileupload.js',
                        'jquery.form.min.js',
                        'timepicki.js',
                        'station.js',
                  );
                  $data['js_plugin'] = array(
                  );
                  $data['css'] = array(  
                      'timepicki.css',
                  );
                  $data['css_plugin'] = array(
                  );
                  $data['init'] = array(  
                       'Station.Init()',
                  );
                  $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            } 
    }
    
    public function addstation(){
        if (isset($this->session->userdata['roroferry_admin'])) {
                  
                  
                  $data['route'] = $this->this_model->routeList();
                  $data['title']='Roroferry - Add Station List';
                  $data['meta']='Roroferry - Add Station List';
                  $data['page'] = PAGES.'station/add-station'; 
                  $data['pagetitle'] = 'Add Station List';  
                  $data['station'] = "active";  
                  $data['js'] = array(
                        'ajaxfileupload.js',
                        'jquery.form.min.js',
                        'timepicki.js',
                        'station.js',
                  );
                  $data['js_plugin'] = array(
                  );
                  $data['css'] = array(     
                      'timepicki.css',
                  );
                  $data['css_plugin'] = array(
                  );
                  $data['init'] = array(  
                       'Station.Add()',
                  );
                  if($this->input->post()){
                      $results = $this->this_model->addstation($this->input->post());
                        if($results){
                            $json_response['status'] = 'success';
                            $json_response['message'] = 'Station successfully added';
                            $json_response['redirect'] = base_url().'station';
                        }else{
                            $json_response['status'] = 'error';
                            $json_response['message'] = 'Something goes to wrong';
                        }
                        echo json_encode($json_response);
                        exit();
                  }
                  $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            }
    }
    
    public function editstation($id){
        
        if (isset($this->session->userdata['roroferry_admin'])) {
            $data['routeDetails'] = $this->this_model->routeDetails($id);      
            $data['route'] = $this->this_model->routeList();
            $data['title']='Roroferry - Edit Station List';
            $data['meta']='Roroferry - Edit Station List';
            $data['page'] = PAGES.'station/edit-station'; 
            $data['pagetitle'] = 'Edit Station List';  
            $data['station'] = "active";  
            $data['js'] = array(
                  'ajaxfileupload.js',
                        'jquery.form.min.js',
                        'timepicki.js',
                        'station.js',
            );
            $data['js_plugin'] = array(
            );
            $data['css'] = array(
                'timepicki.css',
            );
            $data['css_plugin'] = array(
            );
            $data['init'] = array(  
                 'Station.Edit()',
            );
                if($this->input->post()){
                    $results = $this->this_model->editstation($this->input->post());
                      if($results){
                          $json_response['status'] = 'success';
                          $json_response['message'] = 'Station successfully Edited';
                          $json_response['redirect'] = base_url().'station';
                      }else{
                          $json_response['status'] = 'error';
                          $json_response['message'] = 'Something goes to wrong';
                      }
                      echo json_encode($json_response);
                      exit();
                }
            $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            }
    }

    public function routeTimeList(){
        if (isset($this->session->userdata['roroferry_admin'])) {
            if($this->input->post()){
                $route = $this->this_model->routeTimeList($this->input->post('id'));
                echo json_encode($route);
                exit;
                
            }else{
                redirect(base_url());
            }
        }else{
             redirect(base_url());
        }
    }

    public function ajaxcall(){
        $action= $this->input->post('action');
            switch ($action) {
                
                case 'stationList':
                    $fetch_data= $this->this_model->stationList();
                    $data =[];
                    $no =0;
                    
                foreach($fetch_data as $row)  
                {  
                    $no++;
                    
                     $sub_array = array();
                     $sub_array[] = $no; 
                     $sub_array[] = $row->route;
                     $sub_array[] = $row->forTime; 
                     $sub_array[] = $row->stationName; 
                     $sub_array[] = $row->time; 
                     $sub_array[] = $row->stationType; 
                     $sub_array[] = '<a href="'.base_url().'edit-station/'.$row->stationId.'"><i class="fa fa-pencil-square-o" ></i></a>&nbsp;<a href="#deleteModel" data-toggle="modal" data-id="'.$row->stationId.'"  class="link-black text-sm deleteImage" data-original-title="Delete"><i class="fa fa-trash"></i></a>'; 
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
    
    public function deleteStation(){
        if ($this->input->post()) {
                $result= $this->this_model->deleteStation($this->input->post());
                if($result){
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Station successfully deleted';
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