@extends('layouts.app')

@section('content')
<script type="text/javascript">
var report=<?php echo json_encode($report);?>;
var amount=<?php echo json_encode($amount);?>;
</script>
<div class="container" style="margin-top:10px;">
  <div class="panel-group">   
    <div class="panel panel-default">
      <div class="panel-heading">                      
        <h3>Report Title : {{$report->report_title}}</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="https://www.paypal.com/cgi-bin/webscr" id="form1">

          <input type="hidden" name="cmd" value="_xclick">
          <input type="hidden" name="hosted_button_id" value="5VEAAMDLVEE7G">   
          <input type="hidden" name="business" value="straitsbusinessgroup@gmail.com">   
          
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="type" value="{{$type}}">
          <input type="hidden" name="report_id" value="{{$report->report_id}}">          
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
                <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="first_name" value="{{$post['first_name']}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Email ID:</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$post['email']}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Designation</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation" value="{{$post['designation']}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="comment">Address:</label>
              <div class="col-sm-9">
                <textarea name="address" class="form-control" rows="5" id="address" placeholder="Enter Address" value="{{$post['address']}}">{{$post['address']}}</textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Zip Code</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="zip" placeholder="Enter Zip" value="{{$post['zip']}}" name="zip">
              </div>
            </div>
            
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label col-sm-3" for="lastName">Last Name:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="last_name" value="{{$post['last_name']}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="pwd">Phone</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="pre" placeholder="" name="pre" value="{{$post['pre']}}">
              </div>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="phone_no" placeholder="" name="phone_no" value="{{$post['phone_no']}}">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Company:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="company" placeholder="Enter Company" name="company" value="{{$post['company']}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">City:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" value="{{$post['city']}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">State:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" value="{{$post['state']}}">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="email">Country:</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country" value="{{$post['country']}}">
              </div>
            </div>               
          </div>
         

          <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-Success">Complete Payment</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $('#form1').submit();
  });
</script>
@endsection 
