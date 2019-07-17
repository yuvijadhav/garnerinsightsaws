@extends('layouts.app')

@section('content')


<!-- Inner Page Banner Area End Here --> 
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
          @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Update Region</h3>
                <form id="personal-info-form" method="post" action="editRegion" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <input class="profile-heading" value="{{$region->region_id}}" name="region_id" type="hidden">
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('name') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>Region Name<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{$region->name}}" name="name" type="text">
                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
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