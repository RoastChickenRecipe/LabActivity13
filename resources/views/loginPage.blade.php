@extends('layouts')
@section('title', 'Login')
@section('content')
    <form method="POST" action="{{route('login')}}">
        @csrf
        <h1>Login</h1>

        <div class="row mt-3 justify-content-center">
            <div class="col col-9">
            <input name="email" type="email" placeholder="Email" required class="form-control">
            </div>
            <div class="col col-9 mt-4">
            <input name="password" type="password" placeholder="Password" required class="form-control">
            </div>
        </div>


        <div class="row mt-5 justify-content-center">
            <div class="col col-8">
                <button type="submit" class="btn btn-primary w-100"><h4>Login</h4></button>
            </div>
            <div class="col col-8 mt-3 text-center">
                <p>Don't have an Account? <a href="{{route('show.register')}}">Sign Up</a></p>
            </div>
        </div>
    </form>
@endsection