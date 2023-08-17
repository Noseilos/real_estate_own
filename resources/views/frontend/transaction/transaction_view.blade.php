@extends('frontend.frontend_dashboard')
@section('main')
@section('title')
User Login | Easy RealEstate  
@endsection


<!-- ragister-section -->
<section class="ragister-section centred sec-pad">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-xl-8 col-lg-12 col-md-12 offset-xl-2 big-column">
                <div class="tabs-box">
                    <div class="tabs-content">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <h4>Transaction</h4>

                                <form action="{{ route('transact.comp') }}" class="default-form">
                                    @csrf

                                    <div class="form-group">
                                        <label>Card</label>
                                        
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Confirm</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51Ng4htJvsr9hD9FJ444HAHcKmxK80RK8yakx6MIQPGmaZixyXkRc7Y3Pf4sWWSPoBc6ZlvZkFZ1pxqgv3T7iXQDp00volJLSue');
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>

</section>
<!-- ragister-section end -->

@endsection