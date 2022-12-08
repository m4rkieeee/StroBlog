<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
// define $post and merge it with User from Post.php, then return the view with the variable
{
    public function home() {
    $post = Post::with('user')->get();
    return view('home', compact('post'));
    }
    public function createPost() {

            return view('create');
    }

    public function storePost(Request $request) {

        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        return redirect('/')->with('status', 'data inserted');
    }
    public function getPost($id) {
        $post = Post::with('user')->find($id);
        return view('post', compact('post'));
    }
    public function editPost($id) {
        $post = Post::with('user')->find($id);
        return view('edit', compact('post'));
    }
    public function updatePost(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('editTitle');
        $post->text = $request->input('editPost');
        $post->update();
        return redirect('/post/'.$post->id)->with('status', "Data updated!");
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/')->with('status', "Data deleted!");

    }
}
