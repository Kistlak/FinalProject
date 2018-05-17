@extends('Templates.MasterOtherPages')

@section('content')

    <script src='//static.codepen.io/assets/editor/live/console_runner-ce3034e6bde3912cc25f83cccb7caa2b0f976196f2f2d52303a462c826d54a73.js'></script>
    <script src='//static.codepen.io/assets/editor/live/css_live_reload_init-890dc39bb89183d4642d58b1ae5376a0193342f9aed88ea04330dc14c8d52f55.js'></script>
    <meta charset='UTF-8'>
    <meta name="robots" content="noindex">
    <link rel="shortcut icon" type="image/x-icon"
          href="//static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico"/>
    <link rel="mask-icon" type=""
          href="//static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg"
          color="#111"/>
    <link rel="canonical" href="https://codepen.io/siiron/pen/MYXZWg"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
            type="text/javascript"></script>
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <style>

        .dt {
            margin-left: 400px;
            margin-right: 400px;
        }

    </style>

    @if(session()->has('Msg'))
        <h4 class="alert alert-success"> {{ session()->get('Msg') }} </h4>
    @endif

    <form class="form-horizontal" id="form1" method="POST" action="{{ route('bookings.show', $movie) }}"
          enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="dt"><br>

            <h4><span id="success_message" class="text-success"></span></h4>

            <h4 style="font-family: Times New Roman;font-size:200%;color:blue;"> Book {{ $movie->title }} Movie </h4> <br>

            <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Select Date :</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="date" min="{{ $movie->shows->first()->date->format('Y-m-d') }}" max="{{ $movie->shows->last()->date->format('Y-m-d') }}" placeholder="mm-dd-yyyy" id="example-date-input">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelect1">Select Time :</label>
                <select name="time" class="form-control" id="exampleSelect1">
                    @foreach($showTimes as $time)
                        <option value="{{ $time }}">{{ $time }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <input type="submit" class="btn btn-primary" id="btnShowNew" value="Continue"> <br><br>

    </form>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

@endsection