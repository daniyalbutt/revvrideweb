@extends('layouts.front-app')
@section('title', 'Tours Inner')

@section('content')

    <section class="mainBanner">
        <div class="fluid-container container p-0">
            <div class="banner-bg inner-banner-bg" style="background-image:url({{ asset('assets/images/bg1.jpg') }}); ">
                <div class="container inner-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="banner-content text-center">
                                <h4>Your Dream Sport's</h4>
                                <hr class="seperator">
                                <h1>{{ $inners->title }}</h1>
                                {{-- <h1>{{ $inners->title }}</h1> --}}
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
                    <div class="sports-detail-box">
                        <div class="detail-content-review-and-setting mb-10">
                            <div class="detail-content best-spots-box-content p-0">
                                <h4 class="mb-5">{{ $inners->title }}</h4>
                                <span><i class="fas fa-map-marker-alt"></i> {{ $inners->locations }}</span>
                            </div>
                            <div class="detail-review-and-seting best-spots-box-content p-0">
                                <div class="detail-review">
                                    <h4 class="mb-5">5.0 <span>[2,123 REVIEWS]</span></h4>
                                    <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                </div>
                                <div class="detail-setting">
                                    <a href="chat.php"><img src="{{ asset('assets/images/setting.png') }}"
                                            alt=""></a>
                                </div>
                            </div>
                        </div>
                        <ul class="index-slider mb-30">
                            @foreach($inners->Images as $key => $value)
                            <li>
                                <div class="sports-detail-img">
                                    <img src="{{ $value->image }}" alt="">
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="detail-content mb-20">
                            <h3 class="third-hd mb-20">Description</h3>
                            <p class="primary-para">{{ $inners->desc }}</p>
                        </div>
                        <ul class="detail-info-list mb-20">
                            <li>
                                <div class="detail-info-list-box">
                                    <img src="{{ asset('assets/images/info1.png') }}" alt="">
                                    <h4>Capacity</h4>
                                    <p>{{ $inners->capacity }} Persons</p>
                                </div>
                            </li>
                            <li>
                                <div class="detail-info-list-box">
                                    <img src="{{ asset('assets/images/info2.png') }}" alt="">
                                    <h4>Cancellation</h4>
                                    <p>100% Refund</p>
                                    <p>2 days prior</p>
                                </div>
                            </li>
                            <li>
                                <div class="detail-info-list-box">
                                    <img src="{{ asset('assets/images/info3.png') }}" alt="">
                                    <h4>Skill Level</h4>
                                    <p>Advanced</p>
                                </div>
                            </li>
                        </ul>
                        <div class="reviews">
                            <div class="detail-content mb-20">
                                <h3 class="third-hd mb-20">Ratings & Reviews</h3>
                            </div>
                            <div class="review-points-and-review-list">
                                <div class="review-points best-spots-box-content p-0">
                                    <h4 class="mb-20">4.0<span>/5</span></h4>
                                    <div class="mb-20 d-flex align-items-center"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><span><i class="fas fa-star"></i></span></div>
                                    <span>11 Ratings</span>
                                </div>
                                <div class="review-list-with-percent">
                                    <div class="review-list review-points">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i></div>
                                        <div class="review-percent-box">
                                            <div></div>
                                        </div>
                                        <div class="text-center">
                                            <h6>9</h6>
                                        </div>
                                    </div>
                                    <div class="review-list review-points">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><span><i
                                                    class="fas fa-star"></i></span></div>
                                        <div class="review-percent-box">
                                            <div class="w-10"></div>
                                        </div>
                                        <div class="text-center">
                                            <h6>1</h6>
                                        </div>
                                    </div>
                                    <div class="review-list review-points">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><span><i class="fas fa-star"></i></span><span><i
                                                    class="fas fa-star"></i></span></div>
                                        <div class="review-percent-box">
                                            <div class="w-10"></div>
                                        </div>
                                        <div class="text-center">
                                            <h6>1</h6>
                                        </div>
                                    </div>
                                    <div class="review-list review-points">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><span><i
                                                    class="fas fa-star"></i></span><span><i
                                                    class="fas fa-star"></i></span><span><i class="fas fa-star"></i></span>
                                        </div>
                                        <div class="review-percent-box">
                                            <div class="w-0"></div>
                                        </div>
                                        <div class="text-center">
                                            <h6>0</h6>
                                        </div>
                                    </div>
                                    <div class="review-list review-points">
                                        <div><i class="fas fa-star"></i><span><i class="fas fa-star"></i></span><span><i
                                                    class="fas fa-star"></i></span><span><i
                                                    class="fas fa-star"></i></span><span><i
                                                    class="fas fa-star"></i></span></div>
                                        <div class="review-percent-box">
                                            <div class="w-0"></div>
                                        </div>
                                        <div class="text-center">
                                            <h6>0</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="detail-filter-mainbox">
                        <ul class="detail-filter-list">
                            <li>
                                <div class="price-filter detail-filter-content">
                                    <h6 class="mb-10">PRICE</h6>
                                    <h3>${{ $inners->price }}+Tax / <span>Per Hour</span></h3>
                                    <input type="hidden" id="get_price" value="{{ $inners->price }}">
                                    <div class="date-wrapper">
                                        <ul>
                                            <li><strong>Start Date</strong> <span>{{ date('d M, Y h:i A', strtotime($inners->start_date)) }}</span></li>
                                            <li><strong>End Date</strong> <span>{{ date('d M, Y h:i A', strtotime($inners->end_date)) }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <form action="{{ route('user.booking') }}" method="post">
                                @csrf
                                <input type="hidden" name="bookable_type" value="tour">
                                <input type="hidden" name="product_id" id="product_id" value="{{ $inners->id }}">
                                <input type="hidden" name="form_total_price" value="{{ $inners->price }}" id="form-total-price">
                                <input type="hidden" name="form_qty" value="1" id="form-qty">
                                <input type="hidden" name="form_insurance" value="0" id="form-insurance">
                                <li>
                                    <div class="additional-box detail-filter-content">
                                        <h3 class="mb-20">GROUP SIZE <img src="{{ asset('assets/images/info-icon.webp') }}"
                                                alt="">
                                        </h3>
                                        <div class="product-and-counter mb-10">
                                            <div class="detail-filter-content">
                                                <span>Adults</span>
                                            </div>
                                            <div>
                                                <div class="quantity" data-name="group">
                                                    <button class="quantity__minus" type="button"><i class="fas fa-minus"></i></button>
                                                    <input name="adult_quantity" type="number" class="quantity__input person-qty" value="1">
                                                    <button class="quantity__plus" type="button"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-and-counter mb-10">
                                            <div class="detail-filter-content">
                                                <span>Children</span>
                                            </div>
                                            <div>
                                                <div class="quantity" data-name="group">
                                                    <button class="quantity__minus" type="button"><i class="fas fa-minus"></i></button>
                                                    <input name="children_quantity" type="number" class="quantity__input person-qty" value="0">
                                                    <button class="quantity__plus" type="button"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-and-counter mb-10">
                                            <div class="detail-filter-content">
                                                <span>Infants</span>
                                            </div>
                                            <div>
                                                <div class="quantity" data-name="group">
                                                    <button class="quantity__minus" type="button"><i class="fas fa-minus"></i></button>
                                                    <input name="infants_quantity" type="number" class="quantity__input person-qty" value="0">
                                                    <button class="quantity__plus" type="button"><i class="fas fa-plus"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-and-counter">
                                            <div class="detail-filter-content">
                                                <h6>Total:</h6>
                                            </div>
                                            <div class="detail-filter-content">
                                                <h6><strong class="person-total">1</strong> Person</h6>
                                            </div>
                                        </div>

                                    </div>
                                </li>
                                <li>
                                    <div class="insurance-box detail-filter-content">
                                        <h3 class="mb-10">DO YOU WANT INSURANCE?</h3>
                                        <h6 class="mb-10">Insurance amount: $50 </h6>
                                        <div class="checkboxes">
                                            <div>
                                                <input type="radio" id="yes" value="YES" name="insurance">
                                                <label for="yes">YES</label>
                                            </div>
                                            <div>
                                                <input type="radio" id="no" value="NO" name="insurance" checked>
                                                <label for="no">NO</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="insurance-box detail-filter-content">
                                        <h3 class="mb-10">WHAT'S INCLUDED</h3>
                                        <ul class="include-list">
                                            <li>
                                                <p>{{ $inners->whats_include }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="price-box detail-filter-content">
                                        <h3 class="mb-20">PRICE DETAILS </h3>
                                        <ul class="price-list mb-20">
                                            <li>
                                                <div class="product-and-counter">
                                                    <div class="detail-filter-content">
                                                        <span>{{ $inners->title }} <strong id="title_total">x 1</strong></span>
                                                    </div>
                                                    <div class="detail-filter-content">
                                                        <span>${{ $inners->price }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-and-counter">
                                                    <div class="detail-filter-content">
                                                        <h6>TOTAL PACKAGE:</h6>
                                                    </div>
                                                    <div class="detail-filter-content">
                                                        <h6>$<strong id="total_price">{{ $inners->price }}</strong></h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="price-btn check-btn"><button type="submit" class="btn-a w-100">BOOK NOW</button>
                                        </div>
                                    </div>
                                </li>
                            </form>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="detail-filter-reviews mt-50 mb-30">
                        <div class="detail-filter-review-content">
                            <h6>Product Reviews</h6>
                        </div>
                        <div class="detail-filter-review-btns">
                            <div>
                                <div class="sortby">
                                    <div>
                                        <h6><i class="fas fa-sort-alt"></i> Sort:</h6>
                                    </div>
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="Relevance">Relevance</option>
                                                <option value="option 1">option 1</option>
                                                <option value="option 2">option 2</option>
                                                <option value="option 3">option 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="sortby">
                                    <div>
                                        <h6><i class="far fa-filter"></i> Filter:</h6>
                                    </div>
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="All Star">All Star</option>
                                                <option value="option 1">option 1</option>
                                                <option value="option 2">option 2</option>
                                                <option value="option 3">option 3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="detail-review-list">
                        @foreach($inners->get_reviews as $key => $reviews)
                        <li>
                            <div class="review-box">
                                <div class="review-box-img-and-content mb-20">
                                    <div class="review-box-img">
                                        @if($reviews->getUser->display_picture != null)
                                        <img src="{{ $reviews->getUser->display_picture }}" alt="">
                                        @else
                                        <img src="{{ asset('assets/images/dummy.jpg') }}" alt="">
                                        @endif
                                    </div>
                                    <div class="review-box-content">
                                        <div>
                                            @for($i = 0; $i < $reviews->rating; $i++)
                                            <i class="fas fa-star"></i>
                                            @endfor
                                        </div>
                                        <h6>{{ $reviews->getUser->first_name }} {{ $reviews->getUser->last_name }}</h6>
                                        <span>{{ date('M d, Y', strtotime($reviews->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="review-box-content">
                                    <p>{{ $reviews->comment }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter-sec p-50 pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter" style="background-image:url({{ asset('assets/images/bg6.jpg') }}); ">
                        <div class="newsletter-content text-center mb-40">
                            <h3 class="third-hd white mb-10">SUBSCRIBE TO OUR NEWSLETTER</h3>
                            <h4 class="sub-hd white">SUBSCRIBE & GET UPDATES IN YOUR INBOX</h4>
                        </div>
                        <form action="javascript:;" class="newsletter-form subscribe-form">
                            <div class="newsletter-form-fields">
                                <div class="form-field">
                                    <input type="text" placeholder="Your Name">
                                </div>
                                <div class="form-field">
                                    <input type="email" placeholder="Email Address">
                                </div>
                                <div class="form-btn form-field">
                                    <input type="submit" value="SUBSCRIBE NOW">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('script')
<script>
    var product_price = parseFloat($('#get_price').val());
    var total_price = parseFloat($('#get_price').val());
    var addon_price = 0;
    var insurance_amount = 0;

    function create_custom_dropdowns() {
        $('select').each(function(i, select) {
            if (!$(this).next().hasClass('dropdown')) {
                $(this).after('<div class="dropdown ' + ($(this).attr('class') || '') +
                    '" tabindex="0"><span class="current"></span><div class="list"><ul></ul></div></div>');
                var dropdown = $(this).next();
                var options = $(select).find('option');
                var selected = $(this).find('option:selected');
                dropdown.find('.current').html(selected.data('display-text') || selected.text());
                options.each(function(j, o) {
                    var display = $(o).data('display-text') || '';
                    dropdown.find('ul').append('<li class="option ' + ($(o).is(':selected') ?
                            'selected' : '') + '" data-value="' + $(o).val() +
                        '" data-display-text="' + display + '">' + $(o).text() + '</li>');
                });
            }
        });
    }

    // Event listeners

    // Open/close
    $(document).on('click', '.dropdown', function(event) {
        $('.dropdown').not($(this)).removeClass('open');
        $(this).toggleClass('open');
        if ($(this).hasClass('open')) {
            $(this).find('.option').attr('tabindex', 0);
            $(this).find('.selected').focus();
        } else {
            $(this).find('.option').removeAttr('tabindex');
            $(this).focus();
        }
    });
    // Close when clicking outside
    $(document).on('click', function(event) {
        if ($(event.target).closest('.dropdown').length === 0) {
            $('.dropdown').removeClass('open');
            $('.dropdown .option').removeAttr('tabindex');
        }
        event.stopPropagation();
    });
    // Option click
    $(document).on('click', '.dropdown .option', function(event) {
        $(this).closest('.list').find('.selected').removeClass('selected');
        $(this).addClass('selected');
        var text = $(this).data('display-text') || $(this).text();
        $(this).closest('.dropdown').find('.current').text(text);
        $(this).closest('.dropdown').prev('select').val($(this).data('value')).trigger('change');
    });

    // Keyboard events
    $(document).on('keydown', '.dropdown', function(event) {
        var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find('.list .option.selected')[
            0]);
        // Space or Enter
        if (event.keyCode == 32 || event.keyCode == 13) {
            if ($(this).hasClass('open')) {
                focused_option.trigger('click');
            } else {
                $(this).trigger('click');
            }
            return false;
            // Down
        } else if (event.keyCode == 40) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                focused_option.next().focus();
            }
            return false;
            // Up
        } else if (event.keyCode == 38) {
            if (!$(this).hasClass('open')) {
                $(this).trigger('click');
            } else {
                var focused_option = $($(this).find('.list .option:focus')[0] || $(this).find(
                    '.list .option.selected')[0]);
                focused_option.prev().focus();
            }
            return false;
            // Esc
        } else if (event.keyCode == 27) {
            if ($(this).hasClass('open')) {
                $(this).trigger('click');
            }
            return false;
        }
    });

    $(document).ready(function() {
        create_custom_dropdowns();
    });
</script>
@endpush