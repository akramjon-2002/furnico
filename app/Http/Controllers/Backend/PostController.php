<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostImageUploadService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }


    public function create()
    {
        return view('admin.posts.create');
    }


    public function store(PostRequest $request, PostImageUploadService $imageService)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $imageService->uploadImage($request->file('image'));
            $data['photo_path'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('backend.post.index')->with('success', 'Post created successfully');
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }


    public function update(PostRequest $request, Post $post, PostImageUploadService $imageService)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = $imageService->uploadImage($request->file('image'));
            $data['photo_path'] = $imagePath;
        }

        $post->update($data);
        return redirect()->route('backend.post.index')->with('success', 'Post updated successfully');
    }


    public function delete(Post $post)
    {
        $post->delete();
        return redirect()->route('backend.post.index')->with('success', 'Post deleted successfully');
    }
}
