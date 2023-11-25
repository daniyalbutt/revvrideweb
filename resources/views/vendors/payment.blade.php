@extends('layouts.front-app')
@section('title', 'profile')
@push('styles')

@endpush
@section('content')
<div class="col-lg-12">
    <div class="banner-content text-center">
        <hr class="seperator">
        <h1>Your Payments</h1>
        <h1>Your Reservation</h1>
    </div>
</div>
</div>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Card Holder Name</th>
                    <th>Expiry Date</th>
                    <th>CVV</th>
                    <th scope="col">Customer Name</th>
                    <th>Time</th>
                    <th>Booking Code</th>
                    <th>Cost</th>
                    <th>Type</th>
                    <th>Added on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->payments as $item)
                <td>{{ $item->cardDetail->holder_name }}</td>
                <td>{{ $item->cardDetail->expiry_date }}</td>
                <td>{{ $item->cardDetail->cvv }}</td>
                <td><span class="badge badge-info"> {{ ucwords($item->payment_type)}}</span></td>
                <td>{{ $item->created_at->format('d M Y') }}</td>
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
    @endsection
    @push('script')
    @endpush
