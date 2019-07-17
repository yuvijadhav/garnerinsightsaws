@extends('layouts.app')

@section('content')
<style type="text/css">

</style>

<script type="text/javascript">
var report=<?php echo json_encode($report);?>;
var amount=<?php echo json_encode($amount);?>;
</script>
<div class="container" style="margin-top:10px;">
  <div class="panel-group">   
    <div class="panel panel-default">
      <div class="panel-heading">                      
        <h3>Report EBS Title : {{$report->report_title}}</h3>
      </div>
      <div class="panel-body">
      <HTML>
<HEAD>
<TITLE>E-Billing Solutions Pvt Ltd - Payment Page</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=iso-8859-1">
<style>
table {
  font-family:Arial, Helvetica, sans-serif;
  font-size:12px;
}
th     { font-size:12px;background:#015289;color:#FFFFFF;font-weight:bold;height:30px;}
td     { font-size:12px;background:#DDE8F3}
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
<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);

$hashData = "Your Secret Key"; //Pass your Registered Secret Key

unset($_POST['submitted']);
ksort($_POST);
foreach ($_POST as $key => $value){
  if (strlen($value) > 0) {
    $hashData .= '|'.$value;
  }
}
if (strlen($hashData) > 0) {
  $secure_hash = strtoupper(hash("sha512",$hashData));//for SHA512
  //$secure_hash = strtoupper(hash("sha1",$hashData));//for SHA1
  //$secure_hash = strtoupper(md5($hashData));//for MD5
}
echo $hashData;

//print_r($secure_hash_md5); exit;
?>
<form action="https://secure.ebs.in/pg/ma/payment/request" name="payment" method="POST">
<table>
<input type="hidden" value="<?php echo $_POST['account_id'];?>" name="account_id"/><tbody><tr><td>account_id</td><td><?php echo $_POST['account_id'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['address'];?>" name="address"/><tr><td>address</td><td><?php echo $_POST['address'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['amount'];?>" name="amount"/><tr><td>amount</td><td><?php echo $_POST['amount'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['bank_code'];?>" name="bank_code"/><tr><td>bank_code</td><?php echo $_POST['bank_code'];?><td/></tr>
<input type="hidden" value="<?php echo $_POST['card_brand'];?>" name="card_brand"/><tr><td>card_brand</td><td><?php echo $_POST['card_brand'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['channel'];?>" name="channel"/><tr><td>channel</td><td><?php echo $_POST['channel'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['city'];?>" name="city"/><tr><td>city</td><td><?php echo $_POST['city'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['country'];?>" name="country"/><tr><td>country</td><td><?php echo $_POST['country'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['currency'];?>" name="currency"/><tr><td>currency</td><td><?php echo $_POST['currency'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['description'];?>" name="description"/><tr><td>description</td><td><?php echo $_POST['description'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['display_currency'];?>" name="display_currency"/><tr><td>display_currency</td><td><?php echo $_POST['display_currency'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['display_currency_rates'];?>" name="display_currency_rates"/><tr><td>display_currency_rates</td><td><?php echo $_POST['display_currency_rates'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['email'];?>" name="email"/><tr><td>email</td><td><?php echo $_POST['email'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['emi'];?>" name="emi"/><tr><td>emi</td><td><?php echo $_POST['emi'];?><td/></tr>
<input type="hidden" value="<?php echo $_POST['mode'];?>" name="mode"/><tr><td>mode</td><td><?php echo $_POST['mode'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['name'];?>" name="name"/><tr><td>name</td><td><?php echo $_POST['name'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['page_id'];?>" name="page_id"/><tr><td>page_id</td><td><?php echo $_POST['page_id'];?><td/></tr>
<input type="hidden" value="<?php echo $_POST['payment_mode'];?>" name="payment_mode"/><tr><td>payment_mode</td><td><?php echo $_POST['payment_mode'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['payment_option'];?>" name="payment_option"/><tr><td>payment_option</td><?php echo $_POST['payment_option'];?><td/></tr>
<input type="hidden" value="<?php echo $_POST['phone'];?>" name="phone"/><tr><td>phone</td><td><?php echo $_POST['phone'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['postal_code'];?>" name="postal_code"/><tr><td>postal_code</td><td><?php echo $_POST['postal_code'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['reference_no'];?>" name="reference_no"/><tr><td>reference_no</td><td><?php echo $_POST['reference_no'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['return_url']; ?>" name="return_url"/><tr><td>return_url</td><td><?php echo $_POST['return_url']; ?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_address'];?>" name="ship_address"/><tr><td>ship_address</td><td><?php echo $_POST['ship_address'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_city'];?>" name="ship_city"/><tr><td>ship_city</td><td><?php echo $_POST['ship_city'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_country'];?>" name="ship_country"/><tr><td>ship_country</td><td><?php echo $_POST['ship_country'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_name'];?>" name="ship_name"/><tr><td>ship_name</td><td><?php echo $_POST['ship_name'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_phone'];?>" name="ship_phone"/><tr><td>ship_phone</td><td><?php echo $_POST['ship_phone'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_postal_code'];?>" name="ship_postal_code"/><tr><td>ship_postal_code</td><td><?php echo $_POST['ship_postal_code'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['ship_state'];?>" name="ship_state"/><tr><td>ship_state</td><td><?php echo $_POST['ship_state'];?></td></tr>
<input type="hidden" value="<?php echo $_POST['state'];?>" name="state"/><tr><td>state</td><td><?php echo $_POST['state'];?></td></tr>
<input type="hidden" value="<?php echo $secure_hash; ?>" name="secure_hash"/><tr><td>secure_hash</td><td><?php echo $secure_hash;?></td></tr></tbody></table>
<button onclick="document.payment.submit();"> SUBMIT </button>
</form>
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
  <form  method="post" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">     
  <h3>Action URL : </h3>
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
            <input name="secure_hash" type="text" value="ff1c41936bf79b289845c9e5ab35f731"/> 
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

        <form class="form-horizontal" action="https://secure.ebs.in/pg/ma/payment/request" name="frmTransaction" id="frmTransaction" method="post">
           <input type="hidden" name="channel" value="2"/>

           <input name="ship_name" type="hidden" value=" XXXX " />
<input name="ship_address" type="hidden" value=" XXXX " />
<input name="ship_country" type="hidden" value=" XXXX " />
<input name="ship_state" type="hidden" value=" XXXX " />
<input name="ship_city" type="hidden" value=" XXXX " />
<input name="ship_postal_code" type="hidden" value="" />
<input name="ship_phone" type="hidden" value=" XXXX " />
<input name="bank_code" type="hidden" value=" XXXX " />
<input name="name_on_card" type="hidden" value=" XXXX"/> 
<input name="card_number" type="hidden" value="XXXX"/> 
<input name="card_expiry" type="hidden" value="XXXX" /> 
<input name="card_cvv" type="hidden" dvalue="XXXX"/> 
<input name="emi" type="hidden" value=" XXXX" />
<input name="page_id" type="hidden" value=" XXXX"/>
<input name="secure_hash" type="hidden" value="ff1c41936bf79b289845c9e5ab35f731"/> 


          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" value="{{$type}}">
          <input type="hidden" value="{{$report->report_id}}">          
          <div class="col-md-12">  
            <div class="form-group"> 
              <center>
                <b><div class="col-xs-4">Report ID : {{$report->report_id}}</div>
                <div class="col-xs-4">Type : {{$type}}</div>
                <div class="col=xs-4">Amount : {{$amount}}  $</div></b>
              </center>
            </div>
          </div>

          <div class="col-md-6">          
                <input type="hidden" name="amount" value="{{$amount}}">

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">First Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="account_id" value="25461">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Email ID:</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="reference_no" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Designation</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="amount" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="comment">Address:</label>
              <div class="col-sm-9">
                <textarea name="mode" class="form-control" rows="5" id="address" placeholder="Enter Address" required></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Zip Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="zip" placeholder="Enter Zip" required name="description">
              </div>
            </div>
            
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Last Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email" placeholder="Enter Last Name" name="return_url" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Phone</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="pre" placeholder="" name="name">
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="phone_no" placeholder="" name="address" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Company:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="company" placeholder="Enter Company" name="city" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">City:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="city" placeholder="Enter City" name="state" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">State:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="state" placeholder="Enter State" name="country" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Country:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Country:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="postal_code" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Country:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="phone" required>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Country:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="email" required>
              </div>
            </div>

          </div>
          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label><input type="checkbox" name="remember" required> Remember me</label>
              </div>
            </div>
          </div>

          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button value=”Submit” type="submit" class="btn btn-Success">Complete Payment</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection 
