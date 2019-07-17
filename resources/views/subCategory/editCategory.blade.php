@extends('layouts.app')
@section('content')
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Update Category</h3>
                <form id="personal-info-form" method="post" action="editCategory" enctype='multipart/form-data'>            
                    {{ csrf_field() }}
                    <input class="profile-heading" value="{{$sub_category->sub_category_id}}" name="sub_category_id" type="hidden">
                    <div class="product-upload-wrapper inner-page-padding">

                        <div class="form-group upload-info-item {{ $errors->has('sub_category_name') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Category Name<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$sub_category->sub_category_name}}" placeholder="Enter SubCategory Name ..." name="sub_category_name" type="text">
                                @if ($errors->has('sub_category_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sub_category_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item"> 
                            <div class="upload-info-title"> 
                                <h4>Old Icon<span>*</span></h4>
                            </div>
                            <div class="upload-info-field">
                                <img src="storage/app/{{$sub_category->sub_category_icon}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('sub_category_icon') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Upload new Icon<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse Category Image ..." id="sub_category_icon" name="sub_category_icon" type="file">
                                @if ($errors->has('sub_category_icon'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sub_category_icon') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item"> 
                            <div class="upload-info-title"> 
                                <h4>Old Image<span>*</span></h4>
                            </div>
                            <div class="upload-info-field">
                                <img src="storage/app/{{$sub_category->sub_category_image}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('sub_category_image') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Upload new image<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse SubCategory Image ..." id="sub_category_image" name="sub_category_image" type="file">
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
                                <textarea class="profile-heading"  name="sub_category_description" rows="5" placeholder="Type text here">{{$sub_category->sub_category_description}}</textarea>
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