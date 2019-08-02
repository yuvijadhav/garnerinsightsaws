<?php
$result = "";
if (isset($search)) {
    $result = $search;
}
?>
<div class="container-fluid" align="left"  style="padding-bottom:0px;text-align: left;background: url('{{config('app.baseURL')}}/images/bg5.jpg');">
    <div class="main-banner2-wrapper" align="left">                       

        <div class="col-md-12 search-box" style="margin-bottom:10px;">
            <form class="form-inline" id="search-form" method="post" action="{{config('app.baseURL')}}/reports">
                <center>
                    <div class="col-md-8 col-md-offset-2 search-background">
                        <div class="form-group col-md-10 col-xs-9">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <input type="text" id="search" name="search" placeholder="Search Reports . . ." class="form-control" value="{{$result}}" required>
                        </div>
                        <button type="submit" class="btn btn-default pull-left col-md-2 col-xs-3" id="btn-search">Search</button>
                    </div>    
                </center>
            </form>
        </div>
    </div>
</div>