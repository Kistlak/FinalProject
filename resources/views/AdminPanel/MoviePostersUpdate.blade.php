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

            <form action="{{ url('posteredit/' . $edd->id) }}" method="post" enctype="multipart/form-data">

                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Movie Name : *</label>
                    <input type="text" class="form-control" name="mname" value="{{$edd->mname}}"
                           placeholder="Enter movie Name" required>
                </div>

                <div class="form-group">
                    <label>1st Show Time : *</label>

                    <div class="form-check">

                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="10.30 am"
                               name="fshow">
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

                        <input type="checkbox" class="form-check-input" id="exampleCheck1" value="10.30 am"
                               name="sshow">
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

@endsection