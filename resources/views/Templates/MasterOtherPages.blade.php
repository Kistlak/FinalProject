<html>

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/WisdomIcon.jpg">

    <!-- Styles -->
    <link href="{{ asset('jss/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('jss/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('jss/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('jss/bootstrap-theme.min.css') }}" rel="stylesheet">  
    
    <!-- Scripts -->
    <script src="{{ asset('jss/bootstrap.js') }}"></script>
    <script src="{{ asset('jss/bootstrap,mini.js') }}"></script>
    <script src="{{ asset('jss/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="css/mystyle.css">-->
    
    <script type="text/javascript" src="js\jquery-3.2.1.js"></script>
    
<title>
@include('layouts.title')
</title>

<style>

.about{
	font-family: Times New Roman;
	line-height: 180%;
	font-size:135%;
	text-align: center;
	color:#353c47;
}

.btnhome {
    background-color: #4CAF50;
    border: none;
    color: white;
    height:54px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 20px;
    cursor: pointer;
    margin-left:200px;
    width:800px;
}

.btnhome:hover{
    background-color: #002147;
	color:white;
}

.thumbnail	 

{
	width:300px;
	height:600px;
}

</style>

@include('layouts.BackToTop')

</head>

@include('layouts.NavMain')

<body>

<div class="container"> <!-- Start Of The Container Class -->

<div class="row text-center"> <!-- Start Of The Row Class -->

@yield('content')

</div> <!-- End Of The Row Class -->
		
</div> <!-- End Of The Container Class -->

<!-- Footer -->
@include('layouts.footer')
<!-- End Of The Footer -->

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>    

  </body>
</html>