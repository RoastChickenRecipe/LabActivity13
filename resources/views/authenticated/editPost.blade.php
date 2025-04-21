@extends('layouts')
@section('title', 'Edit Post')
@section('content')
    
    
    <h4>Edit: {{$data->title}}</h4>

    

    <form action="{{route('blogs.update', $data->id)}}" method="post">
        @csrf
        @method('put')
        <div class="row mt-3">
            <div class="col col-6">
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{$data->title}}" class="form-control">
                
            </div>
            <div class="col col-12 mt-2">
                <input type="text" name="body" value="{{$data->body}}" placeholder="Body" class="form-control">
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col col-6">
                <button type="submit" class="btn btn-secondary w-100">Save</button>
            </div>
            <div class="col col-6">
                <a href="{{route('blogs.index')}}" class="btn btn-dark w-100">Cancel</a>
            </div>
        </div>
    </form>



@endsection