<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // $categories = config('category.categories');

        // if (!is_null($category_id)) {
        //     $posts = Post::where('category_id', $category_id)->orderBy('created_at', 'desc')->paginate(10);
        // } else {
        //     $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // }
        
 
        return view('post.index', [
            'posts' => $posts,
            // 'categories' => $categories,
            // 'category_id' => $category_id
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
        $categories = config('category.categories');

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
        $categories = config('category.categories');

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

    // public function getCategory() {
    //     return config('category.categories.' .$this->category.categories_id);
    // }
}
