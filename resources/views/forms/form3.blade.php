<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form 3</title>
</head>
<body>

    <div class="container">
        <h1>Form 3</h1>
        <form action="{{ route('form3_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Iamge</label>
                <input type="file" name="image" class="form-control" />
            </div>

            <button class="btn btn-dark">Upload</button>
        </form>

    </div>

</body>
</html>
