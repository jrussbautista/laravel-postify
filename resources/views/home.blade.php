@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="mt-5">
        <div>
            <h2> Recent Posts </h2>


            @if($latestPosts->count() > 0)
            <div class="row">
                @foreach($latestPosts as $post)
                    <div class="col-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('posts.show', $post->id)  }}">
                                    <div class="card-title">{{ $post->title }}</div>
                                    <p>{{ $post->favorites->count() }}
                                        user  {{ Str::plural('favorite', $post->favorites->count()) }} this.
                                    </p>
                                    <p class="text-muted"> Posted on {{ $post->created_at->diffForHumans() }}</p>
                                </a>

                                <p> Posted by <strong>{{ $post->user->name }}</strong></p>
                                @auth
                                    <div class="me-3">
                                        @if($post->favoritedBy(auth()->user()))
                                            <form method="POST" action="{{ route('posts.favorites.destroy', $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <i class="bi bi-heart-fill"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('posts.favorites.store', $post->id) }}">
                                                @csrf
                                                <button type="submit">
                                                    <i class="bi bi-heart"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div>
                {{ $latestPosts->links() }}
            </div>
             @else
                <div class="alert alert-info mt-3">  There are no post. </div>
            @endif
        </div>
    </div>

@endsection
