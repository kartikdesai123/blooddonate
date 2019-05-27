<?php 
class Booking_model extends My_model
{
    public function route(){
        $data['table'] = 'route_list';
        $data['select'] = ['id','route'];
        $data['where'] = ['is_active'=>'active'];
        $res=$this->selectRecords($data);
        return $res;
    }

    public function GetTripTime($postData){
        $data['table']='trip_time';
        $data['select']=['id','time'];
        $data['where']=['routeId'=>$postData];
        $res=$this->selectRecords($data);
        
        return $res;
    }
    
    public function GetTripPickUpStaion($postData){
        $data['table']='station_list';
        $data['select']=['id','time','stationName'];
        $data['where']=['routeId'=>$postData['routeId'],'forTime'=>$postData['tripTimeId'],'stationType'=>'pickup'];
        $res=$this->selectRecords($data);        
        return $res;
    }
    
    public function GetTripDropStaion($postData){
        $data['table'] = 'station_list';
        $data['select'] = ['id','time','stationName'];
        $data['where'] = ['routeId'=>$postData['routeId'],'forTime'=>$postData['tripTimeId'],'stationType'=>'drop'];
        $res=$this->selectRecords($data);        
        return $res;
    }
    
    public function makePaymentBOB($postData,$id,$amount){
        $currency = '356';
        $language = 'USA';
        $receiptURL = base_url().'homepage/getResponse/';
        $errorURL = base_url().'homepage/getResponse/';
        $resourcePath = '/home/hcgk8u1dsu89/public_html/application/libraries/bob/cgnfile/';
        $aliasName = 'ROROFERRY';
        $myObj = new iPay24Pipe();
        $rnd = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
        $trackid = $rnd;
        $myObj->setResourcePath(trim($resourcePath));
        $myObj->setKeystorePath(trim($resourcePath));
        $myObj->setAlias(trim($aliasName));
        $myObj->setAction(trim('1'));
        $myObj->setUdf6("ROROFERRY");
        $myObj->setUdf7($postData['passanger'][0]);
        $myObj->setUdf8($postData['emailAddress']);
        $myObj->setUdf9($postData['phoneNumber']);
        $myObj->setUdf10($postData['cityName']."-".$postData['pinCode']);
        $myObj->setUdf11($amount);
        $myObj->setUdf12("No tax Details");
        $myObj->setUdf13($id);
        
        $myObj->setCurrency(trim($currency));
        $myObj->setLanguage(trim($language));
        $myObj->setResponseURL(trim($receiptURL));
        $myObj->setErrorURL(trim($errorURL));
        $myObj->setAmt($amount); //setPostData Amount
        $myObj->setTrackId($trackid);

        if (trim($myObj->performPaymentInitializationHTTP()) != 0) {
            echo("ERROR OCCURED! SEE CONSOLE FOR MORE DETAILS");
            return;
        } else {
            //	header("location:".$myObj->getwebAddress()); 
            $url = trim($myObj->getWebAddress());
            echo "<meta http-equiv='refresh' content='0;url=$url'>";
        }
    }
    
    public function makePaymentResponse() {
        $resourcePath = '/home/hcgk8u1dsu89/public_html/application/libraries/bob/cgnfile/';
        $aliasName = 'ROROFERRY';
        $myObj = new iPay24Pipe();
        $myObj->setResourcePath(trim($resourcePath));
        $myObj->setKeystorePath(trim($resourcePath));
        $myObj->setAlias(trim($aliasName));
        
        if (!empty(($_SERVER["QUERY_STRING"]))) {
            parse_str($_SERVER["QUERY_STRING"]);
        } else {
            $trandata = isset($_GET["trandata"]) ? $_GET["trandata"] : isset($_POST["trandata"]) ? $_POST["trandata"] : "";
        }
        
        //$paymentid =  isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "";
        $errorText = isset($_GET["ErrorText"]) ? $_GET["ErrorText"] : isset($_POST["ErrorText"]) ? $_POST["ErrorText"] : null;

        if (isset($trandata) && trim($myObj->parseEncryptedRequest(trim($trandata))) != 0) {

          //  echo 'Error : ' .$myObj->getError();
             $data = [
                'status'=>'error',
                'message'=>$myObj->getError()         
            ];
            return $data;
        } else {
           
            if ($errorText == null) {
                $data = [
                'status'=>'success',
                'id'=>$myObj->getudf13(),
                'transaction_status'=>$myObj->getResult(),
                'post_data'=>$myObj->getDates(),
                'transaction_refrence'=>$myObj->getRef(),
                'transaction_id'=>$myObj->getTransId(),
                'march_track_id'=>$myObj->getTrackId(),
                'transaction_anount'=>$myObj->getAmt(),
                'payment_id'=>$myObj->getPaymentId(),
                
            ];
            return $data;
            
            } else {
                $data = [
                'status'=>'error',
                'message'=>$errorText,
                'transaction_refrence'=>isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "",
                'transaction_id'=>isset($_GET["tranid"]) ? $_GET["tranid"] : isset($_POST["tranid"]) ? $_POST["tranid"] : "",
                'march_track_id'=>isset($_GET["trackid"]) ? $_GET["trackid"] : isset($_POST["trackid"]) ? $_POST["trackid"] : "",
                'payment_id'=>$myObj->getTrackId(),
                
            ];
            return $data;
           }
        }
    }
    
