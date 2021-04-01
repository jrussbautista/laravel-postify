@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <div class="mt-5">
        <h1> Login </h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
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
            <div class="mb-3 form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label"  for="remember">Remember me?</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <div class="mt-3">
            <a class="btn btn-primary" href="{{ route('social.auth.redirect', 'google') }}"> Log in with google </a>
            <a class="btn btn-primary" href="{{ route('social.auth.redirect', 'facebook') }}"> Log in with facebook </a>
        </div>
    </div>

@endsection
