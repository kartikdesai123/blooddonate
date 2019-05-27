<html>
<HEAD>
<title>Canon - Tranportal</title>
</HEAD>
<LINK href="css/main.css" type=text/css rel=stylesheet>
<BODY class="bg">

<table width="100%" height="100%" cellpadding="1" cellspacing="1">
	
	<!--  BODY -->
	<tr>
		<td>
			<DIV align="center">
  <font size=5>Tranportal http transaction</font>
</DIV>
<CENTER>
<P>
<FONT size="5"><B>Transaction Details</B></FONT>
<FORM name="form1" ACTION="TranPipeBuyHttp.php" METHOD="POST">
<TABLE align=center border=0  bordercolor=black><tr><td>
<TABLE align=center border=1  bordercolor=black>
	<tr>
		<td width="40%">Action Type</td>
		<td>
			<select name="action" class="select">
			<option value="1"> 1 - Purchase </option> 
			<option value="2"> 2 - Credit  </option> 
            <option value="3"> 3 - Void Purchase </option> 
	        <option value="4"> 4 - Authorization </option> 
			<option value="5"> 5 - Capture   </option> 
			<option value="6"> 6 - Void Credit </option> 
			<option value="7"> 7 - Void Capture </option> 
			<option value="8"> 8 - Inquiry </option> 
			<option value="9"> 9 - Void Authorization </option> 
			</select>
		</td>
    </tr>

   <tr>
		<td>Card Number:</td>
		<td><input size="20" type="text" name="pan" value="4313938000000021"></td>
	</tr>

	<tr>
		<td>Amount:</td>
		<td><input size="20" type="text" name="AMOUNT" value="100"></td>
	</tr>
	
	<tr>
		<td>CVV:</td>
		<td><input size="3" type="text" name="cvv" maxlength=4 value="681"></td>
	</tr> 


	<tr>
		<td>Expiry Month &amp; Year</td>
		<td>
			<select class="select" name="expmm" >
			<option value="">SELECT</option>
			<option value="1">1</option> 
			<option value="2">2</option> 
			<option value="3">3</option> 
			<option value="4">4</option> 
			<option value="5">5</option> 
			<option value="6">6</option> 
			<option value="7">7</option> 
			<option value="8">8</option> 
			<option value="9">9</option> 
			<option value="10">10</option> 
			<option value="12">12</option> 
			<option value="11" selected>11</option> 
			</select>
			&nbsp;
			<select class="select" name="expyy" >
			<option value="">SELECT</option>
			<option value="2011">2011</option> 
			<option value="2012">2012</option> 
			<option value="2013">2013</option> 
			<option value="2014">2014</option> 
			<option value="2015">2015</option> 
			<option value="2016">2016</option> 
			<option value="2017">2017</option> 
			<option value="2018">2018</option> 
			<option value="2018">2019</option> 
			<option value="2020" selected="selected" >2020</option> 
			</select>
		</td></tr>
		<tr>
		<td>Cardholder's Name</td>
		<td><input size="20" type="text" name="name" value="Test"></td>
		</tr>
		<tr>
			<td width="40%">Transaction ID</td>
			<td><input size="20" type="text" name="comment"></td>
		</tr>
		<tr>
			<td width="40%">UDF1</td>
			<td><input size="20" type="text" value="Udf1" name="udf1"></td>
		</tr>
		<tr>
			<td width="40%">UDF2</td>
			<td><input size="20" type="text" value="Udf2" name="udf2"></td>
		</tr>
		<tr>
			<td width="40%">UDF3</td>
			<td><input size="20" type="text" value="Udf3" name="udf3"></td>
		</tr>
		<tr>
			<td width="40%">UDF4</td>
			<td><input size="20" type="text" value="Udf4" name="udf4"></td>
		</tr>
		<tr>
			<td width="40%">UDF5</td>
			<td>
				<select class="select" name="udf5" >
			<option value="User defined value 5">Udf5</option>
			<option value="PaymentID">PaymentID</option> 
			<option value="TrackID">TrackID</option> 
			<option value="SeqNum">SeqNum</option>
			<option value="HostTranID">HostTranID</option> 
			<option value="Test">Test</option>
			</select>
			</td>
		</tr>
		<tr>
			<td width="40%">Track ID</td>
			<td><input size="20" type="text" name="trckId" value="<?php echo substr(number_format(time() * rand(),0,'',''),0,10);?>"></td>
		</tr>
		<tr>
			<td>Select Type</td>
			<td>
				<select id="transacType" name="transacType">
				
					<option selected="selected" value="D">D</option>
					<option  value="C">C</option>
					
				</select>
			</td>
		</tr>

		
		
	</TABLE> 
	</td></tr></table>

<TABLE align=center border=0  bordercolor=black>

<tr>
		<td></td>
		<td><input type="Submit" value="Buy"></td>
	</tr></table>
<P>
</FORM>
</CENTER>
		</td>
	</tr>
	
</table>

</BODY>

</html>