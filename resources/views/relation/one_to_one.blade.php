<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Serial</th>
            <th>Wife</th>
            <th>Husband</th>
            <th>Expire</th>
        </tr>

        @foreach ($insurances as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->serial }}</td>
            <td>{{ $item->wife }}</td>
            {{-- <td>{{ $item->user ? $item->user->name : 'متوفي'}}</td> --}}
            <td> {{-- @dump($item->user) --}}  {{ $item->user->name ?? 'غير موجود'}}</td>
            <td>{{ $item->expire }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
