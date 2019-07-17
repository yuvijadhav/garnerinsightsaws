@extends('layouts.app')

@section('content')
@include('public.top-search')
<script type="text/javascript">
  var report=<?php echo json_encode($report);?>;
  var amount=<?php echo json_encode($amount);?>;
</script>

@include('flash::message')
<div class="container" style="margin-top:10px;">
  <div class="panel-group">   
    <div class="panel panel-default">
      <div class="panel-heading">                      
        <h3>Report Title : {{$report->report_title}}</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" action="paymentGateway" method="post">
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
                  <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="first_name" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Email ID:</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Designation</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="designation" placeholder="Enter Designation" name="designation" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="comment">Address:</label>
                <div class="col-sm-9">
                  <textarea name="address" class="form-control" rows="5" id="address" placeholder="Enter Address" required></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Zip Code</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="zip" placeholder="Enter Zip" required name="zip">
                </div>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label col-sm-3" for="lastName">Last Name:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="last_name" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Phone</label>
                <div class="col-sm-2">
                  <input type="text" class="form-control" id="pre" placeholder="" name="pre">
                </div>
                <div class="col-sm-7">
                  <input type="text" class="form-control" id="phone_no" placeholder="" name="phone_no" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Company:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="company" placeholder="Enter Company" name="company" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">City:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">State:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="state" placeholder="Enter State" name="state" required>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-3" for="email">Country:</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="country" placeholder="Enter Country" name="country" required>
                </div>
              </div>  
            </div>

            <div class="col-sm-12" style="margin-top: 20px;">

              <label style="margin-top: 25px;" class="control-label col-sm-4">Select Payment method</label>
              <div class="col-sm-8">

                <div class="col-md-5">
                  <label class="radio-inline">
                    <input style="margin-top: 30px; height: 15px;width: 15px;" type="radio" value="1" name="payment_way" class="payment_way" checked="checked"><img  src="{{config('app.baseURL')}}/storage/app/public/paypal.jpeg" style="height:70px;">
                  </label>
                </div>
                <div class="col-md-5">
                  <label class="radio-inline">
                    <input style="margin-top: 30px; height: 15px;width: 15px;" type="radio" value="2" name="payment_way" class="payment_way"><img src="{{config('app.baseURL')}}/storage/app/public/wire-transfer.jpg" style="height:70px;">
                  </label>
                </div>
              </div>
            </div>



            <!-- <div class="col-sm-12" style="margin-bottom: 10px;">
              <label class="control-label col-sm-3" for="email">Select Payment method</label>
              <div class="col-sm-9">
               <input type="hidden" id="img" name="payment_way"> 
               <div class="col-md-3 mode">
                <img class="payment-image" id="1" src="{{config('app.baseURL')}}/storage/app/public/paypal.jpeg" style="height:60px;">
              </div>
              <div class="col-md-3 mode">
                <img class="payment-image" id="2" src="{{config('app.baseURL')}}/storage/app/public/wiretrasnfer.jpg" style="height:40px;">
              </div>
            </div>
          </div> -->

          <div class="form-group">        
            <div class="col-sm-12" style="margin-top: 40px;">
              <center>
                <input type="checkbox" id="terms" required>
                <label for="terms">I agree to have read and accept the <a style="color:#b380ff
" href="http://garnerinsights.com/terms-and-condition" target="_blank">Terms and Conditions </a>of garnerinsights.com</label>
              </center>
            </div>
          </div>

          <div class="form-group">        
            <div class="col-sm-12" style="margin-top: 40px;">
              <center>
                <button style="font-size: 18px;" type="submit" class="btn btn-Success">COMPLETE PAYMENT</button>
              </center>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(".mode").click(function(){
    $(".mode").css({"border": "none", 
  });    
    $(this).css({"border-color": "#8BC34A",
     "border-width":"3px", 
     "border-style":"solid"});
  });

  $(".mode").hover(function(){
    $(".mode").css({"border": "none", 
  });    
    $(this).css({"border-color": "#246A9F",
     "border-width":"3px", 
     "border-style":"solid"});
  });
</script>
@endsection 
