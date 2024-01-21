<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Services\ProductImageUploadService;
use Illuminate\Console\Application;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    public function store(ProductRequest $request, ProductImageUploadService $imageUploadService)
    {
        $data = $request->validated();
        $images = $data['images'];
        unset($data['images']);
        $product = Product::create($data);

        if ($images) {
            $uploadedImages = $imageUploadService->uploadImage($images);
            ProductPhoto::create(['product_id' => $product->id, 'photo_path' => $uploadedImages]);
        }

        return redirect()->route('backend.product.index')->with('success', 'Product successfully created');
    }


    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));

    }

    public function update(ProductRequest $request, ProductImageUploadService $imageUploadService, Product $product)
    {
        $data = $request->validated();
        $images = $data['images'];
        unset($data['images']);
        $product->update($data);
        if ($images) {
            $uploadedImages = $imageUploadService->uploadImage($images);
            ProductPhoto::create(['product_id' => $product->id, 'photo_path' => $uploadedImages]);
        }
        return redirect()->route('backend.product.index')->with('success', 'Product successfully updated');
    }

    public function delete(Product $product)
    {

        $photos = $product->photos;
        foreach ($photos as $photo) {
            Storage::delete($photo->photo_path);
            $photo->delete();
        }
        $product->delete();
        return redirect()->route('backend.product.index')->with('success', 'Product deleted successfully');
    }

}
