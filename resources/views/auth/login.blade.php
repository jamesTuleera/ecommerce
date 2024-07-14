@extends('layouts.auth')
@section('content')
    <h4>Welcome back!</h4>
    <h6 class="font-weight-light">Sign in to continue.</h6>
    <form class="pt-3" action="{{ route('login') }}" method="POST"> @csrf

        <div class="error">
            {{-- @if ($errors->any()) --}}
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="mb-4 d-flex justify-content-between align-content-center">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input" name="remember"> Remember me </label>
            </div>
            <div class="forget-password">
                <a href="{{ route('password.request') }}" class="font-weigh-light ">Forgot your password?</a>
            </div>
        </div>
        <div class="mt-3 d-grid gap-2">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="">Login</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> Dont't have an account? <a href="{{ route('register') }}"
                class="text-primary">Register</a>
        </div>
    </form>
@endsection
