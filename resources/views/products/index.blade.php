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
    {{-- <section style="height: 1000px"></section> --}}

    {{-- @dump(session('msg')) --}}


    <div class="container my-5">
        @if (session('msg'))
        <div class="alert alert-success">
            <p class="m-0">{{ session('msg') }}</p>
        </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h1>All Products</h1>
            <a href="{{ route('products.create') }}" class="btn btn-dark px-5">Add new product</a>
        </div>

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
        {{-- {{ $products->count() }} --}}

        <div class="content-wrapper">
            @include('products._table');
        </div>
{{--
        <a href="{{ route('show_msg') }}" id="btn" class="btn btn-success">Load Data From Controller</a>
        <p id="show_msg"></p> --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        // @if (session('msg'))
        // $('html, body').animate({
        //     scrollTop: $('.alert-success').offset().top
        // }, 700)
        // @endif

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        @if (session('msg'))
        Toast.fire({
        icon: 'success',
        title: '{{ session("msg") }}'
        })
        @endif

        $(document).ready( function () {
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                var btn = $(this);
                var del_url = $(this).attr('href');

                var empty_tr = `<tr>
                        <td colspan="7" class="text-center">No Data Found</td>
                    </tr>`;

                if(confirm('Aru you sure?!')) {
                    $.ajax({
                        type: 'post',
                        url: del_url,
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'delete'
                        },
                        success: function(res) {
                            // btn.parent().parent().remove();
                            Toast.fire({
                                icon: 'success',
                                title: res
                            })
                            btn.parents('tr').remove();
                            if($('table tbody tr').length == 0) {
                                $('table tbody').append(empty_tr);
                            }
                        }
                    })
                }
                // console.log(url);

                // alert(99);
            })


            // $('table').DataTable();

            /*

            $(selctor).event(function() {
                action
            })

            */

            // $('#btn').click(function(e) {
            //     e.preventDefault();

            //     $.ajax({
            //         type: 'get',
            //         url: '{{ route("show_msg") }}',
            //         success: function(aa) {
            //             $('#show_msg').text(aa);
            //         }
            //     })

            //     // alert(5);
            // })

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


            $('form').submit(function(e) {
                e.preventDefault();
            })

            $('input[name=keyword]').keyup(function(e) {
                // e.preventDefault();
                var data = $(this).parents('form').serialize();
                console.log(data);

                $.ajax({
                    type: 'get',
                    url: '{{ route("mohammed_naji") }}',
                    data: data,
                    success: function(res) {
                        $('.content-wrapper').html(res);
                    }
                })
            })





        } );
    </script>
</body>
</html>
