<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class OrdersComponent extends Component
{
    public $orders;

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id = app('customer_id');

        $customer_products_id = Order::query()->where('customer_id', $id)->pluck('product_id')->all();

        $x = 0;
        foreach ($customer_products_id as $product) {
            $curr = Order::query()->where('customer_id', $id)->where('product_id', $product->product_id)->get()->first();

            $this->orders[$x]['product_id'] = $curr->product_id;
            $this->orders[$x]['product'] = Product::query()->where('product_id', $curr->product_id)->first();
            $this->orders[$x]['quantity'] = $curr->quantity;
            $this->orders[$x]['total_price'] = $curr->total_price;
            ++$x;
        }

        return view('livewire.orders-component')->with('orders', $this->orders);
    }
}
