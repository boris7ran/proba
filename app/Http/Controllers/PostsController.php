<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        if (!auth()->check()){
            return view('auth.login');
        }
        $posts = Post::published();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        \Log::info($post);
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        if (!auth()->check()){
            return view('auth.login');
        }
        
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);
        $post = Post::create(request()->all());
        return redirect()->route('all-post');
    }
}
