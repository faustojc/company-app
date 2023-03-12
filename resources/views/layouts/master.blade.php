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
    <nav class="navbar navbar-expand-lg py-3 position-sticky">
        <div class="container-fluid">
            <a class="navbar-brand" id="brand" href="#">Delargo.ph</a>
            <button class="navbar-toggler float-end border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link fw-light">HOME</a>
                    </li>
                    <li class="nav-item mx-1 dropdown">
                        <a href="#" class="nav-link fw-light dropdown-toggle" id="categoryDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            CATEGORY
                        </a>
                        <div class="dropdown-menu rounded-0 animate__animated animate__fadeInUp animate__faster" aria-labelledby="categoryDropdown">
                            <a href="#" class="dropdown-item">Straight</a>
                            <a href="#" class="dropdown-item">Skinny</a>
                            <a href="#" class="dropdown-item">Wide Leg</a>
                            <a href="#" class="dropdown-item">Cargo Pants</a>
                            <a href="#" class="dropdown-item">Harem</a>
                            <a href="#" class="dropdown-item">Sweat Pants</a>
                        </div>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link fw-light">MEN</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link fw-light">WOMEN</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a href="#" class="nav-link fw-light">CONTACT</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center justify-content-between justify-content-lg-end mt-sm-2 my-lg-0">
                    <div class="nav-item mx-lg-3">
                        <a href="#" class="nav-link">
                            <i class="bi bi-person"></i>
                            <span class="text-sm-start ms-2 ms-lg-0 fw-bold d-none d-sm-inline d-lg-none">LOG IN</span>
                        </a>
                    </div>
                    <div class="nav-item mx-lg-3">
                        <a href="#" class="d-lg-none d-sm-inline nav-link">
                            <i class="bi bi-cart"></i>
                            <span class="text-sm-start ms-2 ms-lg-0 fw-bold d-none d-sm-inline d-lg-none">VIEW CART</span>
                        </a>
                        <a href="#offcanvasCart" class="d-lg-inline d-sm-none nav-link" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <i class="bi bi-cart"></i>
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
            <div>You dont have added cart</div>
        </div>
    </div>

    <!-- content -->
    <div class="container">@yield('content')</div>

    <!-- footer -->
    @yield('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
