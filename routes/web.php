<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

// if (env('APP_ENV') === 'production') {
//     URL::forceSchema('https');
// }

Route::get('pay', function () {
    return view('payment.pay');
});


Route::post('payAction', function () {
    return view('payment.pay-action');
});

Route::get('payReturn', "ReportController@getAxisPayReturn");
Route::get('migratereport/{offset}', 'RndController@insertDataFunction');
Route::post('pa1', function () {
    return view('report.PHP_VPC_3Party_Order_DO');
});
//Payment Routes
Route::get('payment-methods', 'PublicController@getPaymentMethods');
Route::post('postPayment', 'ReportController@postPayment');
Route::post('paymentGateway', 'ReportController@paymentGateway');
Route::get('/checkout', 'PublicController@checkout');
Route::get('/checkoutebs', 'PublicController@checkoutEBS');
Route::get('/ebs1', 'PublicController@getebs');
Route::post('/ebs2', 'PublicController@postebs');
Route::get('/paymentSuccess', 'PublicController@getPaymentSuccess');
Route::post('/paymentSuccess', 'PublicController@postPaymentSuccess');
Route::get('/cancelPayment', 'PublicController@getCancelPayment');
Route::post('/cancelPayment', 'PublicController@postCancelPayment');

//End Payment
//Pages Routes
Route::get('/', 'frontend\PageController@getHome');
Route::get('/home', 'frontend\PageController@getHome');
Route::get('/about-us', 'frontend\PageController@getabout');
Route::get('/services', 'frontend\PageController@getServices');
Route::get('/faq', 'frontend\PageController@getFaq');
Route::get('/terms-and-condition', 'frontend\PageController@getTermsAndCondition');
Route::get('/return-policy', 'frontend\PageController@getReturnPolicy');
Route::get('/privacy-policy', 'frontend\PageController@getPrivacyPolicy');
Route::get('/disclaimer', 'frontend\PageController@getDisclaimer');
Route::get('/how-to-order', 'frontend\PageController@getHowtoOrder');
Route::get('/delivery', 'frontend\PageController@getDelivery');
Route::get('formats-and-delivery', 'frontend\PageController@getFormatnDelivery');

Route::get('/contact', 'PublicController@getContact');
Route::post('/contact', 'PublicController@postContact');

Route::post('quote', 'PublicController@postQuote');




//Public Article
Route::get('/press-release', 'PublicController@getArticles');
Route::get('/articleData', 'PublicController@getArticlesData');

Route::get('blog/{url}', 'PublicController@getNewsDetails');
Route::get('press-release/{url}', 'PublicController@getArticleDetails');

//Public News
Route::get('/blogs', 'PublicController@getNews');
Route::get('/newsData', 'PublicController@getNewsData');


//Sitemap
Route::get('/sitemap', 'PublicController@getSitemap');
Route::get('sitemap_reports1', 'PublicController@siteMapReport');
Route::get('sitemap_press_release1', 'PublicController@siteMapPressRelease');
Route::get('sitemap_blogs1', 'PublicController@siteMapBlog');

Route::post('/newsletter', 'PublicController@postNewsletter');


Route::get('header', 'PublicController@getHeader');



//Public Reports

Route::get('/reports', 'PublicController@getReports');
Route::get('/reportsData', 'PublicController@getReportsData');
Route::post('reports', 'PublicController@postReports');
Route::get('thank-you', 'ReportController@getThankyou');
Route::get('reportsbreak', 'ReportController@ReportsBreak');


//Euquiry Report
Route::post('/addEnquiryReport', 'PublicController@postAddEnquiryReport');
Route::post('addEnquiry', 'PublicController@postAddEnquiry');
Route::get('relatedReports', 'PublicController@getRelatedReports');

//Details Page
//Route::get('categoryDetails','PublicController@getCategoryDetails');
//Public Categories
Route::get('/categories/{url}', 'PublicController@getCategory');
Route::get('categoryReports', 'PublicController@getCategoryReports');
Route::get('/categories', 'PublicController@getCategories');
Route::get('/categoryData', 'PublicController@getCategoryData');
Route::get('categoryMenu', 'PublicController@getCategorMenu');







