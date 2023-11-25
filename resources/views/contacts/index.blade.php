@extends('layouts.front-app')
@section('title', 'Contact US')

@section('content')
    <section class="mainBanner">
        <div class="fluid-container container p-0">
            <div class="banner-bg inner-banner-bg" style="background-image:url({{ asset('assets/images/bg5.jpg') }}); ">
                <div class="container inner-relative">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="banner-content text-center">
                                <h4>Your Dream SPORTS</h4>
                                <hr class="seperator">
                                <h1>@yield('title')</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-sec p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12 contact-margin">
                    <div class="contact-box">
                        <img src="{{ asset('assets/images/v1.png') }}" alt="">
                        <h5>ADDRESS</h5>
                        <p>Visiting us? </p>
                        <span></span>
                        <p>00, Old Brozon Mall, Newyork NY 10005</p>
                        <span></span>
                        <a href="#">TOUR FIND ON MAP</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 contact-margin">
                    <div class="contact-box">
                        <img src="assets/images/v2.png" alt="">
                        <h5>PHONE</h5>
                        <p>call us</p>
                        <span></span>
                        <a href="#"><span>call Us On : 555-626-0234</span></a>
                        <a href="#"><span>555-626-0234</span></a>
                        <span></span>
                        <a href="#">GET CALL BACK</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 contact-margin">
                    <div class="contact-box">
                        <img src="assets/images/v3.png" alt="">
                        <h5>EMAIL</h5>
                        <p>Introvert? Don’t worry; we have some here too.</p>
                        <span></span>
                        <a href="#"><span>support@example.com</span></a>
                        <a href="#"><span>support@example.com</span></a>
                        <span></span>
                        <a href="#">LIVE CHAT</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 contact-margin">
                    <div class="contact-box">
                        <img src="assets/images/v4.png" alt="">
                        <h5>OP. HRS</h5>
                        <p>Oh, hi! You came!</p>
                        <span></span>
                        <h6>Mon - Sat: 9.00am to 6.00pm</h6>
                        <h6>Sun: Closed</h6>
                        <span></span>
                        <a href="#">APPOINTMENT</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form-box">
                        <div class="contact-content mb-30">
                            <h2 class="primary-hd mb-10">SEND YOUR MESSAGE</h2>
                            <h4 class="sub-hd mb-10">DON’T HESITATE TO CONTACT US</h4>
                        </div>

                        <form class="contact form" action="{{ route('contacts.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id">
                            <div class="contact-form-fields">
                                <div class="contact-form-field">
                                    <label for="name">NAME</label>
                                    <input id="name" name="name" type="text" placeholder="Your Name">
                                </div>
                                <div class="contact-form-field">
                                    <label for="email">EMAIL</label>
                                    <input id="email" name="email" type="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="contact-form-field">
                                <label for="subject">SUBJECT</label>
                                <input id="subject" name="subject" type="text" placeholder="Subject">
                                {{-- <div>
                                    <select id="subject" class="">
                                        <option value="" data-display-text="Do You Want To Discuss About">Do You Want
                                            To Discuss About</option>
                                        <option value="US">US</option>
                                        <option value="UK">UK</option>
                                        <option value="CANADA">CANADA</option>
                                    </select>
                                </div> --}}
                            </div>
                            <div class="contact-form-field">
                                <label for="message">MESSAGE</label>
                                <textarea name="message" id="message" placeholder="Write Your Message..." cols="30" rows="10"></textarea>
                            </div>
                            <div class="contact-form-btn">
                                {{-- <input type="submit" value="Send Your Message"> --}}
                                <button type="submit">Send Your Message</button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-map contact-form-box">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13026905.33693958!2d-106.25020304840405!3d37.14326312966006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2s!4v1696971946611!5m2!1sen!2s"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter-sec p-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newsletter" style="background-image:url(assets/images/bg6.jpg); ">
                        <div class="newsletter-content text-center mb-40">
                            <h3 class="third-hd white mb-10">SUBSCRIBE TO OUR NEWSLETTER</h3>
                            <h4 class="sub-hd white">SUBSCRIBE & GET UPDATES IN YOUR INBOX</h4>
                        </div>
                        <form action="{{ route('subscribe.form') }}" method="POST" class="newsletter-form subscribe-form">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @csrf
                            <div class="newsletter-form-fields">
                                <div class="form-field">
                                    <input type="text" name="name" placeholder="Your Name">
                                </div>
                                <div class="form-field">
                                    <input type="email" name="email" placeholder="Email Address">
                                </div>
                                <div class="form-btn form-field">
                                    {{-- <input type="submit" value="SUBSCRIBE NOW"> --}}
                                    <button type="submit">SUBSCRIBE NOW</button>
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
