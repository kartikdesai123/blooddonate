<?php 

class Station_model extends My_model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function stationList(){
        
           $this->db->select("*,".TBL_STATION_LIST.".id as stationId"); 
           $this->db->from(TBL_STATION_LIST);  
           $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_STATION_LIST.'.routeId','LEFT');

           if(isset($_POST["search"]["value"]))  
           {  
               $this->db->like(TBL_ROUTE_LIST.'.route', $_POST["search"]["value"]);
               $this->db->or_like(TBL_STATION_LIST.".stationName", $_POST["search"]["value"]); 
           }  
           if(isset($_POST["order"]))  
           {  
//                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
//                $this->db->order_by(TBL_ROUTE_LIST.'.id', 'DESC');  
           }
           
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }
           $query = $this->db->get();
          
           return $query->result();
    }
    
    public function get_filtered_data(){  
           $this->stationList();  
           $this->db->from(TBL_STATION_LIST);  
           $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_STATION_LIST.'.routeId','LEFT');
           $query = $this->db->get();
           return $query->num_rows();  
        } 
        
    public function get_all_data()  
    {  
        $this->db->select("*"); 
        $this->db->from(TBL_STATION_LIST);  
        $this->db->join(TBL_ROUTE_LIST,TBL_ROUTE_LIST.'.id = '.TBL_STATION_LIST.'.routeId','LEFT');
        return $this->db->count_all_results();  
    } 
    
    public function routeList(){
        
           $this->db->select(TBL_ROUTE_LIST.".*"); 
           $this->db->from(TBL_ROUTE_LIST);  
           $this->db->join(TBL_TRIP_TIME,TBL_TRIP_TIME.'.routeId = '.TBL_ROUTE_LIST.'.id','LEFT');
           $this->db->group_by(TBL_TRIP_TIME.'.routeId'); 
           $query = $this->db->get();
           return $query->result();
    }
    
    public function routeTimeList($id){
       $data['table']=TBL_TRIP_TIME;
       $data['select']=['time'];
       $data['where']=['routeId'=>$id];
       $result= $this->selectRecords($data);
       return $result;
       
       
    }
    
    public function addstation($postData){
        for($i = 0 ; $i < count($postData['stationType']) ;$i++){
            
            $data['table']=TBL_STATION_LIST;
            $data['insert']=[
            'stationName'=>$postData['stationName'][$i],
            'routeId'=>$postData['route'],
            'stationType'=>$postData['stationType'][$i],
            'forTime'=>$postData['ferryTime'],
            'time'=>$postData['stationTime'][$i],
            'created_at'=>date("Y-m-d h:i:s"),
            'updated_at'=>date("Y-m-d h:i:s"),
            ];
            $result = $this->insertRecord($data);
        }
        return true;
    }
    
    public function routeDetails($id){
        $data['table']=TBL_STATION_LIST;
        $data['select']= ['id','stationName','routeId','stationType','forTime','time'];
        $data['where']=['id'=>$id];
        $result= $this->selectRecords($data);
        return $result;
        
    }
    
    public function editstation($postData){
      
        $data['table']=TBL_STATION_LIST;
        $data['where']=['id'=>$postData['id']];
        $data['update']=[
            'routeId'=>$postData['route'],
            'forTime'=>$postData['ferryTime'],
            'stationType'=>$postData['stationType'],
            'stationName'=>$postData['stationName'],
            'time'=>$postData['stationTime'],
            'updated_at'=>date("Y-m-d h:i:s"),
        ];
        $result = $this->updateRecords($data);
        return $result;
    }
    
    public function deleteStation($postData){
            $data=[];
            $data['table']=TBL_STATION_LIST;
            $data['where']=['id'=>$postData['id']];
            $res= $this->deleteRecords($data);
            if($res){
                return true; 
            }else{
                return false;
            }
    }
}

?>