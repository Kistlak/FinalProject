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
                           placeholder="Enter Your Username" id="username">
                </div>

                <div class="form-group">
                    <label>Email : *</label>
                    <input type="email" class="form-control" name="email" value="{{$edd->email}}"
                           placeholder="Enter Your Username" id="email">
                </div>

                <div class="form-group">
                    <label>Password : *</label>
                    <input type="password" class="form-control" name="password" value="{{$edd->password}}"
                           placeholder="Enter Your Password" id="password">
                </div>

                <div class="form-group">
                    <label>Confirm Password : *</label>
                    <input type="password" class="form-control" name="confirmpassword"
                           placeholder="Enter Your Password" id="confirmpassword">
                </div>

                <div class="form-group">
                    <label>Uploaded Picture : *</label>
                    <td><img src='{{ $edd->filemove }}' style='width:100px;height:100px;'></td>
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