@extends('layouts.master-auth')
@section('title', 'Forgot Password')
@section('content')
    <div class="w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="auth-card mx-lg-3">
                        <div class="card border-0 mb-0">
                            <div class="card-header bg-primary border-0">
                                <div class="row">
                                    <div class="col-lg-4 col-3">
                                        <img src="{{ URL::asset('build/images/auth/img-1.png') }}" alt=""
                                            class="img-fluid">
                                    </div>
                                    <div class="col-lg-8 col-9">
                                        <h1 class="text-white lh-base fw-lighter">Forgot Password?</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="text-muted fs-15">{{ __('Reset password with') }} Dasein.</p>

                                @if (session('status'))
                                    <div class="alert alert-borderless alert-success text-center mb-2 mx-2" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @else
                                    <div class="alert alert-borderless alert-warning text-center mb-2 mx-2" role="alert">
                                        {{ __('Enter your email and instructions will be sent to you!') }}
                                    </div>
                                @endif

                                <div class="p-2">
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="email" class="form-label">{{ __('Email') }}</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your email or username" :value="old('email')" required
                                                autofocus />
                                        </div>

                                        <div class="text-center mt-4">
                                            <button class="btn btn-primary w-100" type="submit">{{ __('Send Reset Link') }}</button>
                                        </div>
                                    </form><!-- end form -->
                                </div>
                                <div class="mt-4 text-center">
                                    <p class="mb-0">{{ __('Wait, I remember my password...') }} <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-underline"> Click here </a> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->

        @include('layouts.footer-without-auth')
    </div>
@endsection
@push('scripts')
    <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
@endpush
