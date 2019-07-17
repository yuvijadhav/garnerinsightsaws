@extends('layouts.app')

@section('content')
<!-- Inner Page Banner Area Start Here -->
@include('public.top-search')

<style type="text/css">
    .single-banner img{
        width: 150px;
    }
</style>
<script type="text/javascript">
    var news=<?php echo json_encode($news);?>;
</script>
<style type="text/css">
    #description p{
        padding-left:10px;
    }
    .inner-page-main-body .product-details-tab-area .tab-content{
        padding-top: 0px;
    }

    .post-thumb img {
        float: left;
        clear:left;
    }
    .post-content {
        float:right;
    }
</style>


<script type="text/javascript">
var news=<?php echo json_encode($news);?>;
</script>
<style type="text/css">
    .inner-page-main-body .product-details-tab-area .tab-content{
        padding-top: 0px;
    }
</style>

<div class="product-details-page bg-secondary section-space-bottom page-margin">  
    <div class="container">                      
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="inner-page-main-body">
                <div class="single-banner">
                    <input type="hidden" value="{{$news->news_id}}">
                    <div class="container-fluid" style="padding: 0px;">
                        <div class="col-md-3">
                            <img src="storage/app/{{$news->news_image}}" style="width: 180px;">
                        </div>
                        <div class="col-md-9">
                            <h2 class="title-inner-default">{{$news->news_title}}</h2>
                            <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$news->updated_at}}    
                            <br><br>
                        </div>

                        <div class="col-md-12">
                            {!! $news->news_info !!}                            
                        </div>
                    </div>  
                </div>  
                <h3 class="title-inner-section">Related Blogs</h3>   
                <div class="product-list-view-style2" id="related-news-list">

                </div>                                                        
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include ('layouts.public-left')
        </div>
    </div>                        
</div>

<script type="text/javascript">
var relatedNews=<?php echo json_encode($relatedNews);?>;
var parent="#related-news-list";
showPaginationData(relatedNews,parent,news_public);
</script>
@endsection