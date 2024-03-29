<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $id = Auth::id();
        $comment = new Comment();
        $comment->body = $request->comment_body;
        $comment->user_id = $id;
        $post = Post::find($request->post_id);
        $post->comments()->save($comment);
        return back();
    }

    public function replyStore(Request $request)
    {
        $id = Auth::id();
        $reply = new Comment();
        $reply->body = $request->comment_body;
        $reply->user_id = $id;
        $reply->parent_id = $request->comment_id;
        $post = Post::find($request->post_id);
        $post->comments()->save($reply);
        return back();
    }
}
