@extends('layouts.app')

@section('content')
<form action="reports" method="post">
    <div class="main-banner2-area" id="index-height">
        <div class="main-banner2-wrapper">                       
            <strong class="welcome" id="search-font" style="font-family:'Arial Narrow">The world's largest market research store</strong>
            <h3 class="text-black" id="index-search-margin-bottom">Industry analysis from over 900,000 market research report and 400,000 company reports</h3>
            <div class="col-md-12 search-box">
                <form class="form-inline" id="search-form">
                    <center>
                        <div class="col-md-8 col-md-offset-2 search-background">
                            <div class="form-group col-md-10">
                                <input type="text" id="search" name="search" value="{{$search}}" placeholder="Search Your Keywords . . ." class="form-control">
                            </div>
                            <button type="submit" class="btn btn-default pull-left col-md-2" id="btn-search">Submit</button>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
</form>
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
                                    <h4 class="sidebar-item-title">Articles</h4>
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
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:30px;">
                            <ul class="pagination-align-left" id="pagination">    

                            </ul>
                        </div>  
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