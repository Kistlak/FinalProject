<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img\Logo\WisdomIcon.jpg">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/about.css">

    <!-- Bootstrap -->
    <!-- <link href="assets/bootstrap.min.css" rel="stylesheet">
    <script src="assets/bootstrap.min.js"></script> -->

    <title>
        @include('layouts.title')
    </title>

    <style>

        .btnhome {
            background-color: #4CAF50;
            border: none;
            color: white;
            height: 54px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            cursor: pointer;
            margin-left: 200px;
            width: 800px;
        }

        .btnhome:hover {
            background-color: #002147;
            color: white;
        }

        .thumbnail {
            width: 300px;
            height: 600px;
        }

    </style>

@include('layouts.BackToTop')

</head>

@if (Auth::check())
    @include('layouts.NavAuth')
@endif

@include('layouts.NavMain')
<body>

@include('layouts.slides')

<div class="container"> <!-- Start Of The Container Class -->

    <div class="row text-center"> <!-- Start Of The Row Class -->

        @yield('content')

    </div> <!-- End Of The Row Class -->

</div> <!-- End Of The Container Class -->

<!-- Footer -->
@include('layouts.footer')
<!-- End Of The Footer -->

</body>
</html>