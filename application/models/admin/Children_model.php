<?php 

class Children_model extends My_model{
    
   
    function __construct() {
        parent::__construct();
    }
    
    public function childrenAdd($postData){
        
        if (!empty($_FILES['childPhoto']['name'])) {
            $this->load->library('upload');
            $ex=pathinfo($_FILES['childPhoto']['name']);
            $new_name = time().'.'.$ex['extension'];
            $config['upload_path'] = './public/images/children/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] =$new_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('childPhoto');
        }

        $data['table']=TBL_CHILDREN;
        $data['insert']=[
          'childName'=>$postData['childName'],
          'childPhoneNo'=>$postData['childPhoneNo'],
          'childBirthDate'=>date("Y-m-d", strtotime($postData['childBirthDate'])),
          'childBloodGroup'=>$postData['childBloodGroup'],
          'childAddress'=>$postData['childAddress'],
          'childGender'=>$postData['childGender'],
          'childImage'=>$new_name,
          'created_at'=>date("Y-m-d h:i:s"),
          'updated_at'=>date("Y-m-d h:i:s"),
        ];
        $res= $this->insertRecord($data);
        return $res;
    }
    
    public function childrenList(){
            
           $this->db->select('*');  
           $this->db->from(TBL_CHILDREN);  
           
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like('childName', $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
//                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'ASC');  
           }
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();
           return $query->result();
    
    }
    
    public function get_filtered_data(){  
           $this->childrenList();  
           $this->db->from(TBL_CHILDREN);
           $query = $this->db->get();
           return $query->num_rows();  
    }   
    
    public function get_all_data()  
    {  
         $this->db->select("*");  
         $this->db->from(TBL_CHILDREN);
         return $this->db->count_all_results();  
    } 
    
    public function childrenEditDetails($id){
        $data['table']=TBL_CHILDREN;
        $data['select']=['*'];
        $data['where']=['id'=>$id];
        $res= $this->selectRecords($data);
        return $res;
    }
    
    public function childrenEdit($postData){
        
        if (!empty($_FILES['childPhoto']['name'])) {
            $this->load->library('upload');
            $ex=pathinfo($_FILES['childPhoto']['name']);
            $new_name = time().'.'.$ex['extension'];
            $config['upload_path'] = './public/images/children/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] =$new_name;
            $this->upload->initialize($config);
            $this->upload->do_upload('childPhoto');
        }

        $data['table']=TBL_CHILDREN;
        if (!empty($_FILES['childPhoto']['name'])) {
            $data['update']=[
              'childName'=>$postData['childName'],
              'childPhoneNo'=>$postData['childPhoneNo'],
              'childBirthDate'=>date("Y-m-d", strtotime($postData['childBirthDate'])),
              'childBloodGroup'=>$postData['childBloodGroup'],
              'childAddress'=>$postData['childAddress'],
              'childGender'=>$postData['childGender'],
              'childImage'=>$new_name,
              'updated_at'=>date("Y-m-d h:i:s"),
            ];
        }else{
          $data['update']=[
          'childName'=>$postData['childName'],
          'childPhoneNo'=>$postData['childPhoneNo'],
          'childBirthDate'=>date("Y-m-d", strtotime($postData['childBirthDate'])),
          'childBloodGroup'=>$postData['childBloodGroup'],
          'childAddress'=>$postData['childAddress'],
          'childGender'=>$postData['childGender'],
          'updated_at'=>date("Y-m-d h:i:s"),
        ];  
        }
        $data['where']=['id'=>$postData['id']];
        $res= $this->updateRecords($data);
        return $res;
    }
    
    public function childrenDelete($postData){
         if($postData['image'] != NULL){
            unlink('public/images/children/'.$postData['image']);
        }
        $data ["table"]=TBL_CHILDREN;
        $data['where']=['id'=>$postData['id']];
        $result=$this->deleteRecords($data);
        return $result;
    }
}?>