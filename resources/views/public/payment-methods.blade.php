@extends('layouts.app')

@section('content')
@include('public.top-search')

<div class="about-page-area bg-secondary section-space-bottom page-margin">
    <div class="container panel" id="increase-margin-bottom">
        <h2 class="title-section" id="head-color">Payment Methods</h2>
        <div class="inner-page-details inner-page-padding">
            <div>

                <h2>Payment Methods</h2>
                <p class="about-us-border">
                </p>
                <div>
                    <p>
                        We offer following payment methods:
                    </p>
                    <div>
                        Online Payment: Via Credit/Debit Card and PayPal
                    </div>
                    <br>
                    <div>               
                        •   Bank Wire Transfer.
                        <br>
                        •   Transfers in USD can be made directly into our bank account.
                        
                    </div><br>
                    <div>
                        <div>
                            Reports Monitor will send the invoice to customers buying reports by an email and payments has to be made in full before the dispatch of report is initiated from our side.
                        </div>
                    </div><br>
                    <div>
                        <div>
                            Currency Exchange rates are highly volatile and are subject to change from time to time.
                        </div>
                    </div>
                </div>
            </div>  
        </div>  
    </div> 
</body>
</html>
@endsection
