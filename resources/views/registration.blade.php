@extends('layouts.master')

@section('title', 'Register')

@section('content')
    <section class="h-100 py-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-5">
                <h5 class="mb-4">SIGN UP</h5>
                <form class="row g-3 mb-3 needs-validation" action="{{ route('register') }}" method="POST" novalidate> {{ csrf_field() }}
                    <div class="col-lg-6">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" id="firstname" name="firstname" class="form-control rounded-0" required>
                        <div class="invalid-feedback">
                            Please enter your first name
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" id="lastname" name="lastname" class="form-control rounded-0" required>
                        <div class="invalid-feedback">
                            Please enter your last name
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" class="form-control rounded-0" required>
                        @if($errors->has('username'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->first('username') }}
                            </div>
                        @else
                            <div class="invalid-feedback">Please enter your username</div>
                        @endif
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control rounded-0" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->first('email') }}
                            </div>
                        @else
                            <div class="invalid-feedback">Please enter your email address</div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select rounded-0" id="sex" name="sex" aria-label="Select sex">
                            <option value="male" selected>Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control rounded-0" required>
                        <div class="invalid-feedback">
                            Please enter your password
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control rounded-0" required>
                        <div class="invalid-feedback">
                            Please enter your address
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="region" class="form-label">Region</label>
                        <select class="form-select" id="region" name="region" aria-label="Select region">
                            <option value="Ilocos" selected>Ilocos (Region I)</option>
                            <option value="Cagayan Valey">Cagayan Valey (Region II)</option>
                            <option value="Central Luzon">Central Luzon (Region III)</option>
                            <option value="Calabarzon">Calabarzon (Region IV-A)</option>
                            <option value="Bicol">Bicol (Region V)</option>
                            <option value="Western Visayas">Western Visayas (Region VI)</option>
                            <option value="Central Visayas">Central Visayas (Region VII)</option>
                            <option value="Eastern Visayas">Eastern Visayas (Region VIII)</option>
                            <option value="Zamboanga Peninsula">Zamboanga Peninsula (Region IX)</option>
                            <option value="Northern Mindanao">Northern Mindanao (Region X)</option>
                            <option value="Davao">Davao (Region XI)</option>
                            <option value="SOCCSKSARGEN">SOCCSKSARGEN (Region XII)</option>
                            <option value="National Capital Region">National Capital Region (NCR)</option>
                            <option value="femCordillera Administrative Regionale">Cordillera Administrative Region (CAR)</option>
                            <option value="Bangsamoro Autonomous Region in Muslim Mindanao">Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)</option>
                            <option value="Caraga">Caraga (Region XIII)</option>
                            <option value="MIMAROPA Region">MIMAROPA Region</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button type="submit" id="submit" name="submit" class="btn btn-outline-dark rounded-0 w-100 px-3">Sign in</button>
                    </div>
                </form>
                <p class="text-center">
                    Already have account?
                    <a href="{{ route('login') }}" class="text-decoration-none link-info">Sign in</a>
                </p>
            </div>
        </div>
    </section>
@endsection