    public function paymentInquiry($postData){
       
        $currency = '356';
        $language = 'USA';
        $receiptURL = base_url().'homepage/getResponsepaymentInquiry/';
        $errorURL = base_url().'homepage/getResponsepaymentInquiry/';
        $resourcePath = '/home/hcgk8u1dsu89/public_html/phpnormal/cgnfile/';
        $aliasName = 'ROROFERRY';
        $rnd = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
        $trackid = $rnd;
        $amount = $postData['amount'];
        
        $myObj = new iPay24Pipe();

        $myObj->setTrackId(trim($trackid));
        $myObj->setAlias(trim($aliasName));
        $myObj->setResourcePath(trim($resourcePath));
        $myObj->setAction(trim('8'));
        $myObj->setAmt(trim($amount));
        $myObj->setCurrency(trim($currency));

        $myObj->setTransId($postData['transactionID']);

        $myObj->setUdf5('TRANID');
        $myObj->setKeystorePath(trim($resourcePath));

        
        if (trim($myObj->performTransaction()) != 0) {
            echo("ERROR OCCURED! SEE CONSOLE FOR MORE DETAILS");
             $data = [
                 'status'=>'error'
             ];
            return $data;
        } else {
            
            $data = [
                'status'=>'success',
                'transaction_status'=>$myObj->getResult(),
                'transaction_id'=>$myObj->getTransId(),
                'march_track_id'=>$myObj->getTrackId(),
                'transaction_anount'=>$myObj->getAmt(),
                'UDF5'=>$myObj->getUdf5()
            ];
            return $data;
            //	header("location:".$myObj->getwebAddress()); 
//            echo 'Transaction Status: '.$myObj->getResult().'<br>';
//            echo 'Transaction ID: '.$myObj->getTransId().'<br>';
//            echo 'Mrch Track ID: '.$myObj->getTrackId().'<br>';
//            echo 'Transaction Amt: '.$myObj->getAmt().'<br>';
//            echo 'UDF5: '.$myObj->getUdf5().'<br>';
            
            
            exit;
        }
    }
    
    public function getResponsepaymentInquiry(){
        $resourcePath = '/home/hcgk8u1dsu89/public_html/application/libraries/bob/cgnfile/';
        $aliasName = 'ROROFERRY';
        $myObj = new iPay24Pipe();
        $myObj->setResourcePath(trim($resourcePath));
        $myObj->setKeystorePath(trim($resourcePath));
        $myObj->setAlias(trim($aliasName));
        
        if (!empty(($_SERVER["QUERY_STRING"]))) {
            parse_str($_SERVER["QUERY_STRING"]);
        } else {
            $trandata = isset($_GET["trandata"]) ? $_GET["trandata"] : isset($_POST["trandata"]) ? $_POST["trandata"] : "";
        }
        
        //$paymentid =  isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "";
        $errorText = isset($_GET["ErrorText"]) ? $_GET["ErrorText"] : isset($_POST["ErrorText"]) ? $_POST["ErrorText"] : null;
// echo $trandata;exit
        if (isset($trandata) && trim($myObj->parseEncryptedRequest(trim($trandata))) != 0) {

            echo 'Error : ' .$myObj->getError();
        } else {
            if ($errorText == null) {
                print_r($myObj);
                die();
//                echo 'Transaction Status:' . $myObj->getResult() . '<br/>';
//                echo 'Post Date:' . $myObj->getDates() . '<br/>';
//                echo 'Transaction Reference ID:' . $myObj->getRef() . '<br/>';
//                echo 'Mrch Track ID:' . $myObj->getTrackId() . '<br/>';
//                echo 'Transaction ID:' . $myObj->getTransId() . '<br/>';
//                echo 'Transaction Amount:' . $myObj->getAmt() . '<br/>';
//                echo 'Payment ID:' . $myObj->getPaymentId() . '<br/>';
            } else {
                print_r($_GET);
                die();
//                echo 'ErrorText:' . $errorText . '<br/>';
//                echo 'Mrch Track ID:' . isset($_GET["trackid"]) ? $_GET["trackid"] : isset($_POST["trackid"]) ? $_POST["trackid"] : "" . '<br/>';
//                echo 'Transaction ID:' . isset($_GET["tranid"]) ? $_GET["tranid"] : isset($_POST["tranid"]) ? $_POST["tranid"] : "" . '<br/>';
//                echo 'Payment ID:' . $myObj->getTrackId() . '<br/>';
//                echo 'Transaction ID:' . isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "" . '<br/>';
            }
        }
    }
    
