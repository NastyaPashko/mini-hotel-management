<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {

        return view('auth.register');
    }
    public function showLoginForm()
    {

        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]
        );
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('staff.dashboard');
                case 'manager':
                    return redirect()->route('staff.dashboard');
                case 'receptionist':
                    return redirect()->route('staff.dashboard');
                case 'client':
                    return redirect()->route('home');
                default:
                    Auth::logout();
                    return redirect('/login')->withErrors(
                        ['email' => 'Role not recognized']
                    );

                
            }
            return redirect('/');
        } else {
            return back()->withErrors(
                [
                    'email' => 'Invalid credentials provided',
                ]
            );
        }
    }
    public function register(Request $request)
    {

        $request->validate(
            [
                'full_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed'
            ]
        );
        $user = User::create(
            [
                'full_name' => $request->full_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'client'
            ]

        );
        Auth::login($user);
        return redirect()->route('home')->with('success', 'Registration completed successfully');
    }
}
