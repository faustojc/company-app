<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class ProductController extends Controller
{
    public function index(): Response
    {
        DataController::shareData();

        return Inertia::render('Product/List', [
            'products' => Product::all()
        ]);
    }

    public function show($product_id): Response
    {
        DataController::shareData();

        $product = Product::query()->where('product_id', $product_id)->first();
        $relatedProducts = Product::query()->where('category', $product->category)->get()->except($product_id);

        return Inertia::render('Product/Show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }
}
