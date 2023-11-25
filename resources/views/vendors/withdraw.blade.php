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
                            <h1>Your Payments</h1>
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
                                        <th>Card Holder Name</th>
                                        <th>Expiry Date</th>
                                        <th>CVV</th>
                                        <th>Type</th>
                                        <th>Added on</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Auth::user()->payments as $item)
                                    <td>{{ $item->cardDetail->holder_name }}</td>
                                    <td>{{ $item->cardDetail->expiry_date }}</td>
                                    <td>{{ $item->cardDetail->cvv }}</td>
                                    <td><span class="badge badge-info"> {{ ucwords($item->payment_type)}}</span></td>
                                    <td>{{ $item->created_at->format('d M Y') }}</td>

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
