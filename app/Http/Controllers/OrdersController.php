<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $customer = Customer::query()->where('customer_id', app('customer_id'))->get()->first();
        $orders = Order::all();

        return view('orders.index', $orders)->with('customer', $customer)->extends('livewire.main-component');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        return view('orders.store');
    }

    public function show(Order $order)
    {
        return view('orders.show', $order);
    }

    public function edit(Order $order)
    {
        return view('orders.edit', $order);
    }

    public function update(Request $request, Order $order)
    {
        return view('orders.update', $order)->extends('livewire.main-component');
    }

    public function destroy(Order $order)
    {
        return view('orders.delete', $order);
    }
}
