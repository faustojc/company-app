<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Controller\HomeComponent;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $customer = Customer::query()->where('customer_id', app('customer_id'))->get()->first();
        $orders = Order::query()->where('customer_id', app('customer_id'))->get()->all();
        $products = Product::all();

        return view('products.index', $products)->with('customer', $customer)->with('orders', $orders)->extends('livewire.main-component');
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request, Products $product)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                'id' => 'unique:product,id'
            ]);

            $order = new Order();
            $order->customer_id = app('customer_id');
            $order->product_id = $product->id;
            $order->total_price = $product->price;
            $order->save();

            $products = Product::all();

            $home = new HomeComponent();

            return view($home->render());
        }

        dd($product);

        return view('products.store', $product)->extends('livewire.main-component');
    }

    public function show(Product $product)
    {
        $customer = Customer::query()->where('customer_id', app('customer_id'))->get()->first();
        $orders = Order::query()->where('customer_id', app('customer_id'))->get()->all();

        return view('products.show')->with('product', $product)->with('customer', $customer)->with('$orders', $orders)->extends('livewire.main-component');
    }

    public function edit(Product $product)
    {
        return view('products.edit', [$product])->extends('livewire.main-component');
    }

    public function update(Request $request, Product $product)
    {
        return view('products.update', $product)->extends('livewire.main-component');
    }

    public function destroy(Product $product)
    {
        return view('products.destroy', $product)->extends('livewire.main-component');
    }
}
