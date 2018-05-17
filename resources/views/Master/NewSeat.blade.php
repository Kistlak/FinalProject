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


<style class="cp-pen-styles">*, *:before, *:after {
        box-sizing: border-box;
    }

    html {
        font-size: 16px;
    }

    .plane {
        margin: 20px auto;
        max-width: 300px;
    }

    .cockpit {
        height: 250px;
        position: relative;
        overflow: hidden;
        text-align: center;
        border-bottom: 5px solid #d8d8d8;
    }

    .cockpit:before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        height: 500px;
        width: 100%;
        border-radius: 50%;
        border-right: 5px solid #d8d8d8;
        border-left: 5px solid #d8d8d8;
    }

    .cockpit h1 {
        width: 60%;
        margin: 100px auto 35px auto;
    }

    .exit {
        position: relative;
        height: 50px;
    }

    .exit:before, .exit:after {
        content: "EXIT";
        font-size: 14px;
        line-height: 18px;
        padding: 0px 2px;
        font-family: "Arial Narrow", Arial, sans-serif;
        display: block;
        position: absolute;
        background: green;
        color: white;
        top: 50%;
        transform: translate(0, -50%);
    }

    .exit:before {
        left: 0;
    }

    .exit:after {
        right: 0;
    }

    .fuselage {
        border-right: 5px solid #d8d8d8;
        border-left: 5px solid #d8d8d8;
    }

    ol {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .seats {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-start;
    }

    .seat {
        display: flex;
        flex: 0 0 14.28571428571429%;
        padding: 5px;
        position: relative;
    }

    .seat:nth-child(3) {
        margin-right: 14.28571428571429%;
    }

    .seat input[type=checkbox] {
        position: absolute;
        opacity: 0;
    }

    .seat input[type=checkbox]:checked + label {
        background: #bada55;
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seat input[type=checkbox]:disabled + label {
        background: #dddddd;
        text-indent: -9999px;
        overflow: hidden;
    }

    .seat input[type=checkbox]:disabled + label:after {
        content: "X";
        text-indent: 0;
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translate(-50%, 0%);
    }

    .seat input[type=checkbox]:disabled + label:hover {
        box-shadow: none;
        cursor: not-allowed;
    }

    .seat label {
        display: block;
        position: relative;
        width: 100%;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        line-height: 1.5rem;
        padding: 4px 0;
        background: #F42536;
        border-radius: 5px;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seat label:before {
        content: "";
        position: absolute;
        width: 75%;
        height: 75%;
        top: 1px;
        left: 50%;
        transform: translate(-50%, 0%);
        background: rgba(255, 255, 255, 0.4);
        border-radius: 3px;
    }

    .seat label:hover {
        cursor: pointer;
        box-shadow: 0 0 0px 2px #5C6AFF;
    }

    @-webkit-keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
            transform: scale3d(1.25, 0.75, 1);
        }
        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
            transform: scale3d(0.75, 1.25, 1);
        }
        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
            transform: scale3d(1.15, 0.85, 1);
        }
        65% {
            -webkit-transform: scale3d(0.95, 1.05, 1);
            transform: scale3d(0.95, 1.05, 1);
        }
        75% {
            -webkit-transform: scale3d(1.05, 0.95, 1);
            transform: scale3d(1.05, 0.95, 1);
        }
        100% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
    }

    @keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
            transform: scale3d(1.25, 0.75, 1);
        }
        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
            transform: scale3d(0.75, 1.25, 1);
        }
        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
            transform: scale3d(1.15, 0.85, 1);
        }
        65% {
            -webkit-transform: scale3d(0.95, 1.05, 1);
            transform: scale3d(0.95, 1.05, 1);
        }
        75% {
            -webkit-transform: scale3d(1.05, 0.95, 1);
            transform: scale3d(1.05, 0.95, 1);
        }
        100% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
    }

    .rubberBand {
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
    }

    .dt {
        margin-left: 400px;
        margin-right: 400px;
    }

</style>

@if(session()->has('Msg'))
<h4 class="alert alert-success"> {{ session()->get('Msg') }} </h4>
@endif

<div class="dt"><br>


</div>

<div class="plane">
    <div class="cockpit">
        <h1>Please select a seat</h1>
    </div>
    <div class="exit exit--front fuselage">

    </div>
    <ol class="cabin fuselage">
        <div class="container">
        <div class="row">

                @foreach($data as $k=>$v)
                @if(in_array($v->id,$bookingdataarray))
                    <div class="col-sm-2">
                <div class="seat">
                    <input type="checkbox" id={{$v->name}} name="items[]" disabled value={{$v->name}}/>
                    <label for={{$v->name}} id="items{{$v->name}}">{{$v->name}}</label>
                </div>
                    </div>
                    @else
                    <div class="col-sm-2">
                        <div class="seat">
                            <input type="checkbox" id={{$v->name}} name="items[]" value={{$v->name}}/>
                            <label for={{$v->name}} id="items{{$v->name}}">{{$v->name}}</label>
                        </div>
                    </div>
                @endif
                @endforeach

        </div>
        </div>




    </ol>
    <div class="exit exit--back fuselage">

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $.getScript("js/price.js", function () {
        });
    });
</script>

<script>

</script>

<script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

@endsection