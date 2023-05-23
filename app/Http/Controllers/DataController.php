<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DataController extends Controller
{
    private static array $orders = array();
    private static int|null $customer_id = null;

    public static function shareData() {
        if (Auth::guard('customer')->check()) {
            self::$customer_id = app('customer_id');

            $customer = Customer::query()->where('customer_id', self::$customer_id)->get()->first();
            $customer_products_id = Order::query()->where('customer_id', self::$customer_id)->pluck('product_id')->all();

            $x = 0;

            foreach ($customer_products_id as $product_id) {
                $curr = Order::query()->where('customer_id', self::$customer_id)->where('product_id', $product_id)->get()->first();

                self::$orders[$x]['order_id'] = $curr->order_id;
                self::$orders[$x]['product'] = Product::query()->where('product_id', $curr->product_id)->first();
                self::$orders[$x]['quantity'] = $curr->quantity;
                self::$orders[$x]['total_price'] = $curr->total_price;
                ++$x;
            }

            Inertia::share('customer', $customer);
            Inertia::share('orders', self::$orders);
            Inertia::share('auth', Auth::guard('customer')->check());
        }
    }

    public static function getOrders(): array
    {
        return self::$orders;
    }
}
