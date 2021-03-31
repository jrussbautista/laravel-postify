@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')

    <div class="mt-5">
        <h1> Edit Post </h1>
        <form method="POST" action="{{ route('admin.users.update',  $user->id) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    name="name"
                    value="{{ old('name' )  ?? $user->name }}"
                >
                @error('name')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    value="{{ old('email' )  ?? $user->email }}"
                >
                @error('email')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select name="role_id" id="role"  class="form-control  @error('role_id') is-invalid @enderror">
                    <option value="}}"> Please select a category</option>
                    @foreach($roles as $role)
                        <option
                            {{ $role->id === $user->role_id ? "selected" : ""  }}
                            value="{{ $role->id }}"
                        >
                            {{ ucfirst($role->name)  }}
                        </option>
                    @endforeach
                </select>
                @error('role_id')
                <div class="invalid-feedback mt-2">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
