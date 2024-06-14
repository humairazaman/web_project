<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            border: 2px solid #333;
            width: 400px;
            margin: 50px auto;
            background-color: #ffd699;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container form {
            text-align: center;
            margin-top: 20px;
        }

        h2 {
            background-color: #ffa31a;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"] {
            padding: 5px;
            margin-bottom: 15px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body class="body_style">
    <div class="container">
        <form action="{{URL::to('/file_store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>Uploading File</h2>
            <label for="">Please Upload file here</label><br>
            <input type="file" name="file"><br>
            <button type="submit" class="button_style">Submit</button>
        </form>
    </div>
</body>

</html>
