@extends('layouts.front-app')
@push('styles')
<style>
    header {
        display: none;
    }

    footer {
        display: none;
    }
</style>
@endpush
@section('content')
<section class="sign-sec">
    <div class="fluid-container container p-0 h-100">
        <div class="row h-100">
            <div class="col-lg-8 pr-0">
                <div class="sign-bg" style="background-image:url({{ asset('assets/images/screen1.webp') }}); ">
                    <div class="sign-content text-center">
                        <h1 class="primary-hd white mb-20">Your Access to the Most Featured</h1>
                        <h1 class="primary-hd white mb-20"><span>Events & Sports</span></h1>
                        <p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 pl-0">
                <div class="sign">
                    <div class="sign-logo">
                        <img src="{{ asset('assets/images/logo-big.webp') }}" alt="">
                    </div>
                    <div class="sign-content text-center mb-40">
                        <p class="primary-para">Please sign-in to your account and start the adventure</p>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="sign-form">
                        @csrf
                        <div class="contact-form-field sign-field mb-20">
                            <label class="mb-10" for="signusername">Username</label>
                            <input id="signusername" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="contact-form-field sign-field mb-20">
                            <label class="mb-10" for="password">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <button><i class="fas fa-eye-slash" id="eye"></i></button>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="remember-and-forgot mb-10">
                            <div class="mb-10">
                                <input class="form-check-input" type="checkbox" value="Remember Me" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Remember Me</label>
                            </div>
                            <div class="mb-10">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Forgot Password?</a>
                                @endif
                            </div>
                        </div>
                        <div class="sign-btn mb-20"><input class="btn-c" value="Sign In" type="submit"></div>
                    </form>
                    <div class="sign-content text-center">
                        <p class="primary-para mb-10">New on our platform? <a href="{{ route('register') }}">Create an account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')

@endpush