<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-p73VJcBc9cdY9mOWnp5z67O+ZvbwPCVxEAgw08JZUv2xe2fFg4mtZC8AsGqFCDKg5iWw2Z0/ZR90IdsgdznUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Display</title>
    <style>
        .body {
            margin: 0;
            padding: 0;
            height: 50vh;
        }

        .body::before {
            content: "";
            background: url('/Hum.jpg') center/cover fixed no-repeat;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 100%;
            z-index: -1;
        }

        form label {
            font-weight: bold;
            margin-top: 10px;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 6px;
            margin-bottom: 15px;
        }

        .btn-outline-dark {
            background-color: #343a40;
            color: #fff;
            border-color: #343a40;
            transition: all 0.3s ease;
        }

        .btn-outline-dark:hover {
            background-color: #1d2124;
            border-color: #1d2124;
        }

        .container1 {
            width: 1127px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="container">
            @include('layouts.navbar')
            <h2 class="text-center" style="color:white;">All Dramas</h2>

            <div class="container1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Male Lead</th>
                            <th>Female Lead</th>
                            <th>Writer</th>
                            <th>Producer</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dramas as $drama)
                            <tr>
                                <td>{{ $drama->id }}</td>
                                <td>{{ $drama->name }}</td>
                                <td>{{ $drama->day }}</td>
                                <td>{{ $drama->time }}</td>
                                <td>{{ $drama->male_lead }}</td>
                                <td>{{ $drama->female_lead }}</td>
                                <td>{{ $drama->writter }}</td>
                                <td>{{ $drama->producer }}</td>
                                <td>
                                    @if ($drama->image)
                                        <img src="{{ asset('pro/' . $drama->image) }}" alt="Drama Image"
                                            style="max-width: 50px; max-height: 50px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.drama.edit', ['id' => $drama->id]) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('admin.drama.destroy', ['id' => $drama->id]) }}"
                                        method="POST" style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
