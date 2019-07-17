@extends('layouts.app')

@section('content')



<title>Garner Insights | Global Competitor Analysis and Market Research Reports</title>
<meta name="description" content="Garner Insights is one of the leading market research & analysis organization across the globe offering highly profitable and success-driven market research solutions to the businesses.">
<meta name="keywords" content="Garner Insights,Garnerinsights,Global Market Research Reports, industry analysis reports, consulting services, syndicated research reports, Business Research, Market Size and Forecasts">
<meta name="yandex-verification" content="440f88aaeb429ef6" />
<meta name="msvalidate.01" content="98B96592A1CF68A7E56E00D608691902" />

<!-- Trending Products Area Start Here -->
<head>
    <script type="text/javascript">

        function chooseCategory(data){
            var id=data;
            console.log(data);
            var x=document.getElementById("id1").submit();
        }

    </script>
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/5186043.js"></script>
    <!-- Yandex.Metrika informer -->
     <!-- <a href="https://metrika.yandex.com/stat/?id=50853775&amp;from=informer" target="_blank" rel="nofollow">
        <img src="https://metrika-informer.com/informer/50853775/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Yandex.Metrica" title="Yandex.Metrica: data for today (page views, visits and unique users)" class="ym-advanced-informer" data-cid="50853775" data-lang="en" /></a> --> <!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter50853775 = new Ya.Metrika2({ id:50853775, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks2"); </script> <!-- /Yandex.Metrika counter -->
    <style type="text/css">
        .calibri{
            font-family:"calibri";
        }
        #cursor{
            cursor: pointer;
        }
        @media only screen and (max-width: 500px) {
            #index-padding1{
                margin-left: 20px;
                margin-right: 20px;
                margin-top: 20px;
            }
        }
        a div span{
            color:#000;
        }
        a .latest-home-report{
            border: none;
        }
        .single-item-grid .item-img img{
            height: 50px;
        }
        .product-page-list .container a{
            cursor: pointer;
        }
    </style>
</head>
<div class="container-fluid" align="left" style="text-align: left;background: url(images/bg5.jpg); background-size: cover;">
    <div class="main-banner2-wrapper" align="left">                       
        <h1 class="welcome" id="search-font1" style="font-family:'Arial Narrow;' text-align:left;word-spacing: 0px; letter-spacing: 0px;">A platform of extensive market reports to cater your specific needs.</h1>
        <h3 id="color-white" class="desktop-only" id="index-search-margin-bottom">Your search for the most accurate market research reports ends here.</h3>
        <div class="col-md-12 search-box">
            <form class="form-inline" id="search-form" method="post" action="reports">
                <center>
                    <div class="col-md-8 col-md-offset-2 search-background">
                        <div class="form-group col-md-10 col-xs-9">
                            <input type="text" id="search" name="search" placeholder="Search Reports . . ." class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default pull-left col-md-2 col-xs-3" id="btn-search">Search</button>
                    </div>    
                </center>
            </form>
        </div>
    </div>
