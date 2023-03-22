@extends('livewire.main-component')

@section('content')
    <section class="w-100 px-3">
        <div class="row row-cols-2 gap-4">
            <div class="col">
                <img src="{{ $product->filepath . $product->filename }}" class="img-fluid" alt="" />
            </div>
            <div class="col">
                <div class="mb-4">
                    <p class="text-uppercase m-0 sub-title">{{ $product->category }}</p>
                </div>
                <div class="mb-2">
                    <h5 class="fw-bolder text-body product-name">{{ $product->name }}</h5>
                </div>
                <div class="mb-4">
                    <h6 class="fw-bold sub-title">P{{ $product->price }}.00</h6>
                </div>
                <div class="mb-3">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="mb-5">
                    <p>Flaws: {{ $product->flaw }}</p>
                </div>
                <form method="POST" action="{{ route('products.store', $product)}}">
                    <div class="mb-3">
                        <input type="number" id="quantity" name="quantity" value="1" min="1" max="99" class="form-control w-25">
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
