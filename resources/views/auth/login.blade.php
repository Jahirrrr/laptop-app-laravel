@extends('layouts.app')

@section('contents')
<div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
    <div class="w-100" style="max-width: 400px; background: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 20px;">
        <div class="text-center mb-4">
            <h2 class="h3 fw-bold text-dark">Login</h2>
            <p class="text-muted">Please login to your account</p>
        </div>

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <span>{{ session('error') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form method="post" action="/">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

            <div class="mt-3 text-center">
                <p class="text-muted">Don't have an account?</p>
                <a href="{{ route('register') }}" class="text-primary text-decoration-underline">Register here</a>
            </div>
        </form>
    </div>
</div>
@endsection
