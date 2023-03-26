@extends('livewire.main-component')

@section('content')
    <section class="w-100 p-5">
        <div class="row flex-wrap justify-content-between g-2">
            <div class="col d-flex justify-content-center">
                <img src="{{ $product->filepath . $product->filename }}" class="img-fluid w-75" alt="" />
            </div>
            <div class="col-lg-6 pt-lg-0 pt-4 d-flex flex-column position-sticky">
                <div class="mb-4">
                    <p class="text-uppercase m-0 sub-title">{{ $product->category }}</p>
                </div>
                <div class="mb-2">
                    <h1 class="fw-bolder text-body">{{ $product->name }}</h1>
                </div>
                <div class="mb-2">
                    <h3 class="fw-bold">P{{ $product->price }}.00</h3>
                </div>
                <div class="mb-3">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="text-muted">
                    <p>Flaws: {{ $product->flaw }}</p>
                </div>
                <hr>
                <form method="POST" action="{{ route('orders.store', ['product' => $product])}}" class="d-flex"> @csrf
                    <div class="mb-3">
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="99" class="form-control rounded-0 px-2 py-1">
                    </div>
                    <div class="mb-3 ms-3">
                        <button class="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1" type="submit" name="submit">
                            <span class="bi bi-cart me-2"></span>
                            Add to Cart
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="pt-5 w-100">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center">
                    <h4 class="title">Related Products</h4>
                </div>
                <div class="d-flex flex-wrap justify-content-center pt-5">

                    @foreach($relatedProducts as $related)
                        <div class="card rounded-0 mx-2 mb-4" style="width: 19rem">
                            <a href="{{ route('products.show', $related) }}">
                                <img src="{{ $related->filepath . $related->filename }}" class="card-img-top mb-2" alt="{{ $related->name }}" />
                            </a>
                            <div class="card-body">
                                <p class="card-title text-uppercase m-0 sub-title">{{ $related->category }}</p>
                                <a href="{{ route('products.show', $related) }}" class="fw-bold text-body product-name text-decoration-none">{{ $related->name }}</a>
                                <p class="text-success sub-title">P{{ $related->price }}.00</p>
                                <a href="{{ route('products.show', $related) }}" class="btn btn-outline-secondary rounded-0 text-uppercase px-2 py-1">
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
@endsection
