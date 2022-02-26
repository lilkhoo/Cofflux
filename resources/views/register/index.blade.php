@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin">
                <form action="/register" method="post">
                    @csrf
                    {{-- Buat Tempat Logo --}}
                    <h1 class="h3 mb-3 fw-normal text-center">Register</h1>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                            placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                            placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control @error('email') is-invalid @enderror" name="password"
                            id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Have An Account ? <a href="/login"
                        class="text-decoration-none">
                        Login</a></small>
            </main>
        </div>
    </div>
@endsection
