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
                            <li>
                                <div class="sports-detail-img">
                                    <img src="{{ asset('storage/' . $inners->Images) }}" alt="">
                                </div>
                            </li>
                            {{-- <li>
                                <div class="sports-detail-img">
                                    <img src="{{ asset('assets/images/dt1.jpg') }}" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="sports-detail-img">
                                    <img src="{{ asset('assets/images/dt1.jpg') }}" alt="">
                                </div>
                            </li>
                            <li>
                                <div class="sports-detail-img">
                                    <img src="{{ asset('assets/images/dt1.jpg') }}" alt="">
                                </div>
                            </li> --}}
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
                                </div>
                            </li>
                            <!-- <li>
                                                                                            <div class="check-availibility detail-filter-content">
                                                                                               <h6 class="mb-10">CHECK AVAILABILITY</h6>
                                                                                               <div class="ui calendar date-pick mb-10" id="example1">
                                                                                                  <div class="ui input input-field left icon">
                                                                                                     <i class="calendar icon"></i>
                                                                                                     <input type="text" placeholder="Date">
                                                                                                  </div>
                                                                                               </div>
                                                                                               <div class="chcek-in-check-out mb-10">
                                                                                                  <div>
                                                                                                     <div class="ui calendar mb-10" id="example3">
                                                                                                        <div class="ui input input-field left icon">
                                                                                                           <i class="time icon"></i>
                                                                                                           <input type="text" placeholder="Check In">
                                                                                                        </div>
                                                                                                     </div>
                                                                                                  </div>
                                                                                                  <div>
                                                                                                     <div class="ui calendar mb-10" id="example4">
                                                                                                        <div class="ui input input-field left icon">
                                                                                                           <i class="time icon"></i>
                                                                                                           <input type="text" placeholder="Check Out">
                                                                                                        </div>
                                                                                                     </div>
                                                                                                  </div>
                                                                                               </div>
                                                                                               <p class="mb-10">Provide additional dates if your dates are flexible and you have other possible options.</p>
                                                                                               <div class="ui calendar date-pick mb-20" id="example2">
                                                                                                  <div class="ui input input-field left icon">
                                                                                                     <i class="calendar icon"></i>
                                                                                                     <input type="text" placeholder="Date">
                                                                                                  </div>
                                                                                               </div>
                                                                                               <div class="check-btn"><a href="#" class="btn-a">Check</a></div>
                                                                                            </div>
                                                                                         </li> -->
                            <li>
                                <div class="additional-box detail-filter-content">
                                    <h3 class="mb-20">GROUP SIZE <img src="{{ asset('assets/images/info-icon.png') }}"
                                            alt="">
                                    </h3>
                                    <div class="product-and-counter mb-10">
                                        <div class="detail-filter-content">
                                            <span>Adults</span>
                                        </div>
                                        <div>
                                            <div class="quantity">
                                                <button class="quantity__minus"><i class="fas fa-minus"></i></button>
                                                <input name="quantity" type="number" class="quantity__input"
                                                    value="1">
                                                <button class="quantity__plus"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-and-counter mb-10">
                                        <div class="detail-filter-content">
                                            <span>Seniors</span>
                                        </div>
                                        <div>
                                            <div class="quantity">
                                                <button class="quantity__minus"><i class="fas fa-minus"></i></button>
                                                <input name="quantity" type="number" class="quantity__input"
                                                    value="1">
                                                <button class="quantity__plus"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-and-counter mb-10">
                                        <div class="detail-filter-content">
                                            <span>Children</span>
                                        </div>
                                        <div>
                                            <div class="quantity">
                                                <button class="quantity__minus"><i class="fas fa-minus"></i></button>
                                                <input name="quantity" type="number" class="quantity__input"
                                                    value="1">
                                                <button class="quantity__plus"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-and-counter mb-10">
                                        <div class="detail-filter-content">
                                            <span>Infants</span>
                                        </div>
                                        <div>
                                            <div class="quantity">
                                                <button class="quantity__minus"><i class="fas fa-minus"></i></button>
                                                <input name="quantity" type="number" class="quantity__input"
                                                    value="1">
                                                <button class="quantity__plus"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-and-counter">
                                        <div class="detail-filter-content">
                                            <h6>Total:</h6>
                                        </div>
                                        <div class="detail-filter-content">
                                            <h6>01 Person</h6>
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
                                            <input type="checkbox" id="yes" value="YES">
                                            <label for="yes">YES</label>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="no" value="NO">
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
                                        {{-- <li>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                        </li>
                                        <li>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                        </li>
                                        <li>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                                        </li> --}}
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
                                                    <span>Persons</span>
                                                </div>
                                                <div class="detail-filter-content">
                                                    <span>01</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="product-and-counter">
                                                <div class="detail-filter-content">
                                                    <h6>TOTAL PACKAGE:</h6>
                                                </div>
                                                <div class="detail-filter-content">
                                                    <h6>${{ $inners->price }}</h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="price-btn check-btn"><a href="booking.php" class="btn-a">BOOK NOW</a>
                                    </div>
                                </div>
                            </li>
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
                        <li>
                            <div class="review-box">
                                <div class="review-box-img-and-content mb-20">
                                    <div class="review-box-img">
                                        <img src="{{ asset('assets/images/r1.png') }}" alt="">
                                    </div>
                                    <div class="review-box-content">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i></div>
                                        <h6>Dominic Dawn</h6>
                                        <span>July 25, 2023</span>
                                    </div>
                                </div>
                                <div class="review-box-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="review-box">
                                <div class="review-box-img-and-content mb-20">
                                    <div class="review-box-img">
                                        <img src="{{ asset('assets/images/r2.png') }}" alt="">
                                    </div>
                                    <div class="review-box-content">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i></div>
                                        <h6>Dominic Dawn</h6>
                                        <span>July 25, 2023</span>
                                    </div>
                                </div>
                                <div class="review-box-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="review-box">
                                <div class="review-box-img-and-content mb-20">
                                    <div class="review-box-img">
                                        <img src="{{ asset('assets/images/r3.png') }}" alt="">
                                    </div>
                                    <div class="review-box-content">
                                        <div><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i></div>
                                        <h6>Dominic Dawn</h6>
                                        <span>July 25, 2023</span>
                                    </div>
                                </div>
                                <div class="review-box-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen book.
                                        It has survived not only five centuries, but also the leap into electronic
                                        typesetting, </p>
                                </div>
                            </div>
                        </li>
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

<script>
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
