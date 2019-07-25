var category = ["<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12'><div class='single-item-grid'><div class='item-img'><img src='storage/app/{{category_image}}' class='img-responsive' style='width:287px;height:170px;'></div><div class='item-content'><div class='item-info'><h3>{{category_name}}</h3></div><ul class='btn-area'><li class='hvr-bounce-to-left'><a href='"+baseURL+"/editCategory?id={{category_id}}'>Edit</a></li><li class='hvr-bounce-to-left'><a href='"+baseURL+"/deleteCategory?id={{category_id}}'>Delete</a></li></ul></div></div></div></div>"].join("\n");

var sub_category = ["<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12'><div class='single-item-grid'><div class='item-img'><img src='storage/app/{{sub_category_image}}' class='img-responsive' style='width:255px;height:170px;'></div><div class='item-content'><div class='item-info'><h3> {{sub_category_id}} </h3><h3>{{sub_category_name}}</h3></div><ul class='btn-area'><li class='hvr-bounce-to-left'><a href='"+baseURL+"/editCategory?id={{sub_category_id}}'>Edit</a></li><li class='hvr-bounce-to-left'><a href='"+baseURL+"/deleteCategory?id={{sub_category_id}}'>Delete</a></li></ul></div></div></div></div>"].join("\n");

var publisher = ["<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12'><div class='single-item-grid'><div class='item-img'><img src='storage/app/{{publisher_image}}' class='img-responsive' style='width:287px;height:170px;'></div><div class='item-content'><div class='item-info'><h3>{{publisher_id}}</h3><h3>{{publisher_name}}</h3></div><div><ul class='btn-area'><li class='hvr-bounce-to-left'><a href='"+baseURL+"/editPublisher?id={{publisher_id}}'>Edit</a></li><li class='hvr-bounce-to-left'><a href='"+baseURL+"/deletePublisher?id={{publisher_id}}'>Delete</a></li></ul></div></div></div></div>"].join("\n");

var news = ["<div class='product-list-view'><div class='single-item-list'><div class='item-img'><img src='"+baseURL+"/storage/app/{{news_image}}' alt='product' class='img-responsive' style='height:180px;width:267px;'></div><div class='item-content'><div class='item-info'><div class='item-title'><h3>{{news_title}}</a></h3><br><p>{{news_info}}</p></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{ updated_at}}</span></div><div class='layout-switcher'><a class='sidebar-full-width-btn add-button message-text' href='"+baseURL+"/editBlog?id={{news_id}}'>Edit</a></div><div class='layout-switcher'><a class='sidebar-full-width-btn add-button message-text' href='"+baseURL+"/deleteBlog?id={{news_id}}'>Delete</a></div></div></div></div></div>"].join('/n');
 
var articles = ["<div class='product-list-view'><div class='single-item-list'><div class='item-img'><img src='storage/app/{{article_image}}' alt='product' class='img-responsive' style='height:180px;width:267px;'></div><div class='item-content'><div class='item-info'><div class='item-title'><h3>{{article_title}}</h3><br><p>{{article_description}}</p></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{ updated_at}}</span></div><div class='layout-switcher'><a class='sidebar-full-width-btn add-button message-text' href='"+baseURL+"/editPressRelease?id={{article_id}}'>Edit</a></div><div class='layout-switcher'><a class='sidebar-full-width-btn add-button message-text' href='"+baseURL+"/deletePressRelease?id={{article_id}}'>Delete</a></div></div></div></div></div>"].join('/n');

var reports = ["<div class='product-list-view'><div class='single-item-list'><div class='item-content'><div class='item-info'><div class='item-title'><h3>{{report_title}}</h3><span>{{sub_category.sub_category_name}}</span><p>{{url}}</p></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{report_date}}</span></div><div class='profile-rating-info'><div class='layout-switcher'><a class='sidebar-full-width-btn add-button message-text' href='"+baseURL+"/deleteReport?id={{report_id}}'>Delete</a></div><div class='layout-switcher'><a class='sidebar-full-width-btn add-button message-text' href='"+baseURL+"/editReport?id={{report_id}}'>Edit</a></div></div></div></div></div>"].join('/n');

var articles_public = ["<div class='product-list-view'><div class='single-item-list'><div class='item-content'><div class='item-info'><div class='item-title'><h3><a href='"+baseURL+"/press-release/{{article_url}}'>{{article_title}}</a></h3><p>{{article_description}}</p></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{ updated_at}}</span></div></div></div></div></div>"].join('/n');

