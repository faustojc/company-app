<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OrdersController extends Controller
{
    public function index(): Response
    {
        DataController::shareData();

        return Inertia::render('Orders/Index', [
            'orders' => DataController::getOrders()
        ]);
    }

    public function store(Request $request): Response
    {
        $customer_id = app('customer_id');
        $product_id = $request->query('product');

        $product = Product::query()->where('product_id', $product_id)->first();
        $currOrder = Order::query()->where('customer_id', $customer_id)->where('product_id', $product->product_id)->get()->first();

        if ($currOrder != null) {
            Order::query()
                ->where('customer_id', $customer_id)
                ->where('product_id', $product->product_id)
                ->update([
                    'quantity' => $currOrder->quantity + $request->get('quantity'),
                    'total_price' => $currOrder->total_price * $currOrder->quantity
                ]);
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

        return $product_controller->show($product->product_id);
    }

    public function destroy($order_id): Response
    {
        Order::destroy($order_id);

        return $this->index();
    }
}