</div>
<div class="product-page-list bg-secondary section-space-bottom col-lg-12 col-md-12 col-xs-12">

    <div class="container" style="padding-bottom: 40px;">
        <div class="col-lg-12 col-md-12 col-xs-12 no-padding" style="margin-bottom: 30px; margin-top:30px;">  
            <div class="col-lg-12 col-md-12" align="center">
                <strong align="center blck" style="font-family:'Arial black';font-size:30;color:#555F6B">Popular Categories</strong><br>

            </div>
        </div>
        <a href='categories/Energy-and-Power'>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">

                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Energy-and-Power.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="1">
                    <b class="home-category-title blck">Energy and Power</b>
                </div>
            </div> 
        </a>
        <a href='categories/Food-and-Beverages'>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">

                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Food-and-Beverages.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="2">
                    <b class="home-category-title blck"><input type='hidden' value='2' name='id'>Food and Beverages</b>
                </div>
            </div>
        </a>
        <a href='categories/ICT-Media'>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">
                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/ICT-Media.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="3">
                    <b class="home-category-title blck"><input type='hidden' value='3' name='id'>ICT Media</b>
                </div>
            </div>
        </a>
        <a href='categories/Machinery-and-Equipments'> 
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">
                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Machinery-and-Equipments.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="4">
                    <b class="home-category-title blck"><input type='hidden' value='4' name='id'>Machinery and Equipments</b>
                </div>
            </div>
        </a>
        <a href='categories/Materials-and-Chemicals'> 
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3" >
                    <img src="images/icon/Materials-and-Chemicals.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="5">
                    <b class="home-category-title blck"><input type='hidden' value='5' name='id'>Materials and Chemicals</b>
                </div>
            </div>
        </a>
        <a href='categories/Medical-Devices'> 
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">
                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Medical-Devices.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="6">
                    <b class="home-category-title blck"><input type='hidden' value='6' name='id'>Medical Devices</b>
                    <div class="item-content">
                        <span class="text-light-black" id="text-gray"><!-- Changing a Medical Devices habit of people and emergence of eco friendly products and creating opportunities in the consumer goods market. --></span>
                    </div>
                </div>
            </div>
        </a>
        <a href='categories/Pharmaceuticals-and-Healthcare'> 
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Pharmaceuticals-and-Healthcare.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="7">
                    <b class="home-category-title blck"><input type='hidden' value='7' name='id'>Pharmaceuticals and Healthcare</b>
                    <!-- <div class="item-content">
                        <span class="text-light-black" id="text-gray">Changing a Pharmaceuticals and Healthcare habits of people and emergence of eco friendly products and creating opportunities in the consumer goods market.</span>
                    </div> -->
                </div>
            </div>
        </a>
        <a href='categories/Semiconductor-and-Electronics'>
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Semiconductor-and-Electronics.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <b class="home-category-title blck"><input type='hidden' value='8' name='id'>Semiconductor and Electronics</b>
                    <!-- <div class="item-content">
                        <span class="text-light-black" id="text-gray">Changing a Semiconductor and Electronics habits of people and emergence of eco friendly products and creating opportunities in the consumer goods market.</span>
                    </div> -->
                </div>
            </div>
        </a>
        <a href="categories/Consumer-Goods">
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3">
                    <img src="images/icon/Consumer_Goods.jpg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <b class="home-category-title blck"><input type='hidden' value='8' name='id'>Consumer Goods</b>
                    <!-- <div class="item-content">
                        <span class="text-light-black" id="text-gray">Changing a Semiconductor and Electronics habits of people and emergence of eco friendly products and creating opportunities in the consumer goods market.</span>
                    </div> -->
                </div>
            </div>
        </a>
    </div>
</div>

<div class="container-fluid" style="background-color: #f4f6f8;">
    <div class="container ">
        <div class="row col-md-12" align="center" style="margin-top:30px; font-family:'arial';">

           <h2> <strong id="new-index-title " class="content-title">Latest Reports</strong><br></h2>
            <?php $reports = json_decode($report, true); ?>
                <?php foreach ($reports as $latest): ?>
                    <div class="col-sm-2" id="latest-report-content">
                        <a href="{{config('app.baseURL')}}/{{$latest['url']}}">
                            <div class="latest-home-report col-sm-12" >
                                <input type="hidden" value="7" name="id">
                                <img src="{{config('app.baseURL')}}/storage/app/{{$latest['sub_category']['sub_category_image']}}" alt="{{$latest['sub_category']['sub_category_name']}}">
                               <center> 
                                    <span class="calibri">{{$latest['report_title']}}</span>
                                </center>
                            </div>
                        </a>
                    </div> 
                <?php endforeach ?>
        </div>
    </div>
</div>

