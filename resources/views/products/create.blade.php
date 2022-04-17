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
</head>
<body>


    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Add New Product</h1>
            {{-- <a href="{{ route('mohammed_naji') }}" class="btn btn-dark px-5">Return Back</a> --}}
            <a onclick="history.back()" class="btn btn-dark px-5">Return Back</a>
        </div>

        @include('forms.errors')

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name">
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Gallery</label>
                <input type="file" name="gallery[]" multiple class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" placeholder="Name" rows="5">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label>Discount</label>
                <input type="number" name="discount" class="form-control" placeholder="Discount" value="{{ old('discount') }}">
            </div>

            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control" >
                    <option disabled selected>--Select--</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="discount" class="form-control" placeholder="Discount" value="{{ old('discount') }}"> --}}
            </div>
            <button class="btn btn-success">Add</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.1/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('msg'))
            Swal.fire({
            title: 'Good job!',
            text: '{{ session("msg") }}',
            icon: '{{ session("icon") }}'
        });
        @endif

        // tinymce.init({
        //   selector: 'textarea'
        // });
      </script>
</body>
</html>
