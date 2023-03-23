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
                <form method="POST" action="{{ route('products.store', $product)}}" class="d-flex"> @csrf
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
@endsection
