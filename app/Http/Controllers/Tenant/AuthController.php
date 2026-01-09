<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        $user = Auth::user();
        // You can access tenant info
        $tenant = $user->tenant;

        return redirect()->intended('/tenant/dashboard'); // create tenant dashboard later
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}
  
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|confirmed|min:6',
    ]);

    // Create tenant
    $tenant = Tenant::create([
        'id' => uniqid('tenant_'), // generate unique tenant id
           'name' => $request->name,
        'data' => json_encode(['created_by' => $request->email])
    ]);


    // Create user linked to tenant
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'tenant_id' => $tenant->id,
    ]);

    // Redirect to login or dashboard
    return redirect()->route('tenant1.login')->with('success', 'Account created successfully');
}
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('tenant1.login');
}
}
