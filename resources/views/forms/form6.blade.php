<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        textarea {
            resize: none;
        }
    </style>
    <title>Form 6</title>
</head>
<body>

    <div class="container">
        <h1>Form 6</h1>
        {{-- @include('forms.errors') --}}

        <form action="{{ route('form6_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" type="text" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input name="age" class="form-control @error('age') is-invalid @enderror" placeholder="Age" type="text" />
                @error('age')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input name="image" class="form-control @error('image') is-invalid @enderror" type="file" />
                @error('image')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary">Send</button>

        </form>

    </div>

</body>
</html>
