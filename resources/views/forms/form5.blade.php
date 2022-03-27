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
    <title>Form 5</title>
</head>
<body>

    <div class="container">
        <h1>Form 5</h1>

        {{-- @dump($errors->any()) --}}
        {{-- @dump($errors->all()) --}}
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        @include('forms.errors')

        <form action="{{ route('form5_submit') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" type="text" />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" type="email" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password" autocomplete="new-password" />
                @error('password')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input name="password_confirmation" class="form-control" placeholder="Confirm Password" type="password" autocomplete="new-password" />
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" placeholder="Bio" rows="5"></textarea>
                @error('bio')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-primary">Register</button>
            {{-- <input type="submit" > --}}

        </form>

    </div>

</body>
</html>
