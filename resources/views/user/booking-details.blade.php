@extends('layouts.front-app')
@section('title', 'Booking Details' . $data->id)
@push('styles')
<style>
    .dropdown.form-control {
        display: none;
    }
    .text-secondary-d1 {
        color: black;
    }
    .page-header {
        margin: 0 0 1rem;
        padding-bottom: 1rem;
        padding-top: .5rem;
        border-bottom: 1px dotted #e2e2e2;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -ms-flex-align: center;
        align-items: center;
    }
    .brc-default-l1 {
        border-color: #dce9f0!important;
    }

    .ml-n1, .mx-n1 {
        margin-left: -.25rem!important;
    }
    .mr-n1, .mx-n1 {
        margin-right: -.25rem!important;
    }
    .mb-4, .my-4 {
        margin-bottom: 1.5rem!important;
    }

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0,0,0,.1);
    }

    .text-grey-m2 {
        color: black;
    }

    .text-success-m2 {
        color: #86bd68!important;
    }

    .font-bolder, .text-600 {
        font-weight: 600!important;
    }

    .text-110 {
        font-size: 110%!important;
    }
    .text-blue {
        color: var(--primary-color);
    }
    .pb-25, .py-25 {
        padding-bottom: .75rem!important;
    }

    .pt-25, .py-25 {
        padding-top: .75rem!important;
    }
    .bgc-default-tp1 {
        background-color: var(--primary-color);
    }
    .bgc-default-l4, .bgc-h-default-l4:hover {
        background-color: #f3f8fa!important;
    }
    .page-header .page-tools {
        -ms-flex-item-align: end;
        align-self: flex-end;
    }

    .btn-light {
        color: #757984;
        background-color: #f5f6f9;
        border-color: #dddfe4;
    }
    .text-95.text-secondary-d3 {
        font-weight: BOLD;
    }
    .w-2 {
        width: 1rem;
    }

    .text-120 {
        font-size: 120%!important;
    }
    .text-primary-m1 {
        color: #4087d4!important;
    }

    .text-danger-m1 {
        color: #dd4949!important;
    }
    .text-blue-m2 {
        color: var(--primary-color);
    }
    .text-150 {
        font-size: 150%!important;
    }
    .text-60 {
        font-size: 60%!important;
    }
    .text-grey-m1 {
        color: #7b7d81!important;
    }
    .align-bottom {
        vertical-align: bottom!important;
    }
    .content-wrapper span {
        color: black;
    }

    .content-wrapper {
        margin-bottom: 20px;
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
                            <h1>Booking Details #{{ $data->booking_code }}</h1>
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
                            <h1>Booking Details #{{ $data->booking_code }}</h1>
                        </div>
                    </div>
                    <section class="invoice mt-3">
                        <div class="page-content">
                            <div class="container px-0">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div>
                                                    @php
                                                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $data->getBookType->title)));
                                                    @endphp
                                                    @if($data->getBookType != null)
                                                    <div class="content-wrapper">
                                                        <img src="{{ $data->getBookType->Images[0]->image }}" alt="" width="120px">
                                                        <div class="content-wrapper-head">
                                                            <h4><a href="{{ $data->bookable_type == 'App\Models\Rentals' ? route('sportinner', ['slug' => $slug, 'id' => $data->getBookType->id]) : route('tourinner', ['slug' => $slug, 'id' => $data->getBookType->id]) }}" target="_blank">{{ $data->getBookType->title }}</a></h4>
                                                            <span><i class="fa-solid fa-location-dot"></i> {{ $data->getBookType->locations }}</span>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="text-sm text-grey-m2 align-middle">To:</span>
                                                    <span class="text-600 text-110 text-blue align-middle">{{ $data->getUser->first_name }} {{ $data->getUser->last_name }}</span>
                                                </div>
                                                <div class="text-grey-m2">
                                                    <div class="my-1">
                                                        {{ $data->getBookType->locations }}
                                                    </div>
                                                    <div class="my-1">
                                                        <i class="fa fa-envelope fa-flip-horizontal text-secondary"></i>
                                                        <b class="text-600">{{ $data->getUser->email }}</b>
                                                    </div>
                                                    <div class="my-1">
                                                        <i class="fa fa-phone text-secondary"></i>
                                                        <b class="text-600">{{ $data->getUser->phone }}</b>
                                                    </div>
                                                    @if($data->bookable_type != 'App\Models\Tours')
                                                    <div class="my-1">
                                                        <i class="fa fa-clock text-secondary"></i>
                                                        <b class="text-600">{{ date('d M, Y h:i a', strtotime($data->datetime)) }}</b>
                                                    </div>
                                                    <div class="my-1">
                                                        <i class="fa fa-filter text-secondary"></i>
                                                        <b class="text-600">{{ $data->duration }} Hours</b>
                                                    </div>
                                                    @else
                                                    <div class="my-1">
                                                        <i class="fa-solid fa-plane-departure text-secondary"></i>
                                                        <b class="text-600">{{ date('d M, Y h:i a', strtotime($data->getBookType->start_date)) }}</b>
                                                    </div>
                                                    <div class="my-1">
                                                        <i class="fa-solid fa-plane-arrival text-secondary"></i>
                                                        <b class="text-600">{{ date('d M, Y h:i a', strtotime($data->getBookType->end_date)) }}</b>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- /.col -->
                    
                                            <div class="text-95 col-sm-6 offset-sm-2 align-self-start d-sm-flex justify-content-end">
                                                <hr class="d-sm-none" />
                                                <div class="text-grey-m2">
                                                    <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                                        Invoice
                                                    </div>
                    
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #{{$data->booking_code}}</div>
                    
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Order Date:</span> {{date('d F, Y',strtotime($data->created_at))}}</div>
                    
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">{{$data->booking_status}}</span></div>
                                                    @if($data->transaction_id != '')
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Transaction ID:</span> {{$data->transaction_id}}</div>
                                                    @endif
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Adults:</span> {{$data->adults}}</div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Childs:</span> {{$data->childs}}</div>
                                                    <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Infants:</span> {{$data->infants}}</div>

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                    
                                        <div class="mt-5">
                                            @if($data->bookable_type != 'App\Models\Tours')
                                            <table class="table table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Description</th>
                                                        <th>Qty</th>
                                                        <th>Unit Price</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($data->addons as $key => $addons)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $addons->getAddons->name }}</td>
                                                        <td>{{ $addons->quantity }}</td>
                                                        <td>${{ $addons->amount }}</td>
                                                        <td>${{ $addons->amount * $addons->quantity }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @endif
                    
                                            <div class="row border-b-2 brc-default-l2"></div>
                    
                                            <div class="row mt-3">
                                                <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                                    {{$data->comments}}
                                                </div>
                    
                                                <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                                                    <div class="row my-2">
                                                        <div class="col-7 text-right">
                                                            Insurance
                                                        </div>
                                                        <div class="col-5">
                                                            <span class="text-120 text-secondary-d1">${{ $data->insurance_amount }}</span>
                                                        </div>
                                                    </div>
                    
                                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                                        <div class="col-7 text-right">
                                                            Total Amount
                                                        </div>
                                                        <div class="col-5">
                                                            <?php 
                                                                $shipping = $data->order_shipping ;
                                                            ?>
                                                            <span class="text-150 text-success-d3 opacity-2">${{ $data->total }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@push('script')
@endpush