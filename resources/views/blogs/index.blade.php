@extends('layouts.front-app')
@section('title', 'Blogs')

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

    <section class="blog-sec p-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <ul class="inner-blog-list">
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b11.jpg') }}" alt="">
                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b12.jpg') }}" alt="">
                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b13.jpg') }}" alt="">
                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <ul class="inner-blog-list">
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b14.jpg') }}" alt="">
                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b15.jpg') }}" alt="">
                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b16.jpg') }}" alt="">
                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <ul class="inner-blog-list">
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b17.jpg') }}" alt="">

                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b18.jpg') }}" alt="">

                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="inner-blog-box">
                                <div class="blog-box-img inner-blog-box-img">
                                    <div class="blog-box-img-content inner-blog-box-img-content">
                                        <h6>29 <br> SEP</h6>
                                    </div>
                                    <img src="{{ asset('assets/images/b19.jpg') }}" alt="">

                                </div>
                                <div class="inner-blog-box-content">
                                    <h5 class="mb-20">TRAVEL IDEAS</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur.</p>
                                    <span><a href="blog-detail.php">CONTINUE READING</a></span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-12">
                    <div class="inner-blog-btn mt-50 text-center"><a href="#" class="btn-b">VIEW MORE <i
                                class="fal fa-arrow-to-right"></i></a></div>
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
