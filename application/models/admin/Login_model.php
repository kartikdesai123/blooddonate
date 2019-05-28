<?php

 class Login_model extends My_model{
     
     function __construct() {
         parent::__construct();
     }
     
    public function logincheck($postData){
            $data['table']=TBL_USERS;            
            $data['select']=['firstName','lastName','email','image','id'];
            $data['where']=['email'=>$postData['email'],'password'=>md5($postData['password'])];	
            
            $res=$this->selectRecords($data);
            if(count($res)==1){
            $sessionData['blooddonate_admin'] = [
                'id' => $res[0]->id,
                'email' => $res[0]->email,
                'firstName' => $res[0]->firstName,
                'lastName'=>$res[0]->lastName,
                'image' => $res[0]->image,
                                     
            ];
            $this->session->set_userdata($sessionData);
                    return TRUE; 
            }else{
                 return FALSE;    
            }
    }
 }