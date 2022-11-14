<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
// define $post and merge it with User from Post.php, then return the view with the variable
{
    public function home() {
    $post = Post::with('user')->get();
    return view('home', compact('post'));
    }
}
