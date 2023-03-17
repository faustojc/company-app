@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <section class="h-100 py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5">
                <h5 class="mb-4">SIGN IN</h5>

                @if(session('error'))
                    <div class="my-2 text-danger">{{ session('error') }}}</div>
                @endif

                <form method="post" action="/login"> @csrf
                    <div class="form-group mb-3">
                        <label for="username" class="form-label fw-bold">Username</label>
                        <input type="text" id="username" name="username" class="form-control rounded-0" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" id="password" name="password" class="form-control rounded-0" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" class="form-control btn btn-outline-dark rounded-0 px-3">Sign in</button>
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
