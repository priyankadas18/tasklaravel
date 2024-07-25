<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function dashboard()
    {
        // Fetch the currently authenticated user
        $user = Auth::user();

        // Check if user is authenticated
        if (!$user) {
            return redirect()->route('dashboard');
        }

        return view('backend.dashboard', compact('user'));
    }

    public function signup()
    {

        return view('backend.signup');
    }

    public function store_signup(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'username' => 'required|unique:users',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[0-9]/',
                'regex:/[!@#$%^&*(),.?":{}|<>]/'
            ],
            'dob' => 'required|date',
        ]);

        $user = new User();
        $user->full_name = $request->full_name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->dob = $request->dob;
        $user->profession = $request->profession;
        $user->address = $request->address;
        $user->save();

        return redirect('/signup')->with('success', 'User created successfully');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return redirect()->route('index')->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Logout the user

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        return redirect('/'); // Redirect to login page
    }
}
