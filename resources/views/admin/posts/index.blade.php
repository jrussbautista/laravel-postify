@extends('layouts.admin')

@section('title', 'Posts')

@section('content')

        <div>
            <h2> Posts </h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td style="max-width: 300px">{{ $post->description }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary me-3"> Edit </a>
                                <form class="mb-0" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger "> Delete </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>

        </div>


@endsection
