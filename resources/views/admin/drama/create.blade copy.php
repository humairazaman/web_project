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
    <title>Create Drama</title>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.drama.display') }}">Display all Drama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.drama.manage') }}">Manage all Drama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.drama.create') }}">Create new Drama</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Manage Email
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('email-form') }}">Send Email</a>
                            <a class="dropdown-item" href="{{ route('mails.manage') }}">Manage Email</a>
                            <a class="dropdown-item" href="{{ route('mails.subscribe') }}">Subscribe Email</a>

                        </div>
                    </li>

                </ul>
            </div>
        </nav>
        <form action="/admin/drama/store" method="POST" enctype="multipart/form-data">


            @csrf
            <div class="form-group">
                <label>Drama name</label>
                <input type="text" name="name" class="form-control" />

                <label>Day</label>
                <select name="day" class="form-control">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>

                <label>Time</label>
                <select name="time" class="form-control">
                    <option value="7">7 pm</option>
                    <option value="8">8 pm</option>
                    <option value="9">9 pm</option>
                    <option value="10">10 pm</option>
                </select>

                <label>Male Lead</label>
                <input type="text" name="male_lead" class="form-control" />

                <label>Female Lead</label>
                <input type="text" name="female_lead" class="form-control" />

                <label>Writer</label>
                <input type="text" name="writter" class="form-control" />

                <label>Producer</label>
                <input type="text" name="producer" class="form-control" />
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control-file" name="image"
                        accept=".pdf, .doc, .docx, .txt, .jpg, .jpeg, .png" required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-dark">Submit</button>
        </form>
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
