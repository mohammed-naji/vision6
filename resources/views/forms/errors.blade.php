@if($errors->any())
    <div class="alert alert-danger">
        {{-- <p>في خطا ي باشا</p> --}}
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
