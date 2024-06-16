<?php

namespace App\Http\Controllers;

use App\Models\AdminCashier;
use App\Models\Cashier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
{
    public function loginForm()
    {
        return view('Cashier.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('cashier')->attempt($credentials)) {
            /** @var \App\Models\Cashier $cashier **/
            $cashier = Auth::guard('cashier')->user();
            $token = $cashier->createToken('MyApp')->plainTextToken;

            // Store the token for later use, if needed
            session(['token' => $token]);

            return redirect()->intended('cashier/medicines')->withSuccess('Logged in successfully');
        }

        return redirect()->intended('cashier/login')->withSuccess('Logged in Failed');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $cashier = Cashier::all();
            return view('AdminCashier.Cashier.index', compact('cashier'));
        } else {
            return redirect('/');
        }
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
        $existingEmail = AdminCashier::where('email', $request->email)->first();

        if ($existingEmail) {
            session()->flash('fail', 'Save Data Failed!');
            return redirect('/admin/cashier');
        } else {

            $userId = Auth::guard('admin')->user()->id;

            $data = new Cashier();
            $data->name = $request->name;
            $data->admin_cashiers_id = $userId;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->visible_password = $request->password;


            $data->save();
            session()->flash('success', 'Save Data Successfully!');
            return redirect('/admin/cashier');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cashier $cashier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cashier $cashier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Cashier::where('id', $id)->first();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->visible_password = $request->password;

        $data->save();

        session()->flash('success', 'Edit Data Successfully!');
        return redirect('admin/cashier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cashier $cashier, $id)
    {
        $data = Cashier::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('admin/cashier');
    }
}
