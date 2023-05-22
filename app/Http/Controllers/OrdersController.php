<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class OrdersController extends Controller
{
    public function index(): Response
    {
        $orders = array();

        $customer = Customer::query()->where('customer_id', app('customer_id'))->first();
        $customer_products_id = Order::query()->where('customer_id', app('customer_id'))->pluck('product_id')->all();

        $x = 0;
        foreach ($customer_products_id as $product_id) {
            $curr = Order::query()->where('customer_id', app('customer_id'))->where('product_id', $product_id)->get()->first();

            $orders[$x]['order_id'] = $curr->order_id;
            $orders[$x]['customer_id'] = app('customer_id');
            $orders[$x]['product'] = Product::query()->where('product_id', $curr->product_id)->first();
            $orders[$x]['quantity'] = $curr->quantity;
            $orders[$x]['total_price'] = $curr->total_price;
            ++$x;
        }

        return Inertia::render('Orders/Index', [
            'customer' => $customer,
            'orders' => $orders
        ]);
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request): Response
    {
        $customer_id = app('customer_id');
        $product_id = $request->query('product');

        $product = Product::query()->where('product_id', $product_id)->first();
        $currOrder = Order::query()->where('customer_id', $customer_id)->where('product_id', $product->product_id)->first();

        if ($currOrder->exists()) {
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

        return $product_controller->show($product);
    }

    public function show(Order $order)
    {
        return view('orders.show', $order);
    }

    public function edit(Order $order)
    {
        return view('orders.edit', $order);
    }

    public function update(Request $request, $order_id)
    {
        return response()->json(['message' => 'Order '. $order_id . ' successfully updated']);
    }

    public function destroy(Order $order)
    {
        return view('orders.delete', $order);
    }
}
