<!DOCTYPE html>
<html>
<head>
    <title>Add New Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card-header {
            background-color: black;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Add New Student</h2>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('status') }}
                </div>
                @endif
                <form action="/student/store" method="post" class="p-4">
                    @csrf
                    <div class="form-group">
                        <label for="cnic" style="font-weight: bold;">CNIC No.:</label>
                        <input type="text" id="cnic" name="cnic" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="name" style="font-weight: bold;">Full Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" style="font-weight: bold;">Home Address:</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="telNo" style="font-weight: bold;">Telephone No.:</label>
                        <input type="text" id="telNo" name="telNo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="age" style="font-weight: bold;">Age:</label>
                        <input type="text" id="age" name="age" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
