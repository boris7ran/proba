<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ["title", "body", "published"];

    const STORE_RULES = ['title' => 'required', 'body' => 'required | min:15'];

    public static function published()
    {
        return self::where('published', true)->get();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
