<?php

namespace App\Http\Controllers;

use App\Models\Cashier;
use App\Models\History;
use App\Models\Medicine;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index()
    {
        $cartItems = session()->get('cart', []);

        $totalCost = 0;
        foreach ($cartItems as $item) {
            $totalCost += $item['totalCost'];
        }

        $cashier = Cashier::all();

        return view('Cashier.Cart.index', compact('cartItems', 'totalCost', 'cashier'));
    }


    public function saveCart(Request $request)
    {
        $cartItems = $request->input();
        $cart = session()->get('cart', []);

        foreach ($cartItems as $item) {
            $productId = $item['product_id'];
            $quantity = $item['quantity'];

            // Validasi apakah produk tersedia dan stok mencukupi
            $product = Medicine::findOrFail($productId);
            if ($quantity > $product->stock) {
                return response()->json(['success' => false, 'message' => 'Stok tidak mencukupi.'], 400);
            }

            // Tambahkan atau perbarui item di keranjang
            if (isset($cart[$productId])) {
                $cart[$productId]['id'] = $productId;
                $cart[$productId]['name'] = $product->name;
                $cart[$productId]['desc'] = $product->desc;
                $cart[$productId]['expire'] = $product->expire;
                $cart[$productId]['purchase_price'] = $product->purchase_price;
                $cart[$productId]['selling_price'] = $product->selling_price;
                $cart[$productId]['image'] = $product->image;
                $cart[$productId]['stock'] = $product->stock;
                $cart[$productId]['quantity'] = $quantity;
                $cart[$productId]['totalCost'] = $product->selling_price * $quantity;
            } else {
                $cart[$productId] = [
                    'id' => $productId,
                    'name' => $product->name,
                    'desc' => $product->desc,
                    'expire' => $product->expire,
                    'purchase_price' => $product->purchase_price,
                    'selling_price' => $product->selling_price,
                    'image' => $product->image,
                    'stock' => $product->stock,
                    'quantity' => $quantity,
                    'totalCost' => $product->selling_price * $quantity,
                ];
            }
        }

        session()->put('cart', $cart);

        return response()->json(['success' => true, 'message' => 'Keranjang berhasil disimpan']);
    }

    public function update(Request $request)
    {
        $cartItems = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Validasi jumlah yang diminta
        if ($quantity <= 0) {
            return response()->json(['success' => false, 'message' => 'Jumlah barang harus lebih besar dari nol.'], 400);
        }

        // Validasi apakah produk ada di keranjang
        if (!isset($cartItems[$productId])) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan di keranjang.'], 404);
        }

        // Validasi stok
        $product = Medicine::findOrFail($productId);
        if ($quantity > $product->stock) {
            return response()->json(['success' => false, 'message' => 'Stok tidak mencukupi.'], 400);
        }

        // Update jumlah barang di keranjang
        $cartItems[$productId]['quantity'] = $quantity;
        $cartItems[$productId]['totalCost'] = $product->selling_price * $quantity;
        session()->put('cart', $cartItems);

        $totalCost = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['totalCost'];
        }, 0);


        return response()->json([
            'success' => true,
            'message' => 'Keranjang berhasil diupdate',
            'updatedItem' => $cartItems[$productId],
            'totalCost' => $totalCost
        ]);
    }

    public function delete($id)
    {
        $productId = $id;
        $cartItems = session()->get('cart', []);

        // Validasi apakah produk ada di keranjang
        if (!isset($cartItems[$productId])) {
            return response()->json(['success' => false, 'message' => 'Produk tidak ditemukan di keranjang.'], 404);
        }

        // Hapus item dari keranjang
        unset($cartItems[$productId]);
        session()->put('cart', $cartItems);

        return redirect('/cashier/cart');
    }

    public function checkout(Request $request)
    {
        $cartItems = session()->get('cart', []);

        if (empty($cartItems)) {
            return redirect('/cashier/cart');
        }

        foreach ($cartItems as $item) {
            $product = Medicine::findOrFail($item['id']);

            // Validasi stok
            if ($item['quantity'] > $product->stock) {
                return response()->json(['success' => false, 'message' => 'Stok tidak mencukupi untuk produk: ' . $product->name], 400);
            }

            // Kurangi stok
            $product->stock -= $item['quantity'];
            $product->save();

            // Simpan ke History
            History::create([
                'medicine_id' => $item['id'],
                'date' => Carbon::now(),
                'type' => 'In',
                'amount' => $item['quantity'],
                'price' => $item['selling_price'] * $item['quantity'] ,
            ]);
        }

        // Kosongkan keranjang setelah checkout
        session()->forget('cart');

        return redirect('/cashier/cart');
    }
}