<!-- <div class="container-fluid" style="background-color: #f4f6f8;">
    <div class="container">
        <div class="col-md-12" align="center" style="margin-top:30px; font-family:'arial';">

            <strong id="new-index-title " class="content-title">Latest Reports</strong><br><br>

            <div class="col-sm-2" id="latest-report-content" >
               
                    <a href="http://garnerinsights.com/EMEA-Europe,-Middle-East-and-Africa-Airport-Charging-Stations-Market-Report-2017">
                        <div class="latest-home-report col-sm-12">

                            <input type="hidden" value="3" name="id">
                            <img src="{{config('app.baseURL')}}/storage/app/index-category/Aerospace and Defence.jpeg" class="click-1">
                            <center><span class="calibri">EMEA (Europe, Middle East And Africa) Airport Charging Stations Market Report 2017</span></center>
                        </div>
                    </a>
               
            </div>


            <div class="col-sm-2" id="latest-report-content">
                
                    <a href="http://garnerinsights.com/EMEA-Europe,-Middle-East-and-Africa-Commercial-Vehicle-Run-flat-Tire-Inserts-Market-Report-2017">
                        <div class="latest-home-report col-sm-12" >

                            <input type="hidden" value="7" name="id">
                            <img src="{{config('app.baseURL')}}/storage/app/index-category/Automotive and Transportation.jpeg">
                            <center><span class="calibri">EMEA (Europe, Middle East And Africa) Commercial Vehicle Run-Flat Tire Inserts Market Report 2017</span></center>
                        </div>
                    </a>
                
            </div>
            <div class="col-sm-2" id="latest-report-content">
                
                    <a href="http://garnerinsights.com/EMEA-Europe,-Middle-East-and-Africa-Masonry-Mortar-Market-Report-2017">
                        <div class="latest-home-report col-sm-12">

                            <input type="hidden" value="4" name="id">
                            <img src="{{config('app.baseURL')}}/storage/app/index-category/Construction and Manufacturing.jpeg">
                            <center><span class="calibri">EMEA (Europe, Middle East And Africa) Masonry Mortar Market Report 2017</span></center>
                        </div>
                    </a>
                
            </div>
            <div class="col-sm-2" id="latest-report-content">
               
                    <a href="http://garnerinsights.com/EMEA-Europe,-Middle-East-and-Africa-Reclining-Sofas-Market-Report-2017">
                        <div class="latest-home-report col-sm-12" onclick="document.getElementById('frm-5').submit();">

                            <input type="hidden" value="8" name="id">
                            <img src="{{config('app.baseURL')}}/storage/app/index-category/Consumer Goods.jpeg">
                            <center><span class="calibri">EMEA (Europe, Middle East And Africa) Reclining Sofas Market Report 2017</span></center>
                        </div>
                    </a>
               
            </div>
            <div class="col-sm-2" id="latest-report-content">
                
                    <a href="http://garnerinsights.com/EMEA-Europe,-Middle-East-and-Africa-Motorcycle-Battery-Market-Report-2017">
                        <div class="latest-home-report col-sm-12" onclick="document.getElementById('frm-5').submit();">

                            <input type="hidden" value="8" name="id">
                            <img src="{{config('app.baseURL')}}/storage/app/index-category/Energy and Power.jpeg">
                            <center><span class="calibri">EMEA (Europe, Middle East And Africa) Motorcycle Battery Market Report 2017</span></center>
                        </div>
                    </a>
               
            </div>
            <div class="col-sm-2" id="latest-report-content">
                
                    <a href="http://garnerinsights.com/EMEA-Europe,-Middle-East-and-Africa-Salad-Oil-Market-Report-2017">
                        <div class="latest-home-report col-sm-12" onclick="document.getElementById('frm-5').submit();">

                            <input type="hidden" value="8" name="id">
                            <img src="{{config('app.baseURL')}}/storage/app/index-category/Food and Beverages.jpeg">
                            <center><span class="calibri">EMEA (Europe, Middle East And Africa) Salad Oil Market Report 2017</span></center>
                        </div>
                    </a>
                
            </div>
        </div>
    </div>
