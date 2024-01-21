<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }


    public function show($category)
    {
        $category = Category::query()->find($category);
        return view('admin.categories.show', compact('category'));
    }


    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->route('backend.category.index')->with('success', 'Category created successfully');
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $category)
    {

        $category = Category::findOrFail($category);
        if (!$category) {
            return redirect()->route('backend.category.index')->with('error', 'Category not found');
        }
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('backend.category.index')->with('success', 'Category updated successfully');
    }


    public function delete($category)
    {

        $category = Category::query()->find($category);
        if (!$category) {
            return redirect()->route('backend.category.index')->with('error', 'Category not found');
        }

        $category->delete();
        return redirect()->route('backend.category.index')->with('success', 'Category deleted successfully');
    }

}
