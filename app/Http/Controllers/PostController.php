<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 
    public function index()
    {
        # code...
        $posts = Post::get(); // all 
        
        return view('posts.index', [
            'posts'=>$posts
        ]);
    }

    // store 
    public function store(Request $request)
    {
        # code...
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();

    }
}
