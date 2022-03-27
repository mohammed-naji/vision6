<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form 4</title>
</head>
<body>

    <a href="http://127.0.0.1:8000/uploads/images/vision6_1324498688_1648171136_53780199.JPG" download>Download Image</a>

    <div class="container">
        <h1>Form </h1>
        @include('forms.errors')
        <form action="{{ route('form4_submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" />
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" />
            </div>

            <button class="btn btn-dark">Send</button>
        </form>

    </div>

</body>
</html>
