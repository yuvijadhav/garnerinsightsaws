@extends('layouts.app')

@section('content')

<title>{{$report->meta_title }} - Garner Insights</title>
<meta name="description" content="{{$report->meta_description}} - Garner Insights">
<meta name="keywords" content="{{$report->meta_keywords}}, Garner Insights">

<!-- Inner Page Banner Area Start Here -->
<style type="text/css">
    .text-white{
        color:#fff;
    }
    .tooltip-inner {background-color: #DE4521 ;
                    color:#FFF;}
    .tooltip-arrow { border-bottom-color:#f00; }
    .licence-type-list{
        margin-top: 5px;
        border-bottom: 1px solid #3EBDE4;
    }

    .verticalLine {
        height: 100%;
        width: 1px;
        border-left: 1px solid gray;
        margin:8px;
        padding-left:15px;
    }
    #table-view-more{
        display: none;
    }
    #figure-view-more{
        display: none;
    }
    .info{
        padding-top: 10px;
    }
    #payment{
        display: none;
    }
    #view-more{
        display: none;
    }
    .text-white{
        color:#FFF !important;
    }
    .back-grey{
        background-color: #eee;
    }
    .btn-download{
        background-color: #dc071b;
        border-color: #dc071b;
        color: #fff;
    }
    .btn-download:hover{
        background-color: #fff;
        border-color: #4c5763;
        color: #4c5763;
    }
    .tab-pane i p {
        padding: 0px;
        margin:0px;
        background: none;
        border: none;
        font-size: 14px;
        font-family: 'Roboto', sans-serif;
        text-decoration: none;
        white-space: pre-wrap;       /* Since CSS 2.1 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -pre-wrap;      /* Opera 4-6 */
        white-space: -o-pre-wrap;    /* Opera 7 */
        word-wrap: break-word;       /* Internet Explorer 5.5+ */
    }
    #more{
        display: none;
    }
    #table_more{
        display: none;
    }
    #figure_more{
        display: none;
    }
    center .btn:hover{
        color:#DC4421;
    }
    a .btn-download:hover{
        color:#fff !important   ;
        background-color: #fff !important;
    }
    a .btn-download:active{
        color:#fff !important   ;
        background-color: #DC4421 !important;
    }
    .text-1{
        color: rgb(57,168,168)  !important;
    }
    .border-new{
        border: 1px solid #ccc;

    }
    .category-home-image{
        height: 60px;
        width: 60px;
    }
    .latest-home-report{
        border:1px solid #ccc;
        padding: 0px;
        margin:10px;
    }
    .latest-home-report img{
        width: 100%;
        height: 200px;
    }
    .content-text{
        padding: 10px;
    }
    .text-black{
        color: #000 !important;
    }
    #search{
        width: 100%;
        padding: 20px;
        border-radius: 0px;
    }
    #btn-search{
        padding: 7px;
        border-radius: 0px;   
        background-color: #246A9F;
        border:1px solid #246A9F;
        color: #fff;
        font-size: 18px;
        font-weight: 900;
    }
    .search-box{
        margin-bottom: 40px;
    }

    .search-background{
        background-color: rgba(0,0,0,0.7);
        padding-left: 0px;
        padding-top: 15px;
        padding-bottom: 15px;
        border-radius: 10px;
    }
    #index-search-margin{
        margin-top:25px;
    }
    #index-search-margin-bottom{
        margin-bottom:25px;
    }
    #index-height{
        height:300px;
    }
    .li-left{
        margin-left: 5px;
    }
    .product-details-title li.active{
        background-color: #fff !important;

    }
    .inner-page-main-body .product-details-tab-area .product-details-title .active a{
        color: #246A9F;
    }
    .inner-page-main-body .product-details-tab-area .product-details-title li a:hover{
        color: #246A9F;
        background-color: #fff;
    }
    .inner-page-main-body .product-details-tab-area .product-details-title li a{
        border: solid 1px #ebebeb;
        border-bottom: none;
    }
    .inner-page-main-body .product-details-tab-area .product-details-title{
        border-bottom: none;
    }
    .product-details-title{
        height: 40px;
    }
    .bottom-padding{
        margin-bottom: 10px;
    }
    .product-list-view-style2 .single-item-list .item-content{
        padding: 4px 30px 15px !important;
    }
    .form-group .fa-question-circle{
        color:#000;
        background: transparent;;
    }
    .btn{
        color:#fff;
    }
    button:active {
        background-color: #45ccca !important;
    }
    #myCarousel .carousel-inner .item img{
        height: 105px;
    }
    #myCarousel .carousel-inner .item{
        min-height: 120px;
    }
    .item p  span{
        color:#246A9F;
    }
    #item-1{
        min-height: 250px;
    }
