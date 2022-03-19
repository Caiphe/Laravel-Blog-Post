<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function edit(Post $post){
        return view('admin.posts.edit', [
            'post' => $post,
        ]);
    }

    public function update(PostRequest $request,Post $post){
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = Str::slug($data['title']);

        if($data['thumbnail'] ?? false){
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnail');
        }

        $post->update($data);
        return back()->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post){
        $post->delete();
        return back()->with('success', 'Post updated successfully');
    }
}
