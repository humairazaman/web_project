<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Form</title>
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
            margin-top: -60px;
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


            <div class="parent-container">
                <div class="container1">
                    <form action="{{ route('send.email') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="to">To:</label>
                            <input type="email" class="form-control" name="to" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Body:</label>
                            <textarea class="form-control" name="body" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="attachment">Attachment:</label>
                            <input type="file" class="form-control-file" name="attachment"
                                accept=".pdf, .doc, .docx, .txt, .jpg, .jpeg, .png" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Email</button>
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
