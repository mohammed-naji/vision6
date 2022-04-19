<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>All Subjects</title>

</head>
<body>

    <div class="container my-5">
        <h1 class="text-center">Register Subjects : <span>{{ $student->name }}</span></h1>

        {{-- @dump($student->subjects) --}}

        <form action="{{ route('register_subjects_submit') }}" method="POST">
            @csrf
            <table class="table table-striped table-hover table-bordered">
                <tr>
                    <th>
                        <input {{ $subjects->count() == $student->subjects->count() ? 'checked' : '' }} type="checkbox" id="check-all">
                    </th>
                    <th>Name</th>
                    <th>Hours</th>
                </tr>

                @foreach ($subjects as $subject)
                <tr>
                    <td>
                        <input type="checkbox" {{ $student->subjects->find($subject->id) ? 'checked' : '' }} name="register_subject[]" value="{{ $subject->id }}">
                        {{ $subject->id }}
                    </td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->hours }} Hours</td>
                </tr>
                @endforeach
            </table>
            <button class="btn btn-success px-5">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // check-all
        $('#check-all').change(function() {
            $('td input[type=checkbox]').prop('checked', $(this).prop('checked'));
        })
    </script>

</body>
</html>
