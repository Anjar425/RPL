<?php

namespace App\Http\Controllers;

use App\Models\AdminCashier;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminCashierController extends Controller
{
    public function loginForm()
    {
        return view('AdminCashier.login');
    }

    public function registerForm()
    {
        return view('AdminCashier.register');
    }

    // public function register_Form()
    // {
    //     return view('AdminCashier.registerdua');
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            /** @var \App\Models\AdminCashier $admin **/
            $admin = Auth::guard('admin')->user();
            $token = $admin->createToken('MyApp')->plainTextToken;

            // Store the token for later use, if needed
            session(['token' => $token]);

            return redirect()->intended('/admin/medicines')->withSuccess('Logged in successfully');
        }

        return redirect()->intended('admin/register')->withSuccess('Logged in Failed');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admin_cashiers',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $admin = AdminCashier::create($input);

        event(new Registered($admin));

        return redirect('/admin/login');
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } else if (Auth::guard('cashier')->check()) {
            Auth::guard('cashier')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->withSuccess('Logged out successfully');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminCashier $adminCashier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminCashier $adminCashier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminCashier $adminCashier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminCashier $adminCashier)
    {
        //
    }
}
