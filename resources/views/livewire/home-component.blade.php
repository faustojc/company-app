@extends('livewire.main-component')

@section('content')
    <section class="row w-100 px-5 m-0 hero">
        <div class="col-lg col-sm-12 py-lg-0 py-5">
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
                <div class="d-flex flex-wrap justify-content-center pt-5">

                    @foreach($products as $index => $product)
                        @if($index >= 4) @break
                        @endif
                        <div class="card rounded-0 mx-2 mb-4" style="width: 19rem">
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ $product->filepath . $product->filename }}" class="card-img-top mb-2" alt="{{ $product->name }}" />
                            </a>
                            <div class="card-body">
                                <p class="card-title text-uppercase m-0 sub-title">{{ $product->category }}</p>
                                <a href="{{ route('products.show', $product) }}" class="fw-bold text-body product-name text-decoration-none">{{ $product->name }}</a>
                                <p class="text-success sub-title">P{{ $product->price }}.00</p>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1">
                                    <span class="bi bi-cart me-2"></span>
                                    Add to Cart
                                </a>
                            </div>
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
                <img src="{{ asset('resource/images/delargo-model1.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>
    </section>
@endsection
