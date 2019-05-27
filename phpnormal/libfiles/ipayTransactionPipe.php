<?php

/*************************************************************************************************************
 * Project id				:	FSS-PG-V1.0
 * Author					:	Vijayarumugam K
 * Date of Creation			:	21 April 2009
 * Class					:	ipayTransactionPipe
 * Purpose					:	Class for Connecting Merchant Demo pages with Payment Gateway.
 * *
 ************************************************************************************************************/
// $obj = new ipayTransactionPipe ();
// $str = "amt=100.00&action=1&responseURL=http://10.44.71.98:8080/JSPPlugin/jsp/resultPage/"."hostedTcpip/HostedPaymentResult.jsp&"."errorURL".
// "=http://10.44.71.98:8080/JSPPlugin/jsp/resultPage/hostedTcpip/HostedPaymentResult.jsp&trackid=1160788144&udf".
// "1=user defined field 1&udf2=user defined field 2&udf3=user defined field 4&udf4=user defined field 3&udf5=user" ."defined field5&currencycode=356&langid=USA&id=tranp2092&&"
// ;
// $xml="<request><card>4000000000000002</card><cvv2>123</cvv2><currencycode>356</currencycode><expyear>2014</expyear><expmonth>12</expmonth>".
// "<type>C</type><member>Test</member> <amt>3500.00</amt><action>1</action><trackid>773796384</trackid><udf1>udf1</udf1>".
// "<udf2>udf2</udf2><udf3>sdjfhsdj</udf3><udf4>udf4</udf4><udf5>sdfsdfsd</udf5>"."<currencycode>356</currencycode><savedcard>Y</savedcard><id>tranp2092</id></request>";
// var_dump ( $str );
// $addr = 'http://10.44.112.102:7020/IPAY2.1.1';
// echo $addr;

// var_dump($obj->performHostedTransaction ( $str, $addr ));


class ipayTransactionPipe {
	/**
	 * *********************************************************************************************
	 * Purpose in brief : This method is used for performing the Hosted Transaction
	 * Written by : Vijayarumugam K
	 * Last Modified : 21 April 2009
	 * Arguments passed : $request, $webAddress, port
	 * ********************************************************************************************
	 */
	function performHostedTransaction($request, $webAddress) {
		$webAddress = $webAddress . "/Payment.htm?param=paymentInit";
		// echo "<br/><br/><br/>".$webAddress ;
		$request = "&" . $request;
		$response = "";
		$tranType = "host"; // For Identifying the Type of Transaction
		                    // var_dump ( $request );
		                    // var_dump ( $webAddress );
		                    // echo "<br/><br/>$webAddress".$webAddress."<br/>";
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		echo "RESPONSE IS ------->".$response."------------";
		
	return $this->parseRequestResponse($response);
	}
	
	/**
	 * *********************************************************************************************
	 * Purpose in brief : This method is used for performing the Tranportal Transaction
	 * Written by : Vijayarumugam K
	 * Last Modified : 21 April 2009
	 * Arguments passed : $request, $webAddress, port
	 * ********************************************************************************************
	 */
	function performTranPortalTransaction($request, $webAddress) {
		$webAddress = $webAddress . "/tranPipe.htm?param=tranInit";
		$response = "";
		$tranType = "tran";
	
		
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		
		
		
		return $response;
	}
	function performTranPortalTransactionsslKeystore($request, $webAddress, $filePath, $password) {
		$webAddress = $webAddress . "/tranPipe.htm?param=tranInit";
		$response = "";
		$tranType = "tran";
		$response = $this->sendMessage ( $request, $webAddress, $tranType, $filePath, $password );
		return $response;
	}
	
	/**
	 * *********************************************************************************************
	 * Purpose in brief : This method is used for performing the Tranportal VbyV Transaction
	 * Written by : Vijayarumugam K
	 * Last Modified : 21 April 2009
	 * Arguments passed : $request, $webAddress, port
	 * ********************************************************************************************
	 */
	function performTranPortalVbyVTransaction(String $request, String $webAddress) {
		$webAddress = $webAddress . "/VPAS.htm?actionVPAS=VbvVEReqProcess";
		$response = "";
		$tranType = "tran";
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		return $response;
	}
	
	// Add by Karthick.A for IVR TCP/IP
	function performTranPortalIVRVbyVTransaction($request, $webAddress) {
		$webAddress = $webAddress . "/VPAS.htm?actionVPAS=VbvVEReqProcessIVR";
		// $webAddress = "http://10.44.71.86:8080/aciec/servlet/PaymentInitHTTPServlet";
		$response = "";
		$tranType = "tran";
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		return $response;
	}
	
