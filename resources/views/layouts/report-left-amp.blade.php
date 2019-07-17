<style type="text/css">
    .text-white{
        color:#FFF !important;
    }
</style>
<div class="panel-group">
    <div class="panel panel-default panel-radius">
        <div class="panel-heading text-white sidebar-gradient"><center>Categories</center></div>
        <div class="panel-body"> 

            <div id="latest-news">
                <div class="sidebar-single-item-grid">
                    <div class="checkbox distance" id="report-categories">
                        @foreach($categories as $category)
                        @if($category->sub_category_id==$sub_category_id)
                        <div style='padding-left:15px;padding-bottom:10px;'><input type='checkbox' id='{{$category->sub_category_id}}' class='report-list' checked="checked">{{$category->sub_category_name}}</div>
                        @else
                        <div style='padding-left:15px;padding-bottom:10px;'><input type='checkbox' id='{{$category->sub_category_id}}' class='report-list'>{{$category->sub_category_name}}</div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="panel-group">
    <div class="panel panel-default panel-radius">
        <div class="panel-heading text-white sidebar-gradient"><center>Regions</center></div>
        <div class="panel-body" style=" height: 400px; overflow-y: scroll;"> 
            <div id="latest-news">
                <div class="sidebar-single-item-grid">
                    <div class="checkbox distance" id="region-list">
                    </div>
                </div>
            </div>           
        </div>
    </div>
</div>