var news_public = ["<div class='product-list-view'><div class='single-item-list'><div class='item-img'><a href='"+baseURL+"/{{sub_category.sub_category_name}}/{{url}}'><img src='"+baseURL+"/storage/app/{{news_image}}' alt='product' class='img-responsive' style='height:160px;width:267px;'></a></div><div class='item-content'><div class='item-info'><div class='item-title'><h3><a href='"+baseURL+"/blog/{{news_url}}'>{{news_title}}</a></h3><p>{{news_info}}</p></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{ updated_at}}</span></div></div></div></div></div>"].join('/n');

var reports_public = ["<div class='product-list-view'><div class='single-item-list'><div class='item-img'><a href='"+baseURL+"/{{url}}'><img src='"+baseURL+"/storage/app/{{sub_category.sub_category_image}}' alt='product' class='img-responsive' style='height:160px;width:267px;'></a></div><div class='item-content'><div class='item-info'><div class='item-title'><h3 style='font-size:22px;'><a href='"+baseURL+"/{{url}}'>{{report_title}}</a></h3><span><a href='#' style='color: #246A9F;font-weight: 500;'>{{sub_category.sub_category_name}}</a></span><p>{{short_description}}</p></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{report_date}}</span></div></div></div></div>"].join('/n');

var reports_details_public = ["<div class='product-list-view'><div class='single-item-list'><div class=''><a href='"+baseURL+"/{{url}}'><img src='"+baseURL+"/storage/app/{{sub_category.sub_category_image}}' alt='product' class='img-responsive' style='height:80px;width:85px;'></a></div><div class='item-content'><div class='item-info'><div class='item-title'><a href='"+baseURL+"/{{url}}'><h3 class='title-inner-default' style='font-size:22px;'>{{report_title}}</h3></a><span>Published Date: {{report_date}}</span></div></div></div></div>"].join('/n');

var category_public1 = ["<div class='product-list-view'><div class='single-item-list'><div><a href='"+baseURL+"/categoryDetails?id={{sub_category_id}}'><img src='storage/app/{{sub_category_icon}}' alt='product' class='img-responsive' style='height:98px;width:98px;'></a></div><div class='item-content'><div class='item-info'><div class='item-title'><h3><a href='"+baseURL+"/categoryDetails?id={{sub_category_id}}'>{{sub_category_name}}</a></h3></div></div><div class='item-profile'><div class='profile-title'><span><i class='fa fa-calendar' aria-hidden='true'></i> {{ updated_at}}</span></div></div></div></div></div>"].join('/n');

var category_public = ["<a href='"+baseURL+"/categories/{{sub_category_description}}'><div class='col-md-5 img-bg'><div class='col-md-2 padding-zero'><img src='storage/app/{{sub_category_icon}}' alt='product' class='img-responsive' style='height:68px;width:68px;'></div><div class='col-md-10 category-name category-report'><center>{{sub_category_name}}</center></div></div></a>"].join('/n');

var public_sidebar = ["<div class='item-info'><h3><a href='"+baseURL+"/{{url}}'>{{report_title}}</a></h3><hr></div>"].join('/n');

var report_category = ["<div style='padding-left:15px;padding-bottom:10px;'><input type='checkbox' id='{{sub_category_id}}' class='report-list'>{{sub_category_name}}</div>"].join('/n');

var report_home = ["<div class='item-content'><div class='item-info'><h3><a href='"+baseURL+"/reportDetails?id={{report_id}}'>{{report_title}}</a></h3></div></div><hr>"].join('/n');

var news_home = ["<div class='item-content'><div class='item-info'><h3><a href='"+baseURL+"/newsDetails?id={{news_id}}'>{{news_title}}</a></h3></div></div><hr>"].join('/n');

var regions = ["<div class='col-lg-4 col-md-6 col-sm-12 col-xs-12'><div class='single-item-grid'><div class='item-content'><div class='item-info'><h3>{{name}}</h3></div><ul class='btn-area'><li class='hvr-bounce-to-left'><a href='"+baseURL+"/editRegion?id={{region_id}}'>Edit</a></li><li class='hvr-bounce-to-left'><a href='"+baseURL+"/deleteRegion?id={{region_id}}'>Delete</a></li></ul></div></div></div>"].join('/n');

var regions_public = ["<div style='padding-left:15px;padding-bottom:10px;'><input type='checkbox' id='{{region_id}}' class='region-list'>{{name}}</div>"].join('/n');
