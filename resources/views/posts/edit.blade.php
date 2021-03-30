@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

    <div class="mt-5">
        <h1> Edit Post </h1>
        <form method="POST" action="{{ route('posts.update',  $post->id) }}">

            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category"  class="form-control  @error('category_id') is-invalid @enderror">
                    <option value=""> Please select a category</option>
                    @foreach($categories as $category)
                        <option
                            {{ $post->category_id === $category->id ? "selected" : ""  }}
                            value="{{ $category->id }}"
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    name="title"
                    value="{{ old('title' )  ?? $post->title }}"
                >
                @error('title')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    type="text"
                    class="form-control @error('description') is-invalid @enderror"
                    id="description"
                    name="description"
                >{{ old('description' ) ??  $post->description  }}</textarea>
                @error('description')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
