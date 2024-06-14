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
            position: fixed;
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

        /* *************************************************************************************** */
        .navbar-container {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.02);
        }

        .navbar1 {
            background-color: black;
            border-radius: 40px;
            overflow: hidden;
        }

        .navbar1 a {
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            position: relative;
        }

        .navbar1 a::after {
            content: "";
            display: block;
            height: 2px;
            width: 0;
            background-color: red;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.1s ease;
        }

        .navbar-nav a:hover::after,
        .navbar-nav a.active::after {
            width: 85%;
            transition: width 0.3s ease;
        }

        /* *************************************************************************************** */
        .navbar2 {
            background-color: black;
            border-radius: 40px;
            overflow: hidden;
        }

        .navbar2 a {
            color: white;
            text-align: center;
            padding: 14px;
            text-decoration: none;
            position: relative;
        }

        .navbar2 a::after {
            content: "";
            display: block;
            height: 2px;
            width: 0;
            background-color: red;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            transition: width 0.1s ease;
        }

        .navbar-nav a:hover::after,
        .navbar-nav a.active::after {
            width: 85%;
            transition: width 0.3s ease;
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
        <a href="{{ route('drama.subscribe') }}" style="text-decoration: none;">
            <marquee behavior="scroll" direction="left" scrollamount="5"
                style="background-color: rgb(203, 50, 50);  color: white;">
                Click here to subscribe for new upcoming drama news.
            </marquee>
        </a>
        <div class="container">

            <div class="navbar-container ">
                <div class="navbar1">
                    <nav class="navbar navbar-expand-lg">
                        <div class="navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" onclick="setDayActive(this)">Monday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setDayActive(this)">Tuesday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setDayActive(this)">Wednesday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setDayActive(this)">Thursday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setDayActive(this)">Friday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setDayActive(this)">Saturday</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setDayActive(this)">Sunday</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="navbar2">
                    <nav class="navbar navbar-expand-lg">
                        <div class="navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" onclick="setTimeActive(this)">7 PM</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setTimeActive(this)">8 PM</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setTimeActive(this)">9 PM</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="setTimeActive(this)">10 PM</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>

            <div class="card-div" id="dramaInfo">
                <div class="card-container">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function setActive(element, navbarClass) {
            var navElement = element.closest(navbarClass);
            var links = navElement.getElementsByTagName('a');
            for (var i = 0; i < links.length; i++) {
                links[i].classList.remove('active');
            }
            element.classList.add('active');
            updateDramaInfo();
        }

        function setDayActive(element) {
            setActive(element, '.navbar1');
            $('#dramaInfo').html(
                '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
            );

        }

        function setTimeActive(element) {
            setActive(element, '.navbar2');
            $('#dramaInfo').html(
                '<div class="spinner-border text-primary" role="status"><span class="sr-only">Loading...</span></div>'
            );

        }

        function updateDramaInfo() {
            var activeDay = $('.navbar1 a.active').text();
            var activeTime = $('.navbar2 a.active').text();
            var firstLetter = activeTime.split(' ')[0];


            $.ajax({
                url: `/drama/${activeDay}/${firstLetter}`,
                type: 'GET',
                success: function(data) {
                    console.log(data);

                    var dramaInfoElement = $('#dramaInfo');
                    dramaInfoElement.empty();

                    if (data.length === 0) {
                        var defaultCard = `
                <div class="card-container">
                    <div class="card-body">
                        <h6 class="card-title">No Record found for ${activeDay} at ${firstLetter} PM</h6>
                    </div>
                </div>
            `;
                        dramaInfoElement.append(defaultCard);
                    } else {
                        var cards = data.map(drama => `
                <div class="card-container">
                    <div class="card-body">
                        <div class="image-container">
                            <img src="/pro/${drama.image}" alt="Drama Image" class="img-fluid mb-2">
                        </div>
                        <h5 class="text-center lead" style="font-size: 2rem; font-weight: bold;">${drama.name}</h5>
                        <a onclick="redirectToEditDrama(${drama.id})" class="btn btn-warning text-center" style="color: black; font-weight: bold; text-decoration: none;">
                            View Drama
                        </a>


                    </div>
                </div>
            `);
                        dramaInfoElement.append(cards.join(''));
                    }
                },
            });

        }

        function redirectToEditDrama(dramaId) {
            window.location.href = `http://127.0.0.1:8000/drama/detail/${dramaId}`;

        }
        $(document).ready(function() {
            $('.navbar1 a:contains("Monday")').addClass('active');
            $('.navbar2 a:contains("7 PM")').addClass('active');
            updateDramaInfo();
            setInterval(updateDramaInfo, 3000);
        });
    </script>

</body>

</html>
