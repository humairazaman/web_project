<!DOCTYPE html>
<html>

<head>
    <title>Update Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-header {
            background-color: black;
            color: white;
            font-weight: bold;
            border: none; 
            border-radius: 10px; 
        }

        .form-group label {
            font-weight: bold;
        }

        .card {
            border: none; 
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Update Student Record</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('student.update', $student) }}" method="post" class="p-4">
                    @csrf
                    @method('PUT') 
                    <div class="form-group">
                        <label for="cnic">CNIC:</label>
                        <input type="text" id="cnic" name="cnic" class="form-control" value="{{ $student->cnic ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ $student->name ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" id="address" name="address" class="form-control" value="{{ $student->address ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="telNo">Tel. No.:</label>
                        <input type="text" id="telNo" name="telNo" class="form-control" value="{{ $student->telNo ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="text" id="age" name="age" class="form-control" value="{{ $student->age ?? '' }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
