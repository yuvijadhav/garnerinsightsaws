@extends('layouts.app')
<style type="text/css">
	div a{
		color: #000;
	}
</style>
@section('content')

<title>Thank You - Garner Insights</title>



<!-- Event snippet for Thankyou Page conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-819970391/-msECO6dzocBENeC_4YD'});
</script>

<div class="pagination-area bg-secondary col-md-12" style="background-color: #eee">
	<div class="container">
		<div class="pagination-wrapper">
			<ul>
				<li><a href="{{Config('app.baseURL')}}">Home</a><span> -</span></li>
				<li>ThankYou</li>
			</ul>
		</div>
	</div>  
</div> 

<meta name="keywords" content="Thank you for contacting us">
<div class="contact-us-info-area">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class=""> 
					<h3 style="margin-top: 30px;" id="text-color-blue">Thank You</h3>
					<div class="contact-form"> 	
						Thank you for contacting <b>Garner Insights.</b>
						<br>
						<p>
							Your form has been submitted successfully. We will contact you shortly.
						</p>
						<br>
						<b>Warm Regards,</b>
						<br>
						Kevin Thomas | Corporate Sales Specialist<br>
						E-mail: <a href="mailto:sales@garnerinsights.com"> sales@garnerinsights.com</a> | Web: <a href="http://www.garnerinsights.com">Garner Insights</a>
					</div>
				</div>
			</div>
			<div style="margin-top: 30px;" class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				 @include('layouts.public-left')
			</div>
		</div>
	</div>
</div>

@endsection
