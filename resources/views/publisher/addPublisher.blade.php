@extends('layouts.app')
@section('content')
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Add Publisher</h3>
                <form id="personal-info-form" method="post" action="addPublisher" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('publisher_name') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Publisher Name<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{old('publisher_name')}}" placeholder="Enter Publisher Name ..." name="publisher_name" type="text">
                                @if ($errors->has('publisher_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publisher_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group upload-info-item {{ $errors->has('publisher_image') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Publisher Image</h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="file-upload-area" placeholder="Browse Publisher Image ..." id="publisher_image" name="publisher_image" type="file">
                                @if ($errors->has('publisher_image'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('publisher_image') }}</strong>
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