<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TV Drama Schedule</title>
    <style>
        .body {
            position: relative;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        .body::before {
            content: "";
            background: url('/Hum.jpg') center/cover fixed no-repeat;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 40%;
            z-index: -1;
        }

        .border {
            border: 0px solid black;
        }

        /* *************************************************************************************** */
        .card-div {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            width: 100%;
            height: 100%;
            padding: 20px;
            justify-items: end;
        }

        .card-container {
            width: 341px;
        }

        .card-body {
            padding: 1.25rem;
        }

        .image-container {
            width: 294px;
            height: 200px;
        }

        .image-container img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .card-container {
            background-color: black;
            color: white;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="body">
        <div class="container">
            @include('layouts.navbar')


            <div class=" card-div" id="dramaInfo">
                @foreach ($dramas as $drama)
                    <div class="card-container">
                        <div class="card-body ">
                            <div class="image-container">
                                <img src="{{ asset('pro/' . $drama->image) }}" alt="Drama Image" class="img-fluid mb-2">
                            </div>
                            <h5 class="text-center lead" style="font-size: 2rem; font-weight: bold;">{{ $drama->name }}
                            </h5>

                            <button type="button" class="btn btn-success">
                                <a href="{{ route('admin.drama.edit', ['id' => $drama->id]) }}"
                                    style="color: white; text-decoration: none;">
                                    Edit Drama
                                </a>
                            </button>
                            <button type="button" class="btn btn-warning">
                                <a href="{{ route('episode.manage', ['drama' => $drama->id]) }}"
                                    style="color: black; text-decoration: none;">
                                    View Drama
                                </a>
                            </button>

                            <form action="{{ route('admin.drama.destroy', ['id' => $drama->id]) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </div>
                    </div>
                @endforeach
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
