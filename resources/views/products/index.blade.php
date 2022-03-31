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
        .table td,
        .table th {
            vertical-align: middle
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1>All Products</h1>
        <div class="my-3">
            <form action="{{ route('products.index') }}" method="get">
                <div class="input-group mb-3">
                    <select name="col">
                        <option value="name">Name</option>
                        <option value="price" selected>Price</option>
                        <option value="discount">Discount</option>
                    </select>
                    <input type="text" class="form-control" name="keyword" value="{{ request()->keyword }}" placeholder="Search by anything">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </div>
            </form>
        </div>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img width="80" src="{{ $product->image }}" alt=""></td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $products->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            // $('table').DataTable();
        } );
    </script>
</body>
</html>
