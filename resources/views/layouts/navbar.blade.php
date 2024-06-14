<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-p73VJcBc9cdY9mOWnp5z67O+ZvbwPCVxEAgw08JZUv2xe2fFg4mtZC8AsGqFCDKg5iWw2Z0/ZR90IdsgdznUw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .navbar1 {
            background-color: black;
            border-radius: 40px;
            overflow: hidden;
            color: white;
        }

        .navbar1 a {
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            position: relative;
        }

        .dpmenu {
            background-color: black;
        }

        .dpmenu a {
            color: white;
        }
    </style>
</head>

<body>
    <div class="navbar1">
        <nav class="navbar navbar-expand-lg">
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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('email-form') }}">Send Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mails.manage') }}">Manage Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mails.subscribe') }}">Subscribe Email</a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('drama.display') }}">Exit Admin</a>
                    </li>
                </ul>
            </div>
        </nav>
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
