<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Revride') }}</title>
    <link
        href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"
        integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    @stack('styles')
</head>

<body class="">
    <header class="">

        <div class="fluid-container container logo-bg-relative">
            <!-- <div class="row"> -->
            <div class="logo-bg">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('assets/images/logo-bg.png') }}" alt="">
                </a>
            </div>
            <div class="big-container container">
                <div class="logo">
                    <a href="{{ route('welcome') }}">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <!-- </div> -->
        </div>

        <div class="fluid-container container p-0">
            <div class="top-header">
                <div class="big-container container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 offset-lg-2">
                            <ul class="contact-info">
                                <li><a href="tel:555 626-0234"><i class="fas fa-phone-alt"></i> 555 626-0234</a></li>
                                <li><a href="mailto:support@example.com"><i class="fas fa-envelope"></i>
                                        support@example.com</a></li>
                                <li><a href="#"><i class="fas fa-skiing"></i> Extreme Sports Activity, Experience
                                        The Thrill!</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3">
                            <div class="account-info">
                                @guest
                                    @if (Route::has('login'))
                                    <div>
                                        <a href="{{ route('login') }}"><i class="fas fa-lock"></i> Login</a>
                                    </div>
                                    @endif
                                    @if (Route::has('register'))
                                    <div>
                                        <a href="{{ route('register') }}"><i class="fas fa-user"></i> Signup</a>
                                    </div>
                                    @endif
                                @else
                                    @if ( Auth::user()->user_type == 'user')
                                    <div class="user-profile header-user-profile">
                                        <div class="user-profile-img">
                                            <button class="user-btn"><img src="{{ asset('assets/images/t1.webp') }}"
                                                    alt=""></button>
                                        </div>
                                        <div class="user-profile-content">
                                            <button class="user-btn">{{ Auth::user()->first_name }}
                                                {{ Auth::user()->last_name }} <i
                                                    class="fas fa-angle-down"></i></button>
                                        </div>
                                        <ul class="user-profile-list">
                                            <li><a href="profile.php">Dashboard</a></li>
                                            <li><a href="{{ route('user.profile') }}">Profile</a></li>
                                            <li><a href="chat.php">Messages</a></li>
                                            <li><a href="my-bookings.php">Bookings</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    @else
                                    <div class="user-profile header-user-profile">
                                        <div class="user-profile-img">
                                            <button class="user-btn">
                                                <img src="{{ Auth::user()->display_picture == null ? asset('assets/images/dummy.jpg') : Auth::user()->display_picture }}" alt="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}">
                                            </button>
                                        </div>
                                        <div class="user-profile-content">
                                            <button class="user-btn">{{ Auth::user()->first_name }}
                                                {{ Auth::user()->last_name }} <i class="fas fa-angle-down"></i>
                                            </button>
                                        </div>
                                        <ul class="user-profile-list">
                                            <li><a href="{{ route('vendor.profile') }}">Profile</a></li>
                                            <li><a href="chat.php">Messages</a></li>
                                            <li><a href="my-bookings.php">Bookings</a></li>
                                            <li><a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                            </li>
                                        </ul>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    @endif
                                @endguest

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-header">
            <div class="big-container container">
                <div class="row align-items-center">
                    <div class="menu-Bar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="col-lg-7 offset-lg-2">
                        <div class="menuWrap">
                            <ul class="menu">
                                <li class="active"><a href="{{ route('welcome') }}">Home</a></li>
                                <li><a href="{{ route('abouts') }}">About Us</a></li>
                                <li><a href="{{ route('sports') }}">Sports</a></li>
                                <li><a href="{{ route('tours') }}">Tours</a></li>
                                <li><a href="{{ route('blogs') }}">Blogs</a></li>
                                <li><a href="{{ route('contacts') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <ul class="social-icons header-social-icons">
                            <li><a href="https://www.facebook.com/people/Revv-Ride-INC/61552723623580/"
                                    target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube" target="_blank"></i></a></li>
                            <li><a href="https://twitter.com/RevvRide" target="_blank"><i
                                        class="fab fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <footer>
        <div class="fluid-container container p-0">
            <div class="footer-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="widget">
                                <div class="fot-logo mb-20">
                                    <a href="{{ route('welcome') }}">
                                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                                    </a>
                                </div>
                                <ul class="fot-contact-list mb-20">
                                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> RevRide 00, Old Brozon
                                            Mall, Newyork NY 10005</a></li>
                                    <li><a href="tel:555-626-0234"><i class="fas fa-phone-alt"></i> Call is
                                            555-626-0234</a>
                                    </li>
                                    <li><a href="mailto:support@example.com"><i class="fas fa-envelope"></i>
                                            support@example.com</a></li>
                                </ul>
                                <ul class="social-icons fot-social-icons">
                                    <li><a href="https://www.facebook.com/people/Revv-Ride-INC/61552723623580/"
                                            target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/RevvRide" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="widget">
                                <h4>WHAT WE DO</h4>
                                <hr class="seperator">
                                <ul class="fot-list">
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> UTV</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> ATV</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> BOATS</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> JET SKIS</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> SURF BOARDS</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> SNOWBOARDS/SKIS</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> DIRT BIKES</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> MOTORCYCLES</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> RV</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> KAYAKS/CANOES</a></li>
                                    <li><a href="sports.php"><i class="fas fa-plus"></i> SNOWMOBILES</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="widget">
                                <h4>INSTAGRAM</h4>
                                <hr class="seperator">
                                <ul class="insta-list">
                                    <li><a href="#"><img src="{{ asset('assets/images/i1.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i2.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i3.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i4.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i5.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i6.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i7.jpg') }}"
                                                alt=""></a></li>
                                    <li><a href="#"><img src="{{ asset('assets/images/i8.jpg') }}"
                                                alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-content text-center">
                    <p>Copyright © 2023 RevvRide. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"
        integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        new WOW().init();
    </script>
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
    @stack('script')
</body>

</html>
