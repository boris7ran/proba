@extends('layouts.master')

@section('Title')
    Register New User
@endsection

@section('content')
    <h2 class="blog-post-title">Register New User</h2>

    <form method="POST" action="{{ route('store-register') }}">
        @csrf

        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-group" id="name" name="name">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-group" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-group" id="password" name="password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>

    </form>

    @if (count($errors->all()) >0)

        @foreach ($errors->all() as $error)
            <div class="form-group">
                <div class="alert alert-danger">
                    <li>{{ $error}}</li>
                </div>
            </div>
        @endforeach
    @endif
@endsection