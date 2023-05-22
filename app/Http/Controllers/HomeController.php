<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function render(): Response
    {
        $id = app('customer_id');
        $orders = array();

        $customer = Customer::query()->where('customer_id', $id)->get()->first();
        $customer_products_id = Order::query()->where('customer_id', $id)->pluck('product_id')->all();
        $products = Product::all();

        if ($id) {
            $x = 0;

            foreach ($customer_products_id as $product_id) {
                $curr = Order::query()->where('customer_id', $id)->where('product_id', $product_id)->get()->first();

                $orders[$x]['order_id'] = $curr->order_id;
                $orders[$x]['customer_id'] = $id;
                $orders[$x]['product'] = Product::query()->where('product_id', $curr->product_id)->first();
                $orders[$x]['quantity'] = $curr->quantity;
                $orders[$x]['total_price'] = $curr->total_price;
                ++$x;
            }
        }

        return Inertia::render('Home', [
            'customer' => $customer,
            'orders' => $orders,
            'products' => $products
        ]);
    }
}
