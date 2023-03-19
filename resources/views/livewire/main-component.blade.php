<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet" />
    <!-- user-defined styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg py-3 sticky-lg-top bg-light-subtle border-bottom">
        <div class="container-fluid">
        <a href="#" class="navbar-brand">
                <img src="resource/images/logo.png" alt="logo" style="width: 50px"/>
                <span class="navbar-brand text-xl">Delargo.ph</span>
            </a>
            <button class="navbar-toggler float-end border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-2">
                        <a href="{{ route('home') }}" class="nav-link fw-light">HOME</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" class="nav-link fw-light">TRENDING</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" class="nav-link fw-light">NEW</a>
                    </li>
                    <li class="nav-item mx-2 dropdown">
                        <a href="#" class="nav-link fw-light dropdown-toggle" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORY
                        </a>
                        <div class="dropdown-menu rounded-0 animate__animated animate__fadeInUp animate__faster" aria-labelledby="categoryDropdown">
                            <a href="{{ route('category') }}" class="dropdown-item">Cargo Pants</a>
                            <a href="{{ route('category') }}" class="dropdown-item">Denim Jeans</a>
                            <a href="{{ route('category') }}" class="dropdown-item">Trousers</a>
                        </div>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="#" class="nav-link fw-light">CONTACT</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-end mt-2 my-lg-0">
                    <div class="nav-item mx-lg-3">
                        @if(Auth::guard('customer')->check())
                            <div class="dropdown">
                                <a href="#userDropdown" class="nav-link" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                    </svg>
                                    <span class="text-sm-start ms-2 ms-lg-0 fw-bold">{{ $customer->username }}</span>
                                    <div class="dropdown-menu dropdown-menu-lg-end rounded-0" aria-labelledby="userDropdown">
                                        <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                                    </div>
                                </a>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                                </svg>
                                <span class="text-sm-start ms-2 ms-lg-0 fw-bold d-md-inline d-lg-none">LOG IN</span>
                            </a>
                        @endauth
                    </div>
                    <div class="nav-item mx-lg-3">
                        <a href="#" class="nav-link d-lg-none d-md-inline">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                            <span class="text-sm-start ms-2 ms-lg-0 fw-bold">
                                    VIEW CART
                                    <span class="badge bg-danger rounded-pill">0</span>
                                </span>
                        </a>
                        <a href="#offcanvasCart" class="d-none d-lg-inline" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart2" viewBox="0 0 16 16">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                            <span class="position-absolute translate-middle badge rounded-pill bg-danger">0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCartLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title nav-link" id="offcanvasCartLabel">CART LIST</h5>
            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @if(empty($orders))
                <div>You don't have any cart lists</div>
            @else
                @foreach($orders as $order)
                    <div> {{ $order->name }} </div>
                @endforeach
            @endif
        </div>
    </div>

    <!-- content -->
    <div class="container">@yield('content')</div>

    <!-- footer -->
    <footer>
        <div class="bg-body-secondary text-muted py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <div class="fw-bold text-uppercase text-lg text-dark mb-3">𝐃𝐞𝐥𝐚𝐫𝐠𝐨 𝐏𝐇 ⌇ 𝐭𝐡𝐫𝐢𝐟𝐭𝐞𝐝 𝐣𝐞𝐚𝐧𝐬</div>
                        <p class="text-muted">Thrift & Consignment Store collections of curated premium bottoms</p>
                        <ul class="list-inline">
                            <li class="list-inline-item"><a href="#" class="text-muted text-primary-hover bi bi-facebook" target="_blank"></a></li>
                            <li class="list-inline-item"><a href="#" class="text-muted text-primary-hover bi bi-twitter" target="_blank"></a></li>
                            <li class="list-inline-item"><a href="#" class="text-muted text-primary-hover bi bi-instagram" target="_blank"></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
                        <h6 class="fw-bold text-dark mb-3">SHOP</h6>
                        <ul class="list-unstyled">
                            <li><a class="text-muted text-decoration-none" href="#">For Men</a></li>
                            <li><a class="text-muted text-decoration-none" href="#">For Women</a></li>
                            <li><a class="text-muted text-decoration-none" href="#">Shop</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold text-dark mb-3">OFFERS & SALES</h6>
                        <p class="mb-3">Enter your email to receive news for offers and sales on our products</p>
                        <form method="post" action="#">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control bg-transparent border-secondary rounded-0" placeholder="Your Email Address" aria-label="Your Email Address">
                                <button class="btn btn-outline-secondary rounded-0 bi bi-send-fill" type="submit" name="subscribe_email"></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fw-light bg-dark-subtle py-4">
            <div class="container">
                <p class="mb-md-0">© 2023 Delargo PH  All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
