<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CompanyReview;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function shop()
    {
        $products = Product::paginate(8);
        return view('product.shop', compact('products'));
    }


    public function about()
    {
        $reviews = CompanyReview::all();
        return view('product.about', compact('reviews'));
    }


    public function contact()
    {
        return view('product.contact');
    }


    public function show(Product $product)
    {

        return view('product.show', compact('product'));
    }

}
