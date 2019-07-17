@extends('layouts.app')
<style type="text/css">
	div a{
		color: #000;
	}
</style>
@section('content')
@include('public.top-search')
<title>Latest Reports - Garner Insights</title>
<div class="pagination-area bg-secondary col-md-12" style="background-color: #eee">
	<div class="container">
		<div class="pagination-wrapper" style="padding: 15px 0 15px;">
			<ul>
				<li><a href="{{Config('app.baseURL')}}">Home</a><span> -</span></li>
				<li>Latest Reports</li>
			</ul>
		</div>
	</div>  
</div> 


<meta name="keywords" content="Latest Reports">
<div class="container" >	
	<table class="table" id="reports">
		@foreach ($reports as $report)
		<tr>
			<td>
				<a href="{{config('app.baseURL')}}/{{$report->url}}">
					{{config('app.baseURL')}}/{{$report->url}}
				</a>
			</td>
		</tr>
		@endforeach
	</table>
</div>

@endsection
