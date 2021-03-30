@extends('layouts.app')

@section('title', 'Register')

@section('content')

    <div class="mt-5">
        <h1> Register </h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    aria-describedby="nameHelp"
                    value="{{ old('name' )}}"
                >
                @error('name')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input
                    type="email"
                    class="form-control @error('password') is-invalid @enderror"
                    id="exampleInputEmail1"
                    name="email"
                    aria-describedby="emailHelp"
                    value="{{ old('email' )}}"
                >
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                @error('email')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    id="exampleInputPassword1"
                >
                @error('password')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
