<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Products</title>
    <style>
        .card {
            height: 100%;
        }
        .card img {
            height: 200px;
            object-fit: cover;
            object-position: top;
        }
        .card .card-text {
            min-height: 50px;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <div class="container my-5">
        <h1 class="text-center">All Products</h1>

        <div class="row justify-content-center text-center">
            @foreach ($products as $product)
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <img src="{{ asset('uploads/images/'. $product->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->name }}</h5>
                      {{-- <p class="card-text">{{ Str::substr($product->description, 0, 20) . '...' }}</p> --}}
                      <p class="card-text">{{ Str::words($product->description, 5, '...')}}</p>
                      <a href="{{ route('single_products', $product->id) }}" class="btn btn-primary">Read More</a>
                      {{-- @dump($product->images) --}}
                    </div>
                  </div>
            </div>
            @endforeach

        </div>
    </div>

</body>
</html>
