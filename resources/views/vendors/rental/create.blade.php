@extends('layouts.front-app')
@section('title', 'Create Rental')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropdown.form-control {
            display: none;
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
                                <h1>Create Rental</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dashboard-wrapper">
        <div class="container">
            <div class="row dashboard-form">
                <div class="col-md-3">
                    @include('vendors.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="dashboard-content-wrapper">
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                {!! \Session::get('success') !!}
                            </div>
                        @endif
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <h1>Create Rental</h1>
                                <p>Please fill out the information below</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="{{ route('vendor.rental.index') }}" class="btn-a">Rental List</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <form action="{{ route('vendor.rental.store') }}" class="row" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-4">
                                        <label for="title">Product Name</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="title">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                        @foreach($cat as $key => $value)
                                            <option value="{{ $value->category->id }}">{{ $value->category->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="title">Price</label>
                                        <input type="number" step="any" class="form-control" id="price" name="price" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="title">Per Hour</label>
                                        <input type="number" step="any" class="form-control" id="price_type" name="price_type" readonly required value="1">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="locations">Location</label>
                                        <input type="text" class="form-control" name="locations" id="locations" autocomplete="on" runat="server" required>
                                        <input type="hidden" id="locations_lat" name="locations_lat" />
                                        <input type="hidden" id="locations_lng" name="locations_lng" />
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Image</label>
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Upload images</p>
                                                    <input type="file" name="image[]" multiple="" data-max_length="20" class="upload__inputfile" required>
                                                </label>
                                            </div>
                                            <div class="upload__img-wrap"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="desc">Product Description</label>
                                        <textarea id="desc" name="desc" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="capacity">Capacity</label>
                                        <input type="number" name="capacity" id="capacity" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="skills">Skill Level</label>
                                        <select class="form-control" name="skills" id="skills">
                                            <option value="beginner">Beginner</option>
                                            <option value="intermediate">Intermediate</option>
                                            <option value="advanced">Advanced</option>
                                            <option value="pro">Pro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h2>Cancelation Management</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cancel_days">Days</label>
                                        <input type="number" class="form-control" name="cancel_days" id="cancel_days">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cancel_percent">Percent</label>
                                        <select name="cancel_percent" id="cancel_percent" class="form-control">
                                            <option value="100%">100%</option>
                                            <option value="75%">75%</option>
                                            <option value="50%">50%</option>
                                            <option value="25%">25%</option>
                                            <option value="0%">0%</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h2>Add-ons</h2>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div id="repeater">
                                            <div class="repeater-heading">
                                                <button class="btn btn-primary repeater-add-btn" type="button">Add Add-ons</button>
                                            </div>
                                            <div class="items" data-group="addon">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Addon</label>
                                                            <input type="text" class="form-control" data-name="[name]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Price</label>
                                                            <input type="number" class="form-control" step="any" data-name="[price]">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button id="remove-btn" class="btn btn-danger btn-remove" onclick="$(this).parents('.items').remove()">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h2 class="mt-0">Availability</h2>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div id="repeater-availability">
                                            <div class="repeater-heading">
                                                <button class="btn btn-primary repeater-add-btn" type="button">Add Availability</button>
                                            </div>
                                            <div class="items" data-group="availability">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="">Day</label>
                                                            <select name="day" id="day" class="form-control" data-name="[day]">
                                                                <option value="">Select Day</option>
                                                                <option value="Mon">Monday</option>
                                                                <option value="Tue">Tuesday</option>
                                                                <option value="Wed">Wednesday</option>
                                                                <option value="Thu">Thursday</option>
                                                                <option value="Fri">Friday</option>
                                                                <option value="Sat">Saturday</option>
                                                                <option value="Sun">Sunday</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="from">From</label>
                                                            <select name="from" id="from" class="form-control" data-name="[from]">
                                                                @for($i = 0; $i < 24; $i++)
                                                                <option value="{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00">{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="to">To</label>
                                                            <select name="to" id="to" class="form-control" data-name="[to]">
                                                                @for($i = 0; $i < 24; $i++)
                                                                <option value="{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00">{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button id="remove-btn" class="btn btn-danger btn-remove" onclick="$(this).parents('.items').remove()">Remove</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-green-update">Save Rental</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
@push('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            ImgUpload();
        });
        $(document).ready(function() {

            $('.dropify').dropify();
            $("#repeater").createRepeater();
            $("#repeater-availability").createRepeater();
        })
    </script>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABwtgNHhRqnfw_sXX1-x-f0LQNm4lxk6s&libraries=places"></script>
    <script>
        function initialize() {
        var input = document.getElementById('locations');
        var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                document.getElementById('locations_lat').value = place.geometry.location.lat();
                document.getElementById('locations_lng').value = place.geometry.location.lng();
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endpush
