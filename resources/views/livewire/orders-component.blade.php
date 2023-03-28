@if(count($orders) == 0)
    <div> You don't have any added carts</div>
@else
    @foreach($orders as $order)
        <div> {{ $order['product']->name }} </div>
        <div> {{ $order['quantity'] }} </div>
        <div> {{ $order['total_price'] }} </div>
        <hr>
    @endforeach
@endif

