<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;
use Symfony\Component\Routing\Route;

class AuthenticateController extends Controller
{
    public function view_login(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function view_register(): Response
    {
        return Inertia::render('Auth/Registration');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('customer')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        Cache::forget('customer_id_'.auth()->id());

        if (Cookie::has('remember')) {
            Cookie::queue(Cookie::forget('remember'));
        }

        return redirect()->route('login');
    }

    public function authRegister(Request $request): Response|RedirectResponse
    {
        if ($request->isMethod("POST")) {
            $credentials = $request->validate([
                'username' => 'required|max:30|unique:customer,username',
                'email' => 'required|email|unique:customer,email',
                'password' => 'required'
            ], [
                'username.unique' => 'This username is already taken',
                'email.email' => 'Please enter a valid email address',
                'email.unique' => 'This email address is already registered on our records'
            ]);

            if (Auth::validate($credentials)) {
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

                return redirect()->route('login');
            }

            return Inertia::render('Auth/Registration', ['errors' => 'Something went wrong']);
        }

        return Inertia::render('Auth/Registration');
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
                $customer = Customer::query()->where('email', $request->get('email'))->first();
                $token = $customer->createToken('customer-token')->plainTextToken;

                if ($request->has('remember')) {
                    Cookie::queue('remember', $customer->customer_id, 43200);
                }
                Cache::put('customer_id', $customer->customer_id, now()->addDays(2));

                return redirect()->route('home');
            }

            return Inertia::render('Auth/Login', ['errors' => "Email doesn't exist on our records"]);
        }

        $remember = Cookie::get('remember');

        if (!empty($remember)) {
            $customer_id = Customer::query()->where('email', $request->get('email'))->get()->value('customer_id');
            Cache::put('customer_id', $customer_id, now()->addDays(2));

            return redirect()->route('home');
        }

        return Inertia::render('Auth/Login');
    }
}
