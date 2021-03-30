@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="mt-5">
        <h1> Dashboard </h1>
        <div>
            <h2> Welcome, {{ auth()->user()->name }}</h2>
        </div>
    </div>

@endsection
