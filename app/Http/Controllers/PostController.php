<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('post.index', [
            'posts' => $posts
            ]);
    }

    public function show(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', [
            'post' => $post
        ]);
    }
}
