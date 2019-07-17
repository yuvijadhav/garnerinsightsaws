@extends('layouts.app')

@section('content')
<script type="text/javascript">
    var report=<?php echo json_encode($report);?>;
    console.log(report);
    var amount=<?php echo json_encode($amount);?>;
</script>
<!-- <head><title>Virtual Payment Client Example</title> -->
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="0" />
<body>
    <!-- start branding table -->
<!-- <table width='100%' border='2' cellpadding='2' bgcolor='#0074C4'>
<tr>
<td bgcolor='#CED7EF' width='90%'><h2 class='co'>&nbsp;MasterCard Virtual Payment Client Example</h2></td>
</tr>
</table> -->
<!-- end branding table -->

<!-- <center><h1>PHP 3-Party Transaction</h1></center>
<center><h2>Simply input those required fields to change the functionality.</h2></center>
-->

<!-- The "Pay Now!" button submits the form and gives control to the form 'action' parameter -->
<div class="container" style="margin-top:10px;display: none;">
    <div class="panel-group">   
        <div class="panel panel-default">
            <div class="panel-heading">                      
                <h3>Report Title : {{$report->report_title}}</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" id="form1" action="payAction" method="post">
                    <input  name="Title" value = "PHP VPC 3 Party Transacion">
                    <input type="hidden" name="vpc_type" value="{{$type}}">
                    <input type="hidden" name="vpc_report_id" value="{{$report->report_id}}">          
                    <div class="col-md-12">  
                        <div class="form-group"> 
                            <center>
                                <b><div class="col-xs-4">Report ID : {{$report->report_id}}</div>
                                    <div class="col-xs-4">Type : {{$type}}</div>
                                    <div class="col=xs-4">Amount : {{$amount}}  $</div>
                                </b>
                            </center>
                        </div>
                    </div>
                    <div class="col-md-6">          
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">First Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="vpc_first_name" value="{{$post['first_name']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Email ID:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="vpc_email" value="{{$post['email']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Designation</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="vpc_designation" value="{{$post['designation']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="comment">Address:</label>
                            <div class="col-sm-9">
                                <textarea name="vpc_address" class="form-control" rows="5" id="address" placeholder="Enter Address" value="{{$post['address']}}">{{$post['address']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Zip Code</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="zip" placeholder="Enter Zip" value="{{$post['zip']}}" name="vpc_zip">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="lastName">Last Name:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="vpc_last_name" value="{{$post['last_name']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Phone</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="pre" placeholder="" name="vpc_pre" value="{{$post['pre']}}">
                            </div>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="phone_no" placeholder="" name="vpc_phone_no" value="{{$post['phone_no']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Company:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="company" placeholder="Enter Company" name="vpc_company" value="{{$post['company']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">City:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="city" placeholder="Enter City" name="vpc_city" value="{{$post['city']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">State:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="state" placeholder="Enter State" name="vpc_state" value="{{$post['state']}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Country:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="vpc_country" value="{{$post['country']}}">
                            </div>
                        </div>               
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Virtual Payment Client URL:</label>
                        <div class="col-sm-9">
                            <input name="virtualPaymentClientURL" size="65" value="https://migs.mastercard.com.au/vpcpay" maxlength="250"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Basic 3-Party Transaction Fields : VPC Version:</label>
                        <div class="col-sm-9">
                            <input name="vpc_Version" value="1" size="20" maxlength="8"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Command Type:</label>
                        <div class="col-sm-9">
                            <input name="vpc_Command" value="pay" size="20" maxlength="16"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Merchant AccessCode:</label>
                        <div class="col-sm-9">
                            <input name="vpc_AccessCode" value="0F8C54C4" size="20" maxlength="8"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Merchant Transaction Reference:</label>
                        <div class="col-sm-9">
                            <input name="vpc_MerchTxnRef" value="1" size="20" maxlength="40"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">MerchantID: </label>
                        <div class="col-sm-9">
                            <input name="vpc_Merchant" value="TESTSTRAITSBMIGS" size="20" maxlength="16"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Transaction OrderInfo: </label>
                        <div class="col-sm-9">
                            <input name="vpc_OrderInfo" value="1" size="20" maxlength="34"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Purchase Amount: </label>
                        <div class="col-sm-9">
                            <input name="vpc_Amount" value="{{$amount}}" maxlength="10"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Receipt ReturnURL: </label>
                        <div class="col-sm-9">
                            <input name="vpc_ReturnURL" size="65" value="{{Config('app.baseURL')}}/payReturn" maxlength="250"/>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Payment Server Display Language Locale: </label>
                        <div class="col-sm-9">
                            <select name="vpc_Locale"><option SELECTED>en_AU</option><option>en_AU</option></select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">Currency: </label>
                        <div class="col-sm-9">
                            <select name="vpc_Currency"><option SELECTED>INR</option></select>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" NAME="SubButL" class="btn btn-Success">Pay Now</button>
                        </div>
                    </div>
                </form>
                <head>
                    <meta http-equiv="cache-control" content="no-cache" />
                    <meta http-equiv="pragma" content="no-cache" />
                    <meta http-equiv="expires" content="0" />
                </head>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    $("#form1").submit();
});
</script>