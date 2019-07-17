<style type="text/css">
    #padding-none{
        padding-bottom: 5px;
    }
    .inner-block{
        background-color: #fff;
        margin: 10px;
        min-height: 254px;
        text-align: center;
        padding: 30px 10px 10px 10px;
    }
    .inner-block h3{
        color: #000;
        margin-bottom: 10px;
    }
    .inner-block p{
        color: #000;
    }
</style>
<footer>

    <div class="col-md-12 footer-top">
        <div class="container">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 padding-zero">
                <div class="inner-block">
                    <i class="fa fa-globe icon-size" aria-hidden="true"></i>
                    <h3 class="block-title-footer">WIDE NETWORK OF PUBLISHERS</h3>
                    <p>Access to over 1M+ market research reports</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 padding-zero">
                <div class="inner-block">
                    <i class="fa fa-handshake-o icon-size" aria-hidden="true"></i>
                    <h3 class="block-title-footer">TRUSTED BY THE BEST</h3>
                    <p>50+ Clients in Fortune 500</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 padding-zero">
                <div class="inner-block">
                    <i class="fa fa-commenting-o icon-size" aria-hidden="true"></i>
                    <h3 class="block-title-footer">COMPETITIVE PRICING</h3>
                    <p>Our regular promotional offers and discounts make us the most economic seller of market reports</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 padding-zero">
                <div class="inner-block">
                    <i class="fa fa-lock icon-size" aria-hidden="true"></i>
                    <h3 class="block-title-footer">SAFE & SECURE </h3>
                    <p>Your payment details are protected by us.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-top">
        <div class="container">
            <div style="padding-bottom: 20px;">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-box margin-top">
                            <h3 class="title-bar-left title-bar-footer">QUICK LINKS</h3>
                            <ul class="col-sm-6" class="text-black" style="font-size:12px">

                                <li><a href="{{config('app.baseURL')}}/privacy-policy">PRIVACY POLICY</a></li><hr class="footer-hr">
                                <li><a href="{{config('app.baseURL')}}/return-policy">RETURN POLICY</a></li><hr class="footer-hr">
                                <li><a href="{{config('app.baseURL')}}/disclaimer">DISCLAIMER</a></li><hr class="footer-hr">
                                <li><a href="{{config('app.baseURL')}}/services">SERVICES</a></li><hr class="footer-hr">
                                <li><a href="{{config('app.baseURL')}}/sitemap">SITE MAP</a></li>
                            </ul>
                            <ul class="col-sm-6" class="text-black" style="font-size:12px">
                                <li><a href="{{config('app.baseURL')}}/terms-and-condition">TERMS AND CONDITIONS</a></li><hr class="footer-hr">
                                <!-- <li><a href="formats-and-delivery">FORMATS AND DELIVERY</a></li><hr class="footer-hr"> -->
                                <li><a href="{{config('app.baseURL')}}/faq">FAQ</a></li><hr class="footer-hr">
                                <li><a href="{{config('app.baseURL')}}/blogs">BLOGS</a></li><hr class="footer-hr">
                                <li><a href="{{config('app.baseURL')}}/press-release">PRESS RELEASES</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-box margin-top">
                            <h3 class="title-bar-left title-bar-footer">CONTACT US</h3>
                            <p class="title-bar-left" id="text-white">Garner Insights</p>
                            <!--<p class="text-black">Office C & D - 4th Floor, Siddhi Towers, Above Rupee Bank, Kondhwa Road, Pune 411048, Maharashtra, India.</p>-->
                            <p id="text-white">Phone :<span class="text-black"> +1 513 549 5911 (U.S.)</span> <br></p>		

                            <p id="text-white"> <span class="text-black" style="margin-left: 49px;"> +44 203 318 2846 (U.K.)</span></p>            
                            <!--<p id="text-white">E-mail :<a href="mailto:info@garnerinsights.com" class="text-black"> info@garnerinsights.com</a></p>-->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-box margin-top">
                            <h3 class="title-bar-left title-bar-footer">NEWSLETTER SIGNUP</h3>
                            <P class="text-black">If you want receive our all weekly updates about new offer and discount signup below. </P>                              
                        </div>
                        <div class="newsletter-area">
                            <form method="post" action="newsletter" enctype='multipart/form-data'>
                                <div class="input-group stylish-input-group">
                                    {{ csrf_field() }}
                                    <input type="text" placeholder="Email Address" class="form-control" name="email" required>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    <span class="input-group-addon">
                                        <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                    </span>
                                </div>
                            </form>
                        </div><br>
                        <img src="{{config('app.baseURL')}}/images/mil_payment_type.png">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-12 co-md-12" align="center" id="footer" style="box-shadow: 0px 0px 5px #999;">
            <p class="text-black" class="text-black">Copyright <script>document.write(new Date().getFullYear())</script> . All Rights Reserved by<b class="text-theme"> Garner Insights</b></p>
        </div>
    </div>
    <!-- Plugins js -->
    <script src="{{ asset('js/plugins.js')}}" type="text/javascript"></script>

    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js')}}" type="text/javascript"></script>

    <!-- WOW JS -->     
    <script src="{{ asset('js/wow.min.js')}}"></script>

    <!-- Owl Cauosel JS -->
    <script src="{{ asset('theme-vendor/OwlCarousel/owl.carousel.min.js')}}" type="text/javascript"></script>

    <!-- Meanmenu Js -->
    <script src="{{ asset('js/jquery.meanmenu.min.js')}}" type="text/javascript"></script>

    <!-- Srollup js -->
    <script src="{{ asset('js/jquery.scrollUp.min.js')}}" type="text/javascript"></script>

    <!-- jquery.counterup js -->
    <script src="{{ asset('js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('js/waypoints.min.js')}}"></script>

    <!-- Nouislider Js -->
    <script src="{{ asset('theme-vendor/noUiSlider/nouislider.min.js')}}" type="text/javascript"></script>

    <!-- Isotope js -->
    <script src="{{ asset('js/isotope.pkgd.min.js')}}" type="text/javascript"></script>

    <!-- Select2 Js -->
    <script src="{{ asset('js/select2.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('js/jquery.gridrotator.js')}}" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/main.js')}}" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.min.js"></script></head>

<script type="text/javascript">
$(function () {
var options = $.extend(true, {lang: '', codemirror: {theme: 'monokai', mode: 'text/html', htmlMode: true, lineWrapping: true}}, {
"toolbar": [
    ["style", ["style"]],
    ["font", ["bold", "underline", "italic", "clear"]],
    ["color", ["color"]],
    ["para", ["ul", "ol", "paragraph"]],
    ["table", ["table"]],
    ["insert", ["link", "picture", "video"]],
    ["view", ["fullscreen", "codeview", "help"]]
]
});
$("textarea.summernote-editor").summernote(options);
});
</script>
</footer>