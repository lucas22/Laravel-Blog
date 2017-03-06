<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getIndex() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('blog.index')->with('posts', $posts);
    }

    public function getSingle($slug) {
        $post = Post::where('slug', '=', $slug)->first();
        return view('blog.single')->with('post', $post);
    }
}
