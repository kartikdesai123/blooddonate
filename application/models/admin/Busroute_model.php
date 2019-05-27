<?php 

class Busroute_model extends My_model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function busRouteList(){
        
           $this->db->select("*"); 
           $this->db->from(TBL_TRIP_TIME);  
           $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_TRIP_TIME.'.routeId','LEFT');
        
           if(isset($_POST["search"]["value"]))  
           {  
               $this->db->like(TBL_ROUTE_LIST.'.route', $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
//                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by(TBL_ROUTE_LIST.'.id', 'DESC');  
           }
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }
           $query = $this->db->get();
          
           return $query->result();
        }
        
        public function get_filtered_data(){  
           $this->busRouteList();  
           $this->db->from(TBL_TRIP_TIME);  
           $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_TRIP_TIME.'.routeId','LEFT');
        
           $query = $this->db->get();
           return $query->num_rows();  
        } 
        
        public function get_all_data()  
        {  
            $this->db->select("*"); 
            $this->db->from(TBL_TRIP_TIME);  
            $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_TRIP_TIME.'.routeId','LEFT');
        
             return $this->db->count_all_results();  
        } 
        
        public function addRoute($postData){
            
            $data['table']=TBL_ROUTE_LIST;
            $data['insert']=[
                'route'=>$postData['routeName'],
                'is_active'=>$postData['status'],
                'created_at'=>date("y-m-d h:i:s"),
                'updated_at'=>date("y-m-d h:i:s"),
            ];
            $res= $this->insertRecord($data);
            if($res){
                $data['table']=TBL_TRIP_TIME;
                $data['insert']=[
                    'routeId'=>$res,
                    'time'=>$postData['routeTime'],
                    'created_at'=>date("y-m-d h:i:s"),
                    'updated_at'=>date("y-m-d h:i:s"),
                ];
                $results= $this->insertRecord($data);
                if($results){
                   return true; 
                }else{
                    return false;
                }
            }else{
                return false;
            }
           
        }
        
        public function EditRouteDetails($id){
            $this->db->select("*"); 
            $this->db->from(TBL_TRIP_TIME);  
            $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_TRIP_TIME.'.routeId','LEFT');
            $this->db->where(TBL_TRIP_TIME.'.routeId',$id);  
            $query = $this->db->get();
            return $query->result();
        }
        
        public function EditRoute($postData){
            $data=[];
            $data['table']=TBL_ROUTE_LIST;
            $data['where']=['id'=>$postData['id']];
            $data['update']=[
                'route'=>$postData['routeName'],
                'is_active'=>$postData['status'],
                'updated_at'=>date("y-m-d h:i:s"),
            ];
            
            $res= $this->updateRecords($data);
            if($res){
                $data=[];
                $data['table']=TBL_TRIP_TIME;
                $data['where']=['routeId'=>$postData['id']];
                $data['update']=[
                    'time'=>$postData['routeTime'],
                    'created_at'=>date("y-m-d h:i:s"),
                    'updated_at'=>date("y-m-d h:i:s"),
                ];
                $results= $this->updateRecords($data);
                if($results){
                   return true; 
                }else{
                    return false;
                }
            }else{
                return false;
            }
            
        }
        
        public function deleteRoute($postData){
            $data=[];
            $data['table']=TBL_ROUTE_LIST;
            $data['where']=['id'=>$postData['id']];
            $res= $this->deleteRecords($data);
            if($res){
                $data=[];
                $data['table']=TBL_TRIP_TIME;
                $data['where']=['routeId'=>$postData['id']];
                $results= $this->deleteRecords($data);
                if($results){
                   return true; 
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
}?>