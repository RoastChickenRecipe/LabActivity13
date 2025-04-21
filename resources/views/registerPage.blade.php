@extends('layouts')
@section('title', 'Register')
@section('content')
    <form method="POST" action="{{route('registers.store')}}">
        @csrf
        <h1>Register</h1>

        <div class="row mt-3">
            <div class="col col-6">
                <input name="name" placeholder="Name" required class="form-control">
            </div>
            <div class="col col-6">
                <input name="email" type="email" placeholder="Email" required class="form-control">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col col-6">
                <input name="password" type="password" placeholder="Password" required class="form-control">
            </div>
            <div class="col col-6">
                <input name="password_confirmation" type="password" placeholder="Confirm Password" required class="form-control">
            </div>
        </div>

        <div class="row mt-5 justify-content-center">
            <div class="col col-8">
                <button type="submit" class="btn btn-primary w-100"><h4>Register</h4></button>
            </div>
            <div class="col col-8 mt-3 text-center">
                <a href="{{route('show.login')}}"><p>Login</p></a>
                
            </div>
        </div>
    </form>
@endsection