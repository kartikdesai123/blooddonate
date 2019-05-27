<?php

/**
 * 
 */
class Booking extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
                $this->load->model(BOOKING_MODEL,'this_model');
	}

	public function index(){
	      if (isset($this->session->userdata['roroferry_admin'])) {
                  $data['title']='Roroferry - Booking';
                  $data['meta']='Roroferry - Booking';
                  $data['page'] = PAGES.'booking/booking-list'; 
                  $data['pagetitle'] = 'Booking List';  
                  $data['booking'] = "active";  
                  $data['js'] = array(
                    'ajaxfileupload.js',
                    'jquery.form.min.js',
                    'booking.js',
                  );
                  $data['js_plugin'] = array(
                  );
                  $data['css'] = array(            
                  );
                  $data['css_plugin'] = array(
                  );
                  $data['init'] = array( 
                      'Booking.Init()',
                  );
                  $this->load->view(ADMINLAYOUT, $data); 
            }else{
                   redirect(base_url());
            }   
	}
        
        public function ajaxcall(){
            $action= $this->input->post('action');
            switch ($action) {
                
                case 'bookingList':
                    $fetch_data= $this->this_model->bookingList();
                   
                    $data =[];
                    $no =0;
                    foreach($fetch_data as $row)  
                    {  
                       $no++;
                       
                        $sub_array = array();
                        $sub_array[] = $no; 
                        $sub_array[] = $row->pnrNumber;
                        $sub_array[] = $row->route;
                        $sub_array[] = date("d-m-Y" , strtotime($row->depatureDate));
                        $sub_array[] = $row->ferryTime;  
                        $sub_array[] = $row->pickupTime; 
                        $sub_array[] = $row->pickUpStation; 
                        $sub_array[] = $row->dropTime; 
                        $sub_array[] = $row->dropStation; 
                        $sub_array[] = $row->phoneNumber;
                        $sub_array[] = $row->passangerName; 
                        $sub_array[] = $row->passangerGender; 
                        $sub_array[] = $row->passangerAge;
                        $sub_array[] = $row->transaction_id;
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
}

?>