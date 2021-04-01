<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index() {
        $posts = Post::latest()->with(['favorites',  'user'])->orderBy('created_at', 'desc')->paginate(10);
        return  view('posts.index', ['posts' => $posts ]);
    }

    public function show(Post $post) {
        $comments = $post->comments()->with(['user'])->paginate(10);
        $post['comments'] = $comments;

        return view('posts.show', ['post' => $post]);
    }

    public function create() {
        $categories = Category::all();
        return view('posts.create', [
            'categories' => $categories
        ]);
    }

    public function store(StorePostRequest $request) {
        $post = auth()->user()->posts()->create($request->only('title', 'description', 'category_id'));
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function edit(Post $post) {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('posts.edit', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(Post $post, StorePostRequest $request) {
            $validatedData = $request->validated();
            $this->authorize('update', $post);
            $post->update( $validatedData);
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
