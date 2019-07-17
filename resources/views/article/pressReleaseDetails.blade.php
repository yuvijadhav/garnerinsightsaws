@extends('layouts.app')

@section('content')
<style type="text/css">
    .single-banner img{
        width: 150px;
    }
</style>
<script type="text/javascript">
    var article=<?php echo json_encode($article);?>;
</script>
<title>{{$article->article_title}} - Garner Insights</title>
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
@include('public.top-search')

<div class="product-details-page bg-secondary section-space-bottom page-margin">  
    <div class="container">                      
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="inner-page-main-body">
                <div class="single-banner">
                    <input type="hidden" value="{{$article->article_id}}"/>
                    <div class="container-fluid" style="padding: 0px;">
                        <!-- <div class="col-md-3">
                            <img src="{{ url('/') }}/storage/app/{{$article->article_image}}" style="width: 180px;">
                        </div> -->
                        <div class="col-md-12">
                            <h2 class="title-inner-default">{{$article->article_title}}</h2>
                            <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$article->updated_at}}    
                            <br><br>
                        </div>

                        <div class="col-md-12">
                            {!! $article->article_description !!}                            
                        </div>
                    </div>  
                </div>  
                <h3 class="title-inner-section">Related Press Releases</h3>   
                <div class="product-list-view-style2" id="related-article-list">

                </div>                                                        
            </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include ('layouts.public-left')
        </div>
    </div>                        
</div>

<script type="text/javascript">
    var relatedArticle=<?php echo json_encode($relatedArticle);?>;
    var parent="#related-article-list";
    showPaginationData(relatedArticle,parent,articles_public);
</script>
@endsection