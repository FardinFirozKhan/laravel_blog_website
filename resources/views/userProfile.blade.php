<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div>
            <nav class="navbar bg-light">
                <form action="/logout" method="post" class="container-fluid justify-content-start">
                 @csrf
                    <button class="btn btn-outline-success me-2" type="submit">Logout</button>
                </form>
              </nav>
        </div>
        <h1>Create New Post</h1>
        <form action="/post" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Your Title">
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Write The blog</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button type="submit" class="btn btn-primary">Post</button>
              </div>

        </form>
    </div>
    <div class="container">
        <h1 >Your Posts</h1>
        @foreach ($posts as $post)
        <h3>{{$post['title']}}</h3>
        <a href="{{url('/update')}}/{{$post['post_id']}}" class="btn btn-success">Update</a>
        <a href="{{url('/delete')}}/{{$post['post_id']}}" class="btn btn-danger">Delete</a>
        <p>{{$post['description']}}</p>
    @endforeach
    </div>
</body>
</html>