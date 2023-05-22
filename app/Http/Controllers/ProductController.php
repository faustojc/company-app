<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Controller\HomeComponent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        $customer = Customer::query()->where('customer_id', app('customer_id'))->get()->first();
        $orders = Order::query()->where('customer_id', app('customer_id'))->get();
        $products = Product::all();

        return Inertia::render('Product/List', [
            'customer' => $customer,
            'orders' => $orders,
            'products' => $products
        ]);
    }

    // For the seller
    public function create()
    {
        return view('products.create');
    }

    // For the seller
    public function store(Request $request)
    {
        return view('products.store');
    }

    public function show(Product $product): Response
    {
        $id = app('customer_id');

        $customer = Customer::query()->where('customer_id', $id)->first();
        $orders = Order::query()->where('customer_id', $id)->get();
        $relatedProducts = Product::query()->where('category', $product->category)->get()->except($product->product_id);

        return Inertia::render('Product/Show', [
            'customer' => $customer,
            'orders' => $orders,
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
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
