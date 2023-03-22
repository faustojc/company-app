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
        $orders = Order::query()->where('customer_id', $id)->get();
        $products = Product::query()->get()->all();

        return view('livewire.home-component')
            ->with('customer', $customer)
            ->with('orders', $orders)
            ->with('products', $products)
            ->extends('livewire.main-component');
    }
}
