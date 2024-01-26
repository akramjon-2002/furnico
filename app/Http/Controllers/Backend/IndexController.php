<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::query()->count();
        $products = Product::query()->count();
        $categories = Category::query()->count();
        $carts = Cart::query()->count();
        return view('admin.main.index', compact('users', 'products', 'categories', 'carts'));
    }
}
