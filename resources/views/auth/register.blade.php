@extends('layouts.auth')
@section('content')
    <h4>New here?</h4>

    <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
    <form class="pt-3" action="{{ route('register') }}" method="POST">
        @foreach ($errors->all() as $error)

            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control form-control-lg" id="exampleInputUsername1" placeholder="Fullname">
        </div>
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
        </div>
        
        <div class="form-group">
            <input type="phone" name="phone" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Phone number">
        </div>


        <div class="form-group">
            <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
        </div>


        <div class="form-group">
            <input type="password" name="password_confirmation" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Confirm password">
        </div>

        <div class="mb-4">
            <div class="form-check">
                <label class="form-check-label text-muted">
                    <input type="checkbox" class="form-check-input"> I agree to all Terms & Conditions </label>
            </div>
        </div>
        <div class="mt-3 d-grid gap-2">
            <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN UP</button>
        </div>
        <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}"
                class="text-primary">Login</a>
        </div>
    </form>
@endsection
