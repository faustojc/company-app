@extends('livewire.main-component')

@section('content')
    <section class="row w-100 px-5 m-0 hero">
        <div class="col-lg col-sm-12 py-lg-0 py-sm-5">
            <div class="row align-items-center justify-content-lg-start justify-content-sm-center align-content-center h-100">
                <div class="col-12 text-center text-lg-start">
                    <p class="text-uppercase sub-title">THRIFTED JEANS</p>
                </div>
                <div class="col-12 text-center text-lg-start">
                    <h1 class="title">Curated. Premium. Bottoms</h1>
                </div>
                <div class="col-12 text-center text-lg-start">
                    <a href="{{ route('products.index') }}" class="btn btn-dark px-5 py-3 rounded-0">Shop Collection</a>
                </div>
            </div>
        </div>
        <div class="col-lg col-sm-12 py-lg-0 pt-sm-5">
            <div class="d-flex justify-content-center">
                <img src="{{ asset('resource/images/hero.png') }}" class="img-fluid" alt="DelargoPH" />
            </div>
        </div>
    </section>
    <section class="pt-5 w-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <p class="text-uppercase sub-title">Summer Collection</p>
                </div>
                <div class="col-12 text-center">
                    <h2 class="title">Popular Pants</h2>
                </div>
                <div class="row flex-wrap g-3">
                    @foreach($products as $index => $product)
                        @if($index >= 4) @break
                        @endif
                        <div class="col flex-column">
                            <a href="{{ route('products.show', $product) }}" class="">
                                <img src="{{ $product->filepath . $product->filename }}" class="img-fluid mb-2" alt="{{ $product->name }}" />
                            </a>
                            <div class="px-4">
                                <p class="text-uppercase m-0 sub-title">{{ $product->category }}</p>
                                <a href="{{ route('products.show', $product) }}" class="fw-bold text-body product-name text-decoration-none">{{ $product->name }}</a>
                                <p class="fw-bolder text-success sub-title">P{{ $product->price }}.00</p>
                            </div>
                            <a href="@if(Auth::guard('customer')->check()) {{ route('products.show', $product) }} @else {{ route('login') }} @endif" class="btn btn-outline-secondary rounded-0 text-uppercase px-3 py-2">
                                <span class="bi bi-cart me-2"></span>
                                Add to Cart
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="w-100">
        <div class="d-flex flex-wrap justify-content-center mx-100">
            <div class="d-flex flex-column align-items-center p-2">
                <div class="mb-2 pb-3">
                    <img src="{{ asset('resource/images/delargo-model.jpg') }}" class="img-fluid" alt="" />
                </div>
                <div class="mb-2">
                    <h6 class="text-uppercase sub-title">Pants</h6>
                </div>
                <div class="mb-2">
                    <h2 class="fw-bold">The base collection - Ideal every day.</h2>
                </div>
                <div class="mb-2">
                    <a href="{{ route('products.index') }}" class="btn btn-dark px-4 py-2 rounded-0">Shop Now</a>
                </div>
            </div>
            <div class="m-2">
                <img src="{{ asset('resource/images/delargo-model1.jpg') }}" class="img-fluid h-100" alt="">
            </div>
        </div>
    </section>
@endsection
