<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Post $post, Request $request) {

        $validatedData = $request->validate([
            'body' => 'required'
        ]);

        auth()->user()->comments()->create([
            'post_id' => $post->id,
             'body' => $validatedData['body']
        ]);

        return back()->with('success', 'Successfully added comment to this post!');

    }

    public function destroy(Post $post, Comment $comment) {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', 'Successfully deleted comment to this post!');
    }
}
