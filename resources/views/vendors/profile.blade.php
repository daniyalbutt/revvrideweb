@extends('layouts.front-app')
@section('title', 'profile')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <style>
        .map {
            width: 66%;
            height: 451px;
            margin: 0 auto;
        }

        div#map {
            width: 100%;
            height: 100%;
        }
    </style>
@endpush
@section('content')
    <section class="mainBanner">
        <div class="fluid-container container p-0">
            <div class="banner-bg inner-banner-bg" style="background-image:url({{ asset('assets/images/bg5.webp') }}); ">
                <div class="container inner-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="banner-content text-center">
                                <hr class="seperator">
                                <h1>Profile</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="registration-section-id" class="register-sec p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="register-tabbing-list mb-60">
                        <li class="active">
                            <div class="register-box">
                                <i class="fa-solid fa-id-card"></i>
                                <h6>License Certifications</h6>
                            </div>
                        </li>
                        <li>
                            <div class="register-box">
                                <i class="fa-solid fa-registered"></i>
                                <h6>Registration Form</h6>
                            </div>
                        </li>
                        <li>
                            <div class="register-box">
                                <i class="fa-solid fa-rectangle-list"></i>
                                <h6>Business Categories</h6>
                            </div>
                        </li>
                        <li>
                            <div class="register-box">
                                <i class="fa-solid fa-location-dot"></i>
                                <h6>Enter Your Location</h6>
                            </div>
                        </li>
                        <li>
                            <div class="register-box">
                                <i class="fa-solid fa-credit-card"></i>
                                <h6>PAYMENT <br>METHOD</h6>
                            </div>
                        </li>
                    </ul>
                    <ul class="registration-list">
                        <div class="loader-wrappper">
                            <img src="{{ asset('assets/images/loader.gif') }}" class="loader">
                        </div>
                        <li class="active steps-listing" data-index="0" data-tab="0">
                            <div class="register-content text-center">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <h2 class="primary-hd mb-10">Upload License & Certifications</h2>
                                        <p class="primary-para mb-10">Please upload your snapshots of your business permit
                                            and certifications.</p>
                                        <input type="file" class="dropfiy license-image" class="form-control"
                                            name="license">
                                    </div>
                                    <div class="col-lg-10">
                                        <ul class="certificate-wrapper">
                                            @foreach (Auth::user()->get_certificates as $key => $value)
                                                <li>
                                                    <span class="delete-icon"
                                                        onclick="deleteCertificate({{ $value->id }}, this)"><i
                                                            class="fa-solid fa-circle-xmark"></i></span>
                                                    <a href="{{ $value->image }}" data-fancybox="gallery">
                                                        <img src="{{ $value->image }}" alt="License & Certifications">
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="regiter-btn mb-10 mt-3">
                                            <a href="#" class="btn-c step-form-next">CONTINUE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="steps-listing" data-index="1" data-tab="1">
                            <div class="regitration-form-box">
                                <form action="{{ route('vendor.profile.update') }}" class="regitration-form" method="post"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type='file' id="imageUpload" name="display_picture"
                                                accept=".png, .jpg, .jpeg" />
                                            <label for="imageUpload"></label>
                                        </div>
                                        <div class="avatar-preview">
                                            <div id="imagePreview"
                                                style="background-image:url({{ Auth::user()->display_picture == null ? asset('assets/images/dummy.jpg') : Auth::user()->display_picture }}); ">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact-form-fields registration-form-fields">
                                        <div class="contact-form-field registration-form-field">
                                            <label for="first_name">First Name</label>
                                            <input id="first_name" name="first_name" type="text"
                                                value="{{ Auth::user()->first_name }}" required>
                                        </div>
                                        <div class="contact-form-field registration-form-field">
                                            <label for="last_name">Last Name</label>
                                            <input id="last_name" name="last_name" type="text"
                                                value="{{ Auth::user()->last_name }}" required>
                                        </div>
                                        <div class="contact-form-field registration-form-field">
                                            <label for="gender">Gender</label>
                                            <div>
                                                <select id="gender" class="" name="gender" required>
                                                    <option value="" data-display-text="Gender">Gender</option>
                                                    <option value="male"
                                                        {{ Auth::user()->gender == 'male' ? 'selected' : ' ' }}>MALE
                                                    </option>
                                                    <option value="female"
                                                        {{ Auth::user()->gender == 'female' ? 'selected' : ' ' }}>FEMALE
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact-form-fields registration-form-fields">
                                        <div class="contact-form-field registration-form-field">
                                            <label for="email">EMAIL</label>
                                            <input id="email" type="email" value="{{ Auth::user()->email }}"
                                                readonly>
                                        </div>
                                        <div class="contact-form-field registration-form-field">
                                            <label for="phone">Mobile Number</label>
                                            <input type="tel" name="phone" value="{{ Auth::user()->phone }}"
                                                required>
                                        </div>
                                        <div class="contact-form-field registration-form-field">
                                            <label for="dob">Date of Birth</label>
                                            <div class="ui calendar date-pick" id="example5">
                                                <div class="ui input input-field left icon">
                                                    <i class="calendar icon"></i>
                                                    <input type="text" name="dob" id="registration-date"
                                                        value="{{ Auth::user()->dob }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="contact-form-fields registration-form-fields">
                                        <div class="contact-form-field registration-form-field">
                                            <div class="contact-form-field sign-field mb-20">
                                                <label class="mb-10" for="password">Password</label>
                                                <input type="password" id="password" name="password"
                                                    placeholder="**********">
                                                <button type="button" class="eye"><i class="fas fa-eye-slash"
                                                        id="eye"></i></button>
                                            </div>
                                        </div>
                                        <div class="contact-form-field registration-form-field">
                                            <div class="contact-form-field sign-field">
                                                <label class="mb-10" for="password_confirmation">Confirm Password</label>
                                                <input type="password" id="password_confirmation"
                                                    name="password_confirmation" placeholder="**********">
                                                <button type="button" class="eye"><i class="fas fa-eye-slash"
                                                        id="eye"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="back-and-continue-btns mb-10">
                                        <div class="regiter-btn text-center mb-10">
                                            <a href="#" class="btn-c step-form-prev">Go Back</a>
                                        </div>
                                        <div class="regiter-btn text-center mb-10">
                                            <button type="submit" class="btn-c">Next Step</button>
                                        </div>
                                    </div>
                                    <div class="registration-content text-center">
                                        <a class="step-form-next" href="#">SKIP</a>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li class="steps-listing" data-index="2" data-tab="2">
                            <div class="category-list">
                                <ul>
                                    @php
                                        $user_cat = [];
                                        foreach (Auth::user()->get_categories as $cat_key => $cat_value) {
                                            array_push($user_cat, $cat_value->category_id);
                                        }
                                    @endphp
                                    @foreach ($categories as $key => $value)
                                        <li>
                                            <div class="form-check checkboxes">
                                                <label class="form-check-label" for="{{ Str::slug($value->title) }}">
                                                    <img src="{{ asset('assets/images/jetski-icon.jpg') }}"
                                                        alt="">
                                                    <span>{{ $value->title }}</span>
                                                </label>
                                                <input {{ in_array($value->id, $user_cat) ? 'checked' : ' ' }}
                                                    class="category-checker form-check-input" type="checkbox"
                                                    value="{{ $value->id }}" id="{{ Str::slug($value->title) }}">
                                                <label for="{{ Str::slug($value->title) }}"></label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="back-and-continue-btns mb-10">
                                    <div class="regiter-btn text-center mb-10">
                                        <a href="#" class="btn-c step-form-prev">Go Back</a>
                                    </div>
                                    <div class="regiter-btn text-center mb-10">
                                        <a href="#" class="btn-c step-form-next">Next Step</a>
                                    </div>
                                </div>
                                <div class="registration-content text-center">
                                    <a class="step-form-next" href="#">SKIP</a>
                                </div>
                            </div>
                        </li>
                        <li class="steps-listing" data-index="3" data-tab="3">
                            <form action="{{ route('vendor.location.update') }}" id="locationupdate">
                                @csrf
                                <input type="hidden" id="locations_lat" value="{{ Auth::user()->lat ?? 0 }}"
                                    name="locations_lat">
                                <input type="hidden" id="locations_lng" name="locations_lng"
                                    value="{{ Auth::user()->lng ?? 0 }}">
                                <div class="regitration-map-box" id="pac-card">
                                    <div class="contact-form-fields registration-form-fields justify-content-center">
                                        <div class="contact-form-field registration-form-field search-field">

                                            <input type="search" id="gsearch" name="gsearch"
                                                value="{{ Auth::user()->location }}" class="form-control">
                                            <i class="fas fa-magnifying-glass"></i>


                                            <div class="map-icon"><i class="fas fa-map-marker-alt"></i></div>



                                        </div>
                                        <div class="contact-form-field registration-form-field">
                                            <div>
                                                <select id="subject" class="">
                                                    <option value=""
                                                        data-display-text="(GMT-8) Pacific Time (US & Canada)">(GMT-8)
                                                        Pacific
                                                        Time (US & Canada)</option>
                                                    <option value="Los Angeles, California">Los Angeles, California
                                                    </option>
                                                    <option value="San Francisco, California">San Francisco, California
                                                    </option>
                                                    <option value="Seattle, Washington">Seattle, Washington</option>
                                                    <option value="Portland, Oregon">Portland, Oregon</option>
                                                    <option value="Las Vegas, Nevada">Las Vegas, Nevada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="map">
                                        <div id="map"></div>
                                    </div>
                                    <div id="infowindow-content">
                                        <span id="place-name" class="title"></span><br />
                                        <span id="place-address"></span>
                                    </div>

                                    <div class="back-and-continue-btns mb-10">
                                        <div class="regiter-btn text-center mb-10">
                                            <a href="#" class="btn-c step-form-prev">Go Back</a>
                                        </div>

                                        <div class="regiter-btn text-center mb-10">
                                            <button type="submit" class="btn-c">Next Step</button>
                                        </div>
                                    </div>
                                    <div class="registration-content text-center">
                                        <a class="step-form-next" href="#">SKIP</a>
                                    </div>
                                </div>
                            </form>
                        </li>
                        <li class="steps-listing" data-index="4" data-tab="4">
                            <div class="register-content text-center">
                                <h2 class="primary-hd mb-10">ADD PAYMENT METHOD</h2>
                                <i class="fa-solid fa-credit-card large-card"></i>
                                <img class="mb-20" src="assets/images/payment.png" alt="">
                                <p class="primary-para mb-20">All of your linked payment methods will show here. Get
                                    started by adding a card now.</p>
                                <div class="back-and-continue-btns mb-10">
                                    <div class="regiter-btn payment-method-btn text-center mb-10">
                                        <a href="#" class="btn-c step-form-prev">Go Back</a>
                                    </div>
                                    <div class="regiter-btn payment-method-btn text-center mb-10">
                                        <a href="#" class="btn-c step-form-next">Add a payment method</a>
                                    </div>
                                    <div class="regiter-btn payment-method-btn text-center mb-10">
                                        <a href="{{ route('vendor.dashboard') }}" class="btn-c step-save">Save</a>
                                    </div>
                                </div>
                                <div class="registration-content text-center">
                                    <a class="" href="./">SKIP</a>
                                </div>
                            </div>
                        </li>
                        <li class="steps-listing" data-index="5" data-tab="3">
                            <div class="payment-mainbox">
                                <ul class="payment-tabing-list mb-30">
                                    <li data-targetit="box-12" class="current">
                                        <div class="payment-tabing-box">
                                            <i class="fa-solid fa-credit-card"></i>
                                            <h6>Credit/Debit Card</h6>
                                        </div>
                                    </li>
                                    <li data-targetit="box-13">
                                        <div class="payment-tabing-box">
                                            <i class="fa-brands fa-paypal"></i>
                                            <h6>Paypal</h6>
                                        </div>
                                    </li>
                                    <li data-targetit="box-14">
                                        <div class="payment-tabing-box">
                                            <i class="fa-brands fa-google-pay"></i>
                                            <h6>Google Pay</h6>
                                        </div>
                                    </li>
                                    <li data-targetit="box-15">
                                        <div class="payment-tabing-box">
                                            <i class="fa-brands fa-cc-apple-pay"></i>
                                            <h6>Apple Pay</h6>
                                        </div>
                                    </li>
                                    <li data-targetit="box-16">
                                        <div class="payment-tabing-box">
                                            <i class="fa-brands fa-cc-stripe"></i>
                                            <h6>Stripe</h6>
                                        </div>
                                    </li>
                                </ul>

                                <div class="box-12 showfirst">
                                    <form class="paymentform" action="{{ route('vendor.card.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payment_type" value="card">
                                        <div class="payment-box">
                                            <div class="payment-content mb-30">
                                                <h5 class="third-hd mb-10"><img src="assets/images/Icon.png"
                                                        alt="">
                                                    Your Payment info is stored securely</h5>
                                                <img src="assets/images/card.png" alt="">
                                            </div>
                                            <div class="form-field mb-20">
                                                <label for="cardname">Card Holder Name*</label>
                                                <input type="text" id="cardname" name="name"
                                                    placeholder="Sarah Blake"
                                                    value="{{ Auth::user()->card('card') ? Auth::user()->card('card')->holder_name : '' }}"
                                                    required>
                                            </div>
                                            <div class="form-field payment-img mb-20">
                                                <label for="cardname">Card Number*</label>
                                                <input type="number" id="cardnumber" name="card_number"
                                                    value="{{ Auth::user()->card('card') ? Auth::user()->card('card')->card_number : '' }}"
                                                    placeholder="5500-0000-0000-0000" maxlength="16" required>
                                                <img src="assets/images/master.png" alt="">
                                            </div>
                                            <div class="form-fields">
                                                <div class="form-field mb-20">
                                                    <label for="cardname">Expiry Date*</label>
                                                    <input id="expiry" type="number" name="exp_date"
                                                        placeholder="(mm/yy)" maxlength="4"
                                                        value="{{ Auth::user()->card('card') ? Auth::user()->card('card')->expiry_date : '' }}"
                                                        required>
                                                </div>
                                                <div class="form-field mb-20">
                                                    <label for="cardname">CVV*</label>
                                                    <input type="number"
                                                        value="{{ Auth::user()->card('card') ? Auth::user()->card('card')->cvv : '' }}"
                                                        placeholder="123" name="cvv" maxlength="4" required>
                                                </div>
                                            </div>
                                            <div class="mb-10">
                                                <input type="checkbox" id="add"
                                                    value="Save details for later transaction">
                                                <label for="add">Make Default</label>
                                            </div>
                                            <p class="primary-para payment-para mb-20">In order to verify your account we
                                                may charge your account with small amount that will be refunded.</p>
                                            <div class="form-fields">
                                                <div class="payment-btn">
                                                    <button class="btn-c" type="submit">ADD CARD</button>
                                                    {{-- <a class="btn-c step-form-next" href="#"></a> --}}
                                                    <!-- <input type="submit" value="PAY NOW"> -->
                                                </div>
                                                <div></div>
                                            </div>
                                    </form>
                                </div>

                            </div>
                            <div class="box-13">
                                <div class="payment-box">
                                    <div class="payment-content mb-30">
                                        <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                            Your Payment info is stored securely</h5>
                                        <img src="assets/images/card.png" alt="">
                                    </div>
                                    <form class="paymentform" action="{{ route('vendor.card.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payment_type" value="paypal">
                                        <div class="form-field mb-20">
                                            <label for="cardname">Card Holder Name*</label>
                                            <input type="text" id="cardname" name="name"
                                                placeholder="Sarah Blake"
                                                value="{{ Auth::user()->card('paypal') ? Auth::user()->card('paypal')->holder_name : '' }}"
                                                required>
                                        </div>
                                        <div class="form-field payment-img mb-20">
                                            <label for="cardname">Card Number*</label>
                                            <input type="number" id="cardnumber" name="card_number"
                                                value="{{ Auth::user()->card('paypal') ? Auth::user()->card('paypal')->card_number : '' }}"
                                                placeholder="5500-0000-0000-0000" maxlength="16" required>
                                            <img src="assets/images/master.png" alt="">
                                        </div>
                                        <div class="form-fields">
                                            <div class="form-field mb-20">
                                                <label for="cardname">Expiry Date*</label>
                                                <input id="expiry" type="number" name="exp_date"
                                                    placeholder="(mm/yy)" maxlength="4"
                                                    value="{{ Auth::user()->card('paypal') ? Auth::user()->card('paypal')->expiry_date : '' }}"
                                                    required>
                                            </div>
                                            <div class="form-field mb-20">
                                                <label for="cardname">CVV*</label>
                                                <input type="number"
                                                    value="{{ Auth::user()->card('paypal') ? Auth::user()->card('paypal')->cvv : '' }}"
                                                    placeholder="123" name="cvv" maxlength="4" required>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <input type="checkbox" id="add2"
                                                value="Save details for later transaction">
                                            <label for="add2">Make Default</label>
                                        </div>
                                        <p class="primary-para payment-para mb-20">In order to verify your account we
                                            may charge your account with small amount that will be refunded.</p>
                                        <div class="form-fields">
                                            <div class="payment-btn">
                                                <button class="btn-c" type="submit">ADD CARD</button>
                                                {{-- <a class="btn-c step-form-next" href="#">ADD CARD</a> --}}
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
                                        <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                            Your Payment info is stored securely</h5>
                                        <img src="assets/images/card.png" alt="">
                                    </div>
                                    <form class="paymentform" action="{{ route('vendor.card.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payment_type" value="google">

                                        <div class="form-field mb-20">
                                            <label for="cardname">Card Holder Name*</label>
                                            <input type="text" id="cardname" name="name"
                                                placeholder="Sarah Blake"
                                                value="{{ Auth::user()->card('google') ? Auth::user()->card('google')->holder_name : '' }}"
                                                required>
                                        </div>
                                        <div class="form-field payment-img mb-20">
                                            <label for="cardname">Card Number*</label>
                                            <input type="number" id="cardnumber" name="card_number"
                                                value="{{ Auth::user()->card('google') ? Auth::user()->card('google')->card_number : '' }}"
                                                placeholder="5500-0000-0000-0000" maxlength="16" required>
                                            <img src="assets/images/master.png" alt="">
                                        </div>
                                        <div class="form-fields">
                                            <div class="form-field mb-20">
                                                <label for="cardname">Expiry Date*</label>
                                                <input id="expiry" type="number" name="exp_date"
                                                    placeholder="(mm/yy)" maxlength="4"
                                                    value="{{ Auth::user()->card('google') ? Auth::user()->card('google')->expiry_date : '' }}"
                                                    required>
                                            </div>
                                            <div class="form-field mb-20">
                                                <label for="cardname">CVV*</label>
                                                <input type="number"
                                                    value="{{ Auth::user()->card('google') ? Auth::user()->card('google')->cvv : '' }}"
                                                    placeholder="123" name="cvv" maxlength="4" required>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <input type="checkbox" id="add2"
                                                value="Save details for later transaction">
                                            <label for="add2">Make Default</label>
                                        </div>
                                        <p class="primary-para payment-para mb-20">In order to verify your account we
                                            may charge your account with small amount that will be refunded.</p>
                                        <div class="form-fields">
                                            <div class="payment-btn">
                                                <button class="btn-c" type="submit">ADD CARD</button>
                                                {{-- <a class="btn-c step-form-next" href="#">ADD CARD</a> --}}
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
                                        <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                            Your Payment info is stored securely</h5>
                                        <img src="assets/images/card.png" alt="">
                                    </div>
                                    <form class="paymentform" action="{{ route('vendor.card.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payment_type" value="apple">

                                        <div class="form-field mb-20">
                                            <label for="cardname">Card Holder Name*</label>
                                            <input type="text" id="cardname" name="name"
                                                placeholder="Sarah Blake"
                                                value="{{ Auth::user()->card('apple') ? Auth::user()->card('apple')->holder_name : '' }}"
                                                required>
                                        </div>
                                        <div class="form-field payment-img mb-20">
                                            <label for="cardname">Card Number*</label>
                                            <input type="number" id="cardnumber" name="card_number"
                                                value="{{ Auth::user()->card('apple') ? Auth::user()->card('apple')->card_number : '' }}"
                                                placeholder="5500-0000-0000-0000" maxlength="16" required>
                                            <img src="assets/images/master.png" alt="">
                                        </div>
                                        <div class="form-fields">
                                            <div class="form-field mb-20">
                                                <label for="cardname">Expiry Date*</label>
                                                <input id="expiry" type="number" name="exp_date"
                                                    placeholder="(mm/yy)" maxlength="4"
                                                    value="{{ Auth::user()->card('apple') ? Auth::user()->card('apple')->expiry_date : '' }}"
                                                    required>
                                            </div>
                                            <div class="form-field mb-20">
                                                <label for="cardname">CVV*</label>
                                                <input type="number"
                                                    value="{{ Auth::user()->card('apple') ? Auth::user()->card('apple')->cvv : '' }}"
                                                    placeholder="123" name="cvv" maxlength="4" required>
                                            </div>
                                        </div>
                                        <p class="primary-para payment-para mb-20">In order to verify your account we
                                            may charge your account with small amount that will be refunded.</p>
                                        <div class="form-fields">
                                            <div class="payment-btn">
                                                <button class="btn-c" type="submit">ADD CARD</button>
                                                {{-- <a class="btn-c step-form-next" href="#">ADD CARD</a> --}}
                                                <!-- <input type="submit" value="PAY NOW"> -->
                                            </div>
                                            <div></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="box-16">
                                <div class="payment-box">
                                    <div class="payment-content mb-30">
                                        <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                            Your Payment info is stored securely</h5>
                                        <img src="assets/images/card.png" alt="">
                                    </div>
                                    <form class="paymentform" action="{{ route('vendor.card.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="payment_type" value="stripe">
                                        <div class="form-field mb-20">
                                            <label for="cardname">Card Holder Name*</label>
                                            <input type="text" id="cardname" name="name"
                                                placeholder="Sarah Blake"
                                                value="{{ Auth::user()->card('stripe') ? Auth::user()->card('stripe')->holder_name : '' }}"
                                                required>
                                        </div>
                                        <div class="form-field payment-img mb-20">
                                            <label for="cardname">Card Number*</label>
                                            <input type="number" id="cardnumber" name="card_number"
                                                value="{{ Auth::user()->card('stripe') ? Auth::user()->card('stripe')->card_number : '' }}"
                                                placeholder="5500-0000-0000-0000" maxlength="16" required>
                                            <img src="assets/images/master.png" alt="">
                                        </div>
                                        <div class="form-fields">
                                            <div class="form-field mb-20">
                                                <label for="cardname">Expiry Date*</label>
                                                <input id="expiry" type="number" name="exp_date"
                                                    placeholder="(mm/yy)" maxlength="4"
                                                    value="{{ Auth::user()->card('stripe') ? Auth::user()->card('stripe')->expiry_date : '' }}"
                                                    required>
                                            </div>
                                            <div class="form-field mb-20">
                                                <label for="cardname">CVV*</label>
                                                <input type="number"
                                                    value="{{ Auth::user()->card('stripe') ? Auth::user()->card('stripe')->cvv : '' }}"
                                                    placeholder="123" name="cvv" maxlength="4" required>
                                            </div>
                                        </div>
                                        <div class="mb-10">
                                            <input type="checkbox" id="add2"
                                                value="Save details for later transaction">
                                            <label for="add2">Make Default</label>
                                        </div>
                                        <p class="primary-para payment-para mb-20">In order to verify your account we
                                            may charge your account with small amount that will be refunded.</p>
                                        <div class="form-fields">
                                            <div class="payment-btn">
                                                <button class="btn-c" type="submit">ADD CARD</button>
                                                {{-- <a class="btn-c step-form-next" href="#">ADD CARD</a> --}}
                                                <!-- <input type="submit" value="PAY NOW"> -->
                                            </div>
                                            <div></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="back-and-continue-btns mb-10 mt-3">
                                <div class="regiter-btn payment-method-btn text-center mb-10">
                                    <a href="#" class="btn-c step-form-prev-custom">Go Back</a>
                                </div>

                                <!-- <div class="regiter-btn payment-method-btn text-center mb-10">
                                                                                                                                <a href="#" class="btn-c step-form-next">Add a payment method</a>
                                                                                                                                </div> -->
                            </div>
                            <div class="registration-content text-center">
                                <a class="" href="./">SKIP</a>
                            </div>
                </div>
                </li>
                <li>
                    <div class="payment-mainbox">
                        <div class="register-content add-card-content text-center">
                            <h2 class="primary-hd mb-10">Payment Management <button class="step-form-next"><img
                                        src="assets/images/add.png" alt=""></button></h2>
                            <ul class="add-card-list mb-20">
                                @foreach (Auth::user()->card('all')->get() as $item)
                                    <li>
                                        <div class="add-card-box">
                                            <div class="add-card-box-img-and-content">
                                                <div class="add-card-box-img">
                                                    <img src="{{ asset('assets/images/cards/' . $item->payment_type . '.png') }}"
                                                        alt="">
                                                </div>
                                                <div class="add-card-box-content active">
                                                    <h6>{{ ucwords($item->payment_type) }}
                                                        {!! $item->default_payment == 1 ? '<span>Default</span>' : '' !!}</h6>
                                                    <p><span>************</span>{{ ' ' . substr($item->cardDetail->card_number, -4) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="add-card-box-menu">
                                                <button class="option-btn"><img
                                                        src="{{ asset('assets/images/option.webp') }}"
                                                        alt=""></button>
                                                <ul class="card-option-list">
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('vendor.deletepayment', $item->id) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button>Delete</button>
                                                        </form>
                                                    </li>
                                                    @if ($item->default_payment == 0)
                                                        <li> <a href="{{ route('vendor.makedefaultpay', $item->id) }}">Make
                                                                Default</a></li>
                                                    @endif

                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach


                            </ul>
                            <div class="back-and-continue-btns mb-10">
                                <div class="regiter-btn payment-method-btn text-center mb-10">
                                    <a href="profile.php" class="btn-c">Save & Continue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="payment-mainbox">
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
                            <li data-targetit="box-16">
                                <div class="payment-tabing-box">
                                    <img src="assets/images/payment5.png" alt="">
                                    <h6>Stripe</h6>
                                </div>
                            </li>
                        </ul>
                        <div class="box-12 showfirst">
                            <div class="payment-box">
                                <div class="payment-content mb-30">
                                    <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                        Your Payment info is stored securely</h5>
                                    <img src="{{ asset('assets/images/card.webp') }}" alt="">
                                </div>
                                <form action="javascript:;" class="payment-form contact-form-field">
                                    <div class="form-field mb-20">
                                        <label for="cardname">Card Holder Name*</label>
                                        <input type="text" id="cardname" placeholder="Sarah Kevin">
                                    </div>
                                    <div class="form-field payment-img mb-20">
                                        <label for="cardname">Card Number*</label>
                                        <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000"
                                            maxlength="16">
                                        <img src="assets/images/master.webp" alt="">
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
                                        <input type="checkbox" id="add" value="Save details for later transaction">
                                        <label for="add">Make Default</label>
                                    </div>
                                    <p class="primary-para payment-para mb-20">In order to verify your account we
                                        may charge your account with small amount that will be refunded.</p>
                                    <div class="form-fields">
                                        <div class="payment-btn">
                                            <a class="btn-c step-form-next" href="#">ADD CARD</a>
                                            <!-- <input type="submit" value="PAY NOW"> -->
                                        </div>
                                        <div></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-13">
                            <div class="payment-box">
                                <div class="payment-content mb-30">
                                    <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                        Your Payment info is stored securely</h5>
                                    <img src="assets/images/card.png" alt="">
                                </div>
                                <form action="javascript:;" class="payment-form contact-form-field">
                                    <div class="form-field mb-20">
                                        <label for="cardname">Card Holder Name*</label>
                                        <input type="text" id="cardname" placeholder="Sarah Kevin">
                                    </div>
                                    <div class="form-field payment-img mb-20">
                                        <label for="cardname">Card Number*</label>
                                        <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000"
                                            maxlength="16">
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
                                        <input type="checkbox" id="add2" value="Save details for later transaction">
                                        <label for="add2">Make Default</label>
                                    </div>
                                    <p class="primary-para payment-para mb-20">In order to verify your account we
                                        may charge your account with small amount that will be refunded.</p>
                                    <div class="form-fields">
                                        <div class="payment-btn">
                                            <a class="btn-c step-form-next" href="#">ADD CARD</a>
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
                                    <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                        Your Payment info is stored securely</h5>
                                    <img src="assets/images/card.png" alt="">
                                </div>
                                <form action="javascript:;" class="payment-form contact-form-field">
                                    <div class="form-field mb-20">
                                        <label for="cardname">Card Holder Name*</label>
                                        <input type="text" id="cardname" placeholder="Sarah Kevin">
                                    </div>
                                    <div class="form-field payment-img mb-20">
                                        <label for="cardname">Card Number*</label>
                                        <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000"
                                            maxlength="16">
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
                                        <input type="checkbox" id="add3" value="Save details for later transaction">
                                        <label for="add3">Make Default</label>
                                    </div>
                                    <p class="primary-para payment-para mb-20">In order to verify your account we
                                        may charge your account with small amount that will be refunded.</p>
                                    <div class="form-fields">
                                        <div class="payment-btn">
                                            <a class="btn-c step-form-next" href="#">ADD CARD</a>
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
                                    <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                        Your Payment info is stored securely</h5>
                                    <img src="assets/images/card.png" alt="">
                                </div>
                                <form action="javascript:;" class="payment-form contact-form-field">
                                    <div class="form-field mb-20">
                                        <label for="cardname">Card Holder Name*</label>
                                        <input type="text" id="cardname" placeholder="Sarah Kevin">
                                    </div>
                                    <div class="form-field payment-img mb-20">
                                        <label for="cardname">Card Number*</label>
                                        <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000"
                                            maxlength="16">
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
                                        <input type="checkbox" id="add4" value="Save details for later transaction">
                                        <label for="add4">Make Default</label>
                                    </div>
                                    <p class="primary-para payment-para mb-20">In order to verify your account we
                                        may charge your account with small amount that will be refunded.</p>
                                    <div class="form-fields">
                                        <div class="payment-btn">
                                            <a class="btn-c step-form-next" href="#">ADD CARD</a>
                                            <!-- <input type="submit" value="PAY NOW"> -->
                                        </div>
                                        <div></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="box-16">
                            <div class="payment-box">
                                <div class="payment-content mb-30">
                                    <h5 class="third-hd mb-10"><img src="assets/images/Icon.png" alt="">
                                        Your Payment info is stored securely</h5>
                                    <img src="assets/images/card.png" alt="">
                                </div>
                                <form action="javascript:;" class="payment-form contact-form-field">
                                    <div class="form-field mb-20">
                                        <label for="cardname">Card Holder Name*</label>
                                        <input type="text" id="cardname" placeholder="Sarah Kevin">
                                    </div>
                                    <div class="form-field payment-img mb-20">
                                        <label for="cardname">Card Number*</label>
                                        <input type="number" id="cardnumber" placeholder="5500-0000-0000-0000"
                                            maxlength="16">
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
                                        <input type="checkbox" id="add5" value="Save details for later transaction">
                                        <label for="add5">Make Default</label>
                                    </div>
                                    <p class="primary-para payment-para mb-20">In order to verify your account we
                                        may charge your account with small amount that will be refunded.</p>
                                    <div class="form-fields">
                                        <div class="payment-btn">
                                            <a class="btn-c step-form-next" href="#">ADD CARD</a>
                                            <!-- <input type="submit" value="PAY NOW"> -->
                                        </div>
                                        <div></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="back-and-continue-btns mb-10 mt-3">
                            <div class="regiter-btn payment-method-btn text-center mb-10">
                                <a href="#" class="btn-c step-form-prev-custom">Go Back</a>
                            </div>

                        </div>
                        <div class="registration-content text-center">
                            <a class="" href="./">SKIP</a>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
        </div>
        </div>
    </section>

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>






    {{-- <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABwtgNHhRqnfw_sXX1-x-f0LQNm4lxk6s&libraries=places"></script> --}}
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABwtgNHhRqnfw_sXX1-x-f0LQNm4lxk6s&callback=initAutocomplete&libraries=places&v=weekly"
        defer></script>
    <script>
        function nextStep() {
            var sectionID = "#registration-section-id";
            $('.registration-list li.active').next('li').addClass('active');
            $('.registration-list li.active').prev('li').removeClass('active');
            $('.register-tabbing-list li.active').next('li').addClass('active');
            $('.register-tabbing-list li.active').prev('li').removeClass('active');
            if ($(sectionID).length) {
                $('html, body').animate({
                    scrollTop: $(sectionID).offset().top
                }, 500);
            }
        }
        // This example adds a search box to a map, using the Google Place Autocomplete
        // feature. People can enter geographical searches. The search box will return a
        // pick list containing a mix of places and predicted search terms.
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
        function initAutocomplete() {
            const map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: Number(document.getElementById('locations_lat').value),
                    lng: Number(document.getElementById('locations_lng').value)
                },
                zoom: 13,
                mapTypeId: "roadmap",
            });
            // Create the search box and link it to the UI element.
            const input = document.getElementById("gsearch");
            const searchBox = new google.maps.places.SearchBox(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                const bounds = new google.maps.LatLngBounds();

                places.forEach((place) => {
                    document.getElementById('locations_lat').value = place.geometry.location.lat();
                    document.getElementById('locations_lng').value = place.geometry.location.lng();
                    if (!place.geometry || !place.geometry.location) {
                        return;
                    }

                    const icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25),
                    };

                    // Create a marker for each place.
                    markers.push(
                        new google.maps.Marker({
                            map,
                            icon,
                            title: place.name,
                            position: place.geometry.location,
                        }),
                    );
                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        window.initAutocomplete = initAutocomplete;
    </script>

    {{-- <script>
        function initialize() {
            var input = document.getElementById('gsearch');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
                document.getElementById('locations_lat').value = place.geometry.location.lat();
                document.getElementById('locations_lng').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script> --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#locationupdate').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {

                        $.toast({
                            heading: 'Success',
                            text: response.message,
                            showHideTransition: 'slide',
                            icon: 'success'
                        })
                        nextStep()

                    }
                },
                error: function(error) {}
            });
        });
        $('.paymentform').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.status) {

                        $.toast({
                            heading: 'Success',
                            text: 'Payment successfully addes',
                            showHideTransition: 'slide',
                            icon: 'success'
                        })

                    }
                },
                error: function(error) {}
            });
        });


        $(document).ready(function() {
            $('.dropfiy').dropify();
        });
        $('.dropfiy').change(function() {
            $('.loader-wrappper').addClass('show');
            var dropfiy_elem = $(this);
            var license = $(this)[0].files[0];
            var formData = new FormData();
            formData.append('license', license);

            $.ajax({
                type: 'POST',
                url: "{{ route('vendor.upload.certificate') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data.status == true) {
                        $('.certificate-wrapper').append(
                            '<li><span class="delete-icon" onclick="deleteCertificate(' + data.data
                            .id +
                            ', this)"><i class="fa-solid fa-circle-xmark"></i></span><a href="' +
                            data.data.image + '" data-fancybox="gallery"><img src="' + data.data
                            .image + '" alt="License & Certifications"></a></li>');
                        $(dropfiy_elem).next(".dropify-clear").trigger("click");
                    }
                    $('.loader-wrappper').removeClass('show');
                    console.log("success");
                    console.log(data);
                },
                error: function(data) {
                    $('.loader-wrappper').removeClass('show');
                    console.log(data);
                }
            });
        });
        $('.eye').click(function() {
            if ($(this).prev().attr('type') == 'password') {
                $(this).prev().attr('type', 'text')
            } else {
                $(this).prev().attr('type', 'password')
            }
        });

        function deleteCertificate(id, a) {
            var elem = a;
            $.ajax({
                type: 'POST',
                url: "{{ route('vendor.certificate.delete') }}",
                data: {
                    "id": id
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data.status == true) {
                        $(elem).parent().remove();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        $('.regitration-form').submit(function(e) {
            var elem = e;
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if (data.status) {
                        var sectionID = "#registration-section-id";
                        $('.registration-list li.active').next('li').addClass('active');
                        $('.registration-list li.active').prev('li').removeClass('active');
                        $('.register-tabbing-list li.active').next('li').addClass('active');
                        $('.register-tabbing-list li.active').prev('li').removeClass('active');
                        if ($(sectionID).length) {
                            $('html, body').animate({
                                scrollTop: $(sectionID).offset().top
                            }, 500);
                        }
                    }

                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('.category-checker').change(function() {
            $.ajax({
                type: 'POST',
                url: "{{ route('vendor.business.categories') }}",
                data: {
                    "id": $(this).val()
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@endpush
