@extends('layouts.master')


@section('title', $post->title)

@section('content')


    <h1>
        {{$post->title}}
    </h1>
    <p>
        {{ $post->body }}
    </p>
    @if(count($post->comments))
        <h4> Comments </h4>

        <ul class="list-group">
            @foreach ($post->comments as $comment)            
            <li class="list-group-item"> 
                <p>{{ $comment->author }} </p>
                <p>{{ $comment->description }}</p>
            </li>
            @endforeach
        </ul>
    @endif
    <form method="POST" action="{{ route('comments-post', ['post_id' => $post->id]) }}">
        @csrf

        <div class="form-group">
            <label for="author"> Author </label>
            <input type="text" id="author" name="author">
        </div>

        <div class="form-group">
            <label for="description"> Description </label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <button type="submit">Submit</button>

        </div>

    </form>
@endsection