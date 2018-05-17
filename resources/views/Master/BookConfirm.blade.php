@extends('Templates.MasterOtherPages')

@section('content')

    <div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->

        <p class="about"> <!-- Start Of The P About Class -->
            <br>
        <h1>You Have Successfully Booked !! <br></h1>

        <h3>See You At The Movie Theater !! <br></h3>

        </p> <!-- End Of The P About Class --> <br>

        <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="/payWithpaypal">
            {{ csrf_field() }}
            <h2 class="w3-text-blue">Payment Form</h2>
            <p>Demo PayPal form - Integrating paypal in laravel</p>
            <p>
                <label class="w3-text-blue"><b>Enter Amount</b></label>
                <input class="w3-input w3-border" name="amount" type="text"></p>
            <button class="w3-btn w3-blue">Pay with PayPal</button></p>
        </form>

    </div> <!-- End Of The Col Class -->

@endsection