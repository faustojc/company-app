@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <section class="vh-100">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="d-md-flex justify-content-center flex-wrap">
                    <img class="img-fluid" src="{{ asset('resource/images/delargo.jpg') }}" width="400" height="200" alt="">
                    <div class="p-4 p-md-5">
                        <h3 class="mb-4">Sign In</h3>
                        <form method="post" action="/login"> @csrf
                            <div class="form-group mb-3">
                                <label for="username" class="text-uppercase fw-bold" style="font-size: 12px">Username</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="text-uppercase fw-bold" style="font-size: 12px">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="submit" class="form-control btn btn-primary rounded px-3">Sign in</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50 text-left form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember">
                                    <label class="form-check-label" for="remember">Remember me?</label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </div>
                        </form>
                        <p class="text-center">
                            Don't have account?
                            <a href="#" class="text-decoration-none link-info">Sign Up</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
