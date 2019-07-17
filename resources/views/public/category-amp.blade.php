@extends('layouts.app')

@section('content')
<title>Secondary Market Research and Industry Analysis Reports</title>
<meta name="description" content="Choose from a collection of best Secondary Market Research and Industry Analysis Reports across all industries worldwide. Get reports of your target market now.">
<meta name="keywords" content="secondary market research, industry analysis">


@include('public.top-search')
 
<!-- Inner Page Banner Area End Here --> 
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
                                    <h4 class="sidebar-item-title">CATEGORIES</h4>
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
                    <div id="category-list">
                        
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
var parent="#category-list";
var pagination="#pagination";
var data=<?php echo json_encode($data);?>;
showPaginationData(data,parent,category_public);

</script>
@endsection