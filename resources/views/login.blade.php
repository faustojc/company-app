@extends('app')

@section('title', 'Login')

@section('content')
    <section class="h-100 py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5">
                <h5 class="mb-4">SIGN IN</h5>

                @if(isset($error))
                    <div class="my-2 text-danger fw-bold">{{ $error }}</div>
                @endif

                <form class="needs-validation" action="{{ route('login') }}" method="POST" novalidate> @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" id="email" name="email" class="form-control rounded-0" required>
                        <div class="invalid-feedback">
                            Please enter your email
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" id="password" name="password" class="form-control rounded-0" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" id="submit" name="submit"
                                class="btn btn-outline-dark rounded-0 w-100 px-3">Log in
                        </button>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="col form-check">
                            <input class="form-check-input" type="checkbox" value="checked" id="remember">
                            <label class="form-check-label" for="remember">Remember me?</label>
                        </div>
                        <div class="col text-end">
                            <a href="#" class="text-decoration-none">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <p class="text-center">
                    Don't have account?
                    <a href="{{ route('register') }}" class="text-decoration-none link-info">Sign Up</a>
                </p>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('js/form.js') }}"></script>
@endsection
