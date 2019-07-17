<style type="text/css">
  @media screen and (min-width: 768px) {
    .mobile-logo{
      display: none !important;
    }
  }
  .fa-stack .fa{
    font-size: 15px;
  }
  .mobile-logo{
    width: 70%;
    float: right;
  }
  .report-home-img{
    width: 100%;
    height: 482px;
  }
</style>
<style type="text/css">
  .text-1{
    color: rgb(57,168,168) !importent;
  }
  .border-new{
    border: 1px solid #ccc;

  }
  .category-home-image{
    height: 60px;
    width: 60px;
  }
  .latest-home-report{
    border:1px solid #ccc;
    padding: 0px;
    margin:10px;
  }
  .latest-home-report img{
    width: 100%;
    height: 200px;
  }
  .content-text{
    padding: 10px;
  }
  .text-black{
    color: #000 !important;
  }
  #search{
    width: 100%;
    padding: 20px;
    border-radius: 0px;
  }

  .search-box{
    margin-bottom: 30px;
    display:table-row;
  }

  .search-background{
    display:flex;
    max-height: 73px;
    background-color: rgba(0,0,0,0.7);
    padding-left: 0px;
    padding-top: 15px;
    padding-bottom: 15px;
    border-radius: 10px;
  }
  #index-search-margin{
    margin-top:25px;
  }
  #index-search-margin-bottom{
    margin-bottom:22px;
  }

/*#index-height{
height:430px;
}*/
.pad-0{
  padding: 0px;
}

#see-all-button{

}
#btn-search{
  padding: 7px;
  border-radius: 0px;   
  background-color: #246A9F;
  border:1px solid #246A9F;
  color: #fff;
  font-size: 18px;
  font-weight: 900;
}
@media screen and (min-width: 768px) {
  .container-fluid{
    padding-bottom: 10px !important;
    padding-top: 20px !important;
  }
  .mobile-menu-area{
    display: none;
  }
}

@media screen and (max-width: 767px) {

  #btn-search{
    padding-top: 0px !important;
  }
}
.page-margin{
  margin-top: 20px;
}
.content-title{
  font-family:'Arial black';font-size:30;color:#555F6B;
}

</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111948978-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111948978-1');
  gtag('config', 'AW-819970391');
</script>

<header>
  <!-- JavaScript --> 
  <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script> 
  <script type="text/javascript">
    $(document).ready(function(){
      $('#request-quote').click(function(){
        $('#button-trigger').click();    
      });
    });
  </script>
