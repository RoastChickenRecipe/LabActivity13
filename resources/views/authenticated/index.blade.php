<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('Blogs')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>

    .sidepanel{
        position: sticky;
        background-color: rgb(61, 141, 122);
        top: 50px;
        border: solid 2px black;
        border-radius: 10px;
        padding: 5px;
    }

    .outline{
        background-color: rgb(179, 216, 168);
        border: solid 2px black;
        border-radius: 10px;
        padding: 5px;

    }

    .post-outline{
        background-color: rgb(163, 209, 198);
        border: solid 2px black;
        border-radius: 10px;
        padding: 5px;

    }
    .post-bg{
        background-color: rgb(251, 255, 228);
        border: solid 2px black;
        border-radius: 10px;
        padding: 5px;

    }

</style>
<body>
    <div class="container-fluid vh-100">
            <div class="row justify-content-center h-100">

                <div class="col col-3">
                    <div class="sidepanel">

                        
                        <div class="row m-0 justify-content-center">

                            <div class="col col-12 outline">
                                <h4>Hello, {{$user->name}}</h4>
                            </div>
                            <div class="col col-12 outline mt-3">
                                <a href="{{route('blogs.create')}}" class="btn btn-dark w-100"><h4>Create Post</h4></a>
                            </div>

                        </div>
                        

                        <div class="outline mt-5">
                            <div class="row m-0">
                                <div class="col justify-content-center">
                                    <form action="{{route('logout')}}" method="post" class="m-0">
                                        @csrf
                                        <button type="submit" class="btn btn-dark w-100"><h4>Logout</h4></button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <div class="col col-6" style="margin-top: 50px;">
                    <div class="card shadow">
                        <div class="card-body">

                            @foreach($userData as $row)
                                <div class="post-outline mt-4">
                                    <div class="post-bg row m-0 justify-content-center">
                                        <div class="col col-8 outline text-center">
                                            <h4>{{$row->title}}</h4>
                                        </div>
                                        <div class="col col-12 outline mt-3">
                                            <h4>{{$row->body}}</h4>
                                        </div>
                                    </div>
                                    <div class="post-bg row m-0 mt-3">
                                        <div class="col col-6">
                                            <a href="{{route('blogs.edit', $row->id)}}" class="btn btn-dark w-100"><h5>Edit</h5></a>
                                        </div>
                                        <div class="col col-6">
                                            <form action="{{route('blogs.destroy', $row->id)}}" method="post" class="m-0">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger w-100"><h5>Delete</h5></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            

                        </div>
                    </div>

                    
                </div>

                

            </div>
            
            
        </div>
    </div>
    
</body>
</html>