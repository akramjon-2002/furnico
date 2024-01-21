<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function confirm(Cart $cart)
    {

        $cart->update([
            'status' => true,
            'confirmed' => true,
        ]);

        return redirect()->back()->with('success', 'Order confirmed successfully');
    }



    public function index()
    {
        $carts = Cart::all();
        return view('admin.carts.index', compact('carts'));
    }
}
