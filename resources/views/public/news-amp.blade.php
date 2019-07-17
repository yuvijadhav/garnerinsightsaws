@extends('layouts.app')

@section('content')

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="/">Home</a><span> -</span></li>
                <li>News & PR</li>
            </ul>
        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here --> 
<div class="product-page-list bg-secondary section-space-bottom">                
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
                                    <h4 class="sidebar-item-title">News & PR</h4>
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
                    <div class="tab-pane fade in active clear products-container" id="news-list">                    
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="pagination-align-left" id="pagination" style="margin-bottom:30px;">    
                            </ul>
                        </div>  
                    </div>
                </div> 
            </div>
        </div>                     
    </div>
</div>

<script type="text/javascript">

var limit=9;
var activePage=1;
var parent="#news-list";
var pagination="#pagination";
var serviceUrl="newsData";

var data=<?php echo json_encode($data);?>;
var total_count=<?php echo json_encode($total_count);?>;
showPagination(total_count,limit,activePage,pagination);
showPaginationData(data,parent,news_public);

$(pagination).on('click', 'li a.page', function() {
    activePage=parseInt($(this).text());
    getData(serviceUrl,activePage,limit,parent,pagination,news_public);
});

$(pagination).on('click','li a.direction',function(){
    activePage=parseInt(this.id);
    getData(serviceUrl,activePage,limit,parent,pagination,news_public);
});



</script>
@endsection