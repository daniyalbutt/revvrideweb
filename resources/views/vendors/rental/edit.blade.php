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
                                <h1>Edit Rental</h1>
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
                                <h1>Edit Rental # {{ $data->id }}</h1>
                                <p>Please fill out the information below</p>
                            </div>
                            <div class="col-lg-4 text-right">
                                <a href="{{ route('vendor.rental.index') }}" class="btn-a">Rental List</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-3">
                                <form action="{{ route('vendor.rental.update', $data->id) }}" class="row" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PATCH') }}
                                    <div class="form-group col-md-4">
                                        <label for="title">Product Name</label>
                                        <input type="text" class="form-control" id="title" name="title" required value="{{ $data->title }}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="title">Category</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="">Select Category</option>
                                        @foreach($cat as $key => $value)
                                            <option value="{{ $value->category->id }}" {{ $data->category_id == $value->category->id ? 'selected' : ' ' }}>{{ $value->category->title }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="title">Price</label>
                                        <input type="number" step="any" class="form-control" id="price" name="price" required value="{{ $data->price }}">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="title">Per Hour</label>
                                        <input type="number" step="any" class="form-control" id="price_type" name="price_type" readonly required value="1">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label id="locations">Location</label>
                                        <input type="text" class="form-control" name="locations" id="locations" required value="{{ $data->locations }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Image</label>
                                        <div class="upload__box">
                                            <div class="upload__btn-box">
                                                <label class="upload__btn">
                                                    <p>Upload images</p>
                                                    <input type="file" name="image[]" multiple="" data-max_length="20" class="upload__inputfile">
                                                </label>
                                            </div>
                                            <div class="upload__img-wrap">
                                                @foreach($data->Images as $key => $value)
                                                <div class='upload__img-box'>
                                                    <div style='background-image: url("{{ $value->image }}")' class='img-bg'>
                                                        <div class='upload__img-close-old' onclick="deleteImage({{ $value->id }}, this)"></div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="desc">Product Description</label>
                                        <textarea id="desc" name="desc" class="form-control" cols="30" rows="10">{{ $data->desc }}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="capacity">Capacity</label>
                                        <input type="number" name="capacity" id="capacity" class="form-control" value="{{ $data->capacity }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="skills">Skill Level</label>
                                        <select class="form-control" name="skills" id="skills">
                                            <option value="beginner" {{ $data->skills == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="intermediate" {{ $data->skills == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                            <option value="advanced" {{ $data->skills == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                            <option value="pro" {{ $data->skills == 'pro' ? 'selected' : '' }}>Pro</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h2>Cancelation Management</h2>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cancel_days">Days</label>
                                        <input type="number" class="form-control" name="cancel_days" id="cancel_days" value="{{ $data->cancel_days }}">

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cancel_percent">Percent</label>
                                        <select name="cancel_percent" id="cancel_percent" class="form-control">
                                            <option value="100%" {{ $data->cancel_percent == '100%' ? 'selected' : '' }}>100%</option>
                                            <option value="75%" {{ $data->cancel_percent == '75%' ? 'selected' : '' }}>75%</option>
                                            <option value="50%" {{ $data->cancel_percent == '50%' ? 'selected' : '' }}>50%</option>
                                            <option value="25%" {{ $data->cancel_percent == '25%' ? 'selected' : '' }}>25%</option>
                                            <option value="0%" {{ $data->cancel_percent == '0%' ? 'selected' : '' }}>0%</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <h2>Add-ons</h2>
                                    </div>
                                    <div class="form-group col-md-12 repeater-wrapper">
                                        @foreach($data->addons as $key => $addons)
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Addon</label>
                                                    <input type="text" class="form-control" name="old_addon_name" value="{{ $addons->name }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Price</label>
                                                    <input type="number" class="form-control" step="any" name="old_addon_price" value="{{ $addons->price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-remove" type="button" onclick="removeAddons({{ $addons->id }}, this)">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        <h2>Availability</h2>
                                    </div>
                                    <div class="form-group col-md-12 repeater-wrapper">
                                        @foreach($data->availability as $key => $availability)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Day</label>
                                                    <select name="old_day" id="old_day" class="form-control">
                                                        <option value="">Select Day</option>
                                                        <option value="Mon" {{ $availability->day == 'Mon' ? 'selected' : '' }}>Monday</option>
                                                        <option value="Tue" {{ $availability->day == 'Tue' ? 'selected' : '' }}>Tuesday</option>
                                                        <option value="Wed" {{ $availability->day == 'Wed' ? 'selected' : '' }}>Wednesday</option>
                                                        <option value="Thu" {{ $availability->day == 'Thu' ? 'selected' : '' }}>Thursday</option>
                                                        <option value="Fri" {{ $availability->day == 'Fri' ? 'selected' : '' }}>Friday</option>
                                                        <option value="Sat" {{ $availability->day == 'Sat' ? 'selected' : '' }}>Saturday</option>
                                                        <option value="Sun" {{ $availability->day == 'Sun' ? 'selected' : '' }}>Sunday</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="from">From</label>
                                                    <select name="from" id="from" class="form-control" data-name="[from]">
                                                        @for($i = 0; $i < 24; $i++)
                                                        @php
                                                        $time = ($i < 10 ? '0' : '').$i.':00:00';
                                                        @endphp
                                                        <option value="{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00" {{ $time }} {{ ($availability->from == $time ) ? 'selected' : '' }}>{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="to">To</label>
                                                    <select name="to" id="to" class="form-control" data-name="[to]">
                                                        @for($i = 0; $i < 24; $i++)
                                                        @php
                                                        $time = ($i < 10 ? '0' : '').$i.':00:00';
                                                        @endphp
                                                        <option value="{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00" {{ $time }} {{ ($availability->to == $time ) ? 'selected' : '' }}>{{ $i < 10 ? '0' : '' }}{{ $i }}:00:00</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button id="remove-btn" class="btn btn-danger btn-remove" onclick="$(this).parents('.items').remove()">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
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
                                        <button class="btn btn-green-update">Update Rental</button>
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

        function deleteImage(id, a){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var elem = a;
            $.ajax({
                type:'POST',
                url: "{{ route('vendor.rental.delete.images') }}",
                data: {"id" : id, "table": 0},
                dataType : 'json',
                success:function(data){
                    console.log(data);
                    console.log($(elem));
                    if(data.status == true){
                        $(elem).parent().parent().remove();
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        }

        function removeAddons(id, a){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var elem = a;
            $.ajax({
                type:'POST',
                url: "{{ route('vendor.rental.delete.images') }}",
                data: {"id" : id, "table": 1},
                dataType : 'json',
                success:function(data){
                    console.log(data);
                    console.log($(elem));
                    if(data.status == true){
                        $(elem).parent().parent().remove();
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        }
        
    </script>
@endpush
