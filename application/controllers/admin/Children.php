<?php


class Children extends CI_Controller{
    
    
    function __construct() {
        parent::__construct();
        $this->load->model(CHILDREN_MODEL,'this_model');
    }
    
    public function index(){
        if (isset($this->session->userdata['blooddonate_admin'])) {
            $data['title']='Blood Donate - Children List';
            $data['meta']='Blood Donate - Children List';
            $data['page'] = PAGES.'children/index';   
            $data['pagetitle'] = 'Children List';  
            $data['children'] = "active";
            $data['js'] = array(
                'admin/children.js',
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
                'Children.Init()',
            );
            $this->load->view(ADMINLAYOUT, $data); 
        }else{
            redirect(base_url().'admin');
        }
    }
    
    public function childrenAdd(){
        if (isset($this->session->userdata['blooddonate_admin'])) {
            if ($this->input->post()) {
                $result= $this->this_model->childrenAdd($this->input->post());
                if($result == TRUE){
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Children Successfully Added';
                    $json_response['redirect'] = base_url().'children';  
                }else{
                    $json_response['status'] = 'error';
                    $json_response['message'] = 'Something goes to wrong';
                }
                echo json_encode($json_response);
                exit();
            }
            
            $data['title']='Blood Donate - Children List';
            $data['meta']='Blood Donate - Children List';
            $data['page'] = PAGES.'children/add';   
            $data['pagetitle'] = 'Add New Child';  
            $data['children'] = "active";
            $data['js'] = array(
                'admin/children.js',
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
                'Children.Add()',
            );
            $this->load->view(ADMINLAYOUT, $data); 
        }else{
            redirect(base_url().'admin');
        }
    }
    
    public function childrenEdit($id){
        $data['details']= $this->this_model->childrenEditDetails($id);
        if (isset($this->session->userdata['blooddonate_admin'])) {
            if ($this->input->post()) {
                $result= $this->this_model->childrenEdit($this->input->post());
                if($result == TRUE){
                    $json_response['status'] = 'success';
                    $json_response['message'] = 'Child details Successfully Edited';
                    $json_response['redirect'] = base_url().'children';  
                }else{
                    $json_response['status'] = 'error';
                    $json_response['message'] = 'Something goes to wrong';
                }
                echo json_encode($json_response);
                exit();
            }
            
            $data['title']='Blood Donate - Children List';
            $data['meta']='Blood Donate - Children List';
            $data['page'] = PAGES.'children/edit';   
            $data['pagetitle'] = 'Edit Child Details';  
            $data['children'] = "active";
            $data['js'] = array(
                'admin/children.js',
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
                'Children.Edit()',
            );
            $this->load->view(ADMINLAYOUT, $data); 
        }else{
            redirect(base_url().'admin');
        }
    }
    
    public function childrenDelete(){
        if (isset($this->session->userdata['blooddonate_admin'])) {
                if($this->input->post()){
                    $childrenDelete= $this->this_model->childrenDelete($this->input->post());
                    if($childrenDelete == TRUE){
                        $json_response['status'] = 'success';
                        $json_response['message'] = 'Children Successfully Deleted';
                        $json_response['redirect'] = base_url().'children';
                    }else{
                        $json_response['status'] = 'error';
                        $json_response['message'] = 'Something goes to wrong';
                    }
                    echo json_encode($json_response);
                    exit();
                }else{
                    redirect(base_url().'admin');
                }
         }else{
             redirect(base_url()); 
         }
    }

    public function ajaxcall(){
        $action= $this->input->post('action');
        switch ($action) {
        case 'childrenList':
            $fetch_data= $this->this_model->childrenList();
            $data =[];
            
            $i=0;
            foreach($fetch_data as $row)  
            {  
                $diff=[];
                $bday = new DateTime(date("d-m-Y", strtotime($row->childBirthDate))); // Your date of birth
                $today = new Datetime(date("d-m-Y"));
                $diff = $today->diff($bday);
                $i++;
                 $sub_array = array();
                 $sub_array[] = $i; 
                 $sub_array[] = '<center><img style="width:80px;height:80px " alt="image" class="img-circle" src="'.base_url().'public/images/children/'.$row->childImage.'" /></center>'; 
                 $sub_array[] = $row->childName;
                 $sub_array[] = $row->childPhoneNo;  
                 $sub_array[] = date("d-m-Y", strtotime($row->childBirthDate)); 
                 $sub_array[] = $row->childGender.' / '. $diff->y;
                 $sub_array[] = $row->childBloodGroup;
                 $sub_array[] = $row->childAddress;
                 $sub_array[] = '<center><a href="'.base_url().'edit-children/'.$row->id.'"><i class="fa fa-pencil-square-o fa" ></i></a><br><a href="#deleteModel" data-toggle="modal" data-image="'.$row->childImage.'" data-id="'.$row->id.'"  class="link-black text-sm deleteImage" data-original-title="Delete"><i class="fa fa-trash"></i></a></center>'; 
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
 }?>