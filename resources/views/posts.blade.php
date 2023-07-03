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


    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>TITLE</th>
            <th>CONTENT</th>
            <th>CATEGORY</th>
            <th>CREATE DATE</th>
        </tr>
        @foreach ($posts as $data)
        <tr>
            <td>{{ $data->id }}</td>
            <td>{{ $data->title }}</td>
            <td>{{ $data->content }}</td>
            <td>{{ $data->category->name }}</td>
            <td>{{ $data->created_at }}</td>
        </tr>
        @endforeach

    </table>


</body>
</html>
