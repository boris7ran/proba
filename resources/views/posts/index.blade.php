@extends('layouts.master')

@section('title', 'List of posts')

@section('content')
    

<ul>
    @foreach ($posts as $post)
        <li><a href=" {{ '/posts/' . $post->id}}">{{ $post->title }}</a></li>
    @endforeach
</ul>

@endsection
