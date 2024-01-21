<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CompanyReview;
use App\Models\Post;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $reviews = CompanyReview::all();
        $posts = Post::query()->paginate(3);
        $products = Product::paginate(3);
        return view('product.home', compact('products', 'posts', 'reviews'));
    }
}
