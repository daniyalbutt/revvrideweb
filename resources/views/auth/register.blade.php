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
          <div class="col-lg-6 pr-0">
             <div class="sign-bg" style="background-image:url(assets/images/screen1.jpg); ">
                <div class="sign-content text-center">
                   <h1 class="primary-hd white mb-20">Your Access to the Most Featured</h1>
                   <h1 class="primary-hd white mb-20"><span>Events & Sports</span></h1>
                   <!--<p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
                </div>
             </div>
          </div>
          <div class="col-lg-6 pl-0">
             <div class="sign">
                <div class="sign-logo">
                   <img src="{{ asset('assets/images/logo-big.webp') }}" alt="">
                </div>
                <div class="sign-content text-center mb-40">
                   <p class="primary-para">Please create  your account and start the adventure</p>
                </div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">AS A USER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">AS A VENDOR</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form method="POST" action="{{ route('register') }}" class="vendor_form row">
                            @csrf
                            <input type="hidden" name="user_type" value="user">
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="gender">Gender</label>
                                <select name="gender" id="gender" required class="form-control">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="	dob">Date Of Birth</label>
                                <input id="	dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" autofocus>
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="email">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                 @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                             <div class="contact-form-field sign-field mb-20 col-md-6">
                                 <label class="mb-10" for="phone">Mobile Number</label>
                                 <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                 @error('phone')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                 @enderror
                             </div>
                             <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <button type="button" class="eye"><i class="fas fa-eye-slash" id="eye"></i></button>
                                 @error('password')
                                     <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>
                             <div class="contact-form-field sign-field mb-20 col-md-6">
                                 <label class="mb-10" for="password-confirm">Confirm Password</label>
                                 <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                 <button type="button" class="eye"><i class="fas fa-eye-slash" id="eye"></i></button>
                              </div>
                             <div class="remember-and-forgot mb-10">
                                <div class="mb-10">
                                   <input type="checkbox" id="remember" value="Remember Me">
                                   <label for="remember">I agree to <a href="#">privacy policy & terms</a></label>
                                </div>
                             </div>
                             <div class="sign-btn mb-20 register-btn">
                                <button class="btn-c btn btn-block">Sign Up</button>
                            </div>
                         </form>
                         <div class="sign-content text-center">
                            <p class="primary-para mb-10">Already have an account? <a href="{{ route('login') }}">Sign in instead</a></p>
                         </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form method="POST" action="{{ route('register') }}" class="vendor_form row">
                            @csrf
                            <input type="hidden" name="user_type" value="vendor">
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="gender">Gender</label>
                                <select name="gender" id="gender" required class="form-control">
                                    <option value="">Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="first_name">First Name</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="last_name">Last Name</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            {{-- <div class="contact-form-field sign-field mb-20">
                                <label class="mb-10" for="user_name">Username</label>
                                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="user_name" autofocus>
                                @error('user_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> --}}
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                               <label class="mb-10" for="email">Email Address</label>
                               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="phone">Mobile Number</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="license_number">License Number</label>
                                <input id="license_number" type="text" class="form-control @error('license_number') is-invalid @enderror" name="license_number" value="{{ old('license_number') }}" required autocomplete="license_number" autofocus>
                                @error('license_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                               <label class="mb-10" for="password">Password</label>
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               <button type="button" class="eye"><i class="fas fa-eye-slash" id="eye"></i></button>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact-form-field sign-field mb-20 col-md-6">
                                <label class="mb-10" for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <button type="button" class="eye"><i class="fas fa-eye-slash" id="eye"></i></button>
                             </div>
                            <div class="remember-and-forgot mb-10">
                               <div class="mb-10">
                                  <input type="checkbox" id="remember" value="Remember Me">
                                  <label for="remember">I agree to <a href="#">privacy policy & terms</a></label>
                               </div>
                            </div>
                            <div class="sign-btn mb-20 register-btn">
                                <button class="btn-c btn btn-block">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>



<div class="container d-none">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
    <script>
        $('.eye').click(function(){
            if($(this).prev().attr('type') == 'password'){
                $(this).prev().attr('type', 'text')
            }else{
                $(this).prev().attr('type', 'password')
            }
        })
    </script>
@endpush
