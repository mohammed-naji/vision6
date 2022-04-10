<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr class="table-dark">
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if ($products->count() > 0)
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td><img width="80" src="{{ asset('uploads/images/'.$product->image) }}" alt=""></td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->category_id }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-danger btn-sm btn-delete"><i class="fas fa-trash"></i></a>
                    {{-- <form class="d-inline delete-form" action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        {{-- <input type="hidden" name="_method" value="delete" />
                        {{ method_field('delete') }} --}}
                        {{-- <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button> --}}
                    {{-- </form> --}}
                </td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="7" class="text-center">No Data Found</td>
            </tr>
        @endif

        {{-- @forelse ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td><img width="80" src="{{ $product->image }}" alt=""></td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount }}</td>
            <td>
                <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button onclick="return confirm('هل انت متاكد اخوي ؟')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No Data Found</td>
        </tr>
        @endforelse --}}

    </tbody>
</table>
{{ $products->appends($_GET)->links() }}
