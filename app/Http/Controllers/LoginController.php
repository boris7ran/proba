<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function __construct() {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('auth.login');
    }

    public function store()
    {
        $name = request('name');
        $password = request('password');

        if (auth()->attempt(['name' => $name, 'password' => $password])) {
            
            // Authentication passed...
            return redirect()->route('all-post');
        }

        \Log::info($name);

        return back()->withErrors(['message' => 'Bad credentials. Please try again']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/posts');
    }
}