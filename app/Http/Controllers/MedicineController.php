<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // if(Auth::guard('admin')->check()){
        // $userId = Auth::guard('admin')->user()->id;
        // $medicines = Medicine::where('admin_cashiers_id',$userId)->get();
        if (Auth::guard('admin')->check()) {
            $medicines = Medicine::all();
            return view('AdminCashier.Medicine.index', compact('medicines'));
        } else if (Auth::guard('cashier')->check()){
            $medicines = Medicine::all();
            return view('Cashier.Medicine.index', compact('medicines'));
        }
        return redirect('/');
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
        // Check if medicine with the given ID already exists
        $existingData = Medicine::where('id', $request->id)->first();

        if ($existingData) {
            session()->flash('fail', 'Save Data Failed! Medicine with this ID already exists.');
            return redirect('admin/medicines');
        } else {
            // Get the authenticated admin cashier's ID

            // Create a new Medicine instance and fill it with data
            $data = new Medicine();
            $data->admin_cashiers_id = 1;
            $data->name = $request->name;
            $data->desc = $request->desc;
            $data->expire = $request->expire;
            $data->purchase_price = $request->purchase_price;
            $data->selling_price = $request->selling_price;
            $data->stock = $request->stock;

            // Handle image upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/medicines'), $imageName);
                $data->image = 'images/medicines/' . $imageName;
            }

            // Save the new medicine record to the database
            $data->save();

            session()->flash('success', 'Save Data Successfully!');
            return redirect('/admin/medicines');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the existing medicine record by ID
        $data = Medicine::where('id', $id)->first();

        // Update the medicine record with the new data from the request
        $data->name = $request->name;
        $data->desc = $request->desc;
        $data->expire = $request->expire;
        $data->purchase_price = $request->purchase_price;
        $data->selling_price = $request->selling_price;
        $data->stock = $request->stock;

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($data->image && file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }

            // Upload the new image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/medicines'), $imageName);
            $data->image = 'images/medicines/' . $imageName;
        }

        // Save the updated medicine record to the database
        $data->save();

        // Set a success message and redirect to the medicines page
        session()->flash('success', 'Edit Data Successfully!');
        return redirect('admin/medicines');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Medicine::where('id', $id);
        $data->delete();
        session()->flash('success', 'Delete Data Successfully!');
        return redirect('admin/medicines');
    }

    public function search(Request $request)
    {
        $query = $request->input('q');

        // Lakukan pencarian berdasarkan nama obat atau deskripsi obat
        $medicines = Medicine::where('name', 'like', '%' . $query . '%')
            ->orWhere('desc', 'like', '%' . $query . '%')
            ->get();

        // Format data hasil pencarian sesuai kebutuhan
        $results = [];
        foreach ($medicines as $medicine) {
            $results[] = [
                'id' => $medicine->id,
                'name' => $medicine->name,
                'desc' => $medicine->desc,
                'selling_price' => $medicine->selling_price,
                'expire' => $medicine->expire,
                'image' => $medicine->image,
                'delete_url' => url('admin/' . $medicine->id . '/delete-medicine'), // URL untuk menghapus obat
            ];
        }

        return response()->json($results);
    }

    public function expireMedicine()
    {
        $today = Carbon::today();

        $expireMedicine = Medicine::whereDate('expire', $today)->get();

        return view('AdminCashier.ExpireMedicine.index', compact('expireMedicine'));
    }

    
}
