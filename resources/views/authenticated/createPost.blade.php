@extends('layouts')
@section('title', 'Create Post')
@section('content')
    
    
    <h1>Create Post</h1>

    <form action="{{route('blogs.store')}}" method="post">
        @csrf
        <div class="row mt-3">
            <div class="col col-6">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{old('title')}}" class="form-control">
                <input type="text" name="getId" hidden value="{{$getId}}">
                
            </div>
            <div class="col col-12 mt-2">
                <input type="text" name="body" value="{{old('body')}}" placeholder="Body" class="form-control">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100">Post</button>
            </div>
            <div class="col col-6">
                <a href="{{route('blogs.index')}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </form>



@endsection