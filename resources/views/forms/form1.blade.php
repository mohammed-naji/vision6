<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Form 1</title>
</head>
<body>

    <div class="container">
        <h1>Basic Form</h1>
        <form action="{{ route('form1_submit') }}" method="POST">
            {{-- <input name="_token" value="{{ csrf_token() }}" type="hidden" /> --}}
            @csrf
            <input class="form-control mb-3" placeholder="Name" name="name" type="text" />
            <input class="form-control mb-3" placeholder="Age" name="age" type="number" />
            <input class="mb-3" placeholder="Age" name="agree" type="radio" /> Agree
            <div class="text-center">
                <button class="btn btn-primary mt-2 w-25">Send</button>
            </div>

        </form>
    </div>

</body>
</html>
