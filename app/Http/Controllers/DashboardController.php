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
            'flaw' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'filename' => 'required',
            'filepath' => 'required',
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

        return redirect()->route('dashboard.index');
    }

    public function edit(Product $product): Response
    {
        return Inertia::render('Dashboard/Edit', [
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category' => 'required',
            'flaw' => 'required',
            'size' => 'required',
            'price' => 'required|numeric',
            'filename' => 'required',
            'filepath' => 'required',
        ]);

        // Update the product
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category = $request->input('category');
        $product->flaw = $request->input('flaw');
        $product->size = $request->input('size');
        $product->price = $request->input('price');
        $product->filename = $request->input('filename');
        $product->filepath = $request->input('filepath');
        $product->save();

        return redirect()->route('dashboard.index');
    }

    public function destroy(Product $product): RedirectResponse
    {
        // Delete the product
        $product->delete();

        return redirect()->route('dashboard.index');
    }
}
