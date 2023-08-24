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
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" value="{{$posts['title']}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Write The blog</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{ $posts->description }}</textarea>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>

    </form>
</body>
</html>