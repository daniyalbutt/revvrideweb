@extends('layouts.front-app')
@section('title', 'Tour List')
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
                            <h1>Your Reservation</h1>
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
                            <h1>Your Reservation</h1>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Customer Name</th>
                                        <th>Time</th>
                                        <th>Booking Code</th>
                                        <th>Cost</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $item->bookable->title }}</td>
                                            <td>{{ date('F d, Y h:i A', strtotime($item->datetime));}}</td>

                                            <td>{{ $item->booking_code }}</td>
                                            <td>${{ $item->total }}</td>
                                            <td><span class="badge badge-info">{{ strtoupper($item->getBookType->getTable()) }}</span> </td>
                                            <td>
                                                <a href="{{ route('vendor.reservation.detail', $item->id ) }}" class="btn btn-secondary btn-sm" title="View Booking"><i class="fa-solid fa-eye"></i></a>
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
