<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $latestPosts = Post::latest()->with(['favorites',  'user'])->orderBy('created_at', 'desc')->paginate(10);

        return view('home', [
            'latestPosts' => $latestPosts
        ]);

    }
}
