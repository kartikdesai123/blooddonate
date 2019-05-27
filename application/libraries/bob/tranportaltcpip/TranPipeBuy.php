<HTML>
	<HEAD>
		<META name="GENERATOR" content="IBM WebSphere Studio">
		<LINK href="css/main.css" type=text/css rel=stylesheet>
		<TITLE>Canon - Tranportal</TITLE>
	</HEAD>
	<?php 
        error_reporting(E_ALL);
		try {
            require('../libfiles/iPay24Pipe.php');
			$ini_array = parse_ini_file("tranportaltcpip.ini");
 			$currency	= $ini_array['currency'];
			
			
 			//$receiptURL	= $ini_array['receiptURL'];
 			//$errorURL	= $ini_array['errorURL'];
			$resourcePath = $ini_array['resourcePath'];
			
			$transacType = $_POST['transacType'];
			
			$aliasName = $ini_array['aliasName'];
			$myObj = new iPay24Pipe();
			$amount =$_POST['AMOUNT'];
			$action=$_POST['action'];
			$comment = $_POST['comment'];
			$pan    = $_POST['pan'];
			$cvv    = $_POST['cvv'];
			$expmm  = $_POST['expmm'];
			$expyy  = $_POST['expyy'];
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
			$myObj->setUdf1($_POST['udf1']);
			$myObj->setUdf2($_POST['udf2']);
			$myObj->setUdf3($_POST['udf3']);
			$myObj->setUdf4($_POST['udf4']);
			$myObj->setUdf5($_POST['udf5']);
			$myObj->setKeystorePath(trim($resourcePath));
			
			
			
			$myObj->setTypes($transacType);
            //$myObj->setKey("222222222222222222222222");
			//$myObj->setResponseURL(trim($receiptURL));
			//$myObj->setErrorURL(trim($errorURL));
			$resval=0;
			
			
			if(trim($myObj->performTransaction())!=0)  {
				echo "Error sending TranPipe Request: ".$myObj->getDebugMsg();
			}else{
			?>
			<BODY class="bg">
				<br>
				<TABLE align=center border=1  bordercolor=black>
					<tr>
						<td>
							<TABLE align=center border=0  bordercolor=black>
								<TR>
									<TD colspan="2" align="center">
										<FONT size="4"><B>Transaction Details</B></FONT>
									</TD>
								</TR>
								<TR>
									<TD>Transaction Status</TD>
									<TD>&nbsp;&nbsp;<b><font size="2" color="red"><?php echo $myObj->getResult();?></font></b></TD>
								</TR>
								
								
								<TR>
								<TD><b>Transactionsss ID</b></TD>
								<TD>&nbsp;&nbsp;<?php echo $myObj->getTransId();?></TD>
							</TR>
							
						
							<TR>
								<TD>Mrch Track ID</TD>
								<TD>&nbsp;&nbsp;<?php echo $myObj->getTrackId();?></TD>
							</TR>
							
							<TR>
								<TD>Transaction Amt</TD>
								<TD>&nbsp;&nbsp;<?php echo $myObj->getAmt();?></TD>
							</TR>
							<TR>
								<TD>UDF5</TD>
								<TD>&nbsp;&nbsp;<?php echo $myObj->getUdf5();?></TD> 
							</TR>
							
						</table>
					</td>
				</tr>
			</table>
		<br>
	</BODY>
	
	<?php 
	} 
	
	} catch(Exception $e) {
			echo 'Message: ' .$e->getFile();
	  		echo 'Message1 : ' .$e->getCode();
		}
		
		?>
</HTML>