<HTML>
	<HEAD>
		<META name="GENERATOR" content="IBM WebSphere Studio">
		<LINK href="css/main.css" type=text/css rel=stylesheet>
		<TITLE>Canon - Tranportal</TITLE>
	</HEAD>
	<?php 
        
		try {
            require('../libfiles/iPay24Pipe.php');
			$ini_array = parse_ini_file("tranportalhttp.ini");
 			$currency	= $ini_array['currency'];
 			$receiptURL	= $ini_array['receiptURL'];
 			$errorURL	= $ini_array['errorURL'];
			$resourcePath = $ini_array['resourcePath'];
			
			//$keystorePath = $ini_array['keystorePath'];
			
			$aliasName = $ini_array['aliasName'];
			$myObj = new iPay24Pipe();
			$amount =$_POST['AMOUNT'];
			$action=$_POST['action'];
			$comment = $_POST['comment'];
			$pan    = $_POST['pan'];
			$cvv    = $_POST['cvv'];
			$expmm  = $_POST['expmm'];
			$expyy  = $_POST['expyy'];
			$transacType = $_POST['transacType'];
			
			$myObj->setTrackId(trim($_POST['trckId']));
			$myObj->setAlias(trim($aliasName));
			$myObj->setResourcePath(trim($resourcePath));
			
			
			$myObj->setAction(trim($action));
			$myObj->setAmt(trim($amount));
			$myObj->setCurrency(trim($currency));
			$myObj->setCard($pan);
			$myObj->setCvv2($cvv);
			$myObj->setExpMonth($expmm);
			$myObj->setExpYear($expyy);
			$myObj->setMember($_POST['name']);
			$myObj->setTransId($comment);
			
			$myObj->setTypes($transacType);
			
			$myObj->setUdf1($_POST['udf1']);
			$myObj->setUdf2($_POST['udf2']);
			$myObj->setUdf3($_POST['udf3']);
			$myObj->setUdf4($_POST['udf4']);
			$myObj->setUdf5($_POST['udf5']);
		
		
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
?>

</HTML>