<meta name="google-site-verification" content="M6K83pmjB0PeXtQMD60R3Tfuuusj7Z1KruiilxH2wIs" />
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a6032fdd7591465c706dbe1/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<!-- Matomo -->
<script type="text/javascript">
  var _paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["setCookieDomain", "*.www.garnerinsights.com"]);
  _paq.push(["setDomains", ["*.www.garnerinsights.com"]]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://garnerinsights.matomo.cloud/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '3']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
  <div class="container">
    <center>
      <!-- Trigger the modal with a button -->
      <button type="button" class="btn btn-info btn-lg" id="button-trigger" data-toggle="modal" data-target="#myModal" style="display: none">Open Modal</button>
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="modal-content">

                <div class="modal-header">
                  <div class="panel-heading text-white sidebar-gradient" style="background-color:#379f9e;color:#fff"><center>ENQUIRE BEFORE BUYING</center><button type="button" class="close text-white" data-dismiss="modal">&times;</button></div>
                </div>
                <div class="panel panel-default panel-radius">
                  <div class="panel-body">
                    <!-- <form class="form-horizontal" action="quote" method="post">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <input type="text" class="form-control back-grey" placeholder="Name" name="name" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">          
                          <input type="email" class="form-control back-grey" placeholder="Email" name="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">          
                          <input type="text" class="form-control back-grey" placeholder="Phone" name="mobile" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">          
                          <textarea class="form-control back-grey" name="message" placeholder="Message" required></textarea> 
                        </div>
                      </div>
                      <center><button type="submit" class="btn1 btn btn-primary view-button submit-gradient" id="buy">Submit</button></center>
                    </form>  -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
</header>

<div id="header1" class="header2-area" >
  <div class="header-top-bar">

    <div style="background-color:rgb(234,238,241); height: 30px;box-shadow: 0px 0px 5px #999;" class="col-sm-11 no-padding" >
      <div class="container col-md-offset-1">
        <span class="col-sm-4 col-md-6 no-padding" style="margin-top: 3px;">
          <a href="mailto:sales@garnerinsights.com" target="_top">                
            <i class="fa fa-envelope-open-o blck" style="font-size:20px;"></i>
            <span class="blck">sales@garnerinsights.com </span></a>

          </span>
          <div class="col-sm-4 col-md-6 pull-right no-padding desktop-only">
            <!-- <div class=" pull-right main-menu-area bg-primaryText blck top-header" style="font-weight:600;background-color:#012932;margin-right:-30px;">
              <div class="" style="cursor:pointer;margin-top:-26px; margin-left: 40px;" id="request-quote">REQUEST A QUOTE</div> 
            </div>   -->

            <span class="fa-stack fa-lg col-sm-3 pull-right borders-right" title="Blog">
              <a href="http://garnerinsights.blogspot.in/" target="_blank">
                <i class="fa fa-child fa-stack-1x" id="color-gray1"></i>
              </a>
            </span>  
            <span class="fa-stack fa-lg col-sm-3 pull-right borders-right" title="Feeds">
              <a href="http://feeds.feedburner.com/garnerinsights" target="_blank">
                <i class="fa fa-empire fa-stack-1x" aria-hidden="true" id="color-gray1"></i>
              </a>
            </span>  
            <span class="fa-stack fa-lg col-sm-3 pull-right borders-right" title="Google+">
              <!-- <a href="https://plus.google.com/u/0/104187516885663390925/" target="_blank"> -->
              <a href="https://plus.google.com/115871799176426682944" target="_blank">
                <i class="fa fa-google-plus fa-stack-1x" id="color-gray1"></i>
              </a>
            </span>

            <span class="fa-stack fa-lg col-sm-3 pull-right borders-right" title="Linkedin">
              <!-- <a href="https://www.linkedin.com/company/reports-monitor/" target="_blank"> -->
              <a href="https://www.linkedin.com/company/garnerinsights/" target="_blank">
                <i class="fa fa-linkedin fa-stack-1x"  id="color-gray1"></i>
              </a>
            </span>
            <span class="fa-stack fa-lg col-sm-3 pull-right borders-right" title="Twitter">
              <a href="https://twitter.com/garnerinsights/" target="_blank">
                <i class="fa fa-twitter fa-stack-1x" style="" id="color-gray1"></i>
              </a>
            </span>
            <span class="fa-stack fa-lg col-sm-3 pull-right borders-right borders-left" title="Facebook">
              <a href=" https://www.facebook.com/garnerinsights/" target="_blank"><i class="fa fa-facebook fa-stack-1x" id="color-gray1"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-lg-12 no-padding">
        <div class="col-lg-2 col-md-12 col-sm-3 hidden-xs col-lg-offset-1">
          <div class="logo-area">
            <a href="{{config('app.baseURL')}}/home"><img class="img-responsive" src="{{config('app.baseURL')}}/images/logo.png" alt="logo"></a>
          </div>
        </div> 
        <div class="col-lg-9 col-md-10 col-sm-9 col-xs-12 no-padding">
          <ul class="" >                                     
            <li class="col-lg-5 col-md-6 col-sm-4 col-xs-6"></li>       
            <li class="col-lg-7 col-md-6 col-sm-4 col-xs-6">
              <div class="notify-contact" >
                <p class="col-lg-6 col-md-12 col-sm-4 col-xs-6 borders-right"  style="margin-top:10px;">                                    
                  <i class="fa fa-mobile blck col-lg-4 col-md-4 col-sm-4 col-xs-4 " style="font-size: 40px;margin-right: 1px;"></i>
                  <span class="col-lg-8 col-md-8 col-sm-8 col-xs-8" style="margin-top:-30px;margin-left:30px; color: #000; line-height: 15px;font-size:10px;"><b><a href="{{config('app.baseURL')}}/contact" id="black-text">
                    CALL US NOW FOR A QUOTE
                  </a></b>
                </span>
              </p>

              <ul>
                <li><strong style="font-size: 14px;margin-left:20px"><a class="blck" href="tel:+15135495911">+1 &nbsp;&nbsp;513 549 5911 (US)</a></strong></li>
                <li style="margin-top:-20px;"><strong style="font-size: 14px;margin-left:20px;"><a class="blck" href="tel:+912069535353">+44 203 318 2846 (UK)</a></strong></li>
              </ul>

            </div>
          </li>
          <li><a class="apply-now-btn" href="{{ route('login') }}" id="logout-button" style="display:none;"></a></li>
        </ul>
        <div class="main-menu-areas bottom-header" id="index-font-name" style="">
          <div class="col-sm-12 blck" style="margin-top: -22px;">
            <nav id="desktop-nav">
              <ul style="height: 58px;">
                <li><a class="blck" href="{{config('app.baseURL')}}/home">HOME</a></li>
                <li><a href="{{config('app.baseURL')}}/categories">CATEGORIES</a>
                  <ul class="mega-menu-area" id="category-menu">  
                  </ul>  
                </li>
                <li><a href="{{config('app.baseURL')}}/about-us">ABOUT US</a></li>
                <li><a href="{{config('app.baseURL')}}/services">SERVICES</a></li>

                <li><a href="{{config('app.baseURL')}}/press-release">PRESS RELEASES</a></li>
                <li><a href="{{config('app.baseURL')}}/blogs">BLOGS</a></li>
                <!-- <li><a href="{{config('app.baseURL')}}/contact">CONTACT US</a></li> -->


                @if (Auth::guest())
                <li><a href="{{ route('login') }}" id="logout-button"></a></li>
                @else

                <li>
                  <a  href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();" id="logout-button">
                  Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                  {{ csrf_field() }}
                </form>
              </li>
              @endif

            </ul>
          </nav>
        </div>
      </div>
    </div>                     
  </div>                          
</div>
</div>
<div class="col-xs-11">
  <a href="{{config('app.baseURL')}}/home"><img class="mobile-logo" src="{{config('app.baseURL')}}/images/logo.png" alt="logo"></a>
</div>
</div>
</div>

<!-- Mobile Menu Area Start -->
<div class="mobile-menu-area">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mobile-menu">
          <nav id="dropdown">
            <ul>
              <li><a class="blck" href="{{config('app.baseURL')}}/home">Home</a></li>
              <li><a href="{{config('app.baseURL')}}/about-us">About Us</a></li>
              <li><a href="{{config('app.baseURL')}}/categories">Category</a></li>

              <li><a href="{{config('app.baseURL')}}/blogs">Blogs</a></li>
              <li><a href="{{config('app.baseURL')}}/press-release">Articles</a></li>
             <!--  <li><a href="{{config('app.baseURL')}}/contact">Contact Us</a></li> -->


            </ul>
          </nav>
        </div>           
      </div>
    </div>

  </div>
</div>  


<!-- Mobile Menu Area End -->
<script type="text/javascript">
@if(isset($sub_categories))
var result=<?php echo json_encode($sub_categories);?>;

      showMenu(result,"category-menu");

  function showMenu(data,parent){
    $.each(data,function(i,item){
      $("#"+parent).append("<li><a href='"+baseURL+"/categories/"+item.sub_category_description+"'><img src='{{Config('app.baseURL')}}/storage/app/"+item.sub_category_icon+"' style='height:30px; width=30px;margin-right:5px;'>"+item.sub_category_name+"</a></li>");
    });
  }
  @endif

  $(document).ready(function () {
    $(document).ajaxStart(function () {
      $(".se-pre-con").fadeIn("slow");;
    }).ajaxStop(function () {
      $(".se-pre-con").fadeOut("slow");;
    }); 
  });

</script>
<style>
  .no-js #loader { display: none;  }
  .js #loader { display: block; position: absolute; left: 100px; top: 0; }
  .se-pre-con {
    display: none;
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url("{{Config('app.baseURL')}}/images/loader.gif") center no-repeat rgba(255,255,255,0.5);
  }
</style>
<div class="se-pre-con"></div>
</header>



