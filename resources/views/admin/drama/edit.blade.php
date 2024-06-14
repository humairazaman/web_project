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

    <title>Edit Drama</title>
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
            width: 800px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .parent-container {
            margin-top: 150px;
            max-width: 1200px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            /* Adjust this based on your layout */
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="container">
            @include('layouts.navbar')
            <h2 class="text-center" style="color:white;">Edit Drama</h2>


            <div class="parent-container">
                <div class="container1">
                    <form action="{{ route('admin.drama.update', ['id' => $drama->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label>Drama name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $drama->name) }}" />

                            <label>Day</label>
                            <select name="day" class="form-control">
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <option value="{{ $day }}"
                                        {{ old('day', $drama->day) == $day ? 'selected' : '' }}>
                                        {{ $day }}</option>
                                @endforeach
                            </select>

                            <label>Time</label>
                            <select name="time" class="form-control">
                                @for ($hour = 7; $hour <= 10; $hour++)
                                    <option value="{{ $hour }}"
                                        {{ old('time', $drama->time) == $hour ? 'selected' : '' }}>
                                        {{ $hour }} pm</option>
                                @endfor
                            </select>

                            <label>Male Lead</label>
                            <input type="text" name="male_lead" class="form-control"
                                value="{{ old('male_lead', $drama->male_lead) }}" />

                            <label>Female Lead</label>
                            <input type="text" name="female_lead" class="form-control"
                                value="{{ old('female_lead', $drama->female_lead) }}" />

                            <label>Writer</label>
                            <input type="text" name="writter" class="form-control"
                                value="{{ old('writter', $drama->writter) }}" />

                            <label>Producer</label>
                            <input type="text" name="producer" class="form-control"
                                value="{{ old('producer', $drama->producer) }}" />

                            <label>Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">


                            @if ($drama->image)
                                <img src="{{ asset('pro/' . $drama->image) }}" alt="Current Drama Image"
                                    style="max-width: 100px; margin-top: 10px;">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-outline-dark">Update</button>
                    </form>
                </div>
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
