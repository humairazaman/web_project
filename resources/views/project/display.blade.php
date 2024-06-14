<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Display</title>
    <style>
        body {
            font-family: "Open Sans", sans-serif;
        }

        .border {
            border: 0px solid black;
        }

        .project-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            width: 100%;
            padding: 20px;
            justify-items: end;
        }

        .project {
            width: max-content;
            border: 1px solid #ddd;
            margin: 10px;
            padding: 15px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Center items horizontally */
            justify-content: center;
            /* Center items vertically */
        }

        .image-container {
            width: 266px;
            height: 250px;
        }

        .image-container img {
            height: 100%;
            width: 100%;
            object-fit: contain;
        }

        .product-detail {}
    </style>
</head>

<body>
    <div class="project-container">
        @foreach ($project as $p)
            <div class="project border">
                <div class="image-container border">
                    <img class="image" src="{{ asset('pro/' . $p->file) }}" alt="{{ $p->name }}">
                </div>
                <div class="project-detail ">
                    <strong>Name: </strong>
                    {{ $p->name }}
                    <br>
                    <strong>Day: </strong>
                    {{ $p->day }}
                    <br>
                    <strong>Time: </strong>
                    {{ $p->time }}
                    <br>
                    <strong>Actor: </strong>
                    {{ $p->actor }}
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
