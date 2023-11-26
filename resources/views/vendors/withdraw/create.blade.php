@extends('layouts.front-app')
@section('title', 'Create Withdraw')
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
                                <h1>Create Withdraw</h1>
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
                                <h1>Create Withdraw</h1>
                                <p>Please fill out the information below</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="{{ route('vendor.withdraw') }}" class="btn-a">Withdraw List</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <form action="{{ route('vendor.withdraw.store') }}" class="row" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-12">
                                        <label for="amount">Amount (${{ $totalAmount }})</label>
                                        <input type="number" class="form-control" id="amount" name="amount" required steps="any">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="description">Account Details</label>
                                        <textarea id="description" name="description" class="form-control" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <button class="btn btn-green-update">Request for a Withdraw</button>
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
