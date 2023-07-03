<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

<h1>For Categories:</h1>
@foreach ($categories as $category)
    <div>
        <h2>{{ $category->name }}</h2>
        @if ($category->latestPost)
            <h3>{{ $category->latestPost->title }}</h3>
            <p>{{ $category->latestPost->content }}</p>
        @else
            <p>No posts available for this category.</p>
        @endif
    </div>
@endforeach
</body>
</html>
