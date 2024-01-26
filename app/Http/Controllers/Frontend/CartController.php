<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $carts = $user->carts()->withCount(['cartItems as quantity' => function ($query) {
            $query->select(DB::raw('SUM(quantity)'));
            $query->groupBy('product_id');
        }])->get();  // Получить корзины с предварительно загруженными количествами

        $products = [];
        foreach ($carts as $cart) {
            foreach ($cart->cartItems->groupBy('product_id') as $productId => $groupedCartItems) {
                // Проверить, есть ли продукт уже в массиве $products
                if (!isset($products[$productId])) {
                    $product = Product::find($productId);
                    $quantity = $cart->quantity;  // Получить предварительно загруженное количество
                    $products[$productId] = [
                        'product' => $product,
                        'quantity' => $quantity,
                    ];
                } else {
                    // Уже есть продукт в массиве, увеличиваем количество
                    $products[$productId]['quantity'] += $cart->quantity;
                }
            }
        }

        return view('cart.index', compact('products'));
    }

// Удалить функцию getTotalQuantities, так как она больше не нужна





    public function add(Request $request, $productId)
    {
        try {

            $user = Auth::user();
            $cart = $user->cart;
            if (!$cart) {
                $cart = Cart::create(['user_id' => $user->id]);
            }
            $quantity = $request->input('quantity', 1);
            $existingItem = $cart->cartItems()->where('product_id', $productId)->first();

            if ($existingItem) {
                $existingItem->update(['quantity' => $existingItem->quantity + $quantity]);
            } else {
                $cart->cartItems()->create(['product_id' => $productId, 'quantity' => $quantity]);
            }
            return redirect()->route('frontend.cart.index')->with('success', 'Mahsulot savatchaga muvaffaqqiyatli qoshildi');
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }



    public function itemCount()
    {
        $user = Auth::user();
        $itemCount = $user->cart ? $user->cart->cartItems()->count() : 0;

        return response()->json(['itemCount' => $itemCount]);
    }




    //delete from cart

    public function removeFromCart(Request $request, $productId)
    {
        try {
            $user = Auth::user();
            $carts = $user->carts;

            foreach ($carts as $cart) {
                $cartItem = $cart->cartItems()->where('product_id', $productId)->first();

                if ($cartItem) {
                    $cartItem->decrement('quantity');

                    if ($cartItem->quantity <= 0) {
                        $cartItem->delete();
                    }

                    return response()->json(['success' => true, 'message' => 'Mahsulot savatchadan muvaffaqqiyatli o\'chirildi']);
                }
            }

            return response()->json(['success' => false, 'message' => 'Mahsulot savatchada topilmadi']);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['success' => false, 'message' => 'Xatolik yuz berdi: ' . $e->getMessage()]);
        }
    }



    public function getCartData()
    {
        try {
            $user = Auth::user();
            $cart = $user->carts->first();

            if (!$cart) {

                return [];
            }

            $cartItems = $cart->cartItems();

            $products = [];
            $totalAmount = 0;

            foreach ($cartItems as $cartItem) {
                $product = $cartItem->product;
                $quantity = $cartItem->quantity;
                $price = $product->price;
                $total = $quantity * $price;

                $products[] = [
                    'id' => $product->id,
                    'price' => $price,
                    'quantity' => $quantity,
                    'total' => $total,
                ];

                $totalAmount += $total;
            }

            return [
                'cartHtml' => $products,
                'totalAmount' => $totalAmount,
            ];
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
