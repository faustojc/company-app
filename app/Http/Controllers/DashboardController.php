<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response
    {
        $products = Product::all();

        return Inertia::render('Dashboard/Index', [
            'products' => $products,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Dashboard/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'size' => 'required',
            'price' => 'required|numeric'
        ]);

        // Create a new product
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->flaw = $request->input('flaw');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->filename = $request->input('filename');
        $product->filepath = $request->input('filepath');
        $product->save();

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('resource/images'), $imageName);

        return redirect()->route('admin_product.index');
    }

    public function edit($product_id): Response
    {
        $product = Product::query()->where('product_id', $product_id)->first();

        return Inertia::render('Dashboard/Edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, $product_id): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'price' => 'numeric'
        ]);

        // Update the product
        $product = Product::query()->where('product_id', $product_id)->first();

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->flaw = $request->input('flaw');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('admin_product.index');
    }

    public function destroy($product_id): RedirectResponse
    {
        // Delete the product
        Product::query()->where('product_id', $product_id)->first()->delete();

        return redirect()->route('admin_product.index');
    }
}
