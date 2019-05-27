<?php 

class Booking_model extends My_model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function bookingList(){
        
           $this->db->select("TPD.ticketId,TTB.ferryTime,TTB.transaction_id,TPD.passangerName,TPD.passangerAge,TPD.passangerGender,TTB.pnrNumber,TTB.depatureDate,TRL.route,TTB.busRoute,TSL.stationName as pickUpStation,TSL.time as pickupTime,TSLD.time as dropTime,TSLD.stationName as dropStation,TTB.phoneNumber"); 
           $this->db->from(TBL_PASSANGER_DETAILS.' as TPD');  
           $this->db->join(TBL_TICKET_DETAILS.' as TTB','TTB.id = '.'TPD.ticketId','LEFT');
           $this->db->join(TBL_ROUTE_LIST.' as TRL','TRL.id = '.'TTB.busRoute','LEFT');
           $this->db->join(TBL_STATION_LIST.' as TSL','TSL.id = '.'TTB.tripPickUpTime','LEFT');
           $this->db->join(TBL_STATION_LIST.' as TSLD','TSLD.id = '.'TTB.tripDropTime','LEFT');
        
           if(isset($_POST["search"]["value"]))  
           {  
//               $this->db->like(TBL_ROUTE_LIST.'.route', $_POST["search"]["value"]);
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
           $this->bookingList();  
//           $this->db->select("TPD.ticketId,TPD.passangerName,TPD.passangerAge,TPD.passangerGender,TTB.pnrNumber,TTB.depatureDate,TRL.route,TTB.busRoute,TSL.stationName as pickUpStation,TSL.time as pickupTime,TSLD.time as dropTime,TSLD.stationName as dropStation,TTB.phoneNumber"); 
           $this->db->from(TBL_PASSANGER_DETAILS.' as TPD');  
           $this->db->join(TBL_TICKET_DETAILS.' as TTB','TTB.id = '.'TPD.ticketId','LEFT');
           $this->db->join(TBL_ROUTE_LIST.' as TRL','TRL.id = '.'TTB.busRoute','LEFT');
           $this->db->join(TBL_STATION_LIST.' as TSL','TSL.id = '.'TTB.tripPickUpTime','LEFT');
           $this->db->join(TBL_STATION_LIST.' as TSLD','TSLD.id = '.'TTB.tripDropTime','LEFT');
           $query = $this->db->get();
           return $query->num_rows();  
        } 
        
        public function get_all_data()  
        {  
            $this->db->select("TPD.ticketId,TTB.transaction_id,TTB.ferryTime,TPD.passangerName,TPD.passangerAge,TPD.passangerGender,TTB.pnrNumber,TTB.depatureDate,TRL.route,TTB.busRoute,TSL.stationName as pickUpStation,TSL.time as pickupTime,TSLD.time as dropTime,TSLD.stationName as dropStation,TTB.phoneNumber"); 
            $this->db->from(TBL_PASSANGER_DETAILS.' as TPD');  
            $this->db->join(TBL_TICKET_DETAILS.' as TTB','TTB.id = '.'TPD.ticketId','LEFT');
            $this->db->join(TBL_ROUTE_LIST.' as TRL','TRL.id = '.'TTB.busRoute','LEFT');
            $this->db->join(TBL_STATION_LIST.' as TSL','TSL.id = '.'TTB.tripPickUpTime','LEFT');
            $this->db->join(TBL_STATION_LIST.' as TSLD','TSLD.id = '.'TTB.tripDropTime','LEFT');
            return $this->db->count_all_results();  
        } 
     
}?>