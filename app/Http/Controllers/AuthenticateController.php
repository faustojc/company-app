<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\MessageBag;

class AuthenticateController extends Controller
{

    public function render_register(Request $request): RedirectResponse
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'username' => 'required|max:30|unique:customer,username',
                'email' => 'required|email|unique:customer,email',
                'password' => 'required'
            ]);

            $customer = new Customer();
            $customer->username = $request->input('username');
            $customer->email = $request->input('email');
            $customer->password = $request->input('password');
            $customer->firstname = $request->input('firstname');
            $customer->lastname = $request->input('lastname');
            $customer->sex = $request->input('sex');
            $customer->region = $request->input('region');
            $customer->address = $request->input('address');
        }

        return redirect()->route('register');
    }

    public function authLogin(Request $request): RedirectResponse
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if (Auth::guard('customer')->attempt($credentials)) {
                $request->session()->regenerate();

                if ($request->has('remember')) {
                    $customer_id = Customer::where('email', $request->get('email'))->value('customer_id');
                    Cookie::queue('remember', $customer_id, 43200);
                }
                $customer = Customer::where('email', $request->get('email'))->first();

                return redirect()->action([HomeController::class, 'index'], $customer);
            }
            $error = "Email doesn't exist on our records";
            session()->flash('errors', $error);
        }

        $remember = Cookie::get('remember');

        if (!empty($remember)) {
            $customer = Customer::where('customer_id', $remember)->first();
            return redirect()->action([HomeController::class, 'index'], $customer);
        }

        return redirect()->route('login');
    }
}
