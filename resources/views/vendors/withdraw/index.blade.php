@extends('layouts.front-app')
@section('title', 'Withdraw Request')
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
                            <h1>Withdraw a Request</h1>
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
                            <h1>Withdraw a Request</h1>
                        </div>
                        <div class="col-lg-4 text-right">
                            <a href="{{ route('vendor.withdraw.add') }}" class="btn-a">Add Withdraw Request</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th>Price</th>
                                        <th>Location</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
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