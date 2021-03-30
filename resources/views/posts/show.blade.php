@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="mt-5">

        <div class="card">
            <div class="card-body">
                <h1>{{ $post->title }}</h1>
                <p>
                    {{ $post->description }}
                </p>
                <p> Posted on {{ $post->created_at->diffForHumans() }}</p>
                <p>
                   Category: {{ $post->category->name }}
                </p>
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <i class="bi bi-heart"></i>
                        <i class="bi bi-heart-fill"></i>
                    </div>
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
    </div>

@endsection
