@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="mt-5">
        <div class="card">
            <div class="card-body">
                <h1>{{ $post->title }}</h1>
                <div>
                    {{ $post->description }}
                </div>
                <p> Posted on {{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

    </div>

@endsection
