<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home() {
    $post = Post::with('user')->get();
    return view('home', compact('post'));
    }
}
