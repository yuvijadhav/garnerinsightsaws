@extends('layouts.app')
@section('content')
<style>
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
                <h3 class="title-section">Add Press Release</h3>
                <form id="personal-info-form" method="post" action="addPressRelease" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('article_title') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Press Release Title<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{old('article_title')}}" placeholder="Enter Press Release Title..." name="article_title" type="text">
                                @if ($errors->has('article_title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('article_image') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Press Release Image</h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse Press Release Image ..." id="article_image" name="article_image" type="file">
                                @if ($errors->has('article_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group upload-info-item {{ $errors->has('article_description') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Description<span>*</span></h4>
                            </div>
                            <div class="upload-info-field">
                                <textarea class="form-control summernote-editor" rows="5" required="required" cols="50" style="text-align: left;" name="article_description">
                                    {{old('article_description')}}
                                </textarea>
                                @if ($errors->has('article_description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article_description') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('article_url') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>URL<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{old('article_url')}}" placeholder="Enter Press Release URL..." name="article_url" type="text">
                                @if ($errors->has('article_url'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('article_url') }}</strong>
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