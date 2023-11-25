@extends('layouts.front-app')
@section('title', 'Tours')

@section('content')

    <section class="mainBanner">
        <div class="fluid-container container p-0">
            <div class="banner-bg inner-banner-bg" style="background-image:url({{ asset('assets/images/bg1.jpg') }}); ">
                <div class="container inner-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="banner-content text-center">
                                <h4>Dream a Little Crazier</h4>
                                <hr class="seperator">
                                <h1>Are You Ready, Thrill Seekers?</h1>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="search-fields-parent inner-search-fields-parent">
                                <div class="search-fields inner-search-fields">
                                    <div>
                                        <div class="search-field-input">
                                            <input type="text" placeholder="Search your sports here ...">
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="Category">Category</option>
                                                <option value="Jetski">Jetski</option>
                                                <option value="Dirt Bike">Dirt Bike</option>
                                                <option value="Snowmobile">Snowmobile</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#">SEARCH <i class="fal fa-arrow-to-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-spots-sec pt-5">
        <div class="fluid-container container p-0">
            <div class="p-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="best-spots-content text-center mb-50">
                                <h4 class="sub-hd">Athletic Hotspots</h4>
                                <hr class="seperator">
                                <h2 class="primary-hd">Daringly Popular Routes </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="best-spots-content mb-20">
                                <h4 class="sub-hd">YOUR RESULT FOUND</h4>
                            </div>
                            <ul class="best-spots-list">

                                @foreach ($tours as $tour)
                                    <li>
                                        <div class="best-spots-box tour-best-spots-box fill-shadow">
                                            <div class="best-spots-box-img">
                                                <div class="best-spots-box-img-content">
                                                    {{-- <h6>01 Aug - 10 Aug</h6> --}}
                                                    <h6>{{ Carbon\Carbon::parse($tour->start_date)->format('d M') . ' - ' . Carbon\Carbon::parse($tour->end_date)->format('d M') }}
                                                    </h6>

                                                </div>
                                                @if (count($tour->Images) != 0)
                                                    <img src="{{ asset('storage/' . $tour->Images[0]->image) }}"
                                                        alt="{{ $tour->title }}">
                                                @endif
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">{{ $tour->title }}</h4>
                                                <span class="mb-20"><i
                                                        class="fas fa-map-marker-alt"></i>{{ $tour->locations }}</span>
                                                <h4 class="mb-5">4.8 <span>[256 REVIEWS]</span></h4>
                                                <div class="mb-20"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i></div>
                                                <ul class="best-spots-box-list mb-20">
                                                    {{-- <li>
                                                        <h5><i class="fas fa-clock"></i> Duration:
                                                            {{ $tour->start_date . ' ' . $tour->end_date }}</h5>
                                                    </li> --}}
                                                    <li>
                                                        <h5><i class="fas fa-clock"></i> Duration:
                                                            {{ $duration ? $duration->format('%h h %i mins') : 'N/A' }}</h5>
                                                    </li>
                                                    <li>
                                                        <h5><i class="fas fa-users"></i> Age: {{ $tour->age }}</h5>
                                                    </li>
                                                    <li>
                                                        <h5><i class="fas fa-user-friends"></i> Capacity: Max
                                                            {{ $tour->capacity }}</h5>
                                                    </li>
                                                </ul>
                                                <div class="best-spots-box-btn-and-price">
                                                    <div class="best-spots-box-btn">
                                                        <a class="btn-b"
                                                            href="{{ route('tourinner', ['slug' => \Str::slug($tour->title, '-'), 'id' => $tour->id]) }}">ONLINE
                                                            BOOKING</a>
                                                    </div>
                                                    <div class="best-spots-box-price">
                                                        <h4>${{ $tour->price }}+Tax</h4>
                                                        <h6>Per Adult</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                                {{-- <li>
                                    <div class="best-spots-box tour-best-spots-box fill-shadow">
                                        <div class="best-spots-box-img">
                                            <div class="best-spots-box-img-content">
                                                <h6>01 Aug - 10 Aug</h6>
                                            </div>
                                            <img src="assets/images/s1.jpg" alt="">
                                        </div>
                                        <div class="best-spots-box-content">
                                            <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                            <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York, United
                                                States</span>
                                            <h4 class="mb-5">4.8 <span>[256 REVIEWS]</span></h4>
                                            <div class="mb-20"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i></div>
                                            <ul class="best-spots-box-list mb-20">
                                                <li>
                                                    <h5><i class="fas fa-clock"></i> Duration: 2 h 30 mins</h5>
                                                </li>
                                                <li>
                                                    <h5><i class="fas fa-users"></i> Age: 10-40</h5>
                                                </li>
                                                <li>
                                                    <h5><i class="fas fa-user-friends"></i> Capacity: Max 50</h5>
                                                </li>
                                            </ul>
                                            <div class="best-spots-box-btn-and-price">
                                                <div class="best-spots-box-btn">
                                                    <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                </div>
                                                <div class="best-spots-box-price">
                                                    <h4>$550+Tax</h4>
                                                    <h6>Per adult</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="best-spots-box tour-best-spots-box fill-shadow">
                                        <div class="best-spots-box-img">
                                            <div class="best-spots-box-img-content">
                                                <h6>01 Aug - 10 Aug</h6>
                                            </div>
                                            <img src="assets/images/s2.jpg" alt="">
                                        </div>
                                        <div class="best-spots-box-content">
                                            <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                            <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York, United
                                                States</span>
                                            <h4 class="mb-5">4.8 <span>[256 REVIEWS]</span></h4>
                                            <div class="mb-20"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i></div>
                                            <ul class="best-spots-box-list mb-20">
                                                <li>
                                                    <h5><i class="fas fa-clock"></i> Duration: 2 h 30 mins</h5>
                                                </li>
                                                <li>
                                                    <h5><i class="fas fa-users"></i> Age: 10-40</h5>
                                                </li>
                                                <li>
                                                    <h5><i class="fas fa-user-friends"></i> Capacity: Max 50</h5>
                                                </li>
                                            </ul>
                                            <div class="best-spots-box-btn-and-price">
                                                <div class="best-spots-box-btn">
                                                    <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                </div>
                                                <div class="best-spots-box-price">
                                                    <h4>$550+Tax</h4>
                                                    <h6>Per adult</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="best-spots-box tour-best-spots-box fill-shadow">
                                        <div class="best-spots-box-img">
                                            <div class="best-spots-box-img-content">
                                                <h6>01 Aug - 10 Aug</h6>
                                            </div>
                                            <img src="assets/images/s3.jpg" alt="">
                                        </div>
                                        <div class="best-spots-box-content">
                                            <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                            <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York, United
                                                States</span>
                                            <h4 class="mb-5">4.8 <span>[256 REVIEWS]</span></h4>
                                            <div class="mb-20"><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i></div>
                                            <ul class="best-spots-box-list mb-20">
                                                <li>
                                                    <h5><i class="fas fa-clock"></i> Duration: 2 h 30 mins</h5>
                                                </li>
                                                <li>
                                                    <h5><i class="fas fa-users"></i> Age: 10-40</h5>
                                                </li>
                                                <li>
                                                    <h5><i class="fas fa-user-friends"></i> Capacity: Max 50</h5>
                                                </li>
                                            </ul>
                                            <div class="best-spots-box-btn-and-price">
                                                <div class="best-spots-box-btn">
                                                    <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                </div>
                                                <div class="best-spots-box-price">
                                                    <h4>$550+Tax</h4>
                                                    <h6>Per adult</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="col-lg-4">
                            <div class="best-spots-content mb-20">
                                <h4 class="sub-hd">RECOMMENDED</h4>
                            </div>
                            <ul class="recomded-list mb-5">

                                @foreach ($tourrecommendeds as $tourrecommended)
                                    <li>
                                        <a
                                            href="{{ route('tourinner', ['slug' => \Str::slug($tourrecommended->title, '-'), 'id' => $tourrecommended->id]) }}">
                                            <div class="recomended-box fill-shadow">
                                                <div class="best-spots-box-img recomended-spots-box-img">
                                                    <div class="recomended-spots-box-img-content">
                                                        <h6>${{ $tourrecommended->price }}+Tax</h6>
                                                        <p>Per Adult</p>
                                                    </div>
                                                    <img src="assets/images/r1.jpg" alt="">
                                                </div>
                                                <div class="best-spots-box-content">
                                                    <h4 class="mb-5">{{ $tourrecommended->title }}</h4>
                                                    <span class="mb-10"><i
                                                            class="fas fa-map-marker-alt"></i>{{ $tourrecommended->locations }}</span>
                                                    <ul class="best-spots-box-list recomended-spots-box-list">
                                                        <li>
                                                            <h5><i class="fas fa-clock"></i> Duration: 2 h 30 mins</h5>
                                                        </li>
                                                        <li>
                                                            <h5><i class="fas fa-users"></i> Age:
                                                                {{ $tourrecommended->age }}</h5>
                                                        </li>
                                                        <li>
                                                            <h5><i class="fas fa-user-friends"></i> Capacity: Max
                                                                {{ $tourrecommended->capacity }}</h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                                {{-- <li>
                                    <a href="tour-detail.php">
                                        <div class="recomended-box fill-shadow">
                                            <div class="best-spots-box-img recomended-spots-box-img">
                                                <div class="recomended-spots-box-img-content">
                                                    <h6>$550+Tax</h6>
                                                    <p>Per adult</p>
                                                </div>
                                                <img src="assets/images/r2.jpg" alt="">
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                                <span class="mb-10"><i class="fas fa-map-marker-alt"></i> New York,
                                                    United States</span>
                                                <ul class="best-spots-box-list recomended-spots-box-list">
                                                    <li>
                                                        <h5><i class="fas fa-clock"></i> Duration: 2 h 30 mins</h5>
                                                    </li>
                                                    <li>
                                                        <h5><i class="fas fa-users"></i> Age: 10-40</h5>
                                                    </li>
                                                    <li>
                                                        <h5><i class="fas fa-user-friends"></i> Capacity: Max 50</h5>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </li> --}}
                            </ul>

                            <div class="best-spots-content mb-20">
                                <h4 class="sub-hd">BEST OFFER</h4>
                            </div>
                            <ul class="best-offer-list">
                                <li>
                                    <a href="tour-detail.php">
                                        <div class="best-spots-box best-offer-box ">
                                            <div class="best-spots-box-img best-offer-box-img">
                                                <div class="best-spots-box-img-content best-offer-box-img-content">
                                                    <h6>- 20%</h6>
                                                </div>
                                                <img src="assets/images/o1.jpg" alt="">
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                                <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York,
                                                    United States</span>
                                                <div class="best-spots-box-btn-and-price">
                                                    <!-- <div class="best-spots-box-btn">
                                                                                                                                                                                                                                     <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                                                                                                                                                                                                  </div> -->
                                                    <div class="best-spots-box-price">
                                                        <h4>$550+Tax <span>Per adult</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tour-detail.php">
                                        <div class="best-spots-box best-offer-box">
                                            <div class="best-spots-box-img best-offer-box-img">
                                                <div class="best-spots-box-img-content best-offer-box-img-content">
                                                    <h6>- 20%</h6>
                                                </div>
                                                <img src="assets/images/o2.jpg" alt="">
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                                <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York,
                                                    United States</span>
                                                <div class="best-spots-box-btn-and-price">
                                                    <!-- <div class="best-spots-box-btn">
                                                                                                                                                                                                                                     <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                                                                                                                                                                                                  </div> -->
                                                    <div class="best-spots-box-price">
                                                        <h4>$550+Tax <span>Per adult</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tour-detail.php">
                                        <div class="best-spots-box best-offer-box">
                                            <div class="best-spots-box-img best-offer-box-img">
                                                <div class="best-spots-box-img-content best-offer-box-img-content">
                                                    <h6>- 20%</h6>
                                                </div>
                                                <img src="assets/images/o3.jpg" alt="">
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                                <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York,
                                                    United States</span>
                                                <div class="best-spots-box-btn-and-price">
                                                    <!-- <div class="best-spots-box-btn">
                                                                                                                                                                                                                                     <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                                                                                                                                                                                                  </div> -->
                                                    <div class="best-spots-box-price">
                                                        <h4>$550+Tax <span>Per adult</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="tour-detail.php">
                                        <div class="best-spots-box best-offer-box">
                                            <div class="best-spots-box-img best-offer-box-img">
                                                <div class="best-spots-box-img-content best-offer-box-img-content">
                                                    <h6>- 20%</h6>
                                                </div>
                                                <img src="assets/images/o4.jpg" alt="">
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">Scuba Diving In NewYork</h4>
                                                <span class="mb-20"><i class="fas fa-map-marker-alt"></i> New York,
                                                    United States</span>
                                                <div class="best-spots-box-btn-and-price">
                                                    <!-- <div class="best-spots-box-btn">
                                                                                                                                                                                                                                     <a class="btn-b" href="tour-detail.php">ONLINE BOOKING</a>
                                                                                                                                                                                                                                  </div> -->
                                                    <div class="best-spots-box-price">
                                                        <h4>$550+Tax <span>Per adult</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