	// Added by Priyadarshini R for IVR 3D
	function performTranPortalVbyVPAReqTransactionIVR($request, $webAddress) {
		// $webAddress = "http://10.44.71.86:8080/IPAYV2";
		$webAddress = $webAddress . "/VPAS.htm?actionVPAS=VbvPAReqProcessforIVR";
		$response = "";
		$tranType = "tran";
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		return $response;
	}
	
	// End for IVR 3D
	function performTranPortalPreAuthTransaction($request, $webAddress) {
		$webAddress = $webAddress . "/PreAuthtranPipe.htm?actionPreauth=preAuthInit";
		$response = "";
		$tranType = "tran";
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		return $response;
	}
	function performTranPortalVbyVEnrolledTransaction($request, $webAddress) {
		$webAddress = $webAddress . "/VPAS.htm?actionVPAS=VbvPAResProcess";
		$response = "";
		$tranType = "tran";
		$response = $this->sendMessage ( $request, $webAddress, $tranType );
		return $response;
	}
	
	/**
	 * *********************************************************************************************
	 * Purpose in brief : This method is used for Taking the $request to Payment Gateway.
	 * Written by : Vijayarumugam K
	 * Last Modified : 21 April 2009
	 * Arguments passed : $request, $webAddress and TransactionType
	 * ********************************************************************************************
	 */
	function sendMessage($request, $webAddress, $tranType) {
		$rawresponse = "";
		$tranType="";
		
		
		//echo "<br/><br/>url : " . $webAddress . "<br/>";
		try {
			if (strlen ( $webAddress ) <= 0) {
				return null;
			}
			/*
			 * if($webAddress.indexOf("https") != -1){
			 * System.setProperty("java.protocol.handler.pkgs", "com.sun.net.ssl.internal.www.protocol");
			 * System.setProperty("javax.net.debug", "all");
			 * HostnameVerifier hv = new HostnameVerifier() {
			 * @Override
			 * public boolean verify(String arg0, SSLSession arg1) {
			 * System.out.println("Warning: URL Host: " + arg0 + " vs. " + arg1.getPeerHost());
			 * return true;
			 * }
			 * };
			 * HttpsURLConnection.setDefaultHostnameVerifier(hv);
			 * }
			 */
			
			$contentType = "";
			/*
			 * if(strpos($webAddress,("https") )!= -1)
			 * System.setProperty("java.protocol.handler.pkgs", "com.sun.net.ssl.internal.www.protocol");
			 *
			 */
			
			if (! strcmp ( $tranType, "host" )) {
				$contentType = "Content-Type:application/x-www-form-urlencoded";
			} else if (! strcmp ( $tranType, "tran" )) {
				$contentType = "Content-Type:application/xml";
			}
			if (strlen ( $webAddress ) <= 0) {
				return null;
			}
			// echo "<br/><br/> REQUEST IS ".$webAddress.$request."<br/><br/>";
			$curl = curl_init ();
			if (strlen ( $request ) > 0) {
				curl_setopt ( $curl, CURLOPT_URL, $webAddress );
				curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
				curl_setopt ( $curl, CURLOPT_FRESH_CONNECT, TRUE );
				curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
				
				curl_setopt ( $curl, CURLOPT_HTTPHEADER, array (
						'Cache-Control: no-cache',
						$contentType 
				) ); // setting content type header
				curl_setopt ( $curl, CURLOPT_POSTFIELDS, $request ); // Setting raw post data as xml
				                                                     // $header_size = curl_getinfo ( $curl, CURLINFO_HEADER_SIZE );
				                                                     // echo "<br/><br/><CURL>" . $header_size;
				                                                     // echo "<br/><br/>URL".$webAddress;
				$rawresponse = curl_exec ( $curl );
				
				
				
				if ($rawresponse == false) {
					echo '<br/>Curl error: ' . curl_error ( $curl );
				}
				// print_r(curl_getinfo($curl));
				curl_close ( $curl );
//				ECHO "<BR/><BR/><BR/>" . $rawresponse;
				return $rawresponse;
			} else {
				return null;
			}
		} catch ( Exception $exception ) {
			echo "<br/><br/><br/>" . $e->getTraceAsString ();
			return null;
		}
	}
	
	
function parseRequestResponse($response){
	
	
		if($response!=null){
			$i= strpos($response,":");
			if($i == -1){
				return null;
			}else{	
	$arr[0]=substr($response,0,$i);
	$arr[1]=substr($response,$i+1,strlen($response));
			}
		}else{
			return null;

			}

			return $arr;
			}
	 }

?>
