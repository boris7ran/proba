<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentsController extends Controller
{
    public function store($postId)
    {
        $post = Post::findOrFail($postId);

        $post->comments()->create(request()->all());
        return redirect()->route('single-post', ['id' => $postId]);
    }
}
