@extends('layouts.front-app')
@section('title', 'Rental List')
@push('styles')

@endpush
@section('content')
<section class="mainBanner">
    <div class="fluid-container container p-0">
        <div class="banner-bg inner-banner-bg" style="background-image:url({{ asset('assets/images/bg5.webp')}}); ">
            <div class="container inner-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="banner-content text-center">
                            <hr class="seperator">
                            <h1>Rental List</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dashboard-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('vendors.sidebar')
            </div>
            <div class="col-md-9">
                <div class="dashboard-content-wrapper">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>RENTAL LIST</h1>
                        </div>
                        <div class="col-lg-4 text-right">
                            <a href="{{ route('vendor.rental.create') }}" class="btn-a">Add Rental</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $value)
                                    <tr>
                                        <td>
                                            <div class="image-pro">
                                                {!!  ( count($value->Images) != 0 ? '<img src="'.$value->Images[0]->image.'">' : '<img src="'.asset("assets/images/dummy-thumbnail.jpg").'">') !!} <p>{{ $value->title }}</p>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-info">{{ $value->category->title }}</span></td>
                                        <td>${{ $value->price }}</td>
                                        <td>{{ $value->locations }}</td>
                                        <td>
                                            <a href="{{ route('vendor.rental.edit', $value->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <a href=""><i class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('script')
@endpush