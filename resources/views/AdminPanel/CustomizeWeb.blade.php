@extends('Templates.AdminPanel')

@section('content')

<div class="col-md-8 col-sm-4 hero-feature"> <!-- Start Of Right The Col Class -->
<br>

<div class="panel-body">
 
  @if(session()->has('Msg'))
<h4 class="alert alert-success"> {{ session()->get('Msg') }} </h4>
@endif

@if(session()->has('OnlyImg'))
<h4 class="alert alert-success"> {{ session()->get('OnlyImg') }} </h4>
@endif  
    
    <form class="form-horizontal" method="POST" action="{{ route('logoupdate') }}" enctype="multipart/form-data">

    {{ csrf_field() }}
  
  <div class="form-group">
    <label>Upload Logo :</label>
    <input type="file" class="form-control-file" name="file_img" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">You Can Upload JPEG , PNG</small>
  </div>
 
  <input type="submit" class="btn btn-primary" name="submit" value="Insert">
                    </form>
<hr>

<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

    {{ csrf_field() }}
  
  <div class="form-group">
    <label>Upload Slide :</label>
    <input type="file" class="form-control-file" name="file_img" aria-describedby="fileHelp">
    <small id="fileHelp" class="form-text text-muted">You Can Upload JPEG , PNG</small>
  </div>
 
  <input type="submit" class="btn btn-primary" name="submit" value="Insert">
                    </form>

                </div>

</div> <!-- End Of Right The Col Class -->

@endsection