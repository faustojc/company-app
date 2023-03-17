<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Tests\Fixtures\Model;

class HomeController extends Controller
{
    public function index(mixed $data)
    {
        $customer = ['customer' => $data];

        return view('home', $customer);
    }
}
