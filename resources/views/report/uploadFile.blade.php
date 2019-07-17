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
</style>
<div class="product-page-list bg-secondary section-space-bottom admin-top-margin">                
    <div class="container">  
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            @include('layouts.admin-left')
        </div>                     
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 margin-bottom-15">
            <div class="product-upload-page-area bg-secondary section-space-bottom">
                <h3 class="title-section">Upload File</h3>
                <form id="personal-info-form" method="post" action="uploadFile" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="product-upload-wrapper inner-page-padding">
                        <div class="form-group upload-info-item {{ $errors->has('upload_file') ? ' has-error' : '' }}"> 
                            <div class="upload-info-title"> 
                                <h4>File<span>*</span></h4>
                            </div>
                            <div class="upload-info-field"> 
                                <input class="profile-heading" value="{{old('upload_file')}}" placeholder="Upload File..." name="upload_file" type="file" required>
                                @if ($errors->has('upload_file'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('upload_file') }}</strong>
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
@endsection