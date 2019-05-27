	<?php 
		try {
			require('../libfiles/iPay24Pipe.php');
			$ini_array = parse_ini_file("hostedhttp.ini");
 			$currency	= $ini_array['currency'];
 			$language	= $ini_array['language'];
 			$receiptURL	= $ini_array['receiptURL'];
 			$errorURL	= $ini_array['errorURL'];
			$resourcePath = $ini_array['resourcePath'];
			$aliasName = $ini_array['aliasName'];
			$myObj = new iPay24Pipe();
			$rnd = substr(number_format(time() * rand(),0,'',''),0,10);
			$trackid = $rnd;
			$myObj->setResourcePath(trim($resourcePath));
			$myObj->setKeystorePath(trim($resourcePath));
			$myObj->setAlias(trim($aliasName));
			$myObj->setAction(trim($_POST['action']));
			$myObj->setCurrency(trim($currency));
			$myObj->setLanguage(trim($language));
			$myObj->setResponseURL(trim($receiptURL));
			$myObj->setErrorURL(trim($errorURL));
			$myObj->setAmt($_POST['amount']);
			$myObj->setTrackId($trackid);
			$myObj->setUdf1($_POST['udf1']);
			$myObj->setUdf2($_POST['udf2']);
			$myObj->setUdf3($_POST['udf3']);
			$myObj->setUdf4($_POST['udf4']);
			$myObj->setUdf5($_POST['udf5']);
			
			$myObj->setUdf6($_POST['udf6']);
			$myObj->setUdf7($_POST['udf7']);
			$myObj->setUdf8($_POST['udf8']);
			$myObj->setUdf9($_POST['udf9']);
			$myObj->setUdf10($_POST['udf10']);
			
			$myObj->setUdf11($_POST['udf11']);
			$myObj->setUdf12($_POST['udf12']);
			$myObj->setUdf13($_POST['udf13']);
			$myObj->setUdf14($_POST['udf14']);
			$myObj->setUdf15($_POST['udf15']);
			$myObj->setUdf16($_POST['udf16']);
			$myObj->setUdf17($_POST['udf17']);
			$myObj->setUdf18($_POST['udf18']);
			$myObj->setUdf19($_POST['udf19']);
			$myObj->setUdf20($_POST['udf20']);
			
			
			$myObj->setUdf21($_POST['udf21']);
			$myObj->setUdf22($_POST['udf22']);
			$myObj->setUdf23($_POST['udf23']);
			$myObj->setUdf24($_POST['udf24']);
			$myObj->setUdf25($_POST['udf25']);
			$myObj->setUdf26($_POST['udf26']);
			$myObj->setUdf27($_POST['udf27']);
			$myObj->setUdf28($_POST['udf28']);
			$myObj->setUdf29($_POST['udf29']);
			$myObj->setUdf30($_POST['udf30']);
			
			$myObj->setUdf31($_POST['udf31']);
			$myObj->setUdf32($_POST['udf32']);
			
		//	$myObj->setKey("222222222222222222222222");
			if(trim($myObj->performPaymentInitializationHTTP())!=0) {
	  			echo("ERROR OCCURED! SEE CONSOLE FOR MORE DETAILS");
  				return;
			}else{
			//	header("location:".$myObj->getwebAddress()); 
			$url =trim($myObj->getWebAddress());
		    echo "<meta http-equiv='refresh' content='0;url=$url'>";
			}
		} catch(Exception $e) {
			echo 'Message: ' .$e->getFile();
	  		echo 'Message1 : ' .$e->getCode();
		}
	?>
	
