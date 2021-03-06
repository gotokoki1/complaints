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
        $category = new Category;
        $categories = $category->getLists()->prepend('夫・彼氏の良い所', '妻・彼女の良い所', '夫・彼氏への不満', '妻・彼女への不満', 'その他');

        return view('post.create', ['categories' => $categories]);
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

    public function edit($post_id)
    {
        $category = new Category;
        $categories = $category->getLists();

        $post = Post::findOrFail($post_id);
        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(PostRequest $request)
    {
        $savedata = [
            'name' => $request->name,
            'sunject' => $request->sunject,
            'message' => $request->message,
            'category_id' => $request->category_id,
        ];

        $post = new Post;
        $post->fill($savedata)->save();

        return redirect('/post')->with('poststatus', '投稿を編集しました');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->comments()->delete();
        $post->delete();

        return redirect('post')->with('poststatus', '投稿を削除しました');
    }
}
