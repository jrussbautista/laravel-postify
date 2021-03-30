<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function store(Post $post, Request  $request) {

        if($post->favoritedBy($request->user())) {
            return back()->with('error', 'You already favorited this post!');
        }

        $post->favorites()->create([
            'user_id' => auth()->id()
        ]);

        return back()->with('success', 'Added to favorites!');
    }

    public function destroy(Post $post, Request $request) {

        auth()->user()->favorites()->where('post_id', $post->id)->delete();

        return back()->with('success', 'Removed to favorites!');
    }
}
