<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function render(): Response
    {
        $products = Product::all()->take(4);

        DataController::shareData();

        return Inertia::render('Home', [
            'products' => $products,
        ]);
    }
}
