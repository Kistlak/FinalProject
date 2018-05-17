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

    <div class="col-md-6 col-sm-3 hero-feature"> <!-- Start Of Right The Col Class -->

    <form class="form-horizontal" id="form1" method="POST" action="{{ route('booktsinsert') }}"
          enctype="multipart/form-data">

        {{ csrf_field() }}

            <h4><span id="success_message" class="text-success"></span></h4>

        <br>
            <h4 style="font-family: Times New Roman;font-size:200%;color:blue;"> Book {{ $bk->title }} Movie </h4> <br>

            <input type="hidden" name="Movieid" value="{{ $bk->id }}">

            <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label">Select Date :</label>
                <div class="col-10">
                    <input class="form-control" type="date" name="date" placeholder="mm-dd-yyyy"
                           id="example-date-input">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelect1">Select Time :</label>
                <select name="st" class="form-control" id="exampleSelect1">
                    <option>{{ $bk->fshow }}</option>
                    <option>{{ $bk->sshow }}</option>
                </select>
            </div>

        <div class="form-group">
            <label>Email : *</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
        </div>

            <input type="submit" class="btn btn-primary" id="btnShowNew" value="Continue"> <br><br>

    </div>

    <div class="col-md-6 col-sm-3 hero-feature"> <!-- Start Of Right The Col Class -->
        <div class="plane">
            <div class="cockpit">
                <h1>Please select a seat</h1>
            </div>
            <div class="exit exit--front fuselage">

            </div>

            <ol class="cabin fuselage">
                <li class="row row--1">
                    <ol class="seats" type="A">

                        <li class="seat">
                            <input type="checkbox" id="1A" name="items[]" value="1A" id="items"/>
                            <label for="1A" value="1A">1A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="1B" name="items[]" value="1B" id="items[]"/>
                            <label for="1B">1B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="1C" name="items[]" value="1C" id="items[]"/>
                            <label for="1C">1C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" disabled id="1D" name="items[]" value="1D" id="items[]"/>
                            <label for="1D">Occupied</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="1E" name="items[]" value="1E" id="items[]"/>
                            <label for="1E">1E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="1F" name="items[]" value="1F" id="items[]"/>
                            <label for="1F">1F</label>
                        </li>

                    </ol>
                </li>

                <li class="row row--2">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="2A" name="items[]" value="2A" id="items[]"/>
                            <label for="2A">2A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="2B" name="items[]" value="2B" id="items[]"/>
                            <label for="2B">2B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="2C" name="items[]" value="2C" id="items[]"/>
                            <label for="2C">2C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="2D" name="items[]" value="2D" id="items[]"/>
                            <label for="2D">2D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="2E" name="items[]" value="2E" id="items[]"/>
                            <label for="2E">2E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="2F" name="items[]" value="2F" id="items[]"/>
                            <label for="2F">2F</label>
                        </li>

                    </ol>
                </li>

                <li class="row row--3">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="3A" name="items[]" value="3A" id="items[]"/>
                            <label for="3A">3A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="3B" name="items[]" value="3B" id="items[]"/>
                            <label for="3B">3B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="3C" name="items[]" value="3C" id="items[]"/>
                            <label for="3C">3C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="3D" name="items[]" value="3D" id="items[]"/>
                            <label for="3D">3D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="3E" name="items[]" value="3E" id="items[]"/>
                            <label for="3E">3E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="3F" name="items[]" value="3F" id="items[]"/>
                            <label for="3F">3F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--4">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="4A" name="items[]" value="4A" id="items[]"/>
                            <label for="4A">4A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="4B" name="items[]" value="4B" id="items[]"/>
                            <label for="4B">4B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="4C" name="items[]" value="4C" id="items[]"/>
                            <label for="4C">4C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="4D" name="items[]" value="4D" id="items[]"/>
                            <label for="4D">4D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="4E" name="items[]" value="4E" id="items[]"/>
                            <label for="4E">4E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="4F" name="items[]" value="4F" id="items[]"/>
                            <label for="4F">4F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--5">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="5A" name="items[]" value="5A" id="items[]"/>
                            <label for="5A">5A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="5B" name="items[]" value="5B" id="items[]"/>
                            <label for="5B">5B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="5C" name="items[]" value="5C" id="items[]"/>
                            <label for="5C">5C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="5D" name="items[]" value="5D" id="items[]"/>
                            <label for="5D">5D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="5E" name="items[]" value="5E" id="items[]"/>
                            <label for="5E">5E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="5F" name="items[]" value="5F" id="items[]"/>
                            <label for="5F">5F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--6">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="6A" name="items[]" value="6A" id="items[]"/>
                            <label for="6A">6A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="6B" name="items[]" value="6B" id="items[]"/>
                            <label for="6B">6B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="6C" name="items[]" value="6C" id="items[]"/>
                            <label for="6C">6C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="6D" name="items[]" value="6D" id="items[]"/>
                            <label for="6D">6D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="6E" name="items[]" value="6E" id="items[]"/>
                            <label for="6E">6E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="6F" name="items[]" value="6F" id="items[]"/>
                            <label for="6F">6F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--7">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="7A" name="items[]" value="7A" id="items[]"/>
                            <label for="7A">7A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="7B" name="items[]" value="7B" id="items[]"/>
                            <label for="7B">7B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="7C" name="items[]" value="7C" id="items[]"/>
                            <label for="7C">7C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="7D" name="items[]" value="7D" id="items[]"/>
                            <label for="7D">7D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="7E" name="items[]" value="7E" id="items[]"/>
                            <label for="7E">7E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="7F" name="items[]" value="7F" id="items[]"/>
                            <label for="7F">7F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--8">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="8A" name="items[]" value="8A" id="items[]"/>
                            <label for="8A">8A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="8B" name="items[]" value="8B" id="items[]"/>
                            <label for="8B">8B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="8C" name="items[]" value="8C" id="items[]"/>
                            <label for="8C">8C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="8D" name="items[]" value="8D" id="items[]"/>
                            <label for="8D">8D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="8E" name="items[]" value="8E" id="items[]"/>
                            <label for="8E">8E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="8F" name="items[]" value="8F" id="items[]"/>
                            <label for="8F">8F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--9">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="9A" name="items[]" value="9A" id="items[]"/>
                            <label for="9A">9A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="9B" name="items[]" value="9B" id="items[]"/>
                            <label for="9B">9B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="9C" name="items[]" value="9B" id="items[]"/>
                            <label for="9C">9C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="9D" name="items[]" value="9C" id="items[]"/>
                            <label for="9D">9D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="9E" name="items[]" value="9E" id="items[]"/>
                            <label for="9E">9E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="9F" name="items[]" value="9F" id="items[]"/>
                            <label for="9F">9F</label>
                        </li>
                    </ol>
                </li>

                <li class="row row--10">
                    <ol class="seats" type="A">
                        <li class="seat">
                            <input type="checkbox" id="10A" name="items[]" value="10A" id="items[]"/>
                            <label for="10A">10A</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="10B" name="items[]" value="10B" id="items[]"/>
                            <label for="10B">10B</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="10C" name="items[]" value="10C" id="items[]"/>
                            <label for="10C">10C</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="10D" name="items[]" value="10D" id="items[]"/>
                            <label for="10D">10D</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="10E" name="items[]" value="10E" id="items[]"/>
                            <label for="10E">10E</label>
                        </li>

                        <li class="seat">
                            <input type="checkbox" id="10F" name="items[]" value="10F" id="items[]"/>
                            <label for="10F">10F</label>
                        </li>
                    </ol>
                </li>
            </ol>
            <div class="exit exit--back fuselage">

            </div>
        </div>

    </div>


    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            $.getScript("js/price.js", function () {
            });
        });
    </script>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

@endsection