</style>

<?php
$data = $report->long_description;
$lenght = strlen($data);
$more = "";
$less = $data;
$moreLenght = 0;

$less = $data;
//$more=substr($data, 1000,$lenght);
$moreLenght = 1;


$tableData = $report->long_content;
$tableDataLength = $tableData;
$tableMore = "";
$tableLess = $tableData;
$moreTableLength = 0;

$tableLess = $tableData;
//$tableMore=substr($tableData, 1000,$tableDataLength);
$moreTableLength = 1;

$figureData = $report->table_figures;
$figureDataLength = $figureData;
$figureMore = "";
$figureLess = $figureData;
$moreFigureLength = 0;

//$figureLess=substr($figureData);
//$figureMore=substr($figureData, 1000,$figureDataLength);
$moreFigureLength = 1;
?>
<style type="text/css">

    *{ 
        margin: 0; padding: 0;
    }

    h5{ 
        position: absolute; top: 10px; left: 20px;right:20px; width: 80%;
    }
    h5 span{ 
        color: white; font: bold 12px/18px Helvetica, Sans-Serif; letter-spacing: -1px;  
        padding: 10px; 
    }
    h5 span.spacer{ 
        padding: 0px; background: none; 
    }
    #download{
        background-color: #246A9F !important;
    }
    #download a{
        color:#fff;
    }

    #download:hover{
        background-color: #FFF;
    }
    #download a:hover{
        color:#246A9F ;
    }
    #download:active{
        background-color: #FFF;
    }
    #download.active a{
        color:#246A9F;
    }
    p{
        font-style: normal !important;
    }
</style>
@include('public.top-search')
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="{{config('app.baseURL')}}/home">Home</a><span>  >></span></li>
                <li><a href="{{config('app.baseURL')}}/categories/{{$report->sub_category_description}}">{{$report->sub_category_name}}</a><span>  >></span></li>
                <li>{{$report->report_title}}</li>
            </ul>
        </div>
    </div>  
