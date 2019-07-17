@extends('layouts.app')
@section('content')
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Add Category</h3>
                <form id="personal-info-form" method="post" action="addCategory" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('sub_category_name') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Category Name<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{old('sub_category_name')}}" placeholder="Enter Category Name ..." name="sub_category_name" type="text">
                                @if ($errors->has('sub_category_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sub_category_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('sub_category_icon') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Category Icon<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse Category Icon ..." id="sub_category_icon" name="sub_category_icon" type="file">
                                @if ($errors->has('sub_category_icon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sub_category_icon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('sub_category_image') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Category Image<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse Category Image ..." id="sub_category_image" name="sub_category_image" type="file">
                                @if ($errors->has('sub_category_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sub_category_image') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group upload-info-item"> 
                            <div class="upload-info-title"> 
                                <h4>Category Description<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <textarea class="profile-heading" name="sub_category_description" rows="5" placeholder="Category Description"></textarea>
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