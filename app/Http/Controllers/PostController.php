<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(){

        return view('posts.index', [
            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()
        ]);
    }

    // Route Model Binding
    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }


    public function create(){
        $categories = Category::all();
        return view('admin.posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(PostRequest $request){
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);
        $data['thumbnail'] = $request->file('thumbnail')->store('');

        Post::create($data);

        return back()->with('success', 'Post create successfully');
    }
}
