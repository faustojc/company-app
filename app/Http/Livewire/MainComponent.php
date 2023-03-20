<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Order;
use Livewire\Component;

class MainComponent extends Component
{
    public mixed $customer;
    public array $orders;

    public function render_main(): array
    {
        $id = app('customer_id');

        $this->customer = Customer::query()->where('customer_id', $id)->get()->first();
        $this->orders = Order::query()->where('customer_id', $id)->get()->all();

        return ['customer' => $this->customer, 'orders' => $this->orders];
    }
}
