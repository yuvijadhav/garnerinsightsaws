@extends('layouts.app')
<style type="text/css">
	div a{
		color: #000;
	}
</style>
@section('content')
@include('public.top-search')
<title>Latest Press Release - Garner Insights</title>
<div class="pagination-area bg-secondary col-md-12" style="background-color: #eee">
	<div class="container">
		<div class="pagination-wrapper" style="padding: 15px 0 15px;">
			<ul>
				<li><a href="{{Config('app.baseURL')}}">Home</a><span> -</span></li>
				<li>Latest Press Release</li>
			</ul>
		</div>
	</div>  
</div>
<meta name="keywords" content="Latest News">	
<div class="container" >	
	<table class="table" id="articles">
	</table>
	
</div>

<script type="text/javascript">
	var articles=<?php echo json_encode($articles);?>;
	var ul=$("#articles");
	$.each(articles,function(intex,item) {

		var li="<tr><td><a href='{{config('app.baseURL')}}/press-release/"+item.article_url+"'>{{config('app.baseURL')}}/press-release/"+item.article_url+"</a></td></tr>";
		ul.append(li);
	});
</script>

@endsection
