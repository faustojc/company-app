<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id = app('customer_id');

        $customer = Customer::query()->where('customer_id', $id)->first();
        $products = Product::query()->get()->all();
        $order_count = Order::query()->where('customer_id', $id)->get()->count();

        return view('livewire.home-component')
            ->with('customer', $customer)
            ->with('products', $products)
            ->with('orders', $order_count)
            ->extends('livewire.main-component');
    }
}
