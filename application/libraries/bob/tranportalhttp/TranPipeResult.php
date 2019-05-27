<HTML>
	<BODY class="bg">
		<br><br>
		<TABLE align=center border=1 bordercolor=black>
			<tr>
				<td>

					<TABLE align=center border=0 bordercolor=black>
						<TR>
							<TD colspan="2" align="center">
								<FONT size="4"><B>Transaction Details</B></FONT>
							</TD>
						</TR>
				<?php 
				
				require('../libfiles/iPay24Pipe.php');
				$ini_array = parse_ini_file("tranportalhttp.ini");
				$resourcePath = $ini_array['resourcePath'];
				$aliasName = $ini_array['aliasName'];
				//$keystorePath = $ini_array['keystorePath'];
				
				$myObj =new iPay24Pipe();
				$rnd = substr(number_format(time() * rand(),0,'',''),0,10);
				$trackid = $rnd;
				$myObj->setResourcePath(trim($resourcePath));
	
				$myObj->setAlias(trim($aliasName));
				 $myObj->setKeystorePath(trim($resourcePath));
				//$myObj->setKey("222222222222222222222222");
				if(!empty(($_SERVER["QUERY_STRING"])))
				{
					parse_str($_SERVER["QUERY_STRING"]);	 
				}
				else 
				{
					$trandata =  isset($_GET["trandata"]) ? $_GET["trandata"] : isset($_POST["trandata"]) ? $_POST["trandata"] : "";
				}
				
				
				if(isset($trandata) && trim($myObj->parseEncryptedResult(trim($trandata)))!=0) {
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
							
				}else if(isset($_GET["ErrorText"])) {?>
					<TR>
						<TD> ErrorText </TD>
						<TD> &nbsp;&nbsp;<?php echo $_GET["ErrorText"];?></TD>
					</TR>
					<?php } else { ?>
					<TR>
						<TD> Transaction Status </TD>
						<TD>&nbsp;&nbsp;<b><font size="2" color="red"><?php echo $myObj->getResult();?></font></b></TD>
					</TR>
					<TR>
						<TD>Post Date </TD>
						<TD>&nbsp;&nbsp;<?php echo $myObj->getDates();?></TD>
					</TR>
					<TR>
						<TD>Transaction Reference ID</TD>
						<TD>&nbsp;&nbsp;<?php echo $myObj->getRef();?></TD>
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
						<TD>UDF5</TD>
						<TD>&nbsp;&nbsp;<?php echo $myObj->getUdf5();?></TD>
					</TR>
					<TR>
						<TD>Payment ID</TD>
						<TD>&nbsp;&nbsp;<?php echo $myObj->getPaymentId();?></TD>
					</TR>
					<TR>
						<TD>ErrorText</TD>
						<TD>&nbsp;&nbsp;<?php echo $myObj->getError();?></TD>
					</TR>
				<?php 
				} ?>
		</table>
	</BODY>
</HTML>