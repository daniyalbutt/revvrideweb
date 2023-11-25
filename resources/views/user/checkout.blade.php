@extends('layouts.front-app')
@section('title', 'Checkout')
@section('content')
<section class="mainBanner">
    <div class="fluid-container container p-0">
        <div class="banner-bg inner-banner-bg" style="background-image:url({{ asset('assets/images/bg1.webp') }}); ">
            <div class="container inner-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="banner-content text-center">
                            <h4>Your Dream SPORTS</h4>
                            <hr class="seperator">
                            <h1>Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="sports-detail-sec p-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <ul class="payment-tabing-list mb-30">
                    <li data-targetit="box-12" class="current">
                        <div class="payment-tabing-box">
                            <img src="assets/images/payment1.png" alt="">
                            <h6>Credit/Debit Card</h6>
                        </div>
                    </li>
                    <li data-targetit="box-13">
                        <div class="payment-tabing-box">
                            <img src="assets/images/payment2.png" alt="">
                            <h6>Paypal</h6>
                        </div>
                    </li>
                    <li data-targetit="box-14">
                        <div class="payment-tabing-box">
                            <img src="assets/images/payment3.png" alt="">
                            <h6>Google Pay</h6>
                        </div>
                    </li>
                    <li data-targetit="box-15">
                        <div class="payment-tabing-box">
                            <img src="assets/images/payment4.png" alt="">
                            <h6>Apple Pay</h6>
                        </div>
                    </li>
                </ul>
                <div class="box-12 showfirst">
                    <div class="payment-box">
                        <div class="payment-content mb-30">
                            <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt=""> Your Payment info is stored securely</h5>
                            <img src="{{ asset('assets/images/card.png') }}" alt="">
                        </div>
                        <div class="panel panel-default credit-card-box">
                            <div class="panel-body">
                                @if (Session::has('error'))
                                <div class="alert alert-danger text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('error') }}</p>
                                </div>
                                @endif
                                @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                                @endif
                                <form 
                                    role="form" 
                                    action="{{ route('user.order') }}" 
                                    method="post" 
                                    class="require-validation payment-form contact-form-field"
                                    data-cc-on-file="false"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                    id="payment-form">
                                    <input type="hidden" value="{{ $cart['total_price'] }}" name="total_price">
                                    @csrf
                                    <div class='form-group required'>
                                        <label class='control-label'>Card Holder Name*</label>
                                        <input class='' size='4' type='text' name="card_name">
                                    </div>
                                    <div class='form-group card required'>
                                        <label class='control-label'>Card Number*</label>
                                        <input autocomplete='off' name="card_number" class='card-number' size='20' type='text'>
                                    </div>
                                    <div class='form-row row'>
                                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                                            <label class='control-label'>CVC</label>
                                            <input autocomplete='off' name="card_cvc" class='card-cvc' placeholder='ex. 311' size='4' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Month</label>
                                            <input class='card-expiry-month' name="card_exp_month" placeholder='MM' size='2' type='text'>
                                        </div>
                                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                                            <label class='control-label'>Expiration Year</label>
                                            <input class='card-expiry-year' name="card_exp_year" placeholder='YYYY' size='4' type='text'>
                                        </div>
                                    </div>
                                    <div class='form-group'>
                                        <div class='error form-group hide'>
                                            <div class='alert-danger alert'>Fill out the given details.</div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <input type="checkbox" name="save_details" id="details" value="1">
                                        <label for="details">Save details for later transaction</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="payment-btn">
                                            <button class="btn-c" type="submit">Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-13">
                    <div class="payment-box">
                        <div class="payment-content mb-30">
                            <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt=""> Your Payment info is stored securely</h5>
                            <img src="assets/images/card.png" alt="">
                        </div>
                        <form action="javascript:;" class="payment-form contact-form-field">
                            <div class="form-field mb-20">
                                <label for="cardname">Card Holder Name*</label>
                                <input type="text" id="cardname" placeholder="Sarah Kevin">
                            </div>
                            <div class="form-field payment-img mb-20">
                                <label for="cardname">Card Number*</label>
                                <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000" maxlength="16">
                                <img src="assets/images/master.png" alt="">
                            </div>
                            <div class="form-fields">
                                <div class="form-field mb-20">
                                    <label for="cardname">Expiry Date*</label>
                                    <input id="expiry" type="number" placeholder="(mm/yy)" maxlength="4">
                                </div>
                                <div class="form-field mb-20">
                                    <label for="cardname">CVV*</label>
                                    <input type="password" placeholder="****" maxlength="4">
                                </div>
                            </div>
                            <div class="mb-10">
                                <input type="checkbox" id="details2" value="Save details for later transaction">
                                <label for="details2">Save details for later transaction</label>
                            </div>
                            <div class="form-fields">
                                <div class="payment-btn">
                                    <a class="btn-c" href="thankyou.php">PAY NOW</a>
                                    <!-- <input type="submit" value="PAY NOW"> -->
                                </div>
                                <div></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-14">
                    <div class="payment-box">
                        <div class="payment-content mb-30">
                            <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt=""> Your Payment info is stored securely</h5>
                            <img src="assets/images/card.png" alt="">
                        </div>
                        <form action="javascript:;" class="payment-form contact-form-field">
                            <div class="form-field mb-20">
                                <label for="cardname">Card Holder Name*</label>
                                <input type="text" id="cardname" placeholder="Sarah Kevin">
                            </div>
                            <div class="form-field payment-img mb-20">
                                <label for="cardname">Card Number*</label>
                                <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000" maxlength="16">
                                <img src="assets/images/master.png" alt="">
                            </div>
                            <div class="form-fields">
                                <div class="form-field mb-20">
                                    <label for="cardname">Expiry Date*</label>
                                    <input id="expiry" type="number" placeholder="(mm/yy)" maxlength="4">
                                </div>
                                <div class="form-field mb-20">
                                    <label for="cardname">CVV*</label>
                                    <input type="password" placeholder="****" maxlength="4">
                                </div>
                            </div>
                            <div class="mb-10">
                                <input type="checkbox" id="details3" value="Save details for later transaction">
                                <label for="details3">Save details for later transaction</label>
                            </div>
                            <div class="form-fields">
                                <div class="payment-btn">
                                    <a class="btn-c" href="thankyou.php">PAY NOW</a>
                                    <!-- <input type="submit" value="PAY NOW"> -->
                                </div>
                                <div></div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="box-15">
                    <div class="payment-box">
                        <div class="payment-content mb-30">
                            <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt=""> Your Payment info is stored securely</h5>
                            <img src="assets/images/card.png" alt="">
                        </div>
                        <form action="javascript:;" class="payment-form contact-form-field">
                            <div class="form-field mb-20">
                                <label for="cardname">Card Holder Name*</label>
                                <input type="text" id="cardname" placeholder="Sarah Kevin">
                            </div>
                            <div class="form-field payment-img mb-20">
                                <label for="cardname">Card Number*</label>
                                <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000" maxlength="16">
                                <img src="assets/images/master.png" alt="">
                            </div>
                            <div class="form-fields">
                                <div class="form-field mb-20">
                                    <label for="cardname">Expiry Date*</label>
                                    <input id="expiry" type="number" placeholder="(mm/yy)" maxlength="4">
                                </div>
                                <div class="form-field mb-20">
                                    <label for="cardname">CVV*</label>
                                    <input type="password" placeholder="****" maxlength="4">
                                </div>
                            </div>
                            <div class="mb-10">
                                <input type="checkbox" id="details4" value="Save details for later transaction">
                                <label for="details4">Save details for later transaction</label>
                            </div>
                            <div class="form-fields">
                                <div class="payment-btn">
                                    <a class="btn-c" href="thankyou.php">PAY NOW</a>
                                    <!-- <input type="submit" value="PAY NOW"> -->
                                </div>
                                <div></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="detail-filter-mainbox">
                    <ul class="detail-filter-list">
                        <li>
                            <div class="price-filter detail-filter-content">
                                <h3>Booking Summary</h3>
                            </div>
                        </li>
                        <li>
                            <div class="additional-box detail-filter-content">
                                <h6 class="mb-20">Date / Time</h6>
                                <div class="detail-filter-content mb-10">
                                    <span>Date: {{ $cart['datetime'] }}</span>
                                </div>
                                <div class="detail-filter-content mb-10">
                                    <span>Time: {{ date('h:i a', strtotime($cart['from_time'])) }} - {{ date('h:i a', strtotime($cart['to_time'])) }}</span>
                                </div>
                                @php
                                $start_datetime = new DateTime($cart['from_time']); 
                                $diff = $start_datetime->diff(new DateTime($cart['to_time'])); 
                                @endphp
                                <div class="detail-filter-content mb-20">
                                    <span>Duration: {{ $diff->h }} hr {{ $diff->i }} minutes</span>
                                </div>
                                <h6 class="mb-20">Account Details</h6>
                                <div class="detail-filter-content mb-10">
                                    <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                </div>
                                <div class="detail-filter-content mb-20">
                                    <span>{{ Auth::user()->email }}</span>
                                </div>
                                <div class="detail-filter-content mb-20">
                                    <span>{{ Auth::user()->phone }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="price-box detail-filter-content">
                                <h3 class="mb-20">PRICE DETAILS</h3>
                                <ul class="price-list mb-20">
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <span>{{ $cart['name'] }}</span>
                                            </div>
                                            <div class="detail-filter-content">
                                                <span>${{ $cart['baseprice'] }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @if($cart['adult_quantity'] != 0)
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <span>Adult x {{ $cart['adult_quantity'] }}</span>
                                            </div>
                                            <div class="detail-filter-content">
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @if($cart['children_quantity'] != 0)
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <span>Children x {{ $cart['children_quantity'] }}</span>
                                            </div>
                                            <div class="detail-filter-content">
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @if($cart['infants_quantity'] != 0)
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <span>Infants x {{ $cart['infants_quantity'] }}</span>
                                            </div>
                                            <div class="detail-filter-content">
                                                <span></span>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @if($cart['insurance'] != 'NO')
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <span>Insurance</span>
                                            </div>
                                            <div class="detail-filter-content">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endif
                                    @foreach($cart['addons'] as $key => $addons)
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <span>{{ $addons['name'] }}</span>
                                            </div>
                                            <div class="detail-filter-content">
                                                <span>${{ $addons['price'] }}</span>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <h6>TOTAL PACKAGE:</h6>
                                            </div>
                                            <div class="detail-filter-content">
                                                <h6>${{ $cart['total_price'] }}</h6>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    $(function() {
        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]','input[type=text]', 'input[type=file]','textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');        
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();
                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });
    
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error').removeClass('hide').find('.alert') .text(response.error.message);
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
    
</script>
@endpush