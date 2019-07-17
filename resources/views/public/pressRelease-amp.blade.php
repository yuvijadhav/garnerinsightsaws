@extends('layouts.app')

@section('content')

<title>Market Research Press Releases and Industry News</title>
<meta name="description" content="Stay updated with market research press releases and latest industry news on Garner Insights.">
<meta name="keywords" content="market research press releases, industry news">

@include('public.top-search')
<div class="product-page-list bg-secondary section-space-bottom page-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.public-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="inner-page-main-body">
                <div class="page-controls">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="page-controls-sorting">
                                <div class="dropdown">
                                    <h4 class="sidebar-item-title">PRESS RELEASE</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="layout-switcher">
                                <span class="message-text">@include('flash::message')</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="product-grid-view padding-narrow">
                    <div role="tabpanel" class="tab-pane fade in active clear products-container" id="list-view">

                    </div>

                        <div class="row">
                        <center>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:30px;">
                                <ul class="pagination-align-center" id="pagination">    

                                </ul>
                            </div>  
                            </center>
                        </div>

                </div> 
            </div>
        </div>                     
    </div>
</div>

<script type="text/javascript">

    var limit=5;
    var activePage=1;
    var parent="#list-view";
    var pagination="#pagination";
    var serviceUrl="articleData";

    var data=<?php echo json_encode($data);?>;
    var total_count=<?php echo json_encode($total_count);?>;
    showPagination(total_count,limit,activePage,pagination);
    showPaginationData(data,parent,articles_public);

    $(pagination).on('click', 'li a.page', function() {
        activePage=parseInt($(this).text());
        getData(serviceUrl,activePage,limit,parent,pagination,articles_public);
    });

    $(pagination).on('click','li a.direction',function(){
        activePage=parseInt(this.id);
        getData(serviceUrl,activePage,limit,parent,pagination,articles_public);
    });

</script>
@endsection