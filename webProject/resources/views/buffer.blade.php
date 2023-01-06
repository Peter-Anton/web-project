@extends('layouts.app')
@section('content')

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">{{ __('Login') }}</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="typeEmailX" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                                    <label class="form-label" for="typeEmailX">{{ __('Email Address') }}</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="typePasswordX" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
                                    <label class="form-label" for="typePasswordX">{{ __('Password') }}</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                @if (Route::has('password.request'))
                                    <p class="small mb-5 pb-lg-2">
                                    <a class="text-white-50" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a></p>
                                @endif

                                <button class="btn btn-outline-light btn-lg px-5" type="submit">{{ __('Login') }}</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>


                                </form>
                            </div>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
                                </p>

                        </div>
                            </div>
                            </div>

                    </div>

                    </div>

        </div>
@endsection
