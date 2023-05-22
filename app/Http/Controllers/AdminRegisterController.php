<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class AdminRegisterController extends Controller
{
    public function showRegistrationForm(): Response
    {
        return Inertia::render('Admin/Register');
    }

    public function register(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        (new User)->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Set any other fields for the admin user here
        ]);

        return redirect()->route('dashboard.index');
    }
}
