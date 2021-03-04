<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
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

    public function create()
    {
        return view('post.create');
    }

    public function store(PostRequest $request)
    {
        $savedata = [
            'name' => $request->name,
            'sunject' => $request->sunject,
            'message' => $request->message,
            'category_id' => $request->category_id,
        ];
 
        $post = new Post;
        $post->fill($savedata)->save();
    
        return redirect('/post')->with('poststatus', '新規投稿しました');
    }
}
