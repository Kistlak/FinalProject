@extends('Templates.MasterIndex')

@section('content')

    <div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->

        <p class="about"> <!-- Start Of The P About Class -->
            <br>
            Amazing Cinema is owned and managed by NTKT Films & Theaters Private Limited. It has long been a one of the
            top end movie entertainment centers in and around Galle city. Amazing Cinema is well equipped with the
            latest movie technology can accommodate 200 seats. Amazing Cinema currently screen movies in four major
            languages, namely English and Hindi Movies and the cinema currently screens four movies per day.

        </p> <!-- End Of The P About Class --> <br>

    </div> <!-- End Of The Col Class -->

    <div id="jq">

        <h1>Currently Showing Movies</h1><br>

        @foreach($movies as $movie)
            <div class="col-md-4 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{{ $movie->cover_image }}" alt="">
                    <div class="caption">
                        <h3>{{ $movie->title }}</h3>
                        <p>
                            <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary">Buy Tickets</a>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    </div> <!-- JQ -->

@endsection