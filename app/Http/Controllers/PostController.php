<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

    // public function authorPosts(User $author){
    //     return view('posts.index', [
    //         'posts' =>  $author->posts
    //     ]);
    // }

    public function store(PostRequest $request){
        $data = $request->validated();
        Post::create($data);
        return view('posts.store');
    }
}