    public function paymentRefund($postData){
        
        try {
            
                    
                    $currency = '356';
                    $language = 'USA';
                    $receiptURL = base_url().'homepage/getResponsepaymentRefund/';
                    $errorURL = base_url().'homepage/getResponsepaymentRefund/';
                    $resourcePath = '/home/hcgk8u1dsu89/public_html/application/libraries/bob/cgnfile/';
                    $aliasName = 'ROROFERRY';
                    $rnd = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
                    $trackid = $rnd;
                    //$keystorePath = $ini_array['keystorePath'];

                    //$aliasName = $ini_array['aliasName'];
                    $myObj = new iPay24Pipe();
                    $amount =1.0;
                    $action=2;
 
                    $myObj->setTrackId(trim($trackid));
                    $myObj->setAlias(trim($aliasName));
                    $myObj->setResourcePath(trim($resourcePath));


                    $myObj->setAction(trim($action));
                    $myObj->setAmt(trim($amount));
                    $myObj->setCurrency(trim($currency));

                    $myObj->setTransId($postData['transactionID']);

                    $myObj->setTypes('C');

                    $myObj->setUdf5('User Define');


                     $myObj->setKeystorePath(trim($resourcePath));
       // $myObj->setKey("222222222222222222222222");
                    $myObj->setResponseURL(trim($receiptURL));
                    $myObj->setErrorURL(trim($errorURL));


                    $resval=0;

                    if(trim($myObj->performTransactionHTTP())!=0)  {
                            $url = $myObj->getErrorURL()."?result=".$myObj->getError();
                    } else {

                    //echo $myObj->getWebAddress();
                    //die();
                    $url =trim($myObj->getWebAddress());
                    }
                    echo "<meta http-equiv='refresh' content='0;url=$url'>";
			
			
		} catch(Exception $e) {
			echo 'Message: ' .$e->getFile();
	  		echo 'Message1 : ' .$e->getCode();
		}
    }
    
    public function getResponsepaymentRefund(){
        $resourcePath = '/home/hcgk8u1dsu89/public_html/application/libraries/bob/cgnfile/';
        $aliasName = 'ROROFERRY';
        $myObj = new iPay24Pipe();
        $myObj->setResourcePath(trim($resourcePath));
        $myObj->setKeystorePath(trim($resourcePath));
        $myObj->setAlias(trim($aliasName));
        
        if (!empty(($_SERVER["QUERY_STRING"]))) {
            parse_str($_SERVER["QUERY_STRING"]);
        } else {
            $trandata = isset($_GET["trandata"]) ? $_GET["trandata"] : isset($_POST["trandata"]) ? $_POST["trandata"] : "";
        }
        
        //$paymentid =  isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "";
        $errorText = isset($_GET["ErrorText"]) ? $_GET["ErrorText"] : isset($_POST["ErrorText"]) ? $_POST["ErrorText"] : null;

        if (isset($trandata) && trim($myObj->parseEncryptedResult(trim($trandata))) != 0) {
            echo 'Error : ' .$myObj->getError();
        } else {
            if ($errorText == null) {
                 $data = [
                'status'=>'success',
                'transaction_status'=>$myObj->getResult(),
                'transaction_id'=>$myObj->getTransId(),
                'march_track_id'=>$myObj->getTrackId(),
                'transaction_anount'=>$myObj->getAmt(),
                'UDF5'=>$myObj->getUdf5()
            ];
            return $data;
            } else {
                 $data = [
                 'status'=>'error'
             ];
            return $data;
            
                 print_r("ERROR");
                    die();
//                echo 'ErrorText:' . $errorText . '<br/>';
//                echo 'Mrch Track ID:' . isset($_GET["trackid"]) ? $_GET["trackid"] : isset($_POST["trackid"]) ? $_POST["trackid"] : "" . '<br/>';
//                echo 'Transaction ID:' . isset($_GET["tranid"]) ? $_GET["tranid"] : isset($_POST["tranid"]) ? $_POST["tranid"] : "" . '<br/>';
//                echo 'Payment ID:' . $myObj->getTrackId() . '<br/>';
//                echo 'Transaction ID:' . isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "" . '<br/>';
            }
        }
    }
    
