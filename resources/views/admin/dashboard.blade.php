@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')


        <div>
            <h2> Welcome back Admin, {{ auth()->user()->name }} </h2>

            <div class="row mt-5">
                <div class="col-lg-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <p class="card-title"> Total Posts </p>
                            <p class="mb-0">
                               <strong>{{ $postsCount }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card bg-success text-white">
                        <div class="card-body text-center">
                            <p class="card-title"> Total Users </p>
                            <p class="mb-0">
                                <strong>{{ $usersCount }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
