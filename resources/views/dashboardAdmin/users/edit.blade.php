@extends('dashboardAdmin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>


    {{-- Form Create --}}
    <div class="col-lg-8">

        <form action="/dashboard/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $user->name) }}" required autofocus>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="roles" class="form-label">Role</label>
                <input type="hidden" class="form-control" id="roles" name="roles"
                    value="{{ old('roles', $user->roles) }}">
                <select class="form-select" name="roles">
                    @php
                        $roles = ['kasir', 'manager', 'admin'];
                    @endphp
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" selected>{{ $role }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('name') is-invalid @enderror" id="password"
                    name="password" required autofocus>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add User</button>
        </form>

    </div>
@endsection
