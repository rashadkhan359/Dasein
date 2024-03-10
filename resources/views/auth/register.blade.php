@extends('layouts.master-auth')
@section('title')
    Register
@endsection
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
                                        <img src="{{ URL::asset('build/images/auth/img-1.png') }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="col-lg-8 col-9">
                                        <h1 class="text-white text-capitalize lh-base fw-lighter">Register with
                                            Dasein</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                {{-- <p class="text-muted fs-15">Get your free Toner account now</p> --}}
                                <div class="p-2">
                                    <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input id="firstname" type="text"
                                                        class="form-control @error('firstname') is-invalid @enderror"
                                                        name="firstname" value="{{ old('firstname') }}" required
                                                        autocomplete="firstname" autofocus
                                                        placeholder="Enter your first name">
                                                    @error('firstname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="lastname" class="form-label">Last Name <span
                                                            class="text-danger">*</span></label>
                                                    <input id="lastname" type="text"
                                                        class="form-control @error('lastname') is-invalid @enderror"
                                                        name="lastname" value="{{ old('lastname') }}" required
                                                        autocomplete="lastname" autofocus
                                                        placeholder="Enter tour last name">
                                                    @error('lastname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label for="email" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email"
                                                    placeholder="Enter your email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3 col-md-12">
                                                <label for="email" class="form-label">Phone <span
                                                        class="text-danger">*</span></label>
                                                <input id="phone" type="text"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone') }}" required autocomplete="phone" pattern="^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$"
                                                    placeholder="Enter your phone">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label class="form-label" for="password-input">Password <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password"
                                                        class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                        onpaste="return false" placeholder="Enter password"
                                                        id="password-input" name="password" aria-describedby="passwordInput"
                                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="mb-3 col-md-12">
                                                <label for="password-confirm"
                                                    class="form-label">{{ __('Confirm Password') }} <span
                                                        class="text-danger">*</span></label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control pe-5 password-input"
                                                        placeholder="Confirm password" name="password_confirmation"
                                                        aria-describedby="passwordInput" required>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                        type="button"><i class="ri-eye-fill align-middle"></i></button>
                                                </div>
                                            </div>

                                            {{-- <div class="mb-3 col-md-12">
                                                <label for="avatar" class="form-label">Avatar <span
                                                        class="text-danger">*</span></label>
                                                <input id="avatar" type="file"
                                                    class="form-control @error('avatar') is-invalid @enderror"
                                                    name="avatar" value="{{ old('avatar') }}" required
                                                    autocomplete="avatar" placeholder="Enter your avatar">
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div> --}}
                                        </div>

                                        <div class="mb-4 col-md-12">
                                            <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                                                Toner <a href="#"
                                                    class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                                                    of Use</a></p>
                                        </div>

                                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                            <h5 class="fs-13">Password must contain:</h5>
                                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                                            <p id="pass-lower" class="invalid fs-12 mb-2">At <b>lowercase</b> letter (a-z)
                                            </p>
                                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>uppercase</b> letter
                                                (A-Z)</p>
                                            <p id="pass-number" class="invalid fs-12 mb-0">A least <b>number</b> (0-9)</p>
                                        </div>

                                        <div class="mt-4 col-md-12">
                                            <button class="btn btn-primary w-100" type="submit">Sign Up</button>
                                        </div>

                                        <div class="mt-4 text-center col-md-12">
                                            <div class="signin-other-title">
                                                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                                            </div>

                                            <div>
                                                <button type="button" class="btn btn-soft-primary btn-icon "><i
                                                        class="ri-facebook-fill fs-16"></i></button>
                                                <button type="button" class="btn btn-soft-danger btn-icon "><i
                                                        class="ri-google-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-4 text-center">
                                    <p class="mb-0">Already have an account ? <a href="{{ route('login') }}"
                                            class="fw-semibold text-primary text-decoration-underline"> Sign in </a> </p>
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

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Toner. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/pages/password-match.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/password-addon.init.js') }}"></script>
@endsection
