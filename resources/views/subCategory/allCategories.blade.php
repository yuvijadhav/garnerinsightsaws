@extends('layouts.app')
@section('content')

<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 margin-bottom-15">
            <div class="inner-page-main-body">
                <div class="page-controls">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="page-controls-sorting">
                                <div class="dropdown">
                                    <button class="btn sorting-btn dropdown-toggle" type="button" data-toggle="dropdown">All Categories</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="layout-switcher">
                                <span class="message-text">@include('flash::message')</span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <div class="layout-switcher">
                                <a class="sidebar-full-width-btn add-button message-text" href="addCategory">Add Category</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-grid-view padding-narrow">
                    <div class="row" id="sub_category-list">                    
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <ul class="pagination-align-center" id="pagination">
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
    var parent="#sub_category-list";
    var pagination="#pagination";
    var serviceUrl="getSubCategory";

    var data=<?php echo json_encode($data);?>;
    var total_count=<?php echo json_encode($total_count);?>;
    var category_name="category_name";
    var item=data[0];

    showPaginationData(data,parent,sub_category);
    showPagination(total_count,limit,activePage,pagination);

    $('#pagination').on('click', 'li a.page', function() {
        pageNumber=$(this).text();
        activePage=parseInt(pageNumber);
        getData(serviceUrl,activePage,limit,parent,pagination,sub_category);
    });

    $("#pagination").on('click','li a.direction',function(){
        activePage=parseInt(this.id);
        getData(serviceUrl,activePage,limit,parent,pagination,sub_category);
    });
</script>
@endsection