Auth::routes();
Route::group(['middleware' => ['web']], function() {

    //Sub Category used as category
    Route::get('addCategory', ['middleware' => 'auth', 'uses' => 'SubCategoryController@getAddSubCategory']);
    Route::post('addCategory', ['middleware' => 'auth', 'uses' => 'SubCategoryController@postAddSubCategoty']);
    Route::get('editCategory', ['middleware' => 'auth', 'uses' => 'SubCategoryController@getEditSubCategory']);
    Route::post('editCategory', ['middleware' => 'auth', 'uses' => 'SubCategoryController@postEditSubCategory']);
    Route::get('allCategories', ['middleware' => 'auth', 'uses' => 'SubCategoryController@getAllSubCategories']);
    Route::get('deleteCategory', ['middleware' => 'auth', 'uses' => 'SubCategoryController@getDeleteSubCategories']);

    //ajax call
    Route::get('getCategory', ['middleware' => 'auth', 'uses' => 'CategoryController@getCategory']);
    Route::get('getSubCategory', ['middleware' => 'auth', 'uses' => 'SubCategoryController@getSubCategory']);

    Route::get('getNews', ['middleware' => 'auth', 'uses' => 'NewsController@getNews']);

    //publisher
    Route::get('addPublisher', ['middleware' => 'auth', 'uses' => 'PublisherController@getAddPublisher']);
    Route::post('addPublisher', ['middleware' => 'auth', 'uses' => 'PublisherController@postAddPublisher']);
    Route::get('allPublishers', ['middleware' => 'auth', 'uses' => 'PublisherController@getAllPublishers']);
    Route::get('allPublishersData', ['middleware' => 'auth', 'uses' => 'PublisherController@getAllPublishersData']);
    Route::get('editPublisher', ['middleware' => 'auth', 'uses' => 'PublisherController@getEditPublisher']);
    Route::post('editPublisher', ['middleware' => 'auth', 'uses' => 'PublisherController@postEditPublisher']);
    Route::get('deletePublisher', ['middleware' => 'auth', 'uses' => 'PublisherController@getDeletePublisher']);

    //News use as a Blog 
    Route::get('addBlog', ['middleware' => 'auth', 'uses' => 'NewsController@getAddNews']);
    Route::post('addBlog', ['middleware' => 'auth', 'uses' => 'NewsController@postAddNews']);
    Route::get('allBlogs', ['middleware' => 'auth', 'uses' => 'NewsController@getAllNews']);
    Route::get('editBlog', ['middleware' => 'auth', 'uses' => 'NewsController@getEditNews']);
    Route::post('editBlog', ['middleware' => 'auth', 'uses' => 'NewsController@postEditNews']);
    Route::get('deleteBlog', ['middleware' => 'auth', 'uses' => 'NewsController@getDeleteNews']);

    //Articles used as a Press Release
    Route::get('addPressRelease', ['middleware' => 'auth', 'uses' => 'ArticlesController@getAddArticle']);
    Route::post('addPressRelease', ['middleware' => 'auth', 'uses' => 'ArticlesController@postAddArticle']);
    Route::get('allPressReleases', ['middleware' => 'auth', 'uses' => 'ArticlesController@getAllArticles']);
    Route::get('editPressRelease', ['middleware' => 'auth', 'uses' => 'ArticlesController@getEditArticle']);
    Route::post('editPressRelease', ['middleware' => 'auth', 'uses' => 'ArticlesController@postEditArticle']);
    Route::get('articlesData', ['middleware' => 'auth', 'uses' => 'ArticlesController@getArticlesData']);
    Route::get('deletePressRelease', ['middleware' => 'auth', 'uses' => 'ArticlesController@getDeleteArticle']);

    //Reports
    Route::get('addReport', ['middleware' => 'auth', 'uses' => 'ReportController@getAddReport']);
    Route::post('addReport', ['middleware' => 'auth', 'uses' => 'ReportController@postAddReport']);
    Route::get('allReports', ['middleware' => 'auth', 'uses' => 'ReportController@getAllReports']);
    Route::get('allReportsData', ['middleware' => 'auth', 'uses' => 'ReportController@getAllReportData']);
    Route::post('allReports', ['middleware' => 'auth', 'uses' => 'ReportController@getAllReports']);
    Route::get('editReport', ['middleware' => 'auth', 'uses' => 'ReportController@getEditReport']);
    Route::post('editReport', ['middleware' => 'auth', 'uses' => 'ReportController@postEditReport']);
    Route::get('deleteReport', ['middleware' => 'auth', 'uses' => 'ReportController@getDeleteReport']);

    //File
    Route::get('uploadFile', ['middleware' => 'auth', 'uses' => 'ReportController@getUploadFile']);
    Route::post('uploadFile', ['middleware' => 'auth', 'uses' => 'ReportController@postUploadFile']);

    //Payment
    Route::get('success', ['middleware' => 'auth', 'uses' => 'ReportController@getSuccess']);
    Route::get('failure', ['middleware' => 'auth', 'uses' => 'ReportController@getFailure']);

    //Region
    Route::get('addRegion', ['middleware' => 'auth', 'uses' => 'RegionController@getAddRegion']);
    Route::post('addRegion', ['middleware' => 'auth', 'uses' => 'RegionController@postAddRegion']);
    Route::get('allRegions', ['middleware' => 'auth', 'uses' => 'RegionController@getAllRegions']);
    Route::get('allRegionsData', ['middleware' => 'auth', 'uses' => 'RegionController@getAllRegionsData']);
    Route::get('editRegion', ['middleware' => 'auth', 'uses' => 'RegionController@getEditRegion']);
    Route::post('editRegion', ['middleware' => 'auth', 'uses' => 'RegionController@postEditRegion']);
    Route::get('deleteRegion', ['middleware' => 'auth', 'uses' => 'RegionController@getDeleteRegion']);
});

Route::get('/{url}', 'PublicController@getReportDetails');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
