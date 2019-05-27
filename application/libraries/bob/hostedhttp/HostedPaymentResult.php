<HTML>
<HEAD>
<META name="GENERATOR" content="IBM WebSphere Studio">
<LINK href="css/main.css" type=text/css rel=stylesheet>
<TITLE>Canon - Hosted</TITLE>
</HEAD>
<BODY class="bg">
<br>
<TABLE align=center border=1  bordercolor=black>
	<tr>
		<td>
			<TABLE align=center border=0  bordercolor=black>
				<TR>
					<TD colspan="2" align="center">
						<FONT size="4"><B>Transaction Details   </B></FONT>
					</TD>
				</TR>
				<?php 

		try {
			require('../libfiles/iPay24Pipe.php');
			$ini_array = parse_ini_file("hostedhttp.ini");
			$resourcePath = $ini_array['resourcePath'];
			$aliasName = $ini_array['aliasName'];
			$myObj =new iPay24Pipe();
			$myObj->setResourcePath(trim($resourcePath));
			$myObj->setKeystorePath(trim($resourcePath));
			$myObj->setAlias(trim($aliasName));			
			
			if(!empty(($_SERVER["QUERY_STRING"])))
			{
				parse_str($_SERVER["QUERY_STRING"]);	 
			}
			else 
			{
				$trandata =  isset($_GET["trandata"]) ? $_GET["trandata"] : isset($_POST["trandata"]) ? $_POST["trandata"] : "";
			}
			
			//$paymentid =  isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : "";
			$errorText=isset($_GET["ErrorText"]) ? $_GET["ErrorText"] : isset($_POST["ErrorText"]) ? $_POST["ErrorText"] : null;
		//	echo $errorText;
			
				
		} catch(Exception $e) {
			echo 'Message: ' .$e->getFile();
	  		echo 'Message1 : ' .$e->getCode();
		}
	
	
	
			if(isset($trandata) && trim($myObj->parseEncryptedRequest(trim($trandata))) != 0) {
			
				echo '<TR>';
					echo '<TD>';
						echo 'Error';
					echo '</TD>';
					echo '<TD>';
					echo '	&nbsp;&nbsp;';
							echo $myObj->getError();
							echo '</b>';
					echo '</TD>';
				echo '</TR>';
			} else {
			
			
		
			
				if($errorText==null) { ?>
						<TR>
							<TD> Transaction Status </TD>
							<TD> &nbsp;&nbsp; <b><font size="2" color="red"><?php echo $myObj->getResult();?></font> </b></TD>
						</TR>
						<TR>
							<TD> Post Date </TD>
							<TD> &nbsp;&nbsp;<?php echo $myObj->getDates();?></TD> 
						</TR>
						<TR>
							<TD> Transaction Reference ID </TD>
							<TD> &nbsp;&nbsp;<?php echo $myObj->getRef();?></TD>
						</TR>
						<TR>
							<TD>Mrch Track ID</TD>
							<TD>&nbsp;&nbsp;<?php echo $myObj->getTrackId();?></TD>
						</TR>
						<TR>
							<TD><b>Transaction ID</b></TD>
							<TD>&nbsp;&nbsp;<?php echo $myObj->getTransId();?></TD>
						</TR>
						<TR>
							<TD>Transaction Amount</TD>
							<TD>&nbsp;&nbsp;<?php echo $myObj->getAmt();?></TD>
						</TR>
						<TR>
							<TD> UDF5 </TD>
							<TD> &nbsp;&nbsp;<?php echo $myObj->getUdf5();?></TD>
						</TR>
						<TR>
							<TD> Payment ID </TD>
							<TD> &nbsp;&nbsp;<?php echo $myObj->getPaymentId();?></TD>
						</TR>
					<?php } else { ?>
						<TR>
							<TD> ErrorText </TD>
							<TD> &nbsp;&nbsp;<?php echo $errorText;?></TD>
						</TR>
						<TR>
							<TD>Mrch Track ID</TD>
							<TD>&nbsp;&nbsp;<?php echo isset($_GET["trackid"]) ? $_GET["trackid"] : isset($_POST["trackid"]) ? $_POST["trackid"] : ""?></TD>
						</TR>
						<TR>
							<TD><b>Transaction ID</b></TD>
							<TD>&nbsp;&nbsp;<?php echo isset($_GET["tranid"]) ? $_GET["tranid"] : isset($_POST["tranid"]) ? $_POST["tranid"] : ""?></TD>
						</TR>
						<TR>
							<TD> Payment ID </TD>
							<TD> &nbsp;&nbsp;<?php echo isset($_GET["paymentid"]) ? $_GET["paymentid"] : isset($_POST["paymentid"]) ? $_POST["paymentid"] : ""?></TD>
						</TR>
					<?php
					}
				} ?>
			</table>
		</td>
	</tr>
</table>
<br>
<TABLE align=center>
	<tr>
		<td> <FONT size=2 color="BLUE"><A href="../index.html">Home Page</A> </FONT> </td>
	</tr>
</table>
	</BODY>
</HTML>
				