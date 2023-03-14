@extends('layouts.master')

@section('content')
    <section class="h-100 py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5">
                <h5 class="mb-4">SIGN UP</h5>
                <form method="post" action="/login"> @csrf
                    <div class="form-group mb-3">
                        <label for="username" class="text-uppercase fw-bold" style="font-size: 12px">Username</label>
                        <input type="text" id="username" name="username" class="form-control rounded-0" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="text-uppercase fw-bold" style="font-size: 12px">Password</label>
                        <input type="password" id="password" name="password" class="form-control rounded-0" required>
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" name="submit" class="form-control btn btn-outline-dark rounded-0 px-3">Sign in</button>
                    </div>
                </form>
                <p class="text-center">
                    Already have account?
                    <a href="#" class="text-decoration-none link-info">Sign in</a>
                </p>
            </div>
        </div>
    </section>
@endsection
