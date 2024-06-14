
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body class="body style">
    <table class="table style">
        <tr>
            <th>Name</th>
            <th>View</th>
            <th>Download</th>
        </tr>
        @foreach($data as $data)
        <tr>
            <td>{{$data->file}}</td>
            <td><a href="{{URL:: to('view',$data->id)}}">View</a></td>
            <td><a href="{{URL::to('download_file', $data->file)}}">Download</a></td>
        </tr>
        @endforeach
    </table>
</body>

</html>
