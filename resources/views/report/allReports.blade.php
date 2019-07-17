@extends('layouts.app')
@section('content')


<div class="container-fluid" align="left" style="padding-bottom:0px;text-align: left;background: url('{{config('app.baseURL')}}/images/bg5.jpg');">
    <div class="main-banner2-wrapper" align="left">                       

        <div class="col-md-12 search-box" style="margin-bottom:10px;">
            <form class="form-inline" id="search-form" method="post" action="{{config('app.baseURL')}}/allReports">
                <center>
                    <div class="col-md-8 col-md-offset-2 search-background">
                        <div class="form-group col-md-10 col-xs-9">
                            <input type="text" id="search" name="search" placeholder="Search Reports . . ." class="form-control" value="{{$search}}">
                        </div>
                        <button type="submit" class="btn btn-default pull-left col-md-2 col-xs-3" id="btn-search">Search</button>
                    </div>    
                </center>
            </form>
        </div>
    </div>
</div>

<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>             
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 margin-bottom-15">
        <span class="message-text">@include('flash::message')</span>
            <div class="inner-page-main-body">
                <div class="page-controls">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="page-controls-sorting">
                                <div class="dropdown">
                                    <button class="btn sorting-btn dropdown-toggle" type="button" data-toggle="dropdown">All Reports</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="layout-switcher">
                                <a class="sidebar-full-width-btn add-button message-text" href="addReport">Add Report</a>
                            </div>
                            <div class="layout-switcher">
                                <a class="sidebar-full-width-btn add-button message-text" href="uploadFile">Upload File</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-view padding-narrow">
                    <div role="tabpanel" class="tab-pane fade in active clear products-container" id="list-view">
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
    var limit=10;
    var activePage=1;
    var parent="#list-view";
    var pagination="#pagination";
    var serviceUrl="allReportsData";

    var data=<?php echo json_encode($data);?>;
    var total_count=<?php echo json_encode($total_count);?>;
    showPagination(total_count,limit,activePage,pagination);
    showPaginationData(data,parent,reports);

    $(pagination).on('click', 'li a.page', function() {
        activePage=parseInt($(this).text());
        getData(serviceUrl,activePage,limit,parent,pagination,reports);
    });

    $(pagination).on('click','li a.direction',function(){
        activePage=parseInt(this.id);
        getData(serviceUrl,activePage,limit,parent,pagination,reports);
    });
</script>
@endsection