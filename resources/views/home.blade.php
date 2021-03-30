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
                                <a href="{{ route('posts.show', $post->id)  }} ">
                                    <div class="card-title">{{ $post->title }}</div>
                                    <p> Posted on {{ $post->created_at->diffForHumans() }}</p>
                                </a>
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
