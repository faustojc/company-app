<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class MainComponent extends Component
{
    public $customer;
    public $orders;

    public function render_main(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id = app('customer_id');

        $this->customer = Customer::query()->where('customer_id', $id)->first();
        $this->orders = Order::query()->where('customer_id', $id)->get();

        return view('livewire.main-component')
            ->with('customer', $this->customer)
            ->with('orders', $this->orders);
    }
}
