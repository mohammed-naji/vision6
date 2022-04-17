<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Single Product</title>
    <style>
        .c-nav {
            width: 100px;
            height: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #000;
            color: #fff;
            text-decoration: none;
            position: fixed;
            top: 50%;
            margin-top: -50px;
            transition: all .2s ease;
        }
        .c-nav:hover {
            color: #fff;
        }

        .c-nav:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0,0,0,.4);
            z-index: -1;
        }


        .prev {
            left: -70px;
        }
        .prev:hover {
            left: 0px;
        }

        .next {
            right: -70px;
        }
        .next:hover {
            right: 0px;
        }

        .product-gallery {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product-gallery img {
            width: 120px;
            height: 80px;
            margin: 10px;
            object-fit: contain;
            border: 1px solid #eee;
            padding: 10px;
        }

        #main-image {
            height: 400px;
            object-fit: contain;
        }

        @media (max-width: 767px) {
            .product-gallery li {
                width: 50%;
            }

            .product-gallery img {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    @if ($next_prod)
    <a href="{{ route('single_products', $next_prod->id) }}" class="c-nav next" style="background: url({{ asset('uploads/images/'.$next_prod->image) }}); background-size: cover"> Next</a>
    @endif

    @if ($prev_prod)
    <a href="{{ route('single_products', $prev_prod->id) }}" class="c-nav prev" style="background: url({{ asset('uploads/images/'.$prev_prod->image) }}); background-size: cover"> Previous</a>
    @endif

    <div class="container my-5">
        <h1 class="text-center mb-4">{{ $product->name }}</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <img id="main-image" class="w-100 mb-5" src="{{ asset('uploads/images/'.$product->image) }}" alt="">


                @if ($product->images->count() > 0)
                <ul class="product-gallery">
                    @foreach ($product->images as $image)
                        <li><img onclick="changeImage('{{ asset('uploads/images/'.$image->path) }}')" src="{{ asset('uploads/images/'.$image->path) }}" alt=""></li>
                    @endforeach
                </ul>

                @endif


                {!! $product->description !!}
                {{-- {{  $product->description  }} --}}

                <hr>
                <h2>All Comments ({{ $product->comments->count() }})</h2>

                @foreach ($product->comments as $comment)
                <div>
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>{{ $comment->user->name }}</h4>
                        <small>{{ $comment->created_at->format('d/m/Y') }}</small>
                        {{-- <small>{{ $comment->created_at->format('d M, Y') }}</small> --}}
                    </div>
                    <p>{{ $comment->comment }}</p>
                </div>
                @endforeach

            </div>
        </div>


        </div>
    </div>

    <script>

function changeImage(path) {
    // console.log(path);

    document.querySelector('#main-image').src = path;
}

    </script>
</body>
</html>
