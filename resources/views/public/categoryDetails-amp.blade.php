@extends('layouts.app')

@section('content')
<!-- Inner Page Banner Area Start Here -->
<div class="pagination-area bg-secondary">
    <div class="container">
        <div class="pagination-wrapper">
            <ul>
                <li><a href="home">Home</a><span> -</span></li>
                <li><a href="category">Categories</a><span> -</span></li>
                <li>{{$sub_category->sub_category_name}}</li>
            </ul>
        </div>
    </div>  
</div> 

<script type="text/javascript">
var sub_category=<?php echo json_encode($sub_category);?>;
</script>

<div class="product-details-page bg-secondary section-space-bottom">  
    <div class="container">                      
        <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
            <div class="inner-page-main-body">
                <div class="single-banner">
                    <input type="hidden" value="{{$sub_category->category_id}}"/>
                    <h2 class="title-inner-default">{{$sub_category->sub_category_name}}</h2>
                    <div class="product-details-tab-area">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="description">
                                    {{$sub_category->sub_category_description}}                            
                                </div>                                                                      
                            </div>
                        </div>
                    </div>
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$sub_category->updated_at}}   
                </div>  
                <h3 class="title-inner-section">Related Categories</h3>   
                <div class="product-list-view-style2" id="related-category-list">
                </div>                                                        
            </div>
        </div>       
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">

            @include ('layouts.public-left')

        </div>
    </div>                        
</div>
</div>

<script type="text/javascript">

var relatedCategory=<?php echo json_encode($relatedCategory);?>;
console.log(relatedCategory);
var parent="#related-category-list";
showPaginationData(relatedCategory,parent,category_public1);

</script>
@endsection