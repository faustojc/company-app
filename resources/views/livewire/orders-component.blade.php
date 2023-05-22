@if(count($orders) == 0)
    <div> You don't have any added carts</div>
@else
    <div>
        @foreach($orders as $order)
            <div class="d-flex mb-3">
                <div class="card border-0 px-2">
                    <div class="row align-items-center g-0">
                        <div class="col-md-3">
                            <img src="{{ $order['product']->filepath }}{{ $order['product']->filename }}" class="img-fluid" width="170" alt="">
                        </div>
                        <div class="col">
                            <div class="card-body">
                                <h6 class="card-title fw-bolder">{{ $order['product']->name }}</h6>
                                <p class="card-text">P {{ number_format($order['product']->price) }}</p>
                                <div class="d-flex">
                                    <button class="btn btn-outline-secondary bi bi-dash rounded-0" type="button" wire:click="changeQuantity({{ $order['product']->product_id }}, {{ $order['quantity'] }}, {{ "'-'" }})"></button>
                                    <input class="text-center form-control rounded-0 w-25" type="number" min="1" value="{{ $order['quantity'] }}">
                                    <button class="btn btn-outline-secondary bi bi-plus rounded-0" type="button" wire:click="changeQuantity({{ $order['product']->product_id }}, {{ $order['quantity'] }}, {{ "'+'" }})"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <i class="btn bi bi-trash" wire:click="removeOrder({{ $order['product']->product_id }})"></i>
                </div>
            </div>
        @endforeach
    </div>
@endif

