<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>

.single-image {
    position: relative;
    display: inline-block;
}

        .single-image img {
            height: 60px;
            object-fit: contain;
        }

        .single-image button {
            background: transparent;
            border: 0;
            font-size: 8px;
            width: 18px;
            height: 18px;
            background: #f00;
            color: #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            right: 0;
            opacity: 0.4;
            transition: all 2s ease;
        }
        .single-image button:hover {
            opacity: 1;
        }
    </style>
</head>
<body>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Update Product <span class="text-danger">{{ $product->name }}</span></h1>
            {{-- <a href="{{ route('mohammed_naji') }}" class="btn btn-dark px-5">Return Back</a> --}}
            <a onclick="history.back()" class="btn btn-dark px-5">Return Back</a>
        </div>

        @include('forms.errors')

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" placeholder="Name">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
                <img class="img-thumbnail mt-1" width="80" src="{{ asset('uploads/images/'.$product->image) }}" alt="">
            </div>

            <div class="mb-3">
                <label>Gallery</label>
                <input type="file" name="gallery[]" multiple class="form-control">

                @foreach ($product->images as $image)
                <span class="single-image">
                    <button data-id="{{ $image->id }}"><i class="fas fa-trash"></i></button>
                    <img class="img-thumbnail mt-1" width="80" src="{{ asset('uploads/images/'.$image->path) }}" alt="">
                </span>
                @endforeach
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Name" rows="5">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price', $product->price) }}">
            </div>

            <div class="mb-3">
                <label>Discount</label>
                <input type="text" name="discount" class="form-control" placeholder="Discount" value="{{ old('discount', $product->discount) }}">
            </div>

            <div class="mb-3">
                <label>Category</label>

                <select name="category_id" class="form-control" >
                    <option disabled selected>--Select--</option>
                    @foreach ($categories as $category)
                    <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="discount" class="form-control" placeholder="Discount" value="{{ old('discount') }}"> --}}
            </div>

            <button class="btn btn-info">Update</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $('.single-image button').click(function(e) {
            // alert(8)

            e.preventDefault();
            var id = $(this).data('id');
            var btn = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: 'post',
                    url: '{{ url("delete-image") }}/'+id,
                    data: {
                        _method: 'delete',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(res) {
                        btn.parent().remove();
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                })


                }
            })


            // if(confirm('Are You Sure?')) {

            // }
        })

        @if (session('msg'))
            Swal.fire({
            title: 'Good job!',
            text: '{{ session("msg") }}',
            icon: '{{ session("icon") }}'
        });
        @endif

        tinymce.init({
          selector: 'textarea'
        });
      </script>
</body>
</html>