</div> 
<div class="product-details-page bg-secondary section-space-bottom" style="padding-top:10px;">  
    <div class="container">                      
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="inner-page-main-body">
                <div class="single-banner">
                    <input type="hidden" value="1">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-3">
                                <div class="image">
                                    <img height="160px;" width="115px" src="{{config('app.baseURL')}}/storage/app/{{$report->sub_category_image}}">

                                </div>
                            </div>
                            <div class="col-md-10 report-right">
                                <h1 style="min-height: 68px;margin-top: 20px;font-weight: 900;font-family: Roboto, Helvetica, Arial, sans-serif;" class="title-inner-default"><b><?php echo "$report->report_title" ?></b></h1>
                                <div class="info">
                                    <span>ID: <?php echo "$report->report_id" ?></span>
                                    <!--<span class="verticalLine">Report</span>-->
                                    <span class="verticalLine">{{$report->report_date}}</span>
                                    <span class="verticalLine">Region : {{$report->regions_name}}</span>
                                    <span class="verticalLine">{{$report->report_pages}} Pages</span>
                                    <span class="verticalLine">{{$report->publisher_name}}</span>                           
                                </div>
                            </div>
                        </div>                    
                    </div>    
                </div>
                <div class="single-banner">
                    <input type="hidden" value="{{$report->report_id}}"/>
                    <h2 class="title-inner-default hidden">{{$report->report_title}}</h2>

                    <div class="product-details-tab-area">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12" style="overflow: hidden;">
                                <ul class="product-details-title nav-tabs" id="reports-tabs">
                                    <li class="active description"><a href="#description" aria-expanded="false">Description</a></li>
                                    <li class="li-left review"><a href="#review" aria-expanded="false">Table of Contents</a></li>
                                    <li class="li-left figures"><a href="#figures" aria-expanded="false">Table & Figures</a></li>
                                    <li class="li-left request-sample" id="download"><a href="#request-sample" aria-expanded="false" >Request Sample <i class="fa fa-download" aria-hidden="true" style="margin-left:5px;"></i></a></li>
                                    <li class="li-left discount"><a href="#discount" aria-expanded="false">Check for Discount</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="description">
                                        <i><p><span id="less">{!! $less !!}</span><span id="more"> {!! $more !!}</span>
                                            </p></i>
                                        <div class="product-tag-line">
                                            <ul class="product-tag-item">
                                                <!--  <li><a id="view-more">View More</a></li> -->
                                            </ul>
                                        </div>
                                        <ul class="product-details-title nav-tabs">

                                            <li id="download-button1" class="li-left request-sample btn btn-download download-sidebar-gradient" style="background: #fff;border:none;margin: 0px  40%;"><a href="#request-sample" id="request-sample-link"  aria-expanded="false" style="    background: linear-gradient(#DC071B,#680000);padding: 10px;border-radius: 5px;border:1px solid #bbb;color: #fff;" autofocus>REQUEST SAMPLE <i class="fa fa-download" aria-hidden="true" style="margin-left:5px;"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="review" style="padding-left: 10px;">
                                        <i><p><span id="table_less">{!! $tableLess !!}</span><span id="table_more">{!! $tableMore !!}</span></p></i>
                                        <div class="product-tag-line">
                                            <ul class="product-tag-item">
                                                <!-- <li><a id="table-view-more">View More</a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="figures">
                                        <i> <p><span id="table_less">{!! $figureLess !!}</span><span id="figure_more">{!! $figureMore !!}</span></p></i>
                                        <div class="product-tag-line">
                                            <ul class="product-tag-item">
                                                <!--  <li><a id="figure-view-more">View More</a></li> -->
                                            </ul>
                                        </div>
                                    </div>          
                                    <div class="tab-pane fade" id="request-sample">  

                                        <!-- internal form -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="product-upload-page-area bg-secondary section-space-bottom">
                                                <h3 class="title-section">Request Sample</h3>
                                                <form id="personal-info-form" method="post" action="{{config('app.baseURL')}}/addEnquiryReport" enctype='multipart/form-data'>
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$report->report_title}}" name="report_id"/>
                                                    <input type="hidden" name="url" value="{{$report->url}}" required>
                                                    <input type="hidden" value="{{$report->report_pages}}" name="report_pages" readonly />
                                                    <input type="hidden" value="Sample_Report" name="source" readonly />
                                                    <div class="product-upload-wrapper inner-page-padding">
                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_name') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Name<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_name')}}" placeholder="Enter Name ..." name="enquiry_name" type="text" required>
                                                                @if ($errors->has('enquiry_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_name') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_email') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Email<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_email')}}" placeholder="Enter Email Id ..." name="enquiry_email" type="email" required>
                                                                @if ($errors->has('enquiry_email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_email') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_phone') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Phone<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_phone')}}" placeholder="Enter Phone no..." name="enquiry_phone" type="text" required>
                                                                @if ($errors->has('enquiry_phone'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_phone') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>


                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_company') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Name of the Company<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_company')}}" placeholder="Enter company Name..." name="enquiry_company" type="text" required>
                                                                @if ($errors->has('enquiry_company'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_company') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_title') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Title/ Designation<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_title')}}" placeholder="Enter title..." name="enquiry_title" type="text" required>
                                                                @if ($errors->has('enquiry_title'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_title') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_country') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Select Country<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <div class="custom-select">
                                                                    <select id="enquiry_country" name="enquiry_country" class='select2 enquiry_country' required>
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                    @if ($errors->has('enquiry_country'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('enquiry_country') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group upload-info-item"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>How can we help you?<span></span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <textarea class="profile-heading" name="category_description" rows="5" placeholder="Type text here"></textarea>
                                                            </div>
                                                        </div>
                                                        <!--   <div class="form-group upload-info-item"> 
                                                              <div class="upload-info-title"> 
                                                              </div>
                                                              <div class="upload-info-field"> 
                                                                  <input type="checkbox" id="terms" required>
                                                                  <label for="terms">I agree to have read and accept the <a style="color:#b380ff
                                  " href="http://garnerinsights.com/terms-and-condition" target="_blank">Terms and Conditions </a>of garnerinsights.com</label>
                                                              </div>
                                                          </div> -->
                                                    </div>
                                                    <div class="product-upload-wrapper inner-page-padding">

                                                        <div class="form-group upload-info-item"> 
                                                            <div class="upload-info-title">                         
                                                            </div>
                                                            <div class="upload-info-field">
                                                                <button type="submit" class="update-btn" >
                                                                    Submit
                                                                </button>                        
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                </form>     
                                            </div>
                                        </div>                     
                                    </div>  

                                    <div class="tab-pane fade" id="discount">  

                                        <!-- internal form -->
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="product-upload-page-area bg-secondary section-space-bottom">
                                                <h3 class="title-section">Request Discount</h3>
                                                <form id="personal-info-form" method="post" action="{{config('app.baseURL')}}/addEnquiryReport" enctype='multipart/form-data'>
                                                    {{ csrf_field() }}
                                                    <input type="hidden" value="{{$report->report_title}}" name="report_id"/>
                                                    <input type="hidden" name="url" value="{{$report->url}}" required>
                                                    <input type="hidden" value="{{$report->report_pages}}" name="report_pages" readonly />
                                                    <input type="hidden" value="Discount Enquiry" name="source" readonly />

                                                    <div class="product-upload-wrapper inner-page-padding">
                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_name') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Name<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_name')}}" placeholder="Enter Name ..." name="enquiry_name" type="text" required>
                                                                @if ($errors->has('enquiry_name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_name') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_email') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Email<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_email')}}" placeholder="Enter Email Id ..." name="enquiry_email" type="email" required>
                                                                @if ($errors->has('enquiry_email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_email') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_phone') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Phone<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_phone')}}" placeholder="Enter Phone no..." name="enquiry_phone" type="text" required> 
                                                                @if ($errors->has('enquiry_phone'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_phone') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>


                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_company') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Name of the Company<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_company')}}" placeholder="Enter company Name..." name="enquiry_company" type="text" required>
                                                                @if ($errors->has('enquiry_company'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_company') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_title') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Title/ Designation<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <input class="profile-heading" value="{{old('enquiry_title')}}" placeholder="Enter title..." name="enquiry_title" type="text" required>
                                                                @if ($errors->has('enquiry_title'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('enquiry_title') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group upload-info-item {{ $errors->has('enquiry_country') ? ' has-error' : '' }}"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>Select Country<span>*</span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <div class="custom-select">
                                                                    <select id="enquiry_country" name="enquiry_country" class='select2 enquiry_country' required>
                                                                        <option value="">Select</option>
                                                                    </select>
                                                                    @if ($errors->has('enquiry_country'))
                                                                    <span class="help-block">
                                                                        <strong>{{ $errors->first('enquiry_country') }}</strong>
                                                                    </span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group upload-info-item"> 
                                                            <div class="upload-info-title"> 
                                                                <h4>How can we help you?<span></span></h4>
                                                            </div>
                                                            <div class="upload-info-field"> 
                                                                <textarea class="profile-heading" name="category_description" rows="5" placeholder="Type text here"></textarea>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="product-upload-wrapper inner-page-padding">

                                                        <div class="form-group upload-info-item"> 
                                                            <div class="upload-info-title">                         
                                                            </div>
                                                            <div class="upload-info-field">
                                                                <button type="submit" class="update-btn" >
                                                                    Submit
                                                                </button>                        
                                                            </div>
                                                        </div> 
                                                    </div>  
                                                </form>     
                                            </div>
                                        </div>                     
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>    
                </div>   

                <div style="background-color:#fff;padding:15px;">
                    <h3>Related Reports</h3><br>
                    <div class="product-list-view-style2" id="related-reports-list" >


                    </div>
                </div>
            </div>
        </div> 

        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

            <div class="panel-group">
                <div class="panel panel-default panel-radius" id="panel-back">
                    <div class="panel-heading text-white sidebar-gradient"><strong><center style="font-size: 20px;">CHOOSE LICENCE TYPE</center></strong></div>
                    <form action="{{Config('app.baseURL')}}/postPayment" method="post">
                        {{ csrf_field() }}

                        <div class="bottom-padding">
                            <ul style="margin-top:10px;">
                                @if($report->single_price!="")
                                <li id='li-top'>
                                    <fieldset class="form-group" id="lic-type-margin">
                                        <input type="radio" id="buy1" value="{{$report->single_price}}" name="cost" selected>
                                        <label for="radio1" id="labuy1" class="text-black">SINGLE USER LICENSE - $ {{$report->single_price}} </label>
                                        <i class="fa fa-question-circle pull-right" rel="tooltip" data-toggle="tooltip" data-placement="top" data-original-title="This is a single user license, allowing one specific user access to the product. The report will be emailed to you in PDF format.">
                                        </i>
                                    </fieldset>
                                </li>
                                @endif
                                @if($report->corporate_price!="")
                                <li id='li-top'>
                                    <fieldset class="form-group" id="lic-type-margin">
                                        <input type="radio" id="buy2" value="{{$report->corporate_price}}" name="cost">
                                        <label for="radio2" id="labuy2" class="text-black">MULTI USER LICENSE - $ {{$report->corporate_price}} </label>
                                        <i class="fa fa-question-circle pull-right" rel="tooltip" class="tir" data-placement="top" data-original-title="This is a multi-users license, allowing up to five users access to the product. The report will be emailed to you in PDF format." >
                                        </i>
                                    </fieldset>
                                </li>
                                @endif
                                @if($report->enterprise_price!="")  
                                <li id='li-top'>
                                    <fieldset class="form-group" id="lic-type-margin">
                                        <input type="radio" id="buy3" value="{{$report->enterprise_price}}" name="cost">
                                        <label for="radio3" id="labuy3" class="text-black">ENTERPRISE LICENSE - $ {{$report->enterprise_price}} </label>
                                        <i class="fa fa-question-circle pull-right" rel="tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="This is an enterprise license, allowing all employees within your organization access to the product. The report will be emailed to you in PDF format.">
                                        </i>
                                    </fieldset>
                                </li>
                                @endif
                            </ul><br>
                            <input type="hidden" value="{{$report->report_id}}" name="report_id">
                            <input type="hidden" id="type1" name="type">
                            <input type="hidden"  id="amount1" name="amount">
                            <center><button type="submit"  class="btn1 btn view-button submit-gradient" id="btn-buy"><i class="fa fa-shopping-cart" style="margin-right: 5px;"></i><b>BUY NOW</b></button></center>
                        </div>
                    </form>
                </div>
            </div>

            <div id="payment">
                <form action="{{Config('app.baseURL')}}/postPayment" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$report->report_id}}" name="report_id">
                    <input type="hidden" id="type1" name="type">
                    <input type="hidden"  id="amount1" name="amount">
                    <div class="panel-group">
                        <div class="panel panel-default panel-radius">
                            <div class="panel-heading text-white sidebar-gradient"><center>Order</center></div>
                            <div class="panel-body">

                                <br>
                                <div class="sidebar-item-inner">                   
                                    <center><h3 class="sidebar-item-title">Payment Method</h3></center>

                                    <hr>
                                    <input type="hidden" id="img" name="payment_way"> 
                                    <div class="col-md-12 mode">
                                        <img class="payment-image" id="1" src="{{config('app.baseURL')}}/storage/app/public/paypal.jpeg" style="height:60px;">
                                    </div>
                                    <!-- <div class="col-md-6 mode">
                                        <img class="payment-image" id="2" src="{{config('app.baseURL')}}/storage/app/public/ebs.jpg" style="height:30px;">
                                    </div> -->

                                    <center><button style="font-size:21px;" type="submit" id="buy" class="btn btn-primary view-button submit-gradient"><b>PROCEED TO PAYMENT</b></button>
                                    </center>                        
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-group">
                <div class="panel panel-default panel-radius">
                    <div class="panel-heading text-white sidebar-gradient"><strong><center>ENQUIRE BEFORE BUYING</center></strong></div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="{{config('app.baseURL')}}/addEnquiry" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="hidden" name="report_id" value="{{$report->report_title}}" required>
                            <input type="hidden" name="url" value="{{$report->url}}" required>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control back-grey" placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">          
                                    <input type="email" class="form-control back-grey" placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">          
                                    <input type="text" class="form-control back-grey" placeholder="Phone" name="phone" required>
                                </div>
                            </div>
                            <center><button type="submit" class="btn view-button submit-gradient"><b>SUBMIT</b></button></center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-group">
                <div class="panel panel-default panel-radius">
                    <div class="panel-heading text-white sidebar-gradient"><strong><center>OUR CLIENTS</center></strong></div>
                    <div class="panel-body">
                        <div class="" style="min-height: 120px">

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" style="text-align: center;">
                                    <div class="item active">
                                        <img src="{{config('app.baseURL')}}/img\product\3M01-3M-LOGO.jpg" alt="product" class="img-responsive">
                                    </div>

                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\Arthur D. Little.jpg" alt="product" class="img-responsive">
                                    </div>

                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\Caterpillar.jpg" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\DuPont.jpg" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\H Energy.png" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\hp.jpg" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\International Paper.jpg" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\Lincoln University.png" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\Marshall Aerospace & Defence Group.png" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\Meadow_Foods.jpg" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\meadow-foods.png" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\Old-World-Industries-LLC_logo.jpg" alt="product" class="img-responsive">
                                    </div>
                                    <div class="item">
                                        <img src="{{config('app.baseURL')}}/img\product\THE BOSTON.png" alt="product" class="img-responsive">
                                    </div>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel-group">
                <div class="panel panel-default panel-radius">
                    <div class="panel-heading text-white sidebar-gradient"><strong><center>WHY CHOOSE US</center></strong></div>
                    <div class="panel-body">
                        <p>Get 15 minutes of free Consultation
                            When you request a Sample Report!
                        </p>
                        <b>24/7 Research Report</b>
                        <p>Get your queries resolved from an 
                            industry expert. Request for a free
                            product review before report
                            purchase.</p>
                        <p><b>Phone:</b></p> 
                        <p>+1 513 549 5911 (US)</p>
                        <p>+44 203 318 2846 (UK)</p>
                        <p>Email: sales@garnerinsights.com</p>
                    </div>
                </div>
            </div>


            <div class="panel-group">
                <div class="panel panel-default panel-radius">
                    <div class="panel-heading text-white sidebar-gradient"><strong><center>TESTIMONIALS</center></strong></div>
                    <div class="panel-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <!-- Wrapper for slides -->
                            <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i><br>
                            <div class="carousel-inner" style="padding: 0 5px;">

                                <div class="item active" id="item-1">
                                    <div style="min-height: 170px;" id="text-gray-dark">What amazed me most was the professionalism and client satisfaction provided by Garner Insights. Their responses were quick and actioned on immediately.
                                    </div>
                                    <p style="color:#027daa">
                                        <span align="left"><b>Sr. Manager</b></span><br>
                                        <span align="left">A UK based manufacturing firm</span>
                                    </p>
                                </div>

                                <div class="item" id="item-1">
                                    <div id="text-gray-dark" style="min-height: 170px;">I would like to thank the team at Garner Insights, you guys made my job so easier with your spoon fed service and quality market study.</div>

                                    <p style="color:#027daa"> <span align="left"><b>President </b></span><br>
                                        <span align="left">At a US based consulting firm</span></p>
                                </div>

                                <div class="item" id="item-1">
                                    <div id="text-gray-dark" style="min-height: 170px;">The team of Garner Insights solved my queries in a timely fashion and gracefully. I have purchased reports from them a few times now and they never cease to impress with their highly intellectual team.</div>

                                    <p style="color:#027daa">
                                        <span align="left"><b>Marketing Manager </b>
                                        </span><br>
                                        <span align="left">At a Fortune 100 pharmaceutical firm</span></p>
                                </div>
                                <div class="item" id="item-1">
                                    <div id="text-gray-dark" style="min-height: 170px;" >I had some issues with the payment gateway and almost the immediate second I get a call from one of the enthusiastic sales member who guided me throughout the process and also reassured me of the next steps.</div>
                                    <p style="color:#027daa"> <span align="left"><b>A Consultant </b></span><br>
                                        <span align="left">At a German based retail firm</span>
                                    </p>
                                </div>

                                <div class="item" id="item-1"> 
                                    <div id="text-gray-dark" id="item-1">The quality of data encompassed in the report was very useful for me in my marketing strategy needs</div>
                                    <p style="color:#027daa"><span align="left"><b>Director of Marketing</b></span><br>
                                        <span align="left">At a US based Manufacturing firm</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
        <div class="fox-sidebar">


            <!-- <div class="sidebar-item">
            <div class="sidebar-item-inner">
            <h3 class="sidebar-item-title">About this Report</h3>
            </div>
            <table class="table table-striped table-bordered">
            <tbody>
            <tr>
            <td>Report ID</td>
            <td><?php echo "$report->report_id" ?></td>
            </tr>
            <tr>
            <td>Category</td>
            <td id="sub_category_id"></td>
            </tr>
            <tr>
            <td>Published On</td>
            <td><?php echo "$report->report_date" ?></td>
            </tr>
            <tr>
            <td>No. of Pages</td>
            <td><?php echo "$report->report_pages" ?></td>
            </tr>
            <tr>
            <td>Publisher Name</td>
            <td id="publisher_id"><?php echo "$report->publisher_name" ?></td>
            </tr>
            <tr>
            <td>Overall Rating</td>
            <td>Dooley</td>
            </tr>
            </tbody>
            </table>
            </div> -->
        </div>
    </div>
</div>                        
</div>
</div>
<script type="text/javascript">
    $("#view-more").click(function () {
        $(this).hide();
        $("#more").show();
    });
    var more =<?php echo $moreLenght; ?>;
    if (more == 1) {
        $("#view-more").show();
    }

    $("#table-view-more").click(function () {
        $(this).hide();
        $("#table_more").show();
    });
    var table_more =<?php echo $moreTableLength; ?>;
    if (table_more == 1) {
        $("#table-view-more").show();
    }

    $("#figure-view-more").click(function () {
        $(this).hide();
        $("#figure_more").show();
    });
    var figure_more =<?php echo $moreFigureLength; ?>;
    if (figure_more == 1) {
        $("#figure-view-more").show();
    }

    $.getJSON("{{ asset('js/countries.json')}}", function (countries) {
        $.each(countries, function (i, item) {
            var select_text = item.name;
            var select_value = item.name;
            var o = new Option(select_text, select_value);
            $(".enquiry_country").append(o);
        });
    });

    var report =<?php echo json_encode($report); ?>;
    $("#sub_category_id").text(report.sub_category_name);
    $("#publisher_id").text(report.publisher_name);
    var relatedReports =<?php echo json_encode($relatedReports); ?>;
    var parent = "#related-reports-list";
    showPaginationData(relatedReports, parent, reports_details_public);


    $(".mode").click(function () {
        $(".mode").css({"border": "none",
        });
        $(this).css({"border-color": "#8BC34A",
            "border-width": "3px",
            "border-style": "solid"});
    });

    $('#download-button1').click(function () {
        $(".product-details-title li").removeClass("active");
        $('#download').addClass('active');

    });

    $("#btn-buy").click(function () {
        var val = $('input[name="cost"]:checked').val();
        if (!$('input[name=cost]:checked').val()) {
            alert("Please select at least one Licence Type...");
            return false;
        }

        var id = $('input[name="cost"]:checked').attr("id");
        console.log(id);
        var labelText = $('#la' + id).text();
        console.log(labelText);
        $("#type").text(labelText);
        $("#type1").val(labelText);
        $("#amount").text(val);
        $("#amount1").val(val);
//$("#payment").show();
    });
    $(".payment-image").click(function () {
        var img = $(this).attr('id');
        $("#img").val(img);
    });
    $(function () {
        $("*[rel=tooltip]").tooltip();
        $("a").tooltip();
    });

    $('.nav-tabs a').click(function (e) {
        $(this).tab('show');
    });
    $('#request-sample-link').click(function (e) {
        $(this).tab('show');
    });

    var url = window.location.href;

    console.log(url);
    if (url.indexOf("#") >= 0) {
        var activeTab = url.substring(url.indexOf("#") + 1);
        if (activeTab != "") {
            $("#reports-tabs li").removeClass("active in");
            $(".tab-pane").removeClass("active in");
            $("." + activeTab).addClass("active");
            $("#" + activeTab).addClass("active in");
        }
    }

</script>
@endsection