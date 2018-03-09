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
@include('title')
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

@include('BackToTop')

</head>

@include('NavMain')

<body>

@include('slides')

<div class="container"> <!-- Start Of The Container Class -->

<div class="row text-center"> <!-- Start Of The Row Class -->

<div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->
                
<p class="about"> <!-- Start Of The P About Class -->
<br>
Amazing Cinema is owned and managed by NTKT Films & Theaters Private Limited. It has long been a one of the top end movie entertainment centers in and around Galle city. Amazing Cinema is well equipped with the latest movie technology can accommodate 200 seats. Amazing Cinema currently screen movies in four major languages, namely English and Hindi Movies and the cinema currently screens four movies per day.

</p> <!-- End Of The P About Class --> <br>

            </div> <!-- End Of The Col Class -->
  
<div id="jq">

    <h1>Currently Showing Movies</h1><br>

    @foreach($data as $value )
    <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ $value->filemove }}" alt="">
                    <div class="caption">
                        <h3>{{ $value->mname }}</h3>
                        <h5>{{ $value->fshow }}</h5>
                        <h5>{{ $value->sshow }}</h5>
                        <p>
                            <a href="{{ route('Seats') }}" class="btn btn-primary">Buy Tickets</a>
                        </p>
                    </div>
                </div>
            </div>
@endforeach
			
</div> <!-- JQ -->

        </div> <!-- End Of The Row Class -->
		
</div> <!-- End Of The Container Class -->

<!-- Footer -->
@include('footer')
<!-- End Of The Footer -->

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>    

  </body>
</html>