    public function saveTicketDetails($postData,$amount){
            $rnd = substr(number_format(time() * rand(), 0, '', ''), 0, 5);
            $pnrNo = "RORO-".$rnd."-".date("Y");
            if($postData['noPassangerlesstwo'] == NULL){
                $postData['noPassangerlesstwo'] = '0';
            }

            if($postData['noPassangerequal'] == NULL){
                $postData['noPassangerequal'] = '0';
            }

            if($postData['noPassangerharter'] == NULL){
                $postData['noPassangerharter'] = '0';
            }
            
            $postData['depature']=date('Y-m-d', strtotime($postData['depature']));
            if($postData['depature'] == NULL){
                $postData['depature']='';
            }else{
                $postData['depature']=date('Y-m-d', strtotime($postData['depature']));
            }
            $totalPassange= $postData['noPassangerlesstwo'] + $postData['noPassangerequal'] + $postData['noPassangerharter'] ;
            $data['table']='ticket_details';
            $data['insert']=[
                
                'pnrNumber'=>$pnrNo,
                'trip'=>$postData['trip'],
                'trip_type'=>$postData['trip_type'],
                'fromstaton'=>$postData['fromstaton'],
                'tostation'=>$postData['tostation'],
                'depatureDate'=>$postData['depature'],
                'returntripDate'=>$postData['returntrip'],
                'vehical'=>$postData['vehical'],
                'pickupservices'=>$postData['pickupservices'],
                'busRoute'=>$postData['busRoute'],
                'tripTime'=>$postData['tripTime'],
                'tripPickUpTime'=>$postData['tripPickUpTime'],
                'tripDropTime'=>$postData['tripDropTime'],
                'ferryTime'=>$postData['ferryTime'],
                'ferryClass'=>$postData['ferryClass'],
                'noPassanger'=>$totalPassange,
                'noPassangerlesstwo'=>$postData['noPassangerlesstwo'],
                'noPassangerequal'=>$postData['noPassangerequal'],
                'noPassangerharter'=>$postData['noPassangerharter'],
                'emailAddress'=>$postData['emailAddress'],
                'phoneNumber'=>$postData['phoneNumber'],
                'cityName'=>$postData['cityName'],
                'pinCode'=>$postData['pinCode'],
                'payment'=>$amount,
                'created_at'=>date("Y-m-d h:i:s"),
                'updated_at'=>date("Y-m-d h:i:s"),
                
           ];
            $Id = $this->insertRecord($data);
            if($Id){
                for($i = 0;$i < count($postData['passanger']) ; $i++){
                    $data['table']='passanger_details';
                    $data['insert']=[
                        'ticketId'=>$Id,
                        'passangerName'=>$postData['passanger'][$i],
                        'passangerAge'=>$postData['passangerAge'][$i],
                        'passangerGender'=>$postData['passangerGender'][$i],
                        'created_at'=>date("Y-m-d h:i:s"),
                        'updated_at'=>date("Y-m-d h:i:s"),
                    ];
                    $result = $this->insertRecord($data);
                }
                return $Id ;  
            }else{
              return false;  
            }
    }
    
    
    
    public function paymnetSuccess($paymentDetails){       
        $data['table']='ticket_details';
        $data['where'] = ['id' => $paymentDetails['id']];
        $data['update']=[
            'transaction_id'=>$paymentDetails['transaction_id'],
            'payment_detail'=> json_encode($paymentDetails),

        ];
        $result = $this->updateRecords($data);
    }
    
    public function getpdfdetails($id){
        $data['select']=['td.*','sl.time as pickupTIme','rl.route as trip_route','sl.stationName as pickupPoint','sld.time as tripDropTime','sld.stationName as dropPoint'];
        $data['join'] = [
            
            'route_list as rl' => [
            'rl.id = td.busRoute',
                'LEFT',
            ],
            
            'station_list as sl' => [
            'sl.id = td.tripPickUpTime',
                'LEFT',
            ],
            
            'station_list as sld' => [
            'sld.id = td.tripDropTime',
                'LEFT',
            ],
        ];
        $data['table'] ='ticket_details as td';
        $data['where'] = ['td.id' => $id];
        $result = $this->selectFromJoin($data);
        return $result;
    }
    
    public function getpassangerDetails($id){
        $data['table']='passanger_details';
        $data['select']=['*'];
        $data['where'] = ['ticketId' => $id];
        $result = $this->selectRecords($data);
        return $result;
    }
}   
?>