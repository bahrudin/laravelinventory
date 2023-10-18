<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $cekTransaction = null;
        if (session()->has('carts') && !empty(session('carts'))) {
            $cekTransaction = "Selesaikan Transaksi Sebelumnya";
        }
        return view('admins.transactions.index', compact('cekTransaction'));
    }

    public function addItem($id)
    {
        $product = Product::where('code', $id)->first();
        $cart = session()->get('carts', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "product_code" => $product->code,
                "name" => $product->name,
                "price" => $product->price_sale,
                "quantity" => 1,
            ];
        }
        session()->put('carts', $cart);
        return response()->json([
            "status" => true,
            "message" => "success created item",
            "data" => $cart,
        ], 200);
    }

    public function update($id){
        //
    }

    public function deleteItem(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('carts');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('carts', $cart);
            }
            return response()->json([
                "status" => true,
                "message" => "success delete item",
            ], 200);
        }
    }
}
