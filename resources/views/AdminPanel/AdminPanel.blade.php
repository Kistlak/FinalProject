@extends('Templates.AdminPanel')

@section('content')

    <div class="col-md-8 col-sm-4 hero-feature"> <!-- Start Of Right The Col Class -->
        <br>

        @if(session()->has('Msg'))
            <div class="sf">
                <h4 class="alert alert-success"> {{ session()->get('Msg') }}
                    <span onclick="this.parentElement.style.display='none'"
                          class="w3-button w3-green w3-large w3-display-topright">&times;</span>
                </h4></div>
        @endif

        @if(session()->has('OnlyImg'))
            <h4 class="alert alert-success"> {{ session()->get('OnlyImg') }} </h4>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('adinsert') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Username : *</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                       placeholder="Enter Your Username" required>
            </div>

            <div class="form-group">
                <label>Email : *</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Enter Your Username" required>
            </div>

            <div class="form-group">
                <label>Password : *</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                       placeholder="Enter Your Password" required>
            </div>

            <div class="form-group">
                <label>Upload Profile Picture :</label>
                <input type="file" class="form-control-file" name="file_img" aria-describedby="fileHelp">
                <small id="fileHelp" class="form-text text-muted">If U Want , U Can Skip Upload A Profile Picture
                </small>
            </div>

            @section('btnName',"Insert")
            <input type="submit" class="btn btn-primary" onclick="myFunction()" name="submit" value="@yield('btnName')">
        </form>


        <table class="table table-bordered">

            <tr>
                <td> Name</td>
                <td> Email</td>
                <td> Images</td>
            </tr>

            @foreach($data as $value )
                <tr>
                    <td> {{ $value->username }} </td>
                    <td> {{ $value->email }} </td>
                    <td><img src='{{ $value->filemove }}' style='width:100px;height:100px;'></td>
                    <td><a href="edit/{{ $value->id }}"><input type="submit" name="update" value="Update"
                                                               class="btn-primary"></a></td>
                    <td><a href="delete{{ $value->id }}"><input type="submit" name="delete" value="Delete"
                                                                class="btn-danger"></a></td>
                </tr>
            @endforeach
        </table>

    </div> <!-- End Of Right The Col Class -->

@endsection