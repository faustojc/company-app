<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class MainComponent extends Component
{
    public mixed $customer;
    public array $orders;

    public function render_main(): array
    {
        $id = app('customer_id');

        $this->customer = DB::table('customer')->where('customer_id', $id)->get()->first();
        $this->orders = DB::table('order')->where('customer_id', $id)->get()->all();

        return ['customer' => $this->customer, 'orders' => $this->orders];
    }
}
