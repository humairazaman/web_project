<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{$data->filename}}</title>
    <style>
        .back_style {
            border-radius: 6px;
            box-shadow: 5px 5px 5px 5px gray;
            background-color: lightgoldenrodyellow;
            padding-left: 48%;
        }
    </style>
</head>

<body>
    <iframe height="500vh" width="100%" src="/uploads/{{$data->file}}" frameborder="2"></iframe>
    <div class="back_style"><a href="/show">BACK</a></div>

</body>

</html>