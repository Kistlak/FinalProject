<html>
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/WisdomIcon.jpg">

	<!--JavaScript BootstrapFiles-->
        <script src="js\bootstrap.js"></script>
        <script src="js\bootstrap,mini.js"></script>
        <script src="js\jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

       <!-- Bootstrap CSS -->
        <link href="css\bootstrap.css" rel="stylesheet">
        <link href="css\bootstrap.min.css" rel="stylesheet">
        <link href="css\bootstrap-theme.css" rel="stylesheet">
        <link href="css\bootstrap-theme.min.css" rel="stylesheet">
	
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    
<title>
@include('title')
</title>

<style>

</style>

@include('BackToTop')

</head>

@include('AdminPanelLogout')

@include('AdminNav')

<body>

<div class="container"> <!-- Start Of The Container Class -->

<div class="row"> <!-- Start Of The Row Class -->

<div class="col-md-8 col-sm-4 hero-feature"> <!-- Start Of Right The Col Class -->
<br>

<div class="panel-body">
 
  @if(session()->has('Msg'))
<h4 class="alert alert-success"> {{ session()->get('Msg') }} </h4>
@endif

@if(session()->has('OnlyImg'))
<h4 class="alert alert-success"> {{ session()->get('OnlyImg') }} </h4>
@endif  
    
    <form action="{{ url('posteredit/' . $edd->id) }}" method="post" enctype="multipart/form-data">

    {{ method_field('PUT') }}
    {{ csrf_field() }}

<div class="form-group">
    <label>Movie Name : *</label>
    <input type="text" class="form-control" name="mname" value="{{$edd->mname}}" placeholder="Enter movie Name" required>
  </div>
    
     <div class="form-group">
    <label>1st Show Time : *</label>
    
    <div class="form-check">
        
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="10.30 am" name="fshow">
    <label class="form-check-label" for="exampleCheck1">10.30 am &nbsp&nbsp</label>

    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1.30 pm" name="fshow">
    <label class="form-check-label" for="exampleCheck1">1.30 pm &nbsp&nbsp</label>

    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="4.30 pm" name="fshow">
    <label class="form-check-label" for="exampleCheck1">4.30 pm &nbsp&nbsp</label>
  
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="7.30 pm" name="fshow">
    <label class="form-check-label" for="exampleCheck1">7.30 pm &nbsp&nbsp</label>
    </div>
     </div>
    
    <div class="form-group">
    <label>2nd Show Time : *</label>
    
    <div class="form-check">
        
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="10.30 am" name="sshow">
    <label class="form-check-label" for="exampleCheck1">10.30 am &nbsp&nbsp</label>

    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="1.30 pm" name="sshow">
    <label class="form-check-label" for="exampleCheck1">1.30 pm &nbsp&nbsp</label>

    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="4.30 pm" name="sshow">
    <label class="form-check-label" for="exampleCheck1">4.30 pm &nbsp&nbsp</label>
  
    <input type="checkbox" class="form-check-input" id="exampleCheck1" value="7.30 pm" name="sshow">
    <label class="form-check-label" for="exampleCheck1">7.30 pm &nbsp&nbsp</label>
    </div>
     </div>
  
  <div class="form-group">
    <label>Upload Movie Poster : *</label>
    <input type="file" class="form-control-file" name="file_img" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">If U Want , U Should Upload A Movie Poster</small>
  </div>
    </div> 
  
  <input type="submit" class="btn btn-primary" value="Update">
                    </form>
                </div>

</div> <!-- End Of Right The Col Class -->

</div> <!-- End Of The Row Class -->
		
</div> <!-- End Of The Container Class -->

<!-- Footer -->
@include('AdminFooter')
<!-- End Of The Footer -->
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>			
			
	</body>
</html>