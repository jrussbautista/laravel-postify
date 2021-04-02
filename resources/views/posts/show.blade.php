@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="mt-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif



        <div class="card mb-2">
            <div class="card-body">
                <h1>{{ $post->title }}</h1>
                <p>
                    {{ $post->description }}
                </p>
                <p>{{ $post->favorites->count() }}
                    user  {{ Str::plural('favorite', $post->favorites->count()) }} this.
                </p>
                <p class="text-muted"> Posted on {{ $post->created_at->diffForHumans() }}</p>
                <p> Posted by <strong>{{ $post->user->name }}</strong></p>
                <p>
                   Category: {{ $post->category->name }}
                </p>
                <div class="d-flex align-items-center">
                    @auth
                        <div class="me-3">
                            @if($post->favorited)
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

                    @can('update', $post)
                    <a class="btn btn-primary me-3" href="{{ route('posts.edit',  $post->id) }}"> Edit </a>
                    @endcan

                    @can('delete', $post)
                    <form method="POST" class="mb-0 me-3" action="{{ route('posts.destroy', $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"> Delete </button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>

        <div class="card mb-2">
            <div class="card-body">
                <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="body" id="body" class="mb-1"> Comment: </label>
                        <textarea name="body" id="" cols="5" rows="5" class="form-control @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        <div class="invalid-feedback mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>
                </form>
                @foreach($post->comments as $comment)
                    <div class="mb-3">
                        <p>{{ $comment->body }}</p>
                        <p>By {{ $comment->user->name }}</p>
                        <p>{{ $comment->created_at->diffForHumans() }}</p>

                        @auth

                        <div class="d-flex align-items-center" >

                            @can('delete', $comment)
                                <form class="mb-0" action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"> Delete </button>
                                </form>
                            @endcan
                        </div>
                        @endauth
                        <hr />
                    </div>

                @endforeach
            </div>


        </div>

        <div class="mt-3">
            {{ $post->comments->links() }}
        </div>

    </div>

@endsection
