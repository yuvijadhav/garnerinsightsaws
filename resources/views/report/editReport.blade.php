@extends('layouts.app')
@section('content')
<style>
    pre.preview {
        padding: 10px;
        background: #efefef;
        white-space: pre-line;
        line-height: 1.5;
    }
    .fr-command{
        display: none;
    }
    h5{
     position: inherit;      
    }
</style>
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 margin-bottom-15">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Update Report</h3>
                <form id="personal-info-form" method="post" action="editReport" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input type="hidden" id="report_id" name="report_id" value="{{$report->report_id}}">
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('report_title') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Report Title <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->report_title}}" placeholder="Enter Report Title..." name="report_title" type="text">
                                @if ($errors->has('report_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('report_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('sub_category_id') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Select sub-category <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <div class="custom-select">
                                    <select id="sub_category_id" name="sub_category_id" class='select2'>
                                        <option value="">Select Sub-Category</option>
                                    </select>
                                    @if ($errors->has('sub_category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sub_category_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('publisher_id') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Select Publisher <span>*</span></h4>
                            </div>  
                            <div class="upload-info-field"> 
                                <div class="custom-select">
                                    <select id="publisher_id" name="publisher_id" class='select2'>
                                        <option value="">Select</option>
                                    </select>
                                    @if ($errors->has('publisher_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('publisher_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('region_id') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Select Region <span>*</span></h4>
                            </div>  
                            <div class="upload-info-field"> 
                                <div class="custom-select">
                                    <select id="region_id" name="region_id" class='select2'>
                                        <option value="">Select</option>
                                    </select>
                                    @if ($errors->has('region_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('region_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group upload-info-item {{ $errors->has('report_date') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Date <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input id="datepicker-example1" class="profile-heading" value="{{$report->report_date}}" placeholder="Enter Report Date..." name="report_date" type="text">
                                @if ($errors->has('report_date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('report_date') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item"> 
                            <div class="upload-info-title"> 
                                <h4>No.of Pages</h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['report_pages']}}" placeholder="Enter No. of pages ..." name="report_pages" type="text">
                                <!-- @if ($errors->has('report_pages'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('report_pages') }}</strong>
                                </span>
                                @endif -->
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('url') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>URL <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->url}}" placeholder="url ..." name="url" type="text">
                                @if ($errors->has('url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('url') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('long_description') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Long description</h4>
                            </div>
                            <div class="upload-info-field">
                                <textarea class="form-control summernote-editor" rows="5" required="required" cols="50" style="text-align: left;" name="long_description">
                                {{$report->reportDetails['long_description']}}
                                </textarea>
                                @if ($errors->has('long_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('long_description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('long_content') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Long table of contents</h4>
                            </div>
                            <div class="upload-info-field">                                
                                <textarea class="form-control summernote-editor" rows="5" required="required" cols="50" style="text-align: left;" name="long_content">
                                {{$report->reportDetails['long_content']}}
                                </textarea>
                                @if ($errors->has('long_content'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('long_content') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('table_figures') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Table & Figures</h4>
                            </div>
                            <div class="upload-info-field">                                
                                <textarea class="form-control summernote-editor" rows="5" required="required" cols="50" style="text-align: left;" name="table_figures">
                            {{$report->reportDetails['table_figures']}}
                                </textarea>
                                @if ($errors->has('table_figures'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('table_figures') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('status') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Is Active ? <span>*</span></h4>
                            </div>
                            <div class="upload-info-field">                                

                                <input type="checkbox" class="profile-heading " id="status" name="status">
                                @if ($errors->has('status'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div style="text-align:left;"><h3>Price details</h3></div> 
                        <hr>
                        <div class="form-group upload-info-item {{ $errors->has('single_price') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Single user price</h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['single_price']}}" placeholder="Enter single user price..." name="single_price" type="text">
                                @if ($errors->has('single_price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('single_price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('corporate_price') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Multi user price</h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['corporate_price']}}" placeholder="Enter single user price..." name="corporate_price" type="text">
                                @if ($errors->has('corporate_price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('corporate_price') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('enterprise_price') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Enterprise user price</h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['enterprise_price']}}" placeholder="Enter single user price..." name="enterprise_price" type="text">
                                @if ($errors->has('enterprise_price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('enterprise_price') }}</strong>
                                </span> 
                                @endif
                            </div>
                        </div>
                        <div style="text-align:left;"><h3>Secondary details</h3></div> 
                        <hr>
                        <div class="form-group upload-info-item {{ $errors->has('meta_title') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Meta Title <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['meta_title']}}" placeholder="Enter meta title..." name="meta_title" type="text">
                                @if ($errors->has('meta_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('meta_keywords') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Meta Keywords <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['meta_keywords']}}" placeholder="Enter meta keywords..." name="meta_keywords" type="text">
                                @if ($errors->has('meta_keywords'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta_keywords') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('meta_description') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Meta Description <span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$report->reportDetails['meta_description']}}" placeholder="Enter meta description..." name="meta_description" type="text">
                                @if ($errors->has('meta_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta_description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item"> 
                            <div class="upload-info-title">                         
                            </div>
                            <div class="upload-info-field">
                                <button type="submit" class="update-btn">Save</button>                        
                            </div>
                        </div> 
                    </div>  
                </form>     
            </div>
        </div>                     
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>

<script>
$(function () {
    $('#edit1').on('froalaEditor.contentChanged froalaEditor.initialized', function (e, editor) {
        $('#preview1').text(editor.html.get())
    }).froalaEditor();
    $('#edit2').on('froalaEditor.contentChanged froalaEditor.initialized', function (e, editor) {
        $('#preview2').text(editor.html.get())
    }).froalaEditor();
    $('#edit3').on('froalaEditor.contentChanged froalaEditor.initialized', function (e, editor) {
        $('#preview3').text(editor.html.get())
    }).froalaEditor();
    hideArray = ["bold", "italic", "underline", "strikeThrough", "fontFamily", "fontSize", "quote"];
    $.each(hideArray, function (i, value) {
        $("#" + value + "-1").show();
        $("#" + value + "-2").show();
        $("#" + value + "-3").show();
    });
});

</script>
<script type="text/javascript">
    var sub_category_id = "{{$report->sub_category_id}}";
    var sub_category_list =<?php echo json_encode($sub_category); ?>;
    var status = "{{$report->status}}";

    if (status == 1) {
        $("#status").attr("checked", true);
    }

    $.each(sub_category_list, function (i, item) {
        var select_text = item.sub_category_name;
        var select_value = item.sub_category_id;
        var o = new Option(select_text, select_value);
        $("#sub_category_id").append(o);
    });

    var publisher_id = "{{$report->publisher_id}}";
    var publisher_list =<?php echo json_encode($publisher); ?>;

    $.each(publisher_list, function (i, item) {
        var select_text = item.publisher_name;
        var select_value = item.publisher_id;
        var o = new Option(select_text, select_value);
        $("#publisher_id").append(o);
    });

    var region_id = "{{$report->region_id}}";
    var region_list =<?php echo json_encode($region); ?>;

    $.each(region_list, function (i, item) {
        var select_text = item.name;
        var select_value = item.region_id;
        var o = new Option(select_text, select_value);
        $("#region_id").append(o);
    });

    $("#sub_category_id option[value=" + sub_category_id + "]").prop('selected', true);
    $("#publisher_id option[value=" + publisher_id + "]").prop('selected', true);
    $("#region_id option[value=" + region_id + "]").prop('selected', true);

    var report =<?php echo json_encode($report); ?>;
    if (report.status == "on")
        $("#status").prop('checked', true);
</script>

@endsection