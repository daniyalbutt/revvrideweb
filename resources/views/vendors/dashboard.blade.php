@extends('layouts.front-app')
@section('title', 'profile')
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
                            <h1>Dashboard</h1>
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
                            <h1>DASHBOARD</h1>
                            <p>Hello {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} - {{ Auth::user()->email  }}</p>
                        </div>
                        <div class="col-lg-4 text-right">
                            <div class="total_earn">
                                <span>Total Earned</span>
                                <p>$595.50</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="state-box">
                                <span>Bookings</span>
                                <p>20</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="state-box">
                                <span>Total Time</span>
                                <p>15 hrs 30 min</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="state-box">
                                <span>Upcoming</span>
                                <p>05</p>
                            </div>
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