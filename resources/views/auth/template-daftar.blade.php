@extends('auth.template-induk')

@section('isi-kandungan-utama')

<h2 class="card-title text-center mb-4">Create new account</h2>

<form action="{{ route('login.authenticate') }}" method="post" autocomplete="off" novalidate>
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="Enter name" name="name">
    </div>
    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <div class="input-group input-group-flat">
        <input type="password" class="form-control"  placeholder="Password"  autocomplete="off" name="password">
        <span class="input-group-text">
            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
            </a>
        </span>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-label">Password Confirmation</label>
        <div class="input-group input-group-flat">
        <input type="password" class="form-control"  placeholder="Password"  autocomplete="off" name="password_confirmation">
        <span class="input-group-text">
            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
            </a>
        </span>
        </div>
    </div>
    <div class="mb-3">
        <label class="form-check">
        <input type="checkbox" class="form-check-input"/>
        <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
        </label>
    </div>
    <div class="form-footer">
        <button type="submit" class="btn btn-primary w-100">Create new account</button>
    </div>

</form>
@endsection

@section('isi-kandungan-bawah')
Already have account? <a href="{{ route('login') }}" tabindex="-1">Sign in</a>
@endsection
