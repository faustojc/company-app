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

    public function store(Request $request)
    {
        $customer_id = app('customer_id');
        $product_id = $request->query('product');

        $product = Product::query()->where('product_id', $product_id)->first();
        $hasOrder = Order::query()->where('customer_id', $customer_id)->where('product_id', $product->product_id);
        $currOrder = Order::query()->where('customer_id', $customer_id)->where('product_id', $product->product_id)->first();

        if ($hasOrder->exists()) {
            Order::query()
                ->where('customer_id', $customer_id)
                ->where('product_id', $product->product_id)
                ->update(['quantity' => $currOrder->quantity + $request->get('quantity')]);

            Order::query()
                ->where('customer_id', $customer_id)
                ->where('product_id', $product->product_id)
                ->update(['total_price' => $currOrder->total_price * $currOrder->quantity]);

            Order::query()
                ->where('customer_id', $customer_id)
                ->where('product_id', $product->product_id)
                ->update(['updated_at' => time()]);
        }
        else {
            $orderNew = new Order();
            $orderNew->customer_id = app('customer_id');
            $orderNew->product_id = $product->product_id;
            $orderNew->quantity = $request->get('quantity');
            $orderNew->total_price = $product->price * $request->get('quantity');
            $orderNew->save();
        }

        $product_controller = new ProductController();

        return $product_controller->show($product);
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
