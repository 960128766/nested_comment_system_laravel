<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('nested_comments.post.index', compact('posts'));
    }

    public function create()
    {
        return view('nested_comments.post.post');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect('posts');
    }

    public function show($id)
    {
        $post=Post::find($id);
        return view('nested_comments.post.show',compact('post'));
    }
}
