<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function render(Request $request)
    {
        $id = $request->getSession()->get('data');

        $customer = DB::table('customer')->where('customer_id', $id)->get()->first();
        $orders = DB::table('order')->where('customer_id', $id)->get()->all();

        return view('home', ['customer' => $customer, 'orders' => $orders]);
    }
}
