<!DOCTYPE html>
<html>

<head>
    <title>View Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        th,
        td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            font-weight: bold;
            color: red;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 3rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out,
                box-shadow 0.15s ease-in-out;
        }

        .btn:hover {
            color: white;
            background-color: blue;
            border-color: blue;
        }

        .btn-danger {
            font-weight: bold;
            color: #fff;
            background-color: orangered;
            border-color: orangered;
            border-radius: 3rem;
        }

        .btn-danger:hover {
            background-color: red;
            border-color: red;
        }

        .header-red {
            border-radius: 5rem;
            background-color: black;
            text-align: center;
            color: white;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2 class="header-red">View Students</h2>

        @if (session('status'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>
        @endif

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>CNIC No.</th>
                    <th>Full Name</th>
                    <th>Home Address</th>
                    <th>Telephone No.</th>
                    <th>Age</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students ?? [] as $student)
                <tr>
                    <td>{{ $student->cnic }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->telNo }}</td>
                    <td>{{ $student->age }}</td>
                    <td>
                        <a class="btn" href="{{ route('student.edit', $student->getKey()) }}" title="Edit Student">Edit</a>
                        <form action="{{ route('student.destroy', $student->cnic) }}" method="post"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Are you sure to delete the student {{ $student->name }} having CNIC {{ $student->cnic }}?')"
                                title="Delete -> {{ $student->cnic }}">Delete
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
