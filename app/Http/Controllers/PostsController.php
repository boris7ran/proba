<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
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
        /*if (!auth()->check()){
            return view('auth.login');
        } */
        
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), Post::STORE_RULES);
        $post = new Post;

        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->user()->id;
        $post->published = request('published');

        $post->save();

        return redirect()->route('all-post');
    }
}
