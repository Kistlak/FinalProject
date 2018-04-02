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

            <form action="{{ url('adminedit/' . $edd->id) }}" method="post" enctype="multipart/form-data">

                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label>Username : *</label>
                    <input type="text" class="form-control" name="username" value="{{$edd->username}}"
                           placeholder="Enter Your Username" required>
                </div>

                <div class="form-group">
                    <label>Email : *</label>
                    <input type="email" class="form-control" name="email" value="{{$edd->email}}"
                           placeholder="Enter Your Username" required>
                </div>

                <div class="form-group">
                    <label>Password : *</label>
                    <input type="password" class="form-control" name="password" value="{{$edd->password}}"
                           placeholder="Enter Your Password" required>
                </div>

                <div class="form-group">
                    <label>Upload Profile Picture :</label>
                    <input type="file" class="form-control-file" name="file_img" aria-describedby="fileHelp">
                    <small id="fileHelp" class="form-text text-muted">If U Want , U Can Skip Upload A Profile Picture
                    </small>
                </div>

                <input type="submit" class="btn btn-primary" value="Update User">
            </form>
        </div>

    </div> <!-- End Of Right The Col Class -->

@endsection