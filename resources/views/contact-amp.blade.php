@extends('layouts.app')

@section('content')
<?php 
    $a = mt_rand(0,9);
    $b = mt_rand(0,9);
    $c =$a + $b;
 ?>
<title>Global Market Research Consulting Company</title>
<meta name="description" content="Contact us for highly reliable data-driven market insights of your target market.">
<meta name="keywords" content="market research consultant, market research companies">

@include('public.top-search')
            <div class="contact-us-info-area">
                <div class="container panel" id="increase-margin-bottom">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="contact-us-left">
                                <h2>Contact Information</h2>      
                                <ul>
                                    <li>
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h3 class="title-bar-medium-left">Our Office Address</h3>
                                        <p>Office C & D - 4th Floor,<br> Siddhi Towers, Above Rupee Bank,<br>Kondhwa Road,<br>Pune 411048,<br>Maharashtra, India.</p> 
                                    </li>
                                    <li>
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <h3 class="title-bar-medium-left">Phone</h3>
                                        <p><a href="tel:+15135495911" class="other-links">+1 513 549 5911 (US)</a></p>   
                                        <p><a href="tel:+442033182846" class="other-links">+44 203 318 2846 (UK)</a></p>   
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                        <h3 class="title-bar-medium-left">E-mail</h3>
                                        <p><a href="mailto:sales@garnerinsights.com" class="other-links">sales@garnerinsights.com</a></p>   
                                    </li>      
                                </ul>
                            </div>  
                        </div>  
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="contact-us-right"> 
                                <h2>Have a Market Research query? Drop us a message and we will get right back.</h2>    
                                <div class="contact-form"> 
                                    <form id="contact-form" method="post" action="contact1">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Name*" class="form-control" name="name" id="form-name" data-error="Name field is required" required="required">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="email" placeholder="Email*" class="form-control" name="email" id="form-email" data-error="Email field is required" required="required">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Mobile*" class="form-control" name="mobile" id="form-name" data-error="Mobile field is required" required="required">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="City*" class="form-control" name="city" id="form-name" data-error="City field is required" required="required">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" placeholder="Subject*" class="form-control" name="subject" id="form-subject" data-error="Subject field is required" required="">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <textarea placeholder="Message*" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required=""></textarea>
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12">
                                                   <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <p style="font-weight: bold; font-size: 20px;"> <?=$a?> + <?=$b?> =</p>   
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                           <input type="text" class="form-control" id="security" placeholder=" Addition Of Number ?" name="security" autocomplete="off" required>
                                                            <div class="help-block with-errors"></div>
                                                        </div>
                                                    </div>
                                                </div>      
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12">
                                                    <div class="form-group margin-bottom-none">
                                                        <input type="submit" id="submit" class="update-btn" value="Send Message" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12">
                                                    <div class='form-response'></div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
        <script type="text/javascript">
        $(document).ready(function() 
        {
            var res = <?php Print($c); ?>;
            var v = 0;
            var checked_status = 0;
            $("#security").focusout(function() {
                v = this.value;
            });

            $("#security").keyup(function() 
            {
                v = this.value;
            
                if (v == res)
                {
                    $("#submit").removeAttr("disabled");
                }
                else
                {
                    $("#submit").attr("disabled", "disabled");
                }
            });
        });
    </script>
    </body>
</html>
@endsection
