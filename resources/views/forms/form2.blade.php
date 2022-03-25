<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form 2</title>
</head>
<body>

    <div class="container">
        <h1>Form 2</h1>
        <form action="{{ route('form2_submit') }}" method="post">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" class="form-control" name="abcdef" placeholder="Name" required />
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="text" class="form-control" name="age" placeholder="Age" />
            </div>

            <button class="btn btn-danger">Send</button>

        </form>
    </div>

</body>
</html>
