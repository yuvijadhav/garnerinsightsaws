@extends('layouts.app')

@section('content')

<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="home">Home</a><span> -</span></li>
                <li>Reports</li>
            </ul>
        </div>
    </div>  
</div> 
<!-- Inner Page Banner Area End Here --> 
<div class="product-page-list bg-secondary section-space-bottom">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.report-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="inner-page-main-body">
                <div class="page-controls">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="page-controls-sorting">
                                <div class="dropdown">
                                    <h4 class="sidebar-item-title">Reports</h4>
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

 var limit=2;
    var activePage=1;
    var parent="#list-view";
    var pagination="#pagination";
    var serviceUrl="reportsData";


var report = <?php echo json_encode($reports);?>;
var categories=<?php echo json_encode($categories);?>;
var regions=<?php echo json_encode($regions);?>;
var total_count=<?php echo json_encode($total_count);?>;


showPagination(total_count,limit,activePage,pagination);
showPaginationData(report,parent,reports_public);

$(pagination).on('click', 'li a.page', function() {
        activePage=parseInt($(this).text());
        var categories=getCheckCategories();
        var regions=getCheckRegions();
        getFilterData(serviceUrl,categories,regions,activePage,limit,parent,pagination,reports_public);
    });

    $(pagination).on('click','li a.direction',function(){
        activePage=parseInt(this.id);
        var categories=getCheckCategories();
        var regions=getCheckRegions();
        getFilterData(serviceUrl,categories,regions,activePage,limit,parent,pagination,reports_public);
    });

    categoryList = "#report-categories";
    showPaginationData(categories,categoryList,report_category);

    function getCheckCategories(){
        var reportList = $(".report-list");
        var list = [];
        $.each(reportList,function(i,item){
            if(item.checked == true){
                list.push(item.id);
            }
        });
        return list;
    }
    function getCheckRegions(){
        var regiontList = $(".region-list");
        var list = [];
        $.each(regiontList,function(i,item){
            if(item.checked == true){
                list.push(item.id);
            }
        });
        return list;
    }
    $("#report-categories").on("click",'div input.report-list',function(){
        var categories=getCheckCategories();
        var regions=getCheckRegions();
        activePage=1;
        getFilterData(serviceUrl,categories,regions,activePage,limit,parent,pagination,reports_public);
    });
    $("#region-list").on("click",'div input.region-list',function(){
        var categories=getCheckCategories();
        var regions=getCheckRegions();
        activePage=1;
        getFilterData(serviceUrl,categories,regions,activePage,limit,parent,pagination,reports_public);
    });

    var region_parent = $("#region-list");
    showPaginationData(regions,region_parent,regions_public);
</script>

@endsection