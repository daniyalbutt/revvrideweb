@extends('layouts.front-app')
@section('title', 'Create Tour')
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
                                <h1>Create Tour</h1>
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
                                <h1>Create Tour</h1>
                                <p>Please fill out the information below</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="{{ route('vendor.tour.index') }}" class="btn-a">Tour List</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <form action="{{ route('vendor.tour.store') }}" class="row" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for="title">Tour Name</label>
                                        <input type="text" class="form-control" id="title" name="title" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="title">Price</label>
                                        <input type="number" step="any" class="form-control" id="price" name="price" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="title">Per Price</label>
                                        <input type="text" step="any" class="form-control" id="price_type" name="price_type" readonly required value="Per Person">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="start_date">Start Date</label>
                                        <input type="datetime-local" id="start_date" name="start_date" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label id="end_date">End Date</label>
                                        <input type="datetime-local" id="end_date" name="end_date" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="locations">Location</label>
                                        <input type="text" class="form-control" name="locations" id="locations" required>
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
                                        <label for="desc">Tour Description</label>
                                        <textarea id="desc" name="desc" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="capacity">Capacity</label>
                                        <input type="number" name="capacity" id="capacity" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="age">Ages</label>
                                        <input type="number" name="age" id="age" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="duration">Duration</label>
                                        <input type="number" name="duration" id="duration" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="whats_include">What's Included</label>
                                        <textarea id="whats_include" name="whats_include" class="form-control" cols="20" rows="5"></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-green-update">Save Tour</button>
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
@endpush
