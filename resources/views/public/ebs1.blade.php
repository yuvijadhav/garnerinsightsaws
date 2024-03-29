<HTML>
<HEAD>
<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<style>
table {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
th 		 { font-size:12px;background:#015289;color:#FFFFFF;font-weight:bold;height:30px;}
td 		 { font-size:12px;background:#DDE8F3}
.error {color:#FF0000; font-weight:bold;}
</style>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" type="text/css" media="all" />

<script src="http://code.jquery.com/jquery-1.9.1.js"></script> 
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
</HEAD>
<BODY LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0 bgcolor="#ECF1F7">

<table width="900" cellpadding="2" cellspacing="2" border="0" align="center">
<tr>
<th colspan="2">
<div id="tabs">
<ul>
	<li><a href="#tabs-1">Version 3 - Standard</a></li>
</ul>

<div id="tabs-1">
	<!--<form  method="post" action="validate_api.php" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
	<form  method="post" action="ebs2" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">  	 
	<h3>Action URL : https://secure.ebs.in/pg/ma/payment/request</h3>
    <table width="100%" cellpadding="2" cellspacing="2" border="0">
        <tr>
            <th colspan="2">Transaction Details</th>

        </tr>
		<tr>
            <td class="fieldName"><span class="error">*</span> Channel</td>
            <td align="left"><select name="channel" >
				<option value="0">Standard</option>
			</select></td>
        </tr>

	   <tr>
            <td class="fieldName" width="50%"><span class="error">*</span> Account Id</td>
            <td  align="left" width="50%"> <input name="account_id" type="text" value="25461" /></td>
        </tr>
	   <tr>
            <td class="fieldName" width="50%"><span class="error">*</span> Reference No</td>

            <td  align="left" width="50%"> <input name="reference_no" type="text" value="223" /></td>
        </tr>
        <tr>
            <td class="fieldName" width="50%"><span class="error">*</span> Sale Amount</td>
            <td  align="left" width="50%"> <input name="amount" type="text" value="1.00" /></td>
        </tr>
		<tr>
		<td class="fieldName"><span class="error">*</span>Currency</td>
		<td align="left"><select name="currency" >
				<option value="INR">INR</option>
				<option value="USD">USD</option>
                </select></td>
		</tr>
		<tr>
            <td class="fieldName">Additional Currency</td>
            <td align="left"><select name="display_currency" >
				<option value="INR">INR</option>
				<option value="USD" selected>USD</option>

				<option value="EUR" selected>EURO</option>
				<option value="GBP" selected>GBP</option>
			</select></td>
        </tr>
		<tr>
            <td class="fieldName" width="50%">Additional Currency Rate</td>
            <td  align="left" width="50%"> <input name="display_currency_rates" type="text" value="1" /></td>

        </tr>
        <tr>
            <td class="fieldName" width="50%"><span class="error">*</span> Description</td>
            <td  align="left" width="50%"> <input name="description" type="text" value="Test Order Description" /></td>
        </tr>
		      <tr>
            <td class="fieldName"><span class="error">*</span> Return Url</td>

            <td align="left"><input name="return_url" type="text" size="60" value="http://localhost/ebs/response.php" /> </td>
        </tr>
		<tr>
            <td class="fieldName"><span class="error">*</span> Mode</td>
            <td align="left"><select name="mode" >
				<option value="TEST">TEST</option>

				<option value="LIVE" selected>LIVE</option>
			</select> </td>
        </tr>
		<tr>
            <td class="fieldName">Payment Mode</td>
            <td align="left">
                <select name="payment_mode" >

				<option value="">All</option>	
				<option value="1">Credit Card</option>
				<option value="2">Debit Card</option>
				<option value="3">Net Banking</option>
				<option value="4">Cash Card</option>
				<option value="5">Credit Card - EMI</option>

				<option value="6">Credit Card - Reward Point</option>
				<option value="7">Paypal</option>
			</select>
            </td>
        </tr>
		<tr>
            <td class="fieldName">Card Brand</td>

            <td align="left">
                <select name="card_brand" >
				<option value="">All</option>	
				<option value="1">VISA</option>
				<option value="2">MasterCard</option>
				<option value="3">Maestro</option>
				<option value="4">Diners Club</option>

				<option value="5">American Express</option>
				<option value="6">JCB</option>
			</select>
            </td>
        </tr>
		<tr>
            <td class="fieldName">Payment Option</td>

            <td align="left">
				<input name="payment_option" type="text" value="" />
            </td>
        </tr>
		<tr>
            <td class="fieldName">Bank Code</td>
            <td align="left">
                <input name="bank_code" type="text" value="" />

            </td>
        </tr>
		<tr>
            <td class="fieldName">EMI</td>
            <td align="left">
                <input name="emi" type="text" value="" />
            </td>
        </tr>

		<tr>
            <td class="fieldName">Page ID</td>
            <td align="left">
                <input name="page_id" type="text" value="" />
            </td>
        </tr>
        <tr>
            <th colspan="2">Billing Address</th>

        </tr>

	    <tr>
            <td class="fieldName"><span class="error">*</span> Name</td>
            <td align="left">
                <input name="name" type="text" value="Billing Name" /></td>
                <input name="secret_key" type="text" value="ff1c41936bf79b289845c9e5ab35f731" /></td>
        </tr>
       
        <tr>

            <td class="fieldName"><span class="error">*</span>Address</td>
            <td align="left">
                <textarea name="address">Billing Address</textarea>
            </td>
        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span>City</td>

            <td align="left">
                <input name="city" type="text" value="Billing City" />
            </td>
        </tr>

        <tr>
            <td class="fieldName">State/Province</td>
            <td align="left">
               <input name="state" type="text" value="Billing State" />

            </td>
        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span>ZIP/Postal Code</td>
            <td align="left">
                <input name="postal_code" type="text" value="600001" />
            </td>

        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span>Country</td>
            <td align="left">
                                <input name="country" type="text" value="IND" />
            </td>
        </tr>

        <tr>
            <td class="fieldName"><span class="error">*</span>Email</td>
            <td align="left">
                <input name="email" type="text" value="name@yourdomain.in" />
            </td>
        </tr>

        <tr>

            <td class="fieldName">Telephone</td>
            <td align="left"><input name="phone" type="text" value="04423452345" /></td>
        </tr>
		
        <tr>
            <th colspan="2">Delivery Address</th>
        </tr>

		<tr>

            <td class="fieldName"> Name</td>
            <td align="left">
                <input name="ship_name" type="text" value="Shipping Name" /></td>
        </tr>
       
        <tr>
            <td class="fieldName">Address</td>
            <td align="left">

                <input name="ship_address" type="text" value="Shipping Address" />
            </td>
        </tr>

        <tr>
            <td class="fieldName">City</td>
            <td align="left">
                <input name="ship_city" type="text" value="Shipping City" />
            </td>

        </tr>

        <tr>
            <td class="fieldName">State/Province</td>
            <td align="left">
               <input name="ship_state" type="text" value="Shipping State" />
            </td>
        </tr>

        <tr>
            <td class="fieldName">ZIP/Postal Code</td>
            <td align="left">
                <input name="ship_postal_code" type="text" value="600000" />
            </td>
        </tr>

        <tr>
            <td class="fieldName">Country</td>

            <td align="left"><input name="ship_country" type="text" value="IND" /></td>
        </tr>

        
        <tr>
            <td class="fieldName">Telephone</td>
            <td align="left"><input name="ship_phone" type="text" value="04423452345" /></td>
        </tr>

        <tr>

            <td valign="top" align="center" colspan="2">
                <input name="submitted" value="Submit" type="submit" />&nbsp; 
                 
                    <input value="Reset" type="reset" />
                            </td>
        </tr>
	
        <tr>
            <td valign="top" align="center" colspan="2">
                <span class="error">*</span> 
                <span>denotes required field</span>

            </td>
        </tr>
    </table>
</form>
</div>


</div>
</th>
</tr>
</table>

</body>
</html>
