@extends('layouts.app')
@section('content')
<style type="text/css">
    pre#preview {
        padding: 10px;
        background: #efefef;
        white-space: pre-line;
        line-height: 1.5;
    }
    .fr-command{
        display: none;
    }
</style>
<!-- Inner Page Banner Area End Here --> 
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Update Blog</h3>
                <form id="personal-info-form" method="post" action="editBlog" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input class="profile-heading" value="{{$news->news_id}}" name="news_id" type="hidden">
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('news_title') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Blog Title<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$news->news_title}}" placeholder="Enter Blog title..." name="news_title" type="text">
                                @if ($errors->has('news_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                    
                        <div class="form-group upload-info-item"> 
                            <div class="upload-info-title"> 
                                <h4>Old Image<span>*</span></h4>
                            </div>
                            <div class="upload-info-field">
                                <img src="storage/app/{{$news->news_image}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('news_image') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>New Image<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse Blog Image ..." id="news_image" name="news_image" type="file">
                                @if ($errors->has('news_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('news_info') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Description<span>*</span></h4>
                            </div>
                            <div class="upload-info-field">
                                <textarea class="form-control summernote-editor" rows="5" required="required" cols="50" style="text-align: left;" name="news_info">
                                    {{$news->news_info}}
                                </textarea>
                                @if ($errors->has('news_info'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_info') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('news_url') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Blog URL<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$news->news_url}}" placeholder="Enter Blog URL..." name="news_url" type="text">
                                @if ($errors->has('news_url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('news_url') }}</strong>
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
                                <button type="submit" class="update-btn" >Submit</button>
                            </div>
                        </div> 
                    </div>  
                </form>     
            </div>
        </div>                     
    </div>
</div>
@endsection