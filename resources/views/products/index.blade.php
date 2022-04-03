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

    {{-- @dump(session('msg')) --}}
    @if (session('msg'))
    <div class="alert alert-success">
        <p class="m-0">{{ session('msg') }}</p>
    </div>
    @endif


    <div class="container my-5">
        <h1>All Products</h1>
        <div class="my-3 row">
            <div class="col-md-9 px-1">
                <form id="search-form" action="{{ route('mohammed_naji') }}" method="get">
                    <input type="hidden" name="sort" id="sort-feild" value="{{ request()->sort??'asc' }}" />
                    <input type="hidden" name="perpage" id="perpage-feild" value="{{ request()->perpage??5 }}" />
                    <input type="hidden" name="page" value="{{ request()->page }}" />
                    <div class="input-group mb-3">
                        <select name="col">
                            <option value="name" {{ request()->col == 'name' ? 'selected' : '' }}>Name</option>
                            <option value="price" {{ request()->col == 'price' ? 'selected' : '' }}>Price</option>
                            <option value="discount" {{ request()->col == 'discount' ? 'selected' : '' }}>Discount</option>
                        </select>


                        <input type="text" class="form-control" name="keyword" value="{{ request()->keyword }}" placeholder="Search by anything">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </div>
                </form>
            </div>
            <div class="col-md-2 px-1">
                <select id="sort" class="form-select">
                    <option value="asc" {{ request()->sort == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request()->sort == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
            {{-- {{ $items_count }} --}}
            <div class="col-md-1 px-1">

                @if ($items_count > 5)
                <select id="perpage" class="form-select">
                    @for ($i = 5; $i <= $items_count; $i+=5)
                    <option value="{{ $i }}" {{ request()->perpage == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @if ($i >= 30)
                        @break
                    @endif
                    @endfor
                    @if ($items_count % 5 != 0 && $i != 30)
                    <option value="{{ $i }}" {{ request()->perpage == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endif
                </select>
                @endif


            </div>
        </div>
        <a href="{{ route('mohammed_naji') }}" class="btn btn-warning">Clear</a>
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
                            {{-- <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                            <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                {{-- @method('delete')
                                <input type="hidden" name="_method" value="delete" /> --}}
                                {{ method_field('delete') }}
                                <button onclick="return confirm('هل انت متاكد اخوي ؟')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

        {{ $products->appends($_GET)->links() }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            // $('table').DataTable();

            $('#sort').change(function() {
                var sort = $(this).val();
                $('#sort-feild').val(sort)
                $('#search-form').submit();
            })

            $('#perpage').change(function() {
                var perpage = $(this).val();
                $('#perpage-feild').val(perpage)
                $('#search-form').submit();
            })

        } );
    </script>
</body>
</html>
