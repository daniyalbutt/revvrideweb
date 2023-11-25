@extends('layouts.front-app')
@section('title', 'Review')
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
                            <h1>review</h1>
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
                            <h1>Review</h1>
                            <p>Add a Review for <span>{{ $data->getBookType->title }}</span></p>
                        </div>
                    </div>
                    <form action="{{ route('user.review.post') }}" class="mt-3" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <input type="hidden" name="bookable_id" value="{{ $data->bookable_id }}">
                        <input type="hidden" name="bookable_type" value="{{ $data->bookable_type }}">
                        <div class="row">
                            <div class="col-md-12">
                                @if (Session::has('success'))
                                <div class="alert alert-success text-center">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    <p>{{ Session::get('success') }}</p>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="">Rating</label>
                                    <div class="wrapper">
                                        <input type="checkbox" id="st1" value="5" name="rating" />
                                        <label for="st1"></label>
                                        <input type="checkbox" id="st2" value="4" name="rating"/>
                                        <label for="st2"></label>
                                        <input type="checkbox" id="st3" value="3" name="rating"/>
                                        <label for="st3"></label>
                                        <input type="checkbox" id="st4" value="2" name="rating"/>
                                        <label for="st4"></label>
                                        <input type="checkbox" id="st5" value="1" name="rating"/>
                                        <label for="st5"></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Comments</label>
                                    <textarea class="form-control" name="comments" id="comments" cols="30" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-c">Add Review</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@push('script')
@endpush