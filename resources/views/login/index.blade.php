@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin">

                {{-- Flash Message [Register Success] --}}
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Flash Message [Login Failed] --}}
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                {{-- Form Login --}}
                <form action="/login" method="post">
                    @csrf

                    {{-- Buat Tempat Logo --}}
                    <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email"
                            placeholder="name@example.com" value="{{ old('email') }}" autofocus required>
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                            required>
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-3">Not Registered? <a href="/register" class="text-decoration-none">
                        Register Now</a></small>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </main>
        </div>
    </div>
@endsection
