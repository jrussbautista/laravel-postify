@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<div class="mt-5">
    <h1> List of Posts </h1>
    <div class="row">
        @foreach($posts as $post)
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

</div>

@endsection
