<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Controller\HomeComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $customer = Customer::query()->where('customer_id', app('customer_id'))->get()->first();
        $orders = Order::query()->where('customer_id', app('customer_id'))->get()->all();
        $products = Product::all();

        return view('products.index', $products)
            ->with('customer', $customer)
            ->with('orders', $orders)
            ->extends('livewire.main-component');
    }

    // For the seller
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        return view('products.store')->extends('livewire.main-component');
    }

    public function show(Product $product)
    {
        $id = app('customer_id');

        $customer = Customer::query()->where('customer_id', $id)->first();
        $order_count = Order::query()->where('customer_id', $id)->get()->count();
        $relatedProducts = Product::query()->where('category', $product->category)->get()->except($product->product_id);

        return view('products.show')
            ->with('product', $product)
            ->with('customer', $customer)
            ->with('orders', $order_count)
            ->with('relatedProducts', $relatedProducts)
            ->extends('livewire.main-component');
    }

    // For the seller
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
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
