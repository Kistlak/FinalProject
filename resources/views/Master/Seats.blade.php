@extends('Templates.MasterOtherPages')

@section('content')

    <style>

        #holder {
            height: 300px;
            width: 800px;
            background-color: #F5F5F5;
            border: 1px solid #A4A4A4;
        }

        #place {
            position: relative;
            margin-top: 33px;
            margin-left: 35px;
        }

        #place a {
            font-size: 80%;
        }

        #place li {
            list-style: none outside none;
            position: absolute;
        }

        #place li:hover {
            background-color: yellow;
        }

        #place .seat {
            background: url("img/Other/Available Seat.png") no-repeat scroll 0 0 transparent;
            height: 30px;
            width: 45px;
            display: block;
        }

        #place .selectedSeat {
            background-image: url("img/Other/Disabled Seat.png");
        }

        #place .selectingSeat {
            background-image: url("img/Other/Booked Seat.png");
        }

        #place .row-3, #place .row-4 {
            margin-top: 10px;
        }

        #seatDescription li {
            verticle-align: middle;
            list-style: none outside none;
            padding-left: 35px;
            height: 35px;
            float: left;
            font-family: Times New Roman;
            font-size: 120%;
            color: #353c47;
        }

        .dt {
            margin-left: 400px;
            margin-right: 400px;
        }

    </style>

    <div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->

        <center>

            <form class="form-horizontal" id="form1" method="POST" action="{{ route('seatsinsert') }}"
                  enctype="multipart/form-data">

                {{ csrf_field() }}

                <h2 style="font-size:1.2em;font-family: Times New Roman;"> Choose seats by clicking below seats :</h2>

                <div id="holder">
                    <ul id="place">
                    </ul>
                </div>

                <div style="width:600px;text-align:center;overflow:auto"><br>

                    <ul id="seatDescription">

                        <li style="background:url('img/Other/Available Seat.png') no-repeat scroll 0 0 transparent;">
                            Available Seat
                        </li>
                        <li style="background:url('img/Other/Booked Seat.png') no-repeat scroll 0 0 transparent;">Booked
                            Seat
                        </li>
                        <li style="background:url('img/Other/Disabled Seat.png') no-repeat scroll 0 0 transparent;">
                            Disabled Seat
                        </li>

                    </ul>
                </div>

                <input type="submit" class="btn btn-primary" id="btnShowNew" value="Continue"> <br><br>

                @if(session()->has('Msg'))
                    <h4 class="alert alert-success"> {{ session()->get('OnlyImg') }} </h4>
                @endif

                <br/>

        </center>

        <script type="text/javascript">

            $(function () {
                var settings = {
                    rows: 5,
                    cols: 15,
                    rowCssPrefix: 'row-',
                    colCssPrefix: 'col-',
                    seatWidth: 50,
                    seatHeight: 50,
                    seatCss: 'seat',
                    selectedSeatCss: 'selectedSeat',
                    selectingSeatCss: 'selectingSeat'
                };

                var init = function (reservedSeat) {
                    var str = [], seatNo, className;
                    for (i = 0; i < settings.rows; i++) {
                        for (j = 0; j < settings.cols; j++) {
                            seatNo = (j + i * settings.cols + 1);
                            className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                            if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                                className += ' ' + settings.selectedSeatCss;
                            }
                            str.push('<li class="' + className + '"' +
                                'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                '</li>');
                        }
                    }
                    $('#place').html(str.join(''));
                };

                //Case II: If already booked
                var bookedSeats = [5, 10, 25, 63];
                init(bookedSeats);

                $('.' + settings.seatCss).click(function () {
                    if ($(this).hasClass(settings.selectedSeatCss)) {
                        alert('You Can Not Book These Seats');
                    }
                    else {
                        $(this).toggleClass(settings.selectingSeatCss);
                    }
                });

                $('#btnShowNew').click(function (e) {
                    e.preventDefault();

                    var items = [];
                    $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
                        items.push($(this).attr('title'));
                    });

                    //console.log(items);
                    // $(location).attr('href', 'Seats');

                    $.ajax({
                        type: "post",
                        url: "{{ route('seatsinsert') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            items: JSON.stringify(items),
                            Movieid: $('input[name=Movieid]').val(),
                            date: $('input[name=date]').val(),
                            st: $('select[name=st]').val()
                        },
                        success: function (data) {
                            $("form").trigger("reset");
                            $('#success_message').fadeIn().html("Text");
                        }
                    });

                }); //btnShowNew

            }); //Final

        </script>

        </form>

    </div> <!-- End Of The Col Class -->

@endsection