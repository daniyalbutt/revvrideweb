@extends('layouts.front-app')
@section('title', 'Home')

@section('content')
    <section class="mainBanner">
        <div class="fluid-container container p-0">
            <div class="banner-bg" style="background-image:url({{ asset('assets/images/bg1.jpg') }}); ">
                <div class="big-container container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="banner-content text-center">
                                <h4>Warp Speed, Captain! Ready to Rumble? Because we are</h4>
                                <hr class="seperator">
                                <h1>Most Realiable & Luxury Rental</h1>
                            </div>
                            <div class="search-fields-parent">
                                <div class="search-fields">
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="Location">Location</option>
                                                <option value="US">US</option>
                                                <option value="UK">UK</option>
                                                <option value="CANADA">CANADA</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="Activity">Activity</option>
                                                <option value="Jetski">Jetski</option>
                                                <option value="Dirt Bike">Dirt Bike</option>
                                                <option value="Snowmobile">Snowmobile</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="Price Range">Price Range</option>
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="300">300</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div>
                                            <select class="">
                                                <option value="" data-display-text="Rating">Rating</option>
                                                <option value="3 star">3 star</option>
                                                <option value="4 star">4 star</option>
                                                <option value="5 star">5 star</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="sports.php">SEARCH <i class="fal fa-arrow-to-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="category-sec p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="category-content text-center mb-60">
                        <h4 class="sub-hd">Thrill on Speed Dial</h4>
                        <hr class="seperator">
                        <h2 class="primary-hd">Under the Hood of Hilarity</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <ul class="event-slider">
                        @foreach ($categories as $key => $category)
                        @php
                        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $category->title)));
                        @endphp
                            <li>
                                <a href="{{ route('sport.by.category', ['slug' => $slug, 'id' => $category->id]) }}" data-slug="{{ $slug }}">
                                    <div class="category-box text-center">
                                        @if(array_key_exists($slug, $images))
                                        <img src="{{ asset($images[$slug]) }}" alt="">
                                        @else
                                        @endif
                                        <h5>{{ $category->title }}</h5>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                        {{-- <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c2.png') }}" alt="">
                                    <h5>Jetski</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c3.png') }}" alt="">
                                    <h5>Dirt Bike / Motorcycles</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c4.png') }}" alt="">
                                    <h5>Snowmobile</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c5.png') }}" alt="">
                                    <h5>UTV's</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ 'assets/images/c6.png' }}" alt="">
                                    <h5>Boat's</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ 'assets/images/c7.png' }}" alt="">
                                    <h5>Surf Boards</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c8.png') }}" alt="">
                                    <h5>Snowborads / Skis</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c9.png') }}" alt="">
                                    <h5>RV</h5>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="sports.php">
                                <div class="category-box text-center">
                                    <img src="{{ asset('assets/images/c10.png') }}" alt="">
                                    <h5>Kayaks /Canoes</h5>
                                </div>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="about-sec p-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h4 class="sub-hd mb-20 greenish">About The Company <i class="fas fa-horizontal-rule"></i></h4>
                        <h2 class="primary-hd mb-20">Roar. Thrash. Cruise. Purr. Skim. AND Rev!</h2>
                        <p class="primary-para">At Revv Ride, we are all about embracing the extraordinary and igniting the
                            flames of adventure. We have built a one-of-a-kind platform dedicated to extreme power sports
                            and adventure rentals, including UTVs, boats, jet skis, snowmobiles, and more. Whether you're a
                            thrill-seeker, an adrenaline junkie, or simply seeking a taste of the extreme, we've got you
                            covered.</p>
                        <hr>
                        <p class="primary-para mb-20">We are experts in helping you discover your inner daredevil. We are
                            not just your average rental platform - we are your accomplice in the pursuit of the
                            extraordinary.
                            <br><br>
                            Ever dreamed of shredding through the snow on a snowmobile, skimming the waves on a jet ski, or
                            conquering the trails on an ATV? We've got the keys to your exhilarating escape right here. It's
                            not just a rental; it's an invitation to a life less ordinary.
                            <br><br>
                            But wait, there's more! We're not only in the business of making your heart race; we're here to
                            set the wheels of entrepreneurship spinning for small business owners in the adventure and power
                            sports industry. We've created a platform that's more like a trampoline for your dreams – bounce
                            higher, leap farther, and dive into your wildest ideas.
                        </p>
                        <div class="about-list mb-30">
                            {{-- <div>
                                <h1>0%</h1>
                                <h6>Death Rate </h6>
                            </div> --}}
                            <div>
                                <p>You will survive to tell the tale, guaranteed, or your ghost rides free.</p>
                            </div>
                        </div>
                        <div class="about-btns">
                            <div class="about-btn">
                                <a href="about.php" class="btn-a">LEARN MORE <i class="fal fa-arrow-to-right"></i></a>
                            </div>
                            <div>
                                <a href="#"><img src="{{ asset('assets/images/play.png') }}" alt=""> Watch
                                    Our <br> Two
                                    Minute Intro</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="about-img">
                        <img src="{{ asset('assets/images/about.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="popular-activity p-50">
        <div class="fluid-container container p-0">
            <div class="popular-activity-bg" style="background-image:url({{ asset('assets/images/bg2.jpg') }}); ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="popular-activity-content text-center mb-50">
                                <h4 class="sub-hd">Revved Up Ridiculousness</h4>
                                <hr class="seperator">
                                <h2 class="primary-hd">Madcap Marvels of Mayhem</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">

                    @foreach ($rentals as $rental)
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="popular-activity-box">
                                <div class="popular-activity-box-img">
                                    <img src="{{ asset('assets/images/p1.png') }}" alt="">
                                </div>
                                <div class="popular-activity-box-content">
                                    <div class="popular-activity-box-content-icon"><img
                                            src="{{ asset('assets/images/i2.png') }}" alt="">
                                    </div>
                                    <h6>{{ $rental->Category->title }}</h6>
                                    <hr class="seperator">
                                    <h3>{{ $rental->title }}</h3>
                                    <p>${{ $rental->price }} per Hour</p>
                                    <a href="{{ route('sports') }}"><i class="fal fa-arrow-to-right"></i> MORE ABOUT
                                        SKIING</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="col-lg-3 col-md-6 col-12">
                        <div class="popular-activity-box popular-activity-box-mobile">
                            <div class="popular-activity-box-img">
                                <img src="assets/images/p2.png" alt="">
                            </div>
                            <div class="popular-activity-box-content">
                                <div class="popular-activity-box-content-icon"><img
                                        src="{{ asset('assets/images/i2.png') }}" alt=""></div>
                                <h6>SKIING</h6>
                                <hr class="seperator">
                                <h3>Yamaha Dirt Bike</h3>
                                <p>$30 per hour</p>
                                <a href="sports-detail.php"><i class="fal fa-arrow-to-right"></i> MORE ABOUT SKIING</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="popular-activity-box popular-activity-box-tablet">
                            <div class="popular-activity-box-img">
                                <img src="assets/images/p3.png" alt="">
                            </div>
                            <div class="popular-activity-box-content">
                                <div class="popular-activity-box-content-icon"><img
                                        src="{{ asset('assets/images/i3.png') }}" alt=""></div>
                                <h6>SKIING</h6>
                                <hr class="seperator">
                                <h3>Yamaha Snowmobile</h3>
                                <p>$30 per hour</p>
                                <a href="sports-detail.php"><i class="fal fa-arrow-to-right"></i> MORE ABOUT SKIING</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="popular-activity-box popular-activity-box-tablet">
                            <div class="popular-activity-box-img">
                                <img src="{{ asset('assets/images/p4.png') }}" alt="">
                            </div>
                            <div class="popular-activity-box-content">
                                <div class="popular-activity-box-content-icon"><img
                                        src="{{ asset('assets/images/i4.png') }}" alt=""></div>
                                <h6>SKIING</h6>
                                <hr class="seperator">
                                <h3>Yamaha UTV's</h3>
                                <p>$30 per hour</p>
                                <a href="sports-detail.php"><i class="fal fa-arrow-to-right"></i> MORE ABOUT SKIING</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-12">
                        <div class="popular-activity-btn text-center mt-50"><a href="{{ route('sports') }}"
                                class="btn-b">VIEW MORE
                                <i class="fal fa-arrow-to-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="process-sec p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="process-content text-center mb-50">
                        <h4 class="sub-hd">Your Adventure, Your Way</h4>
                        <hr class="seperator">
                        <h2 class="primary-hd">Ride With Revv</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="fluid-container container p-0">
            <div class="process-bg" style="background-image:url({{ asset('assets/images/bg3.png') }}); ">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="process-box text-center">
                                <img src="assets/images/1.png" alt="">
                                <h4>Explore Our Fleet</h4>
                                <p class="primary-para">Discover the perfect power sports vehicle for your adventure.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="process-box text-center">
                                <img src="{{ asset('assets/images/2.png') }}" alt="">
                                <h4>Choose Time & Date</h4>
                                <p class="primary-para">Select a flexible rental period that suits your schedule.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="process-box text-center">
                                <img src="{{ asset('assets/images/3.png') }}" alt="">
                                <h4>Confirm & Pay</h4>
                                <p class="primary-para">Secure your reservation and review any extras or requirements.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="process-box text-center">
                                <img src="{{ asset('assets/images/4.png') }}" alt="">
                                <h4>Pick up & Ride</h4>
                                <p class="primary-para">Visit our rental center, get prepped, and embark on your thrilling
                                    journey.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="best-spots-sec pt-5">
        <div class="fluid-container container p-0">
            <div class="best-spots-bg p-50">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="best-spots-content text-center mb-50">
                                <h4 class="sub-hd">Sports Nirvana </h4>
                                <hr class="seperator">
                                <h2 class="primary-hd">Sports and Wacky Tour Collide</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="product-slid">

                                @foreach ($tours as $tour)
                                    <li>
                                        <div class="best-spots-box">
                                            <div class="best-spots-box-img">
                                                <div class="best-spots-box-img-content">
                                                    <h6>{{ Carbon\Carbon::parse($tour->start_date)->format('d M') . ' - ' . Carbon\Carbon::parse($tour->end_date)->format('d M') }}
                                                    </h6>
                                                </div>
                                                <img src="{{ asset('assets/images/spot.jpg') }}" alt="">
                                            </div>
                                            <div class="best-spots-box-content">
                                                <h4 class="mb-5">{{ $tour->title }}</h4>
                                                <span class="mb-20"><i
                                                        class="fas fa-map-marker-alt"></i>{{ $tour->locations }}</span>
                                                <h4 class="mb-5">4.8 <span>[256 REVIEWS]</span></h4>
                                                <div class="mb-20"><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                                <ul class="best-spots-box-list mb-20">
                                                    <li>
                                                        <h5><i class="fas fa-clock"></i>
                                                            Duration:{{ $duration ? $duration->format('%h h %i mins') : 'N/A' }}
                                                        </h5>
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
                                                            href="{{ route('tourinner', ['slug' => \Str::slug($tour->title, '-'), 'id' => $tour->id]) }}"
                                                            target="_blank">ONLINE BOOKING</a>
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
                                    <div class="best-spots-box">
                                        <div class="best-spots-box-img">
                                            <div class="best-spots-box-img-content">
                                                <h6>01 Aug - 10 Aug</h6>
                                            </div>
                                            <img src="{{ asset('assets/images/spot.jpg') }}" alt="">
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
                                    <div class="best-spots-box">
                                        <div class="best-spots-box-img">
                                            <div class="best-spots-box-img-content">
                                                <h6>01 Aug - 10 Aug</h6>
                                            </div>
                                            <img src="{{ asset('assets/images/spot.jpg') }}" alt="">
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
                        <div class="col-lg-12">
                            <div class="best-spots-btn mt-50 text-center"><a href="{{ route('tours') }}" target="_blank"
                                    class="btn-b">VIEW MORE <i class="fal fa-arrow-to-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="experience-sec">
        <div class="fluid-container container p-0">
            <!-- <div class="experience-sec-relative"> -->
            <div class="experience-img experience-img-extraclass">
                <img src="{{ asset('assets/images/e1.jpg') }}" alt="">
            </div>
            <!-- </div> -->
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 pl-0">
                    <div class="experience-content experience-content-left">
                        <div class="experience-content-img"><img src="{{ asset('assets/images/e3.png') }}"
                                alt=""></div>
                        <h4 class="sub-hd mb-10 greenish">RENTALS <i class="fas fa-horizontal-rule"></i></h4>
                        <h2 class="primary-hd mb-10">Slopes to Seas</h2>
                        <p class="primary-para mb-20">Whether you are a snow enthusiast or a sun chaser, we have the
                            perfect toys for your thrill-seeking spirit. Glide gracefully through the powdery slopes with
                            our top-notch ski and snowboarding equipment. For those who prefer warm sands and cool waves,
                            our jet skis are ready to zip across the water. But that’s not all; we also offer surfboards for
                            wave riders and kayaks for those who love a serene journey through calmer water.
                            <br><br>
                            Whatever your flavor of adventure, we have got the gear for you.
                        </p>
                        <div class="experience-content-btn"><a href="{{ route('tours') }}" class="btn-b">EXPLORE NOW <i
                                    class="fal fa-arrow-to-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fluid-container container p-0">
            <div class="experience-sec-relative">
                <div class="experience-img experience-img-right">
                    <img src="{{ asset('assets/images/e2.jpg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 pr-0">
                    <div class="experience-content experience-content-right">
                        <div class="experience-content-img experience-content-img-right"><img
                                src="{{ asset('assets/images/e4.png') }}" alt=""></div>
                        <h4 class="sub-hd mb-10 greenish">RENTALS <i class="fas fa-horizontal-rule"></i></h4>
                        <h2 class="primary-hd mb-10">Ready, Set, Rev</h2>
                        <p class="primary-para mb-20">For the off-road explorers and trailblazers, our UTVs and ATVs are
                            your tickets to rugged terrain thrills. If you crave dirt-kicking excitement, our dirt bikes are
                            geared to make every ride a heart-pounding escapade. And for those who can't get enough of
                            four-wheel fun, we offer a selection of 4-wheelers that promise high-octane action. Plus, we're
                            all about motorsports, catering to speed demons with a penchant for the track.</p>
                        <div class="experience-content-btn"><a href="{{ route('sports') }}" class="btn-b">EXPLORE NOW
                                <i class="fal fa-arrow-to-right"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonila-sec">
        <div class="fluid-container container p-0">
            <div class="testimonial-bg p-50" style="background-image:url({{ asset('assets/images/bg4.jpg') }}); ">
                <div class="big-container container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="testimonila-content text-center mb-50">
                                <h4 class="sub-hd white">TESTIMONIALS</h4>
                                <hr class="seperator bg-white">
                                <h2 class="primary-hd white">WORDS FROM CLIENTS</h2>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <ul class="client-slider">
                                <li>
                                    <div class="testimonial-box">
                                        <div class="testimonial-rating"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <div class="testimonial-box-list">
                                            <div class="testimonial-box-img text-center">
                                                <img class="mb-10 img1" src="{{ asset('assets/images/t1.jpg') }}"
                                                    alt="">
                                                <img class="mb-10" src="{{ asset('assets/images/t2.png') }}"
                                                    alt="">
                                                <!-- <h2 class="primary-hd">"</h2> -->
                                            </div>
                                            <div class="testimonial-box-content">
                                                <h4 class="mb-5">- Alex M.</h4>
                                                <h5>CRUISING TO THE CYCLADES</h5>
                                                <hr class="seperator">
                                                <p class="primary-para">"Wow, Revv Ride totally rocked my weekend! The ATV
                                                    experience was insane, and the staff was super cool. Can't wait to try
                                                    their dirt bikes next!"</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-box">
                                        <div class="testimonial-rating"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <div class="testimonial-box-list">
                                            <div class="testimonial-box-img text-center">
                                                <img class="mb-10 img1" src="{{ asset('assets/images/t1.jpg') }}"
                                                    alt="">
                                                <img class="mb-10" src="{{ asset('assets/images/t2.png') }}"
                                                    alt="">
                                                <!-- <h2 class="primary-hd">"</h2> -->
                                            </div>
                                            <div class="testimonial-box-content">
                                                <h4 class="mb-5">Sarah L.</h4>
                                                <h5>CRUISING TO THE CYCLADES</h5>
                                                <hr class="seperator">
                                                <p class="primary-para">"Jet skiing with Revv Ride was a blast! Their
                                                    equipment is top-notch, and I felt like a kid again. Unforgettable
                                                    memories - thanks, Revv Ride!"</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-box">
                                        <div class="testimonial-rating"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <div class="testimonial-box-list">
                                            <div class="testimonial-box-img text-center">
                                                <img class="mb-10 img1" src="{{ asset('assets/images/t1.jpg') }}"
                                                    alt="">
                                                <img class="mb-10" src="{{ asset('assets/images/t2.png') }}"
                                                    alt="">
                                                <!-- <h2 class="primary-hd">"</h2> -->
                                            </div>
                                            <div class="testimonial-box-content">
                                                <h4 class="mb-5">The Martinez Family</h4>
                                                <h5>CRUISING TO THE CYCLADES</h5>
                                                <hr class="seperator">
                                                <p class="primary-para">"Revv Ride's UTV tour was the highlight of our
                                                    family vacation. We laughed, we screamed, and we explored like pros.
                                                    Definitely coming back for more!"</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testimonial-box">
                                        <div class="testimonial-rating"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <div class="testimonial-box-list">
                                            <div class="testimonial-box-img text-center">
                                                <img class="mb-10 img1" src="{{ asset('assets/images/t1.jpg') }}"
                                                    alt="">
                                                <img class="mb-10" src="{{ asset('assets/images/t2.png') }}"
                                                    alt="">
                                                <!-- <h2 class="primary-hd">"</h2> -->
                                            </div>
                                            <div class="testimonial-box-content">
                                                <h4 class="mb-5">Mark H.</h4>
                                                <h5>CRUISING TO THE CYCLADES</h5>
                                                <hr class="seperator">
                                                <p class="primary-para">"I'm a kayaking enthusiast, and Revv Ride's kayak
                                                    rentals made my weekend epic. Easy booking, great equipment, and the
                                                    perfect spot for an adventure!"</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="news-feed-sec p-50">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="testimonila-content text-center mb-50">
                        <h4 class="sub-hd">Ride On</h4>
                        <hr class="seperator">
                        <h2 class="primary-hd">Discover What’s New</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <ul class="blog-list">
                        <li>
                            <div class="blog-box">
                                <div class="blog-box-img">
                                    <div class="blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b1.jpg') }}" alt="">
                                </div>
                                <div class="blog-box-content">
                                    <h5 class="mb-20"><i class="fas fa-user"></i> BY WILLIAMSON</h5>
                                    <h4 class="mb-20">Plan Your Vacation With Sailing</h4>
                                    <h5 class="mb-20">When our power of choice is untrammelled and when nothing prevents
                                        our being able to do what we like best, every pleasure.</h5>
                                    <a href="#"><i class="fal fa-arrow-to-right"></i> CONTINUE READING</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="blog-box">
                                <div class="blog-box-img">
                                    <div class="blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b2.jpg') }}" alt="">
                                </div>
                                <div class="blog-box-content">
                                    <h5 class="mb-20"><i class="fas fa-user"></i> BY WILLIAMSON</h5>
                                    <h4 class="mb-20">Plan Your Vacation With Sailing</h4>
                                    <h5 class="mb-20">When our power of choice is untrammelled and when nothing prevents
                                        our being able to do what we like best, every pleasure.</h5>
                                    <a href="#"><i class="fal fa-arrow-to-right"></i> CONTINUE READING</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="blog-form-box">
                        <h2 class="primary-hd white mb-20">SUBSCRIBE US</h2>
                        <h4 class="sub-hd white mb-30">SUBSCRIBE US AND GET LATEST UPDATES</h4>

                        <form action="{{ route('subscribe.form') }}" method="POST" class="subscribe-form">
                            @csrf
                            <input type="text" name="name" placeholder="Your Name">
                            <input type="email" name="email" placeholder="Email Address">
                            <div class="subscribe-form-btn">
                                {{-- <input type="submit" value="SUBMIT"> --}}
                                <button class="subscribe-btn" type="submit">Submit</button>
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
