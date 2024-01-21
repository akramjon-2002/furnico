<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }


    public function delete(Comment $comment)
    {

        $comment->product()->dissociate();
        $comment->user()->dissociate();
        $comment->save();
        $comment->delete();

        return redirect()->route('backend.comments.index')->with('success', 'Comment deleted successfully');
    }

}
