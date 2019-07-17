@extends('layouts.app')

@section('content')
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="home">Home</a><span> -</span></li>
                            <li>Delivery</li>
                        </ul>
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- About Page Start Here -->
            <div class="about-page-area bg-secondary section-space-bottom">
                <div class="container panel" id="increase-margin-bottom">
                    <h2 class="title-section">Delivery Method</h2>
                    <div class="inner-page-details inner-page-padding">
                        
                        <p>Email- In case of this options, we will send you the email on the details address provided by you; which will contain the attachment of the product. We will make sure that we send you the email within 12 hours of successful payment transfer.</p>
                        
                        <p>Hard Copy- In case of hard copy/copies, we will ship the product after the order confirmation (Once we receive the payment) (Note- Extra delivery charges are applicable and it may vary according to your address or postal code). We do not guarantee you that the goods received by you will always be in the good condition because it depends on the courier services. Replacement and reordering rights are reserved to the publisher of the report. (Note- in such exceptional case we will replace your package, without you paying any extra cost.)</p>
                    </div>  
                </div>  
            </div> 
    </body>
</html>
@endsection
