@extends('layouts.front-app')
@section('title', 'My Booking')
@push('styles')
<style>
    .dropdown.form-control {
        display: none;
    }
</style>
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
                            <h1>My Booking</h1>
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
                @include('user.sidebar')
            </div>
            <div class="col-md-9">
                <div class="dashboard-content-wrapper">
                    <div class="row">
                        <div class="col-lg-8">
                            <h1>MY BOOKING</h1>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>ID Number</th>
                                    <th>Insurance</th>
                                    <th>Cost</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->get_booking as $key => $booking)
                                <tr>
                                    <td></td>
                                    <td>{{ date('d M, Y h:i a', strtotime($booking->datetime)) }}</td>
                                    <td>{{ $booking->booking_code }}</td>
                                    <td>{{ $booking->duration }} Hours</td>
                                    <td>${{ $booking->insurance_amount }}</td>
                                    <td>${{ $booking->total }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
@endpush