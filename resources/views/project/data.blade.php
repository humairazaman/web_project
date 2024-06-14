<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add data</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Add Record</h2>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ session('status') }}
                    </div>
                @endif
                <form action="/project/store" method="post" class="p-4" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name:</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="day" class="font-weight-bold">Day</label>
                        <input type="text" id="day" name="day" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="time" class="font-weight-bold">Time</label>
                        <input type="text" id="time" name="time" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="actor" class="font-weight-bold">Actor</label>
                        <input type="text" id="actor" name="actor" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="file" class="font-weight-bold">Image:</label>
                        <input type="file" name="file" class="form-control-file">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts at the end of the body element -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
