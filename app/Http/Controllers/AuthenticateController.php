<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function view_login()
    {
        return view('login');
    }

    public function view_register()
    {
        return view('registration');
    }

    public function logout(Request $request)
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        if (Cookie::has('remember')) {
            Cookie::queue(Cookie::forget('remember'));
        }

        return view('login');
    }

    public function authRegister(Request $request)
    {
        if ($request->isMethod("POST")) {
            $request->validate([
                'username' => 'required|max:30|unique:customer,username',
                'email' => 'required|email|unique:customer,email',
                'password' => 'required'
            ], [
                'username.unique' => 'This username is already taken',
                'email.email' => 'Please enter a valid email address',
                'email.unique' => 'This email address is already registered on our records'
            ]);

            $customer = new Customer();
            $customer->username = $request->input('username');
            $customer->email = $request->input('email');
            $customer->password = Hash::make($request->input('password'));
            $customer->firstname = $request->input('firstname');
            $customer->lastname = $request->input('lastname');
            $customer->sex = $request->input('sex');
            $customer->region = $request->input('region');
            $customer->address = $request->input('address');
            $customer->save();

            return view('login');
        }

        return view('registration');
    }

    public function authLogin(Request $request)
    {
        if ($request->isMethod("POST")) {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required']
            ]);

            if (Auth::guard('customer')->attempt($credentials)) {
                $request->session()->regenerate();

                if ($request->has('remember')) {
                    $customer_id = Customer::where('email', $request->get('email'))->first();
                    Cookie::queue('remember', $customer_id, 43200);
                }

                $customer = Customer::where('email', $request->get('email'))->first();
                $home = new HomeController();

                return $home->index($customer);
            }

            return view('login')->with(['error' => "Email doesn't exist on our records"]);
        }

        $remember = Cookie::get('remember');

        if (!empty($remember)) {
            $customer = Customer::where('customer_id', $remember)->first();
            $home = new HomeController();

            return $home->index($customer);
        }

        return view('login');
    }
}
