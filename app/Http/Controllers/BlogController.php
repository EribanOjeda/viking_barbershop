<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')->latest('published_at')->paginate(6);
        return view('blog.index', compact('posts'));
    }

    public function show(Post $post)
    {
        abort_if(is_null($post->published_at), 404);
        return view('blog.show', compact('post'));
    }
}
