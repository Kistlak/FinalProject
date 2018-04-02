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

    <title>
        @include('layouts.title')
    </title>

    <style>
        .sf {
            color: #3c763d;
            bottom: 20px;
            position: fixed;
            right: 30px;
            z-index: 10;
            animation: flash-message 25s forwards;
        }

        @keyframes flash-message {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                display: red;
            }
        }

    </style>

@include('layouts.BackToTop')

</head>

@include('layouts.AdminPanelLogout')

@include('layouts.AdminNav')

<body>

<div class="container"> <!-- Start Of The Container Class -->

    <div class="row"> <!-- Start Of The Row Class -->

        @yield('content')

    </div> <!-- End Of The Row Class -->

</div> <!-- End Of The Container Class -->

<!-- Footer -->
@include('layouts.AdminFooter')
<!-- End Of The Footer -->

</body>
</html>