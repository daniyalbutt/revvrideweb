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
                            <thead class="thead-dark">
                                <tr>
                                    <th>Name</th>
                                    <th>Time</th>
                                    <th>ID Number</th>
                                    <th>Cost</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(Auth::user()->get_booking as $key => $booking)
                                @php
                                $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $booking->getBookType->title)));
                                @endphp
                                <tr>
                                    <td>
                                        @if($booking->getBookType != null)
                                        <div class="content-wrapper">
                                            <img src="{{ $booking->getBookType->Images[0]->image }}" alt="" width="120px">
                                            <div class="content-wrapper-head">
                                                <h4><a href="{{ $booking->bookable_type == 'App\Models\Rentals' ? route('sportinner', ['slug' => $slug, 'id' => $booking->getBookType->id]) : route('tourinner', ['slug' => $slug, 'id' => $booking->getBookType->id]) }}" target="_blank">{{ $booking->getBookType->title }}</a></h4>
                                                <span><i class="fa-solid fa-location-dot"></i> {{ $booking->getBookType->locations }}</span>
                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($booking->bookable_type == 'App\Models\Rentals')
                                        <span class="badge badge-info">{{ date('d M, Y h:i a', strtotime($booking->datetime)) }}</span>
                                        @else
                                        @if($booking->getBookType != null)
                                        <p>
                                            <span class="badge badge-info">{{ date('d M, Y h:i a', strtotime($booking->getBookType->start_date)) }}</span>
                                            <br>
                                            <span class="badge badge-primary">{{ date('d M, Y h:i a', strtotime($booking->getBookType->end_date)) }}</span>
                                        </p>
                                        @else
                                        @endif
                                        @endif
                                    </td>
                                    <td>{{ $booking->booking_code }}</td>
                                    <td>${{ $booking->total }}</td>
                                    <td>
                                        @if($booking->bookable_type == 'App\Models\Rentals')
                                        <button class="btn btn-primary btn-sm">RENTAL</button>
                                        @else
                                        <button class="btn btn-info btn-sm">TOUR</button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($booking->checkPast())
                                        <a href="{{ route('user.booking.review', $booking->id) }}" class="btn btn-secondary btn-sm" title="Add Review"><i class="fa-solid fa-star"></i></a>
                                        @endif
                                        <a href="{{ route('user.booking.details', $booking->id ) }}" class="btn btn-secondary btn-sm" title="View Booking"><i class="fa-solid fa-eye"></i></a>
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
</section>

@endsection
@push('script')
@endpush