</div> -->
<div class="trending-products-area" style="margin-top: 40px;">                
    <div class="container">
        <h2 class="title-default col-sm-12 content-title" >View Our Clients</h2>  
    </div>
    <div class="container" style="" id="client-footer">
        <div class="row">
            <div class="fox-carousel nav-control-middle margin-left-right" data-loop="true" data-items="4" data-margin="0" data-autoplay="true" data-autoplay-timeout="100" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="2" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="3" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="6" data-r-large-nav="true" data-r-large-dots="false">
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}/img/product/3M01-3M-LOGO.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\Arthur D. Little.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\Caterpillar.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\DuPont.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\H Energy.png" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\hp.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\International Paper.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\Lincoln University.png" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\Marshall Aerospace & Defence Group.png" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\Meadow_Foods.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\meadow-foods.png" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\THE BOSTON.png" alt="product" class="img-responsive">
                    </div>                            
                </div>
                <div class="single-item-grid">
                    <div class="item-img">
                        <img src="{{config('app.baseURL')}}\img\product\Old-World-Industries-LLC_logo.jpg" alt="product" class="img-responsive">
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
    <div class="product-page-list bg-secondary section-space-bottom" style="">
        <div class="col-md-12" align="center" style="margin-top:50px; font-family:'arial'">
            <span style="color:#aaa">WHAT PEOPLE SAY</span><br>
            <h2 class="title-default col-sm-12 content-title">TESTIMONIALS</h2><br>
            <img src="images/design.png"><br><br>

            <div class="container">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-5 margin-1" id="index-padding1">
                                <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i><center>
                                <div style="min-height: 150px;" id="text-gray-dark">What amazed me most was the professionalism and client satisfaction provided by Reports Monitor. Their responses were quick and actioned on immediately.</div>

                                <div class="author-name" >
                                    <br> 
                                    <span align="left" class="author-pos"><b>Sr. Manager</b></span><br>
                                    <span align="left" class="author-pos">A UK based manufacturing firm</span>
                                </div>
                            </center>
                        </div>                       
                        <div class="col-sm-5 margin-2" id="index-padding1">
                            <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i><center>
                            <div id="text-gray-dark" style="min-height: 150px;">I would like to thank the team at Reports Monitor, you guys made my job so easier with your spoon fed service and quality market study.</div>

                            <div class="author-name" style="background-color: #379F9E;"><br> 

                                <span align="left" class="author-pos"><b>President </b></span><br>
                                <span align="left" class="author-pos">At a US based consulting firm</span>
                            </div>
                        </center>
                    </div>                       
                </div>
                <div class="item">
                    <div class="col-sm-5 margin-1" id="index-padding1">
                        <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i><center>
                        <div id="text-gray-dark" style="min-height: 150px;">The team of Reports Monitor solved my queries in a timely fashion and gracefully. I have purchased reports from them a few times now and they never cease to impress with their highly intellectual team.</div>

                        <div class="author-name"><br> 
                            <span align="left" class="author-pos"><b>Marketing Manager </b></span><br>
                            <span align="left" class="author-pos">At a Fortune 100 pharmaceutical firm</span>
                        </div>
                    </center>
                </div>
                <div class="col-sm-5 margin-2" id="index-padding1">
                    <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i><center>
                    <div id="text-gray-dark" style="min-height: 150px;" >I had some issues with the payment gateway and almost the immediate second I get a call from one of the enthusiastic sales member who guided me throughout the process and also reassured me of the next steps.</div>

                    <div class="author-name"><br> 
                        <span align="left" class="author-pos"><b>A Consultant </b></span><br>
                        <span align="left" class="author-pos">At a German based retail firm</span></div>
                    </center>
                </div>
            </div>
            <div class="item">
                <div class="col-sm-5 margin-1" id="index-padding1">
                    <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i><center>
                    <div id="text-gray-dark" style="min-height: 150px;">The quality of data encompassed in the report was very useful for me in my marketing strategy needs</div>

                    <div class="author-name"><br> 
                        <span align="left" class="author-pos"><b>Director of Marketing</b></span><br>
                        <span align="left" class="author-pos">At a US based Manufacturing firm</span></div>
                    </center>
                </div>
                <div class="col-sm-5 margin-2" id="index-padding1">
                    <i class="fa fa-quote-left" aria-hidden="true" id="testimonial-color"></i>
                    <div id="text-gray-dark" style="min-height: 150px;">I like the way they operate in terms of their reassuring emails and timely phone calls to keep me posted. I think this is what made me really happy as a customer. I would highly recommend them to all</div>
                    <center>
                        <div class="author-name"><br> 
                            <span align="left" class="author-pos"><b>Senior Engineer </b></span><br>
                            <span align="left" class="author-pos">At a Fortune 500 IT firm</span></div>
                        </center>
                    </div>
                </div>
            </div>

           
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only" style="color:red">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next" id="color-12">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            <div class="col-lg-12" style="margin-top:100px;">
                <ol class="carousel slide carousel-indicators">
                    <li data-target="#myCarousel " data-slide-to="0" class="active" id="slide-color"></li>
                    <li data-target="#myCarousel" data-slide-to="1" id="slide-color"></li>
                    <li data-target="#myCarousel" data-slide-to="2" id="slide-color"></li>
                </ol>
            </div>
        </div>
    </div>
</div>
</div> -->
<div class="trending-products-area section-space-default">
    <div class="container"></div></div>

    @endsection
