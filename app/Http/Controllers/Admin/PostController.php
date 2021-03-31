<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::latest()->with(['category'])->paginate(20);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function edit(Post $post) {
        $this->authorize('view', $post);
        $categories = Category::all();
        return view('admin.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function destroy(Post $post) {
        $this->authorize('delete', $post);
        $post->delete();
        return back()->with('success', 'Post successfully deleted');
    }

    public function update(Post $post, StorePostRequest $request) {
        $validatedData = $request->validated();
        $this->authorize('update', $post);
        $post->update($validatedData);
        return redirect()->route('admin.posts.index')->with('success', 'Post successfully updated');
    }


}
