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

        function chooseCategory(data) {
            var id = data;
            console.log(data);
            var x = document.getElementById("id1").submit();
        }

    </script>
    <script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/5186043.js"></script>
    <!-- Yandex.Metrika counter --> 
    <script type="text/javascript" > (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter50853775 = new Ya.Metrika2({id: 50853775, clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true, trackHash: true});
                } catch (e) {
                }
            });
            var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                n.parentNode.insertBefore(s, n);
            };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://cdn.jsdelivr.net/npm/yandex-metrica-watch/tag.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks2");</script> <!-- /Yandex.Metrika counter -->
    <meta name ="Naver-Site-Verification" Content = "987e76b56400f980fb0fea53b007586bc8890b8e" />
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

@include("layouts.search")
<!-- <div class="product-page-list bg-secondary section-space-bottom col-lg-12 col-md-12 col-xs-12"> -->
<div class="container-fluid">
    <div class="container" style="padding-bottom: 40px;">
        <div class="col-lg-12 col-md-12 col-xs-12 no-padding" style="margin-bottom: 30px; margin-top:30px;">  
            <div class="col-lg-12 col-md-12" align="center">
                <strong align="center blck" style="font-family:'Arial black';font-size:30px;color:#555F6B">Popular Categories</strong><br>

            </div>
        </div>
        <a href='categories/Energy-and-Power'>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 no-padding" style="margin-bottom: 10px;">

                <div class="col-md-2 col-xs-3">
                    <img src="storage/app/sub_category-icon/do3DztnsdtzGLgY5z0b2WVOdj6i8983psg0rvRnC.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
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
                    <img src="storage/app/sub_category-icon/6HjzcmqyTeDs3iJL42D4KiCcmb2NxBx9zZ70sI1T.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
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
                    <img src="storage/app/sub_category-icon/mvQwfh7hp0brAzK1aRVI7rotlEdMvCQZTvh9l3td.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
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
                    <img src="storage/app/sub_category-icon/YL1DK3qIz3pKpTEDp4Gqc9ZpFgOdEq8bMmYlXaH3.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
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
                    <img src="storage/app/sub_category-icon/xZlFXSQfle1sP0YhoAp09JUdyoYR8ifO3N3wcQXX.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="6">
                    <b class="home-category-title blck"><input type='hidden' value='6' name='id'>Medical Devices</b>
                </div>
            </div>
        </a>
        <a href='categories/Pharmaceuticals-and-Healthcare'> 
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3">
                    <img src="storage/app/sub_category-icon/T0mOlXpXjYudzzP113ZgiSKrB0H9D2K6w1uC37Zo.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <input type="hidden" name="id" value="7">
                    <b class="home-category-title blck"><input type='hidden' value='7' name='id'>Pharmaceuticals and Healthcare</b>
                </div>
            </div>
        </a>
        <a href='categories/Semiconductor-and-Electronics'>
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3">
                    <img src="storage/app/sub_category-icon/VdtsVEX5mPRo8WXvDWYfGF6paf5bshW4hW5g7GFL.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <b class="home-category-title blck"><input type='hidden' value='8' name='id'>Semiconductor and Electronics</b>
                </div>
            </div>
        </a>
        <a href="categories/Consumer-Goods">
            <div class="col-lg-4 col-md-6  col-sm-12 col-xs-12 no-padding">
                <div class="col-md-2 col-xs-3">
                    <img src="storage/app/sub_category-icon/IdAv1elUuf22dKb2WiXtGTpBTQKAJU87tlGj2Pwb.jpeg" class="img-rounded category-home-image" alt="Cinque Terre" width="20" height="20" style="float:left">
                </div>
                <div class="sidebar-item-inner col-md-10 col-xs-9" style="margin-top: 15px;">
                    <b class="home-category-title blck"><input type='hidden' value='8' name='id'>Consumer Goods</b>
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
                            <img src="{{config('app.baseURL')}}/storage/app/{{$latest['sub_category_image']}}" alt="{{$latest['sub_category_name']}}">
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
<div class="trending-products-area" style="margin-top: 40px;">                
    <div class="container">
        <h2 class="title-default col-sm-12 content-title" >View Our Clients</h2>  
    </div>
    <div class="container" style="" id="client-footer">
        <div class="row">
            <div class="fox-carousel nav-control-middle margin-left-right" data-loop="true" data-items="4" data-margin="0" data-autoplay="true" data-autoplay-timeout="100" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="3" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="4" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="6" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="6" data-r-large-nav="true" data-r-large-dots="false">
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
@endsection
