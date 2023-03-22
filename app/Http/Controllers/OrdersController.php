<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
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

    public function store(Request $request, Product $product)
    {
        $hasOrder = Order::query()->where('customer_id', app('customer_id'))->has($product->id);
        $orders = Order::query()->where('customer_id', app('customer_id'))->get();

        if ($hasOrder) {
            $orders->where('product_id', $product->id)->first()->quantity += $request->get('quantity');
        }
        else {
            $order = new Order();
            $order->customer_id = app('customer_id');
            $order->product_id = $product->id;
            $order->quantity = $request->get('quantity');
            $order->total_price = $product->price * $request->get('quantity');

            $total_price = $orders->sum(function ($order) use ($product) {
                if ($order->product_id === $product->id) {
                    return $product->price * $order->quantity;
                }
                return $order->total_price;
            });

            Order::query()->where('customer_id', app('customer_id'))
                ->where('product_id', '<>', $product->id)
                ->update(['total_price' => $total_price]);
        }

        return view('products.show', $product);
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
