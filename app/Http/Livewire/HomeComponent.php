<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use \Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class HomeComponent extends Component
{
    public $customer;
    public $orders;

    public function render(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $id = $request->getSession()->get('data');

        $this->customer = DB::table('customer')->where('customer_id', $id)->get()->first();
        $this->orders = DB::table('order')->where('customer_id', $id)->get()->all();

        return view('livewire.home-component', [
            'customer' => $this->customer,
            'orders' => $this->orders
        ])->extends('layouts.master');
    }
}
