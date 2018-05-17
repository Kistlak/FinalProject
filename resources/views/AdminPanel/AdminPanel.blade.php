@extends('Templates.AdminPanel')

@section('content')

    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>

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

        <form class="form-horizontal" method="POST" action="{{ route('adinsert') }}" enctype="multipart/form-data" id="signupForm">

            {{ csrf_field() }}

            <div class="form-group">
                <label>Username : *</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                       placeholder="Enter Your Username" id="username">
            </div>

            <div class="form-group">
                <label>Email : *</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                       placeholder="Enter Your Email" id="email">
            </div>

            <div class="form-group">
                <label>Password : *</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                       placeholder="Enter Your Password" id="password">
            </div>

            <div class="form-group">
                <label>Confirm Password : *</label>
                <input type="password" class="form-control" name="confirmpassword" value="{{ old('confirmpassword') }}"
                       placeholder="Enter Your Password" id="confirmpassword">
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
                <td> Username</td>
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

    <script type="text/javascript">
        $.validator.setDefaults( {
        } );

        $( document ).ready( function () {
            $( "#signupForm" ).validate( {
                rules: {
                    username: "required",
                    email: "required",
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },

                },
                messages: {

                    email: "Please enter your Email",
                    username: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 3 characters"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",

                },
                errorElement: "em",
                errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
                }
            } );
        } );
    </script>

